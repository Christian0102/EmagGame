<?php
declare(strict_types = 1);
namespace EmagGame\Characters;

use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Builder\Interfaces\BuilderInterface;
use EmagGame\Characters\Interfaces\CharacterSkillInterface;
use EmagGame\Skills\Base\BaseSkill;

class Orderus extends BaseCharacter implements CharacterSkillInterface
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
     *
     * @param array $abilities
     * @param BuilderInterface $builder
     */
    public function __construct(array $abilities, BuilderInterface $builder)
    {
        parent::__construct($abilities, $builder);
    }


    public function setDefensiveSkill(BaseSkill $defensiveSkill): CharacterSkillInterface
    {
        if (!array_key_exists($defensiveSkill->getName(), $this->defensiveSkills)) {
            $this->defensiveSkills[$defensiveSkill->getName()] = $defensiveSkill;
        }

        return $this;
    }

    public function setAttackSkill(BaseSkill $attackSkill): CharacterSkillInterface
    {
        if (!array_key_exists($attackSkill->getName(), $this->attackSkills)) {
            $this->attackSkills[$attackSkill->getName()] = $attackSkill;
        }

        return $this;
    }

    public function defend(int $damage): int
    {
        return $this->runDefensiveSkills($damage);
    }

    public function attack(int $enemyDefence): int
    {
        $damage = (int) parent::attack($enemyDefence);
        $damage = $this->runAttackSkills($damage);
        return $damage;
    }

    protected function runAttackSkills(int $damage): int
    {
        foreach ($this->attackSkills as $skillClass) {
            $damage += $skillClass->activation($damage, $this->name);
        }
        return $damage;
    }


    protected function runDefensiveSkills(int $damage): int
    {
        foreach ($this->defensiveSkills as $skillClass) {
            $damage = $skillClass->activation($damage, $this->name);
        }
        return $damage;
    }
}
