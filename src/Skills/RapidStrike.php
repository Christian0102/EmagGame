<?php
declare(strict_types = 1);
namespace EmagGame\Skills;

use EmagGame\Skills\Base\BaseSkill;


/** 
 * Skill descrption: Strike twice while it’s his turn to attack; there’s a chance he’ll use this skill
 *   every time he attacks
 */
class RapidStrike extends BaseSkill
{
    protected $name = 'RapidStrike';

    /**
     * Constructor
     *
     * @param integer $change to activation skill (percent from 0% to 100%)
     */
    public function __construct(int $chance)
    {
        parent::__construct($chance);
    }
    /**
     * Skill activation  method
     *
     * @param integer $damage
     * @param string $unitName
     * @return integer $damage
     */
    public function activation(int $damage, string $unitName): int
    {
        $currentDamage = 0;
        if (mt_rand(0, 100) <= $this->chance) {
            $currentDamage = (int) round($damage * 2);
            $this->getMessage($currentDamage, $unitName);
            return $currentDamage;
        }
        return $damage;
    }


    protected function getMessage(int $damage, string $unitName): void
    {
        echo "Skill executed by {$unitName}: {$this->name} get to enemy : {$damage} damage<pre>";
    }
}
