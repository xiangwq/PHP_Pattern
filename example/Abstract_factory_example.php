<?php
//抽象工厂模式实例
abstract class air_conditioner{  //抽象产品类 产品族1
    abstract function work();
}

//具体产品类
class air_conditioner_hairer extends air_conditioner{
    function work()
    {
        // TODO: Implement work() method.
        echo "this is haier working";
    }
}

//具体产品类
class air_conditioner_green extends air_conditioner{
    function work()
    {
        // TODO: Implement work() method.
        echo "this is green working";
    }
}

abstract class Enigne{
    abstract function work();
}

class Enigne_import extends Enigne{
    function work(){
        echo "this is import engine ! ";
    }
}

class Engine_Domestic extends Enigne{
    function work()
    {
        // TODO: Implement work() method.
        echo "this is domestic engine";
    }
}

//抽象工厂类
abstract class Abstory_factory{
    abstract function get_air_condition();
    abstract function get_engine();
}

//具体工厂类A

class Factory_a extends Abstory_factory{
    function get_air_condition()
    {
        // TODO: Implement get_air_condition() method.
        return new air_conditioner_green();
    }

    function get_engine()
    {
        return new Enigne_import();
        // TODO: Implement get_engine() method.
    }
}

class Factory_b extends  Abstory_factory{
    function get_air_condition()
    {
        // TODO: Implement get_air_condition() method.
        return new air_conditioner_hairer();
    }
    function get_engine()
    {
        // TODO: Implement get_engine() method.
        return new Enigne_import();
    }
}

$factory_a = new Factory_a();
$factory_a->get_engine()->work();
$factory_a->get_air_condition()->work();

$factory_b = new Factory_b();
$factory_b->get_engine()->work();
$factory_b->get_air_condition()->work();