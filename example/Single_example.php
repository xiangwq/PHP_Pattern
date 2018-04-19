<?php
//单例模式 主要构造方法私有，由公共函数去获取对象
class single {
    private static $instance = null;
    private $prototype = [];
    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function get_instance(){
        if(empty(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function set_prototype($k,$v){
        $this->prototype[$k] = $v;
    }

    public function get_prototype($k){
        echo $this->prototype[$k];
    }
}