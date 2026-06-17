--TEST--
Comparison with boolean values bypasses object comparison
--FILE--
<?php

class Comparable
{
    public function __compare($other): int
    {
        var_dump(__METHOD__);
        return 0;
    }
}

$compare = new Comparable();

var_dump($compare == true);
var_dump($compare == false);

?>
--EXPECT--
bool(true)
bool(false)
