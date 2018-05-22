<?php

declare(strict_types=1);

namespace MarsRover\Test\Service;

use MarsRover\Model\Command\Move;
use MarsRover\Model\Command\TurnLeft;
use MarsRover\Model\Command\TurnRight;
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class CommandFactoryTest extends TestCase
{
    public function testIfGiven_M_CommandMoveIsCreated()
    {
        $Move = (new CommandFactory())->createCommand("M");
        $this->assertTrue($Move instanceof Move);
    }

    public function testIfGiven_R_CommandTurnRightIsCreated()
    {
        $TurnRight = (new CommandFactory())->createCommand("R");
        $this->assertTrue($TurnRight instanceof TurnRight);
    }

    public function testIfGiven_L_CommandTurnRightIsCreated()
    {
        $TurnLeft = (new CommandFactory())->createCommand("L");
        $this->assertTrue($TurnLeft instanceof TurnLeft);
    }

    public function testIfGivenInvalidInputThrowsException()
    {
        $this->expectException(\Exception::class);
        (new CommandFactory())->createCommand("S");
    }
}
