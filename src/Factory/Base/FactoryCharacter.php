<?php

declare(strict_types=1);

namespace EmagGame\Factory\Base;

use EmagGame\Characters\Base\BaseCharacter;

abstract class FactoryCharacter
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }
    /**
     * Abstract method
     *
     * @return BaseCharacter
     */
    abstract public function getCharacter(): BaseCharacter;
}
