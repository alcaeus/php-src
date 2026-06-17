--TEST--
__compare() requires an int return type
--FILE--
<?php

class Comparable
{
    public function __compare($other): string {}
}

?>
--EXPECTF--
Fatal error: Comparable::__compare(): Return type must be int when declared in %s__compare_error_002.php on line %d
