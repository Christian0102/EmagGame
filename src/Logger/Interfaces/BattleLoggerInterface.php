<?php
declare(strict_types = 1);
namespace EmagGame\Logger\Interfaces;
use EmagGame\Battle\Interfaces\BattleInterface;

interface BattleLoggerInterface
{
    public function getIntitialStats(BattleInterface $battle);

    public function getRoundStats(BattleInterface $battle, $currentRound);

    public function getBattleResults(BattleInterface $battle);
}