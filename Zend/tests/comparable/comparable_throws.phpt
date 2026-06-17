--TEST--
compareTo() throws
--FILE--
<?php

class MyComparable implements Comparable
{
    public function compareTo($other): int
    {
        var_dump(__METHOD__);
        throw new Exception('gotcha');
    }
}

$a = new MyComparable();
$b = new MyComparable();

var_dump($a == $b);

?>
--EXPECTF--
string(23) "MyComparable::compareTo"

Fatal error: Uncaught Exception: gotcha in %scomparable_throws.php:%d
Stack trace:
#0 %scomparable_throws.php(%d): MyComparable->compareTo(Object(MyComparable))
#1 {main}
  thrown in %scomparable_throws.php on line %d
