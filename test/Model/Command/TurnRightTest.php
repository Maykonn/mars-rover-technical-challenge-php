<?php

declare(strict_types=1);

namespace MarsRover\Test\Model\Command;

use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class TurnRightTest extends TestCase
{
    public function testCanTurnRightCorrectly()
    {
        $Rover = new Rover();
        $Rover->setSetup(new RoverSetup("1 1 S"));

        $TurnLeft = (new CommandFactory())->createCommand("R");
        $TurnLeft->execute($Rover);

        $this->assertEquals("W", $Rover->getSetup()->getDirection()->getOrientation());
    }
}
