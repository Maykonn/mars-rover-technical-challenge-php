<?php

namespace MarsRover\Test\Model\Rover;

use MarsRover\Model\Coordinate\Coordinate;
use MarsRover\Model\Direction\Direction;
use MarsRover\Model\Rover\RoverSetup;
use PHPUnit\Framework\TestCase;

class RoverSetupTest extends TestCase
{
    public function testParseInput()
    {
        $this->RoverSetup = new RoverSetup("3 3 E");
        $this->assertTrue(
            $this->RoverSetup->getCoordinate() instanceof Coordinate &&
            $this->RoverSetup->getDirection() instanceof Direction
        );
    }

    public function testParseSetupToOutput()
    {
        $this->RoverSetup = new RoverSetup("3 3 E");
        $this->assertEquals("3 3 E", $this->RoverSetup->toString());
    }
}
