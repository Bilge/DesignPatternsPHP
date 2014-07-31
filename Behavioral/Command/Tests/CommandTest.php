<?php

namespace DesignPatterns\Behavioral\Command\Tests;

use DesignPatterns\Behavioral\Command\Invoker;
use DesignPatterns\Behavioral\Command\Receiver;
use DesignPatterns\Behavioral\Command\HelloCommand;
use DesignPatterns\Behavioral\Command\UndoCommand;

/**
 * CommandTest has the role of the Client in the Command Pattern
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Invoker
     */
    protected $invoker;

    /**
     * @var Receiver
     */
    protected $receiver;

    protected function setUp()
    {
        $this->invoker = new Invoker();
        $this->receiver = new Receiver();
    }

    public function testInvocation()
    {
        $this->invoker->setCommand(new HelloCommand($this->receiver));
        $this->expectOutputString('Hello World');
        $this->invoker->run();
    }

    public function testUndo()
    {
        $command = new UndoCommand($this->receiver);
        $this->invoker->setCommand($command);

        $command->setValue('Hello');
        $command->setValue('Goodbye');
        $command->undo();
        $this->expectOutputString('Hello');
        $this->invoker->run();
    }
}
