<?php

class B implements Iterator
{
    private $i = 0;

    public function current()
    {
        return rand(1, 100);
    }

    public function next()
    {
        $this->i++;
    }

    public function key()
    {
        return chr(rand(ord('a'), ord('z')));
    }

    public function valid()
    {
        return $this->i < 10;
    }

    public function rewind()
    {
        $this->i = 0;
    }
}

$b = new B();

foreach ($b as $k => $value) {
    echo $k . ":" . $value . "<br>";
}