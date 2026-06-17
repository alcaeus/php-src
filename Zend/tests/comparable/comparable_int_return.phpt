--TEST--
Comparable returning non-spaceship int value
--FILE--
<?php

class MyComparable implements Comparable
{
    public function compareTo($other): int
    {
        return 2;
    }
}

$compare = new MyComparable();

var_dump($compare > 1);

?>
--EXPECT--
bool(true)
