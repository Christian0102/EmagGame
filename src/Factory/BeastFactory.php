<?php

declare(strict_types=1);

namespace EmagGame\Factory;

use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Beast;
use EmagGame\Characters\Builder\CharacterBuilder;
use EmagGame\Factory\Base\FactoryCharacter;

class BeastFactory extends FactoryCharacter
{

    /**
     * GetCharacter method
     *
     * @return BaseCharacter
     */
    public function getCharacter(): BaseCharacter
    {
        return (new Beast($this->config, new CharacterBuilder()))
            ->setName('Porcu');
    }
}
