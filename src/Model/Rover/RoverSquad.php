<?php

namespace MarsRover\Model\Rover;

class RoverSquad extends \ArrayObject
{
    public function execute(): void
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();

        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            $Rover->execute();
            $Iterator->next();
        }

        return;
    }

    public function getRoversSetupAsString(): void
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();

        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            echo $Rover->getSetupAsString() . "\n";
            $Iterator->next();
        }

        return;
    }
}
