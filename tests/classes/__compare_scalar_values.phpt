--TEST--
__compare() with scalar values
--FILE--
<?php

class Comparable
{
    public function __construct(public int $value) {}

    public function __compare($other): int
    {
        return $this->value <=> $other;
    }
}

$one = new Comparable(1);

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
