<?php

namespace MarsRover\Service;

use MarsRover\Model\Command\CommandTypes;
use MarsRover\Model\Command\Move;
use MarsRover\Model\Command\TurnLeft;
use MarsRover\Model\Command\TurnRight;

class CommandFactory
{
    public function createCommand(string $commandType)
    {
        switch ($commandType) {
            case CommandTypes::MOVE:
                return new Move();
            case CommandTypes::TURN_RIGHT:
                return new TurnRight();
            case CommandTypes::TURN_LEFT:
                return new TurnLeft();
            default:
                throw new \Exception("Invalid Command Type, given: " . $commandType);
        }
    }
}
