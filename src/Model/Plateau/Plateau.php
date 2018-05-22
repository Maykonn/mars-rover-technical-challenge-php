<?php

namespace MarsRover\Model\Plateau;

use MarsRover\Model\Coordinate\Coordinate;

class Plateau
{
    private $MinBorders;

    public function getMinBorders(): Coordinate
    {
        return $this->MinBorders;
    }

    private $MaxBorders;

    public function getMaxBorders(): Coordinate
    {
        return $this->MaxBorders;
    }

    public function __construct(Coordinate $MaxBordersCoordinate)
    {
        $this->MinBorders = new Coordinate(0, 0);
        $this->MaxBorders = $MaxBordersCoordinate;
    }
}
