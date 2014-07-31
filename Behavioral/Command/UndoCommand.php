<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * This concrete command calls "print" on the Receiver, but an external
 * invoker just knows he can call "execute" and "undo"
 */
class UndoCommand implements UndoCommandInterface
{
    /**
     * @var Receiver
     */
    protected $output;

    /**
     * @var string
     */
    protected $previous;

    /**
     * @var string
     */
    protected $value;

    /**
     * Each concrete command is built with different receivers.
     * Can be one, many, none or even other Command in parameters
     *
     * @param Receiver $console
     * @param $previous
     * @param $value
     */
    public function __construct(Receiver $console, $previous, $value)
    {
        $this->output = $console;
        $this->previous = $previous;
        $this->value = $value;
    }

    /**
     * execute and output "Hello World"
     */
    public function execute()
    {
        // sometimes, there is no receiver and this is the command which
        // does all the work
        $this->output->write($this->value);
    }

    /**
     * Undo the previous command
     */
    public function undo()
    {
        $this->value = $this->previous;
        $this->execute();
    }
}
