<?php
//原型模式

class Sea{
    private $instance;
    function __construct()
    {
        $this->instance = new Sea();
    }
    function __clone()
    {
        // TODO: Implement __clone() method.
        $this->instance = clone $this->instance;
    }
};
class Sea_a extends Sea{};
class Seb_b extends Sea{};

class Forest{
    private $instance;
    function __construct()
    {
        $this->instance = new Forest();
    }
    function __clone()
    {
        // TODO: Implement __clone() method.
        $this->instance = clone $this->instance;
    }
};
class Forest_a extends Forest{};
class Forest_b extends  Forest{};

class Terrain {
    private $sea;
    private $forest;

    function __construct(Sea $sea,Forest $forest)
    {
        $this->sea = $sea;
        $this->forest = $forest;
    }

    function get_sea(){
        return clone $this->sea;
    }

    function get_forest(){
        return clone $this->forest;
    }
}