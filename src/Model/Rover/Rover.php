<?php

namespace MarsRover\Model\Rover;

use MarsRover\Model\Command\CommandsCollection;

class Rover
{
    /**
     * @var RoverSetup
     */
    private $Setup;

    public function getSetup(): RoverSetup
    {
        return $this->Setup;
    }

    /**
     * @var CommandsCollection
     */
    private $Commands;

    public function setCommands(CommandsCollection $Commands)
    {
        $this->Commands = $Commands;
    }

    public function setSetup(RoverSetup $RoverSetup)
    {
        $this->Setup = $RoverSetup;
    }

    public function execute()
    {
        $Iterator = $this->Commands->getIterator();
        $Iterator->rewind();
        while ($Iterator->valid()) {
            $Command = $Iterator->current();
            $Command->execute($this);
            $Iterator->next();
        }
    }

    public function getSetupAsString()
    {
        return $this->Setup->toString();
    }
}
