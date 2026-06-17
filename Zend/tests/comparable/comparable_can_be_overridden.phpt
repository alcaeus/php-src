--TEST--
compareTo() can be overridden when inherited from parent class
--FILE--
<?php

class MyComparableA implements Comparable
{
    public function compareTo($other): int
    {
        var_dump(__METHOD__);
        return 0;
    }
}

class MyComparableB extends MyComparableA
{
    public function compareTo($other): int
    {
        var_dump(__METHOD__);
        return 0;
    }
}

$one = new MyComparableB();
$two = new MyComparableB();

var_dump($one == $two);

?>
--EXPECT--
string(24) "MyComparableB::compareTo"
bool(true)
