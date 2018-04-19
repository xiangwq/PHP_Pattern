<?php
//工厂模式，包括简单工厂的几种实现和工厂方法模式
abstract class Product{
   abstract function work();
}

class Product_a extends Product{
    function work()
    {
        // TODO: Implement work() method.
        echo "this is a";
    }
}

class Product_b extends Product{
    function work()
    {
        // TODO: Implement work() method.
        echo "this is b";
    }

}

abstract class Factory{
    static function create_a(){
        return new Product_a();
    }
    static function create_b(){
        return new Product_b();
    }
    abstract function create();
}
//测试
Factory::create_a()->work();

class Factory_a extends Factory{
   function create()
   {
       // TODO: Implement create() method.
       return new Product_a();
   }
}

class Factory_b extends Factory{
    function create()
    {
        // TODO: Implement create() method.
        return new Product_b();
    }
}
//test
$a = new Factory_a();
$a->create()->work();