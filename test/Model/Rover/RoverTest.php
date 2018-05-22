<?php

namespace MarsRover\Test\Model\Rover;

use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;
use MarsRover\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function setUp()
    {
        $this->Rover = new Rover();
    }

    public function testAcceptsRoverSetup()
    {
        $this->Rover->setSetup(new RoverSetup("3 3 E"));
        $this->assertTrue($this->Rover->getSetup() instanceof RoverSetup);
    }

    public function testExecuteCommands()
    {
        $this->Rover->setSetup(new RoverSetup("3 3 E"));
        $this->Rover->setCommands((new CommandsInputParser("MMRMMRMRRM"))->getCommandsCollection());
        $this->Rover->execute();

        $this->expectOutputString("5 1 E");
        echo $this->Rover->getSetupAsString();
    }
}
