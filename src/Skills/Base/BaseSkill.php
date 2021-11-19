<?php

declare(strict_types=1);

namespace EmagGame\Skills\Base;

use Exception;

abstract class BaseSkill
{
    protected $chance;

    /**
     * Undocumented function
     *
     * @param integer $value
     * @param string $unitName
     * @return integer
     */
    abstract public function activation(int $value, string $unitName): int;

    /**
     * Abstract method
     *
     * @param integer $damage
     * @param string $unitName
     * @return void
     */
    abstract protected function getMessage(int $damage, string $unitName): void;

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(int $chance)
    {
        if ($chance > 100) {
            throw new Exception('change param from input is greater than 100');
        }
        $this->chance = $chance;
    }
}
