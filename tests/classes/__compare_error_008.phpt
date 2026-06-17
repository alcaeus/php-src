--TEST--
__compare() with too many arguments
--FILE--
<?php

class Comparable
{
    public function __compare($other, $extra): int
    {
        return 0;
    }
}

?>
--EXPECTF--
Fatal error: Method Comparable::__compare() must take exactly 1 argument in %s__compare_error_008.php on line %d
