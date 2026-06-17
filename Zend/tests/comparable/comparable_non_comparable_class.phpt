--TEST--
compareTo() with a non-comparable class
--FILE--
<?php

class MyComparableA implements Comparable
{
    public function __construct(public int $value) {}

    public function compareTo($other): int
    {
        return $this->value <=> $other->value;
    }
}

class MyComparableB
{
    public function __construct(public int $value) {}
}

$one = new MyComparableA(1);
$two = new MyComparableA(2);
$three = new MyComparableB(3);
$differentOne = new MyComparableB(1);

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
