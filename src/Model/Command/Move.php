<?php

namespace MarsRover\Model\Command;

use MarsRover\Model\Direction\Direction;
use MarsRover\Model\Rover\Rover;
use MarsRover\Model\Rover\RoverSetup;

class Move implements Command
{
    public function execute(Rover $Rover): void
    {
        $CurrentSetup = $Rover->getSetup();
        $currentXPosition = $CurrentSetup->getCoordinate()->getX();
        $currentYPosition = $CurrentSetup->getCoordinate()->getY();
        $currentOrientation = $CurrentSetup->getDirection()->getOrientation();

        switch ($currentOrientation) {
            case Direction::NORTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition + 1) . " " . $currentOrientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::WEST:
                $newInputSetup = ($currentXPosition - 1) . " " . $currentYPosition . " " . $currentOrientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::EAST:
                $newInputSetup = ($currentXPosition + 1) . " " . $currentYPosition . " " . $currentOrientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::SOUTH:
                $newInputSetup = $currentXPosition . " " . ($currentYPosition - 1) . " " . $currentOrientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
        }

        return;
    }
}
