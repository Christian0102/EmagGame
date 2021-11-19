<?php

declare(strict_types=1);

namespace EmagGame;

use EmagGame\Battle\BattleField;
use EmagGame\Exceptions\KernelExceptions;
use EmagGame\Logger\BattleLogger;
use EmagGame\Factory\BeastFactory;
use EmagGame\Factory\OrderusFactory;

class Kernel
{
    /** @var array */
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function run()
    {
        try {

            $orderusFactory = new OrderusFactory($this->config['orderus']);
            $beastFactory = new BeastFactory($this->config['beast']);

            $logger = new BattleLogger();
            $battle = new BattleField($logger);

            $battle->setBattleConfig($this->config);
            $battle->setOrderus($orderusFactory->getCharacterWithSkills());
            $battle->setBeast($beastFactory->getCharacter());

            $battle->startBattle();
        } catch (KernelExceptions $error) {
            echo 'Kernel Exception : ' . $error->getMessage() . PHP_EOL;
        }
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
