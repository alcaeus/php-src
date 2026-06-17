--TEST--
compareTo() with an error
--FILE--
<?php

class MyComparable implements Comparable
{
    public function compareTo($other): int
    {
        return $this->foo <=> undefined_const;
    }
}

$a = new MyComparable();
$b = new MyComparable();

var_dump($a == $b);

?>
--EXPECTF--
Warning: Undefined property: MyComparable::$foo in %scomparable_comparison_error.php on line %d

Fatal error: Uncaught Error: Undefined constant "undefined_const" in %scomparable_comparison_error.php:%d
Stack trace:
#0 %scomparable_comparison_error.php(%d): MyComparable->compareTo(Object(MyComparable))
#1 {main}
  thrown in %scomparable_comparison_error.php on line %d