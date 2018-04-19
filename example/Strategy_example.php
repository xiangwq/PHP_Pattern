<?php
/**
 * Created by PhpStorm.
 * User: xiang
 * Date: 2018/3/20
 * Time: 10:54
 */
//抽象策略角色
abstract class AbstractStretegy{
    abstract function test();
}

//具体策略角色

class OneStretegy extends AbstractStretegy{
    function test() {
        // TODO: Implement test() method.
        echo "this is test one";
    }
}

class TwoStretegy extends AbstractStretegy{
    function test() {
        // TODO: Implement test() method.
        echo "this is test two";
    }
}

//环境角色

class Env{
    private $instance = null;

    function __construct(AbstractStretegy $instance) {
        $this->instance = $instance;
    }

    function test(){
        $this->instance->test();
    }
}

$a = new Env(new OneStretegy());
$a->test();