<?php

namespace MarsRover\Service;

use MarsRover\Model\Command\CommandsCollection;

class CommandsInputParser
{
    /**
     * @var CommandsCollection
     */
    private $CommandsCollection;

    /**
     * @return CommandsCollection
     */
    public function getCommandsCollection(): CommandsCollection
    {
        return $this->CommandsCollection;
    }

    public function __construct(string $commandsInput)
    {
        $CommandFactory = new CommandFactory();
        $this->CommandsCollection = new CommandsCollection();

        $commands = str_split(trim($commandsInput));
        foreach ($commands as $commandType) {
            $this->CommandsCollection->append(
                $CommandFactory->createCommand($commandType)
            );
        }
    }
}
