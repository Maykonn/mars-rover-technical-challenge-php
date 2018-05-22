<?php

declare(strict_types=1);

namespace MarsRover\Test\Model\Rover;

use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;
use MarsRover\Model\Rover\RoverSquad;
use MarsRover\Service\CommandsInputParser;
use PHPUnit\Framework\TestCase;

class RoverSquadTest extends TestCase
{
    public function setUp()
    {
        $this->RoverSquad = new RoverSquad();

        $this->RoverOne = new Rover();
        $this->RoverOne->setSetup(new RoverSetup("1 2 N"));
        $this->RoverOne->setCommands((new CommandsInputParser("LMLMLMLMM"))->getCommandsCollection());

        $this->RoverTwo = new Rover();
        $this->RoverTwo->setSetup(new RoverSetup("3 3 E"));
        $this->RoverTwo->setCommands((new CommandsInputParser("MMRMMRMRRM"))->getCommandsCollection());
    }

    public function testIsPossibleToAddRoverOne()
    {
        $this->RoverSquad->offsetSet(0, $this->RoverOne);
        $this->assertTrue($this->RoverSquad->offsetGet(0) instanceof Rover);
    }

    /**
     * @depends testIsPossibleToAddRoverOne
     */
    public function testSquadRoverOutputIsCorrectWhenJustRoverOneIsOnSquad()
    {
        $this->RoverSquad->offsetSet(0, $this->RoverOne);
        $this->RoverSquad->execute();

        $this->expectOutputString("1 3 N");
        echo $this->RoverSquad->getRoversSetupAsString();
    }

    /**
     * @depends testSquadRoverOutputIsCorrectWhenJustRoverOneIsOnSquad
     */
    public function testIsPossibleToAddRoverTwo()
    {
        $this->RoverSquad->offsetSet(1, $this->RoverTwo);
        $this->assertTrue($this->RoverSquad->offsetGet(1) instanceof Rover);
    }

    /**
     * @depends testIsPossibleToAddRoverTwo
     */
    public function testSquadRoverOutputIsCorrectWhenRoverOneAndRoverTwoIsOnSquad()
    {
        $this->RoverSquad->offsetSet(0, $this->RoverOne);
        $this->RoverSquad->offsetSet(1, $this->RoverTwo);
        $this->RoverSquad->execute();

        $this->expectOutputString("1 3 N\n5 1 E");
        echo $this->RoverSquad->getRoversSetupAsString();
    }
}
