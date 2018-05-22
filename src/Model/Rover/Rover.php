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

    public function setCommands(CommandsCollection $Commands): void
    {
        $this->Commands = $Commands;
        return;
    }

    public function setSetup(RoverSetup $RoverSetup): void
    {
        $this->Setup = $RoverSetup;
        return;
    }

    public function execute(): void
    {
        $Iterator = $this->Commands->getIterator();
        $Iterator->rewind();

        while ($Iterator->valid()) {
            $Command = $Iterator->current();
            $Command->execute($this);
            $Iterator->next();
        }

        return;
    }

    public function getSetupAsString(): string
    {
        return $this->Setup->toString();
    }
}
