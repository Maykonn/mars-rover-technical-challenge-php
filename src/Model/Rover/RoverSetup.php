<?php

namespace MarsRover\Model\Rover;

use MarsRover\Model\Coordinate\Coordinate;
use MarsRover\Model\Direction\Direction;

class RoverSetup
{
    private $Coordinate;

    public function getCoordinate(): Coordinate
    {
        return $this->Coordinate;
    }

    private $Direction;

    public function getDirection(): Direction
    {
        return $this->Direction;
    }

    public function __construct(string $currentSetupInput)
    {
        $currentSetup = explode(" ", $currentSetupInput);
        $this->Coordinate = new Coordinate($currentSetup[0], $currentSetup[1]);
        $this->Direction = new Direction($currentSetup[2]);
    }

    public function toString(): string
    {
        return $this->Coordinate->getX() . " " . $this->Coordinate->getY() . " " . $this->Direction->getOrientation();
    }
}
