--TEST--
__compare() with an error in compare method
--FILE--
<?php

class Comparable
{
    public function __compare($other): int
    {
        return $this->foo <=> undefined_const;
    }
}

$a = new Comparable();
$b = new Comparable();

var_dump($a == $b);

?>
--EXPECTF--
Warning: Undefined property: Comparable::$foo in %s__compare_error_007.php on line %d

Fatal error: Uncaught Error: Undefined constant "undefined_const" in %s__compare_error_007.php:%d
Stack trace:
#0 %s__compare_error_007.php(%d): Comparable->__compare(Object(Comparable))
#1 {main}
  thrown in %s__compare_error_007.php on line %d
