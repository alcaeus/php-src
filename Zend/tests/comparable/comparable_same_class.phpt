--TEST--
compareTo() with the same classes
--FILE--
<?php

class MyComparable implements Comparable
{
    public function __construct(private int $value1, private int $value2) {}

    public function compareTo($other): int
    {
        return $this->value2 <=> $other->value2;
    }
}

$one = new MyComparable(3, 1);
$two = new MyComparable(2, 2);
$three = new MyComparable(1, 3);
$differentOne = new MyComparable(4, 1);

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
