--TEST--
__compare() requires a single argument
--FILE--
<?php

class Comparable
{
    public function __compare(): int {}
}

?>
--EXPECTF--
Fatal error: Method Comparable::__compare() must take exactly 1 argument in %s__compare_error_001.php on line %d
