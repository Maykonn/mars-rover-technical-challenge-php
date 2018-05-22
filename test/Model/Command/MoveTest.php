<?php

declare(strict_types=1);

namespace MarsRover\Test\Model\Command;

use MarsRover\Model\Command\CommandsCollection;
use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;
use MarsRover\Service\CommandFactory;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testCanMoveCorrectly()
    {
        $Move = (new CommandFactory())->createCommand("M");
        $CommandCollection = new CommandsCollection();
        $CommandCollection->append($Move);

        $Rover = new Rover();
        $Rover->setSetup(new RoverSetup("1 1 S"));
        $Rover->setCommands($CommandCollection);
        $Rover->execute();

        $this->expectOutputString("1 0 S");
        echo $Rover->getSetupAsString();
    }
}
