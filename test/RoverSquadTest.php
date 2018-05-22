<?php

declare(strict_types = 1);

namespace MarsRover\Test;

require_once __DIR__ . '/../vendor/autoload.php';

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
    }

    public function testIsPossibleToAddRover()
    {
        $this->RoverOneToSquad = new Rover();
        $this->RoverOneToSquad->setSetup(new RoverSetup("1 2 N"));
        $this->RoverOneToSquad->setCommands((new CommandsInputParser("LMLMLMLMM"))->getCommandsCollection());
        $this->RoverSquad->offsetSet(0, $this->RoverOneToSquad);
        $this->assertEquals(true, ($this->RoverSquad->offsetGet(0) instanceof Rover));
    }

    /**
     * @depends testIsPossibleToAddRover
     */
    public function testSquadOutputIsCorrect()
    {
        $this->RoverOneToSquad = new Rover();
        $this->RoverOneToSquad->setSetup(new RoverSetup("1 2 N"));
        $this->RoverOneToSquad->setCommands((new CommandsInputParser("LMLMLMLMM"))->getCommandsCollection());
        $this->RoverSquad->offsetSet(0, $this->RoverOneToSquad);

        $this->RoverSquad->execute();
        $this->assertEquals("1 3 N", $this->RoverSquad->getRoversSetupAsString());
    }
}