--TEST--
__compare() may not be static
--FILE--
<?php

class Comparable
{
    public static function __compare($other): int
    {
        return 0;
    }
}

?>
--EXPECTF--
Fatal error: Method Comparable::__compare() cannot be static in %s__compare_error_009.php on line %d
