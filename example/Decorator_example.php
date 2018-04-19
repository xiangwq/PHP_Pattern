<?php
//装饰者基类
abstract class Component{
    abstract function operation();
}
//被装饰者类
class Main extends Component {
    function operation(){
        echo "mian class".__CLASS__."\n";
    }
}
//装饰者基类
abstract class Decorator extends Component{
    protected $instance;
    function __construct(Component $instance)
    {
        $this->instance = $instance;
    }
    function operation() {
        // TODO: Implement operation() method.
        !empty($this->instance) && $this->instance->operation();
    }
}

class A extends Decorator{
    function operation()
    {
        echo "this is b decorator".__CLASS__."\n";
        parent::operation();
    }
}

class B extends Decorator{
    function operation()
    {
        // TODO: Implement operation() method.
        echo "this is b decorator".__CLASS__."\n";
        parent::operation();
    }
}

$a = new Main();
$test = new B(new A($a));
var_dump($test);
$test->operation();