<?php

declare(strict_types=1);

namespace EmagGame\Battle;

use EmagGame\Battle\Interfaces\BattleInterface;
use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Beast;
use EmagGame\Characters\Orderus;
use EmagGame\Logger\Interfaces\BattleLoggerInterface;



class BattleField implements BattleInterface
{
    protected $currentRound = null;

    protected $attacker = null;

    protected $defender = null;

    protected $orderus = null;

    protected $beast = null;

    protected $maxRounds = 0;

    protected $logger = null;

    protected $config;


    public function __construct(BattleLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * setter method
     *
     * @param array $config
     * @return self
     */
    public function setBattleConfig(array $config): self
    {
        $this->config = $config;
        return $this;
    }

    /**
     * setter method
     *
     * @param Orderus $orderus
     * @return BattleInterface
     */
    public function setOrderus(Orderus $orderus): BattleInterface
    {
        $this->orderus = $orderus;
        return $this;
    }
    /**
     * setter method
     *
     * @param Beast $beast
     * @return BattleInterface
     */
    public function setBeast(Beast $beast): BattleInterface
    {
        $this->beast = $beast;
        return $this;
    }

    /**
     * getter method
     *
     * @return BaseCharacter
     */
    public function getOrderus(): BaseCharacter
    {
        return $this->orderus;
    }

    /**
     * getter method
     *
     * @return BaseCharacter
     */
    public function getBeast(): BaseCharacter
    {
        return $this->beast;
    }

    /**
     * getAttacker
     * getter method
     *
     * @return BaseCharacter
     */
    public function getAttacker(): BaseCharacter
    {
        return $this->attacker;
    }


    public function getDefender(): BaseCharacter
    {
        return $this->defender;
    }



    public function startBattle(): void
    {
        $this->getIntitialStats();
        $this->selectFirstAttacker();
        for ($round = 1; $round < $this->config['max_rounds']; $round++) {
            $this->currentRound = $round;

            if ($this->isEndOfBattle() === true) {
                break;
            }
            $this->playRound($round);
        }
        $this->getBattleResults();
    }

    /**
     * Play Round update Health change roles and method
     *
     * @param integer $round
     * @return void
     */
    protected function playRound(int $round): void
    {
        $this->updatedDefenderHealth();
        $this->switchPlayerRoles();
        $this->getRoundStats($round);
    }
    /**
     * Check if battle is end method
     *
     * @return boolean
     */
    protected function isEndOfBattle(): bool
    {
        if (($this->defender->getHealth() <= 0) || ($this->attacker->getHealth() <= 0)) {
            return true;
        }
        return false;
    }
    /**
     * Select first attacker method
     *
     * @return void | boolean
     */
    protected function selectFirstAttacker()
    {
        if ($this->orderus->getSpeed() > $this->beast->getSpeed()) {
            $this->attacker = $this->orderus;
            $this->defender = $this->beast;
            return false;
        }

        if ($this->orderus->getSpeed() < $this->beast->getSpeed()) {
            $this->attacker = $this->beast;
            $this->defender = $this->orderus;
            return false;
        }

        if ($this->orderus->getLuck() > $this->beast->getLuck()) {
            $this->attacker = $this->orderus;
            $this->defender = $this->beast;
            return false;
        }

        if ($this->orderus->getLuck() < $this->beast->getLuck()) {
            $this->attacker = $this->beast;
            $this->defender = $this->orderus;
            return false;
        }
    }

    /**
     * Caculate attacker damage method
     *
     * @return integer
     */
    protected function calculateDamage(): int
    {
        $damage = 0;

        if ($this->attacker->getStrength() > $this->defender->getDefence()) {
            return (int) $this->defender->defend($this->attacker->attack($this->defender->getDefence()));
        }

        return  $damage;
    }

    protected function updatedDefenderHealth(): void
    {
        $damage = $this->calculateDamage();

        $newHealthValue = $this->defender->getHealth() - $damage;

        if ($newHealthValue < 0) {
            $newHealthValue = 0;
        }

        $this->defender->setHealth($newHealthValue);
    }

    protected function switchPlayerRoles(): void
    {
        $tmp = $this->defender;

        $this->defender = $this->attacker;
        $this->attacker = $tmp;
    }

    public function getWinner(): BaseCharacter
    {
        if ($this->attacker->getHealth() > $this->defender->getHealth()) {
            return $this->attacker;
        }
        return $this->defender;
    }


    protected function getIntitialStats()
    {
        $this->logger->getIntitialStats($this);
    }

    protected function getRoundStats($currentRound)
    {
        $this->logger->getRoundStats($this, $currentRound);
    }

    protected function getBattleResults()
    {
        $this->logger->getBattleResults($this);
    }
}
