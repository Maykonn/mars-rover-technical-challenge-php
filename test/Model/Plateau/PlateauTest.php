<?php

namespace MarsRover\Test\Model\Plateau;

use MarsRover\Model\Coordinate\Coordinate;
use MarsRover\Model\Plateau\Plateau;
use PHPUnit\Framework\TestCase;

class PlateauTest extends TestCase
{
    public function testHaveMinCoordinateToXAxis()
    {
        $Coordinate = new Coordinate("3", "8");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(0, $Plateau->getMinBorders()->getX());
    }

    public function testHaveMinCoordinateToYAxis()
    {
        $Coordinate = new Coordinate("5", "7");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(0, $Plateau->getMinBorders()->getY());
    }

    public function testHaveMaxCoordinateToXAxis()
    {
        $Coordinate = new Coordinate("9", "35");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(9, $Plateau->getMaxBorders()->getX());
    }

    public function testHaveMaxCoordinateToYAxis()
    {
        $Coordinate = new Coordinate("27", "6");
        $Plateau = new Plateau($Coordinate);
        $this->assertSame(6, $Plateau->getMaxBorders()->getY());
    }
}
