<?php

require_once __DIR__ . '/vendor/autoload.php';

use \MarsRover\Model\Coordinate\Coordinate;
use \MarsRover\Model\Plateau\Plateau;
use \MarsRover\Model\Rover\RoverSquad;
use \MarsRover\Model\Rover\RoverSetup;
use \MarsRover\Model\Rover\Rover;
use \MarsRover\Service\CommandsInputParser;

if (STDIN) {
    $plateauInputLine = fgets(STDIN);
    $plateauBorders = explode(" ", $plateauInputLine);
    $Coordinate = new Coordinate($plateauBorders[0], $plateauBorders[1]);
    $Plateau = new Plateau($Coordinate);

    $RoverSquad = new RoverSquad();
    $inputCommandNumber = 0;
    $squadCounter = 0;

    while (($input = fgets(STDIN)) !== false) {
        if ($inputCommandNumber == 0) {
            if ($RoverSquad->offsetExists($squadCounter) == false) {
                $Rover = new Rover();
                $Rover->setSetup(new RoverSetup($input));
                $RoverSquad->offsetSet($squadCounter, $Rover);
            }
            $inputCommandNumber++;
        } elseif ($inputCommandNumber == 1 && $RoverSquad->offsetExists($squadCounter)) {
            $Rover = $RoverSquad->offsetGet($squadCounter);
            $Rover->setCommands((new CommandsInputParser($input))->getCommandsCollection());
            $inputCommandNumber = 0;
            $squadCounter++;
        }
    }

    $RoverSquad->execute();
    echo $RoverSquad->getRoversSetupAsString();
}
