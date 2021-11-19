<?php

declare(strict_types=1);

namespace EmagGame\Factory;

use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Orderus;
use EmagGame\Factory\Base\FactoryCharacter;
use EmagGame\Characters\Builder\CharacterBuilder;
use EmagGame\Skills\MagicShield;
use EmagGame\Skills\RapidStrike;

class OrderusFactory extends FactoryCharacter
{
    /**
     * getCharacter method
     *
     * @return BaseCharacter
     */
    public function getCharacter(): BaseCharacter
    {
        return new Orderus($this->config, new CharacterBuilder());
    }

    /**
     * getCharacter with skills method
     *
     * @return BaseCharacter
     */
    public function getCharacterWithSkills(): BaseCharacter
    {
        return  $this->getCharacter()
            ->setName('Christian')
            ->setDefensiveSkill(new MagicShield(20))
            ->setAttackSkill(new RapidStrike(10));
    }
}
