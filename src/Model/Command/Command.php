<?php

namespace MarsRover\Model\Command;

use MarsRover\Model\Rover\Rover;

interface Command
{
    public function execute(Rover $Rover): void;
}
