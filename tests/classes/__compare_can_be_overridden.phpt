--TEST--
__compare() can be overridden when inherited from parent class
--FILE--
<?php

class ComparableA
{
    public function __compare($other): int
    {
        var_dump(__METHOD__);
        return 0;
    }
}

class ComparableB extends ComparableA
{
    public function __compare($other): int
    {
        var_dump(__METHOD__);
        return 0;
    }
}

$one = new ComparableB();
$two = new ComparableB();

var_dump($one == $two);

?>
--EXPECT--
string(22) "ComparableB::__compare"
bool(true)
