--TEST--
compareTo() with different comparable classes
--FILE--
<?php

class MyComparableA implements Comparable
{
    public function __construct(public int $value) {}

    public function compareTo($other): int
    {
        var_dump(__METHOD__);
        return $this->value <=> $other->value;
    }
}

class MyComparableB implements Comparable
{
    public function __construct(public int $value) {}

    public function compareTo($other): int
    {
        var_dump(__METHOD__);
        return $this->value <=> $other->value;
    }
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
// a > b and a >= b are evaluated as b <= a and b < a, respectively, so we expect ComparableB to evaluate these comparisons
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
// This will again be evaluated by ComparableB
var_dump($one >= $differentOne);

var_dump($one <=> $differentOne);
var_dump($one <=> $two);
var_dump($two <=> $one);

?>
--EXPECT--
string(24) "MyComparableA::compareTo"
bool(false)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(false)
string(24) "MyComparableB::compareTo"
bool(false)
string(24) "MyComparableB::compareTo"
bool(false)
string(24) "MyComparableB::compareTo"
bool(false)
string(24) "MyComparableB::compareTo"
bool(false)
string(24) "MyComparableA::compareTo"
bool(false)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
bool(true)
string(24) "MyComparableB::compareTo"
bool(true)
string(24) "MyComparableA::compareTo"
int(0)
string(24) "MyComparableA::compareTo"
int(-1)
string(24) "MyComparableA::compareTo"
int(1)
