--TEST--
Comparison with boolean values bypasses object comparison
--FILE--
<?php

class MyComparable implements Comparable
{
    public function compareTo($other): CompareResult
    {
        var_dump(__METHOD__);
        return CompareResult::Equal;
    }
}

$compare = new MyComparable();

var_dump($compare == true);
var_dump($compare == false);

?>
--EXPECT--
bool(true)
bool(false)
