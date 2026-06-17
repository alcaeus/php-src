--TEST--
__compare() with a non-comparable class
--FILE--
<?php

class ComparableA
{
    public function __construct(public int $value) {}

    public function __compare($other): int
    {
        return $this->value <=> $other->value;
    }
}

class ComparableB {
    public function __construct(public int $value) {}
}

$one = new ComparableA(1);
$two = new ComparableA(2);
$three = new ComparableB(3);
$differentOne = new ComparableB(1);

var_dump($one == $two);

var_dump($one < $two);
var_dump($two < $three);
var_dump($one < $three);

var_dump($one > $two);
var_dump($two > $three);
var_dump($one > $three);

var_dump($three < $one);
var_dump($three < $two);
var_dump($two < $one);

var_dump($three > $one);
var_dump($three > $two);
var_dump($two > $one);

var_dump($one == $differentOne);
var_dump($one <= $differentOne);
var_dump($one >= $differentOne);

var_dump($one <=> $differentOne);
var_dump($one <=> $two);
var_dump($two <=> $one);

?>
--EXPECT--
bool(false)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
int(0)
int(-1)
int(1)
