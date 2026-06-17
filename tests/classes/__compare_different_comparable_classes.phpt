--TEST--
__compare() with different comparable classes
--FILE--
<?php

class ComparableA
{
    public function __construct(public int $value) {}

    public function __compare($other): int
    {
        var_dump(__METHOD__);
        return $this->value <=> $other->value;
    }
}

class ComparableB
{
    public function __construct(public int $value) {}

    public function __compare($other): int
    {
        var_dump(__METHOD__);
        return $this->value <=> $other->value;
    }
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
string(22) "ComparableA::__compare"
bool(false)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(false)
string(22) "ComparableB::__compare"
bool(false)
string(22) "ComparableB::__compare"
bool(false)
string(22) "ComparableB::__compare"
bool(false)
string(22) "ComparableB::__compare"
bool(false)
string(22) "ComparableA::__compare"
bool(false)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableA::__compare"
bool(true)
string(22) "ComparableB::__compare"
bool(true)
string(22) "ComparableA::__compare"
int(0)
string(22) "ComparableA::__compare"
int(-1)
string(22) "ComparableA::__compare"
int(1)
