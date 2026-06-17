--TEST--
compareTo() returns an invalid type
--FILE--
<?php

class MyComparable implements Comparable
{
    public function compareTo($other): int
    {
        return 'foo';
    }
}

$a = new MyComparable();
$b = new MyComparable();

var_dump($a == $b);

?>
--EXPECTF--
Fatal error: Uncaught TypeError: MyComparable::compareTo(): Return value must be of type int, string returned in %scomparable_returns_invalid_type.php:%d
Stack trace:
#0 %scomparable_returns_invalid_type.php(%d): MyComparable->compareTo(Object(MyComparable))
#1 {main}
  thrown in %scomparable_returns_invalid_type.php on line %d
