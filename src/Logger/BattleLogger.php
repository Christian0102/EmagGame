<?php
declare(strict_types = 1);
namespace EmagGame\Logger;

use EmagGame\Battle\Interfaces\BattleInterface;
use EmagGame\Logger\Interfaces\BattleLoggerInterface;

class BattleLogger implements BattleLoggerInterface
{

    public function getIntitialStats(BattleInterface $battle)
    {
        echo "Start Battle!" . '<pre>';
        echo "Orderus Stats: " . $battle->getOrderus() . '<pre>';
        echo '<hr>';

        echo "Beast Stats: " . $battle->getBeast() . '<pre>';
        echo '<hr>';
    }

    public function getRoundStats(BattleInterface $battle, $currentRound)
    {
        echo "ROUND: " . $currentRound . '<pre>';

        echo "Attacker: " . $battle->getAttacker() . '<pre>';
        echo "Defender: " . $battle->getDefender() . '<pre>';

        echo '<hr>';
    }

    public function getBattleResults(BattleInterface $battle)
    {
        echo "Winner is: " . $battle->getWinner()->getName() . '<pre>';
        echo "GAME OVER!!" . '<pre>';
    }
}
