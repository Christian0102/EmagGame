<?php
declare(strict_types = 1);
namespace EmagGame\Characters\Base;

use EmagGame\Characters\Builder\Interfaces\BuilderInterface;

abstract class BaseCharacter
{
    /** @var string  */
    protected $name;

    /** @var int */
    protected $health;

    /** @var int */
    protected $strength;

    /** @var int */
    protected $defence;

    /** @var int  */
    protected $speed;

    /** @var int */
    protected $luck;



    abstract public function defend(int $damage): int;

    abstract protected function runDefensiveSkills(int $damage): int;

    abstract protected function runAttackSkills(int $damage): int;



    public function __construct(array $abilities, BuilderInterface $builder)
    {
        $builder->build($this, $abilities);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;
        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;
        return $this;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function setDefence(int $defence): self
    {
        $this->defence = $defence;
        return $this;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;
        return $this;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }
    /**
     * setter
     *
     * @param integer $luck
     * @return self
     */
    public function setLuck(int $luck): self
    {
        $this->luck = $luck;
        return $this;
    }

    /**
     * Calculate attack damage
     *
     * @param integer $enemyDefence
     * @return $damage integer
     */
    public function attack(int $enemyDefence): int
    {
        return (int) $this->strength - $enemyDefence;
    }

    public function __toString(): string
    {
        return   '<pre>name: ' . $this->name .
            '<pre>health: ' . $this->health .
            '<pre>strength: ' . $this->strength .
            '<pre>defence: ' . $this->defence;
    }
}
