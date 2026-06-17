--TEST--
__compare() with wrong visibility
--FILE--
<?php

class Comparable
{
    protected function __compare($other): int {}
}

?>
--EXPECTF--
Warning: The magic method Comparable::__compare() must have public visibility in %s__compare_error_005.php on line %d
