<?php

class A implements ArrayAccess
{

    public function offsetExists($offset)
    {
       if($offset <= 100){
           return true;
       }else{
           return false;
       }
    }

    public function offsetGet($offset)
    {
       return rand(1,100);
    }

    public function offsetSet($offset, $value)
    {
        echo "HEllo from Set!!!";

    }

    public function offsetUnset($offset)
    {
        echo "HEllo from UNSET!!!";

    }
}

$aa = new A;

unset( $aa[30]);

//var_dump( isset($aa[100]));