<?php

//组合模式
abstract class unit
{
    abstract function add_unit(unit $unit);

    abstract function remove_unit(unit $unit);

    abstract function count_num();
}
//基本节点
class base_node_1 extends unit
{
    //
    function add_unit(unit $unit)
    {
        throw new Exception('base node is no add_unit function', 0);
        // TODO: Implement add_unit() method.
    }

    function remove_unit(unit $unit)
    {
        throw new Exception('base node is no remove_unit function', 0);
        // TODO: Implement remove_unit() method.
    }

    function count_num()
    {
        // TODO: Implement count_num() method.
        return 1;
    }
}

class base_node_2 extends unit
{
    function add_unit(unit $unit)
    {
        throw new Exception('base node is no add_unit function', 0);
        // TODO: Implement add_unit() method.
    }

    function remove_unit(unit $unit)
    {
        throw new Exception('base node is no remove_unit function', 0);
        // TODO: Implement remove_unit() method.
    }

    function count_num()
    {
        // TODO: Implement count_num() method.
        return 2;
    }
}

//组合节点

 class compsite_node extends unit {
    private $units = [];

    function add_unit(unit $unit){
        foreach ($this->units as $each_unit){
            if($unit === $each_unit){
                return 0;
            }

        }
        $this->units[] = $unit;
    }

     function remove_unit(unit $unit){
        foreach ($this->units as $k=>$each_unit){
            if($each_unit === $unit){
                unset($this->units[$k]);
            }
        }
        // $this->units = array_diff($this->units,[$unit]);不能比较对象
    }

     function count_num(){
        $ret = 0;
        foreach ($this->units as $unit){
            $ret += $unit->count_num();
        }
        return $ret;
    }
    //额外添加的查看方法
    function get_units(){
        var_dump($this->units);
    }
}

$a = new compsite_node();
$b =  new base_node_1();
$c =  new base_node_1();
$d =  new base_node_2();
$a->add_unit($b);
$a->add_unit($c);
$a->add_unit($d);
/*$a->get_units();*/
$a->remove_unit($b);
/*$a->remove_unit($c);*/
$a->remove_unit($d);

/*$e = new compsite_node();
$e->add_unit($b);
$a->add_unit($e);*/
$a->get_units();
echo $a->count_num();