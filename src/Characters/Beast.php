<?php
declare(strict_types = 1);
namespace EmagGame\Characters;

use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Builder\Interfaces\BuilderInterface;

class Beast extends BaseCharacter
{
    /**
     * Defensive Orderus Skills
     *
     * @var array
     */
    protected $defensiveSkills = [];

    /**
     * Attack Orderus skills 
     *
     * @var array
     */
    protected $attackSkills = [];


    /**
     * Constructor
     * @param array $abilities
     * @param BuilderInterface $builder
     */
    public function __construct(array $abilities, BuilderInterface $builder)
    {
        parent::__construct($abilities, $builder);
    }

    public function defend(int $damage): int
    {
        return $this->runDefensiveSkills($damage);
    }

    public function attack(int $enemyDefence) :int
    {
        $damage = parent::attack($enemyDefence);
        return $this->runAttackSkills($damage);
    }

    protected function runDefensiveSkills(int $damage): int
    {
        return $damage;
    }

    protected function runAttackSkills(int $damage): int
    {
        return $damage;
    }
}
