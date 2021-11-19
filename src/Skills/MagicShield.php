<?php

declare(strict_types=1);

namespace EmagGame\Skills;

use EmagGame\Skills\Base\BaseSkill;

/**
 * Skill Class description : Takes only half of the usual damage when an enemy attacks
 */
class MagicShield extends BaseSkill
{

    protected $name = 'MagicShield';

    /**
     * Constructor
     *
     * @param integer $change to activation skill (percent from 0% to 100%)
     */
    public function __construct(int $chance)
    {
        parent::__construct($chance);
    }
    /**
     * Activation skill  method
     *
     * @param integer $damage
     * @param string $unitName
     * @return integer
     */
    public function activation(int $damage, string $unitName): int
    {
        if (mt_rand(0, 100) <= $this->chance) {
            $damage = (int) round($damage / 2);
            $this->getMessage($damage, $unitName);
            return $damage;
        }
        return $damage;
    }

    protected function getMessage(int $damage, $unitName): void
    {
        echo "Skill executed by {$unitName}: {$this->name} blocked : {$damage} damage <pre>";
    }
}
