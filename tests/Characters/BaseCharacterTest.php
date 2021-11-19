<?php

declare(strict_types=1);

namespace Tests\Characters;

use EmagGame\Characters\Base\BaseCharacter;
use PHPUnit\Framework\TestCase;

final class BaseCharacterTest extends TestCase
{

    public function testRunOnSuccess()
    {
        $character = $this->getMockForAbstractClass(BaseCharacter::class, $this->configProvider())
            ->disableOriginalConstructor()
            ->onlyMethods(['defend', 'runDefensiveSkills', 'runAttackSkills'])
            ->getMock();

        $character->expects($this->once())->method('defend');
        $character->expects($this->once())->method('runDefensiveSkills');
        $character->expects($this->once())->method('runAttackSkills');
    }


    public function getConstructorParams(): array
    {
        return [
            'abilities' => [
                'health'    => [60, 90],
                'strength'  => [60, 90],
                'speed'     => [40, 60],
                'defence'   => [40, 60],
                'luck'      => [25, 40]
            ],
        ];
    }
}
