--TEST--
__compare() with a different argument type
--FILE--
<?php

class Comparable
{
    public function __compare(string $other): int {}
}

?>
--EXPECT--
