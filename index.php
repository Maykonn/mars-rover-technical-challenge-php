<?php

require_once __DIR__ . '/vendor/autoload.php';

use \MarsRover\Model\Plateau;
use \MarsRover\Model\RoverSquad;

if (STDIN) {
    $plateauInputLine = fgets(STDIN);
    $plateauBorder = explode(" ", $plateauInputLine);
    $Plateau = new Plateau($plateauBorder[0], $plateauBorder[1]);
    $RoverSquad = new RoverSquad();
}
