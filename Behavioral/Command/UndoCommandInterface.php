<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * class UndoCommandInterface
 */
interface UndoCommandInterface extends CommandInterface
{
    /**
     * Allows the command to undo it's last command
     */
    public function undo();
}
