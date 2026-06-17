--TEST--
Both comparables returning uncomparable falls through to object property comparison
--FILE--
<?php

class MyComparable implements Comparable
{
    public function __construct(private int $value) {}

    public function compareTo($other): CompareResult
    {
        return CompareResult::Uncomparable;
    }
}

$one = new MyComparable(1);
$two = new MyComparable(2);

var_dump($one == $two);
var_dump($one < $two);

?>
--EXPECT--
bool(false)
bool(true)
