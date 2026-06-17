--TEST--
__compare() returns invalid value
--FILE--
<?php

class Comparable
{
    public function __construct(private int $value) {}

    public function __compare($other)
    {
        return 'foo';
    }
}

$a = new Comparable(2);
$b = new Comparable(3);

var_dump($a == $b);

?>
--EXPECTF--
Fatal error: Uncaught Error: Compare method for object of class Comparable returned type string, int expected in %s__compare_error_006.php:%d
Stack trace:
#0 {main}
  thrown in %s__compare_error_006.php on line %d
