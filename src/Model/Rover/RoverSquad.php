<?php

namespace MarsRover\Model\Rover;

class RoverSquad extends \ArrayObject
{
    public function execute()
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();
        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            $Rover->execute();
            $Iterator->next();
        }
    }

    public function getRoversSetupAsString()
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();
        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            echo $Rover->getSetupAsString() . "\n";
            $Iterator->next();
        }
    }
}
