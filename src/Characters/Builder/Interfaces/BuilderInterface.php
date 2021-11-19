<?php
declare(strict_types = 1);
namespace EmagGame\Characters\Builder\Interfaces;

use EmagGame\Characters\Base\BaseCharacter;

interface BuilderInterface
{
    /**
     * Build characters and popualtion stats abstract method
     *
     * @param BaseCharacter $character
     * @param array $ability
     * @return void
     */
    public function build(BaseCharacter $character, array $ability): void;
}