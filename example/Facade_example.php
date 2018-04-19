<?php //外观模式

class son_class{
    function A(){
        echo 'a';
    }

    function B(){
        echo 'b';
    }

    function C(){
        echo 'c';
    }
}

class clien{
    function start(){
        $son = new son_class();
        $son->A();
        $son->B();
        $son->C();
    }
}

$test = new clien();
$test->start();