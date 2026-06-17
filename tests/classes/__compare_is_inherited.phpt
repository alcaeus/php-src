--TEST--
__compare() is inherited by child classes
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

class ComparableB extends ComparableA {}

$one = new ComparableB();
$two = new ComparableB();

var_dump($one == $two);

?>
--EXPECT--
string(22) "ComparableA::__compare"
bool(true)
