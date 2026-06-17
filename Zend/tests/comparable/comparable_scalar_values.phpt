--TEST--
compareTo() with scalar values
--FILE--
<?php

class MyComparable implements Comparable
{
    public function __construct(public int $value) {}

    public function compareTo($other): int
    {
        return $this->value <=> $other;
    }
}

$one = new MyComparable(1);

var_dump($one == 2);
var_dump($one < 2);
var_dump($one > 2);
var_dump($one == 1);
var_dump($one == "1");

?>
--EXPECT--
bool(false)
bool(true)
bool(false)
bool(true)
bool(true)
