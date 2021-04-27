<?php

abstract class Math
{
    protected $a, $b, $c;

    public function setA($a)
    {
        $this->a = $a;
        $this->c = null;
    }

    public function setB($b)
    {
        $this->b = $b;
        $this->c = null;
    }

    public function getResult()
    {
        if (null == $this->c) {
            echo "Calc<br>";
            $this->calculate();
        }
        return $this->c;
    }

    abstract public function calculate();

}

class Sum extends Math
{
    public function calculate()
    {
        $this->c = $this->a + $this->b;
    }
}

class Sub extends Math
{
    public function calculate()
    {
        $this->c = $this->a - $this->b;
    }
}

class Div extends Math
{
    public function calculate()
    {
        $this->c = $this->a - $this->b;
    }
}

class Mul extends Math
{
    public function calculate()
    {
        $this->c = $this->a / $this->b;
    }
}

$mul = new Mul();
$mul->setA(10);
$mul->setB(5);

echo $mul->getResult();