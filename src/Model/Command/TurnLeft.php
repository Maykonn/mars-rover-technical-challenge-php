<?php

namespace MarsRover\Model\Command;

use MarsRover\Model\Direction\Direction;
use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;

class TurnLeft extends Rotatable implements Command
{
    public function execute(Rover $Rover): void
    {
        $CurrentSetup = $Rover->getSetup();
        $currentXPosition = $CurrentSetup->getCoordinate()->getX();
        $currentYPosition = $CurrentSetup->getCoordinate()->getY();
        $currentOrientation = $CurrentSetup->getDirection()->getOrientation();

        $newInputSetup = $currentXPosition . " " . $currentYPosition . " " . $this->rotateFrom($currentOrientation);
        $Rover->setSetup(new RoverSetup($newInputSetup));

        return;
    }

    protected function rotateFrom($currentDirection): string
    {
        switch ($currentDirection) {
            case Direction::NORTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::NORTH;
        }
    }
}
