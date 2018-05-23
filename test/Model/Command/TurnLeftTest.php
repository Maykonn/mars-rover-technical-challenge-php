<?php

declare(strict_types=1);

namespace MarsRover\Test\Model\Command;

use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class TurnLeftTest extends TestCase
{
    public function testCanTurnLefCorrectly()
    {
        $Rover = new Rover();
        $Rover->setSetup(new RoverSetup("1 1 S"));

        $TurnLeft = (new CommandFactory())->createCommand("L");
        $TurnLeft->execute($Rover);

        $this->assertEquals("E", $Rover->getSetup()->getDirection()->getOrientation());
    }
}
