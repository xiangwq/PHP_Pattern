<?php

//观察者模式
abstract class Observable {
    abstract function attach(Observer $observer);

    abstract function detach(Observer $observer);

    abstract function notify();
}

abstract class Observer {
    abstract function update(Observable $observable);
}

class Login extends Observable {
    private $_observes = [];
    private $login_info;

    function __construct($login_info) {
        $this->login_info = $login_info;
    }

    public function get_login_info(){
        return $this->login_info;
    }

    function attach(Observer $observer) {
        // TODO: Implement attach() method.
        foreach ($this->_observes as $ob) {
            if ($ob === $observer) {
                return 0;
            }
        }
        $this->_observes[] = $observer;
    }

    function detach(Observer $observer) {
        // TODO: Implement detach() method.
        foreach ($this->_observes as $k => $ob) {
            if ($ob === $observer) {
                unset($this->_observes[$k]);
            }
        }
    }

    function notify() {
        // TODO: Implement notify() method.
        foreach ($this->_observes as $ob) {
            $ob->update($this);
        }
    }
}

class send_email extends Observer {
    function update(Observable $observable) {

        // TODO: Implement update() method.
        echo $observable->get_login_info() . 'is sending email';
    }
}

class write_log extends Observer {
    function update(Observable $observable) {
        // TODO: Implement update() method.
        echo $observable->get_login_info() . 'is write log';
    }
}

$test = new Login('test');
$test->attach(new send_email());
$test->attach(new write_log());
$test->notify();