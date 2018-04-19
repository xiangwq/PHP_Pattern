<?php

abstract class Receiver{
    abstract function do();
}

class Receiver1 extends Receiver{
    function do() {
        // TODO: Implement do() method.
        echo 'do 1';
    }
}

class Receiver2 extends  Receiver{
    function do() {
        // TODO: Implement do() method.
        echo 'do 2';
    }
}

abstract class Command{
    abstract function execute();
}

class Command1 extends Command{
    private $receiver;

    function __construct(Receiver $Rec) {
        $this->receiver = $Rec;
    }

    function execute() {
        // TODO: Implement execute() method.
        $this->receiver->do();
    }
}

class Command2 extends Command{
    private $receiver;

    function __construct(Receiver $Rec) {
        $this->receiver = $Rec;
    }

    function execute() {
        // TODO: Implement execute() method.
        $this->receiver->do();
    }
}

class Invoker{
    private $command;
    function __construct(Command $command) {
        $this->command  = $command;
    }

    function action(){
        $this->command->execute();
    }
}

//client

$receiver = new Receiver1();
$command = new Command1($receiver);
$invoker = new Invoker($command);
$invoker->action();
