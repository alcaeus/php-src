--TEST--
Comparison falls back to other side if result is uncomparable
--FILE--
<?php

class MyComparableA implements Comparable
{
    public function __construct(public int $value) {}

    public function compareTo($other): CompareResult|int
    {
        var_dump(__METHOD__);

        if (!$other instanceof self) {
            return CompareResult::Uncomparable;
        }

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
$two = new MyComparableB(2);

var_dump($one == $two);
var_dump($two == $one);

?>
--EXPECT--
string(24) "MyComparableA::compareTo"
string(24) "MyComparableB::compareTo"
bool(false)
string(24) "MyComparableB::compareTo"
bool(false)
