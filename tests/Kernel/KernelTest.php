<?php

declare(strict_types=1);

namespace Tests\Kernel;

use EmagGame\Exceptions\KernelExceptions;
use PHPUnit\Framework\TestCase;
use EmagGame\Kernel;
use Exception;
use phpDocumentor\Reflection\Types\Iterable_;

final class KernelTest extends TestCase
{

    private $kernel;

    /**
     * 
     * @depends configProvider
     */
    public function testKernelConfig(array $config): void
    {

        $this->kernel = new Kernel($config);
        $this->assertEquals($config, $this->kernel->getConfig());
        
        $this->testRunException();
    }

    protected function testRunException()
    {
        $this->expectException(KernelExceptions::class);
        $this->kernel->run();
    }


    public function configProvider(): Iterable
    {
        return [

            /** Wild Beast Hero Abilities */
            'beast' => [
                'health'    => [60, 90],
                'strength'  => [60, 90],
                'speed'     => [40, 60],
                'defence'   => [40, 60],
                'luck'      => [25, 40]
            ],

            /** Orders Hero Abilities */
            'orderus' => [
                'health' => [70, 100],
                'strength' => [70, 80],
                'defence' => [45, 55],
                'speed' => [40, 50],
                'luck' => [10, 30]
            ],

            /** Default fightin max rounds  */
            'max_rounds' => 20

        ];
    }
}
