<?php
declare(strict_types = 1);
namespace EmagGame\Characters\Interfaces;

use EmagGame\Skills\Base\BaseSkill;

interface CharacterSkillInterface
{

    public function setDefensiveSkill(BaseSkill $defensiveSkill): CharacterSkillInterface;

    public function setAttackSkill(BaseSkill $attackSkill): CharacterSkillInterface;
} 