<?php
//解释器模式
//表达式基类
abstract class Expression {
    private $key;
    private static $keyCount;

    abstract function interpret(InterpreterContext $store);

    //返回表达式的索引
    function get_key() {
        if (!isset($this->key)) {
            self::$keyCount++;
            $this->key = self::$keyCount;
        }
        return $this->key;
    }
}

//终结表达式
class LiteralExpression extends Expression {
    private $value;

    function __construct($value) {
        $this->value = $value;
    }

    function interpret(InterpreterContext $store) {
        // TODO: Implement interpret() method.
        //传人仓库，从而将表达式组合到仓库中
        $store->replace($this, $this->value);
    }
}

//变量表达式，所以key是变量，而不是静态计数器的值为key
class VariableExpression extends Expression {
    private $var;
    private $value;

    function __construct($var, $value) {
        $this->var = $var;
        $this->value = $value;
    }

    function interpret(InterpreterContext $store) {
        // TODO: Implement interpret() method.
        if (!is_null($this->value)) {
            $store->replace($this, $this->value);
            $this->var = null;
        }
    }

    function setValue($value) {
        $this->value = $value;
    }

    function get_key() {
        //因为key不是计数器，所以需要重写父类的get_key方法
        return $this->var;
    }

}

//操作符，即非终结表达式
abstract class OperationExpression {
    protected $l_op;
    protected $r_op;

    function __construct($lop, $rop) {
        $this->l_op = $lop;
        $this->r_op = $rop;
    }

    function interpret(InterpreterContext $store) {
        $this->l_op->interpret($store);  //在仓库中保存值
        $this->r_op->interpret($store);
        $res_l = $store->lookup($store->lookup($this->l_op)); //获取上一步的计算结果
        $res_r = $store->lookup($store->lookup($this->r_op));
        $this->doInterpret($store, $res_l, $res_r); //非终结表达式，需要进行对两边的终结表达式进行计算
    }
    protected abstract function doInterpret(InterpreterContext $store,$res_l,$res_r);
}

class EqualExpression  extends  OperationExpression {
    protected function doInterpret(InterpreterContext $store, $res_l, $res_r) {
        // TODO: Implement doInterpret() method.
        return $store->replace($this,$res_l == $res_r);
    }
}

//文本类，对输入的表达式进行存储，即表达式仓库
class InterpreterContext {
    private $expressionStore = [];

    //将表达式存储在仓库中
    function replace(Expression $exp, $value) {
        //获取唯一的key      //传人的value
        $this->expressionStore[$exp->get_key()] = $value; //组成表达式仓库
    }

    function lookup(Expression $exp) {
        //根据传人的表达式对象，获取唯一的key,从而找到仓库中的值
        return $this->expressionStore[$exp->get_key()];
    }
}
