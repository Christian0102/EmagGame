<?php

declare(strict_types=1);

namespace EmagGame\Battle\Interfaces;

use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Beast;
use EmagGame\Characters\Orderus;

interface BattleInterface
{
    /**
     * setter method
     * @param Orderus $orderus
     * @return BattleInterface
     */
    public function setOrderus(Orderus $orderus): BattleInterface;

    /**
     * setter method
     *
     * @param Beast $beast
     * @return BattleInterface
     */
    public function setBeast(Beast $beast): BattleInterface;

    /**
     * Start battle method 
     *
     * @return void
     */
    public function startBattle(): void;

    /**
     * get battle winner 
     *
     * @return BaseCharacter
     */
    public function getWinner(): BaseCharacter;
}
