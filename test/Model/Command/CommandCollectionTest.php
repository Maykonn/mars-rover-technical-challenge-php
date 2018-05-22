<?php

declare(strict_types=1);

namespace MarsRover\Test\Model\Command;

use MarsRover\Model\Command\CommandsCollection;
use MarsRover\Model\Command\Move;
use MarsRover\Model\Command\TurnLeft;
use MarsRover\Model\Command\TurnRight;
use PHPUnit\Framework\TestCase;

class CommandCollectionTest extends TestCase
{
    public function testIsPossibleToAddOneCommand()
    {
        $CommandCollection = new CommandsCollection();
        $CommandCollection->append(new Move());

        $this->expectOutputString("1");
        echo $CommandCollection->count();
    }

    public function testIsPossibleToAddMoreThanOneCommand()
    {
        $CommandCollection = new CommandsCollection();
        $CommandCollection->append(new Move());
        $CommandCollection->append(new TurnLeft());
        $CommandCollection->append(new TurnRight());

        $this->expectOutputString("3");
        echo $CommandCollection->count();
    }
}
