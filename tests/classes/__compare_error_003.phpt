--TEST--
__compare() with a mixed argument type
--FILE--
<?php

class Comparable
{
    public function __compare(mixed $other): int {}
}

?>
--EXPECT--
