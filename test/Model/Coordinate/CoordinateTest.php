<?php

namespace MarsRover\Test\Model\Coordinate;

use MarsRover\Model\Coordinate\Coordinate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    public function testCanHandleInputReturningIntegerToXPosition()
    {
        $Coordinate = new Coordinate("2", "3");
        $this->assertSame(2, $Coordinate->getX());
    }

    public function testCanHandleInputReturningIntegerToYPosition()
    {
        $Coordinate = new Coordinate("2", "3");
        $this->assertSame(3, $Coordinate->getY());
    }
}
