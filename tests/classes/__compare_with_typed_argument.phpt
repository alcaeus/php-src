--TEST--
__compare() fails when argument type restricts comparison
--FILE--
<?php

class ComparableA
{
    public function __construct(public int $value) {}

    public function __compare(ComparableA $other): int
    {
        var_dump(__METHOD__);
        return $this->value <=> $other->value;
    }
}

class ComparableB
{
    public function __construct(public int $value) {}

    public function __compare($other): int
    {
        var_dump(__METHOD__);
        return $this->value <=> $other->value;
    }
}

$one = new ComparableA(1);
$two = new ComparableA(2);
$three = new ComparableB(3);
$differentOne = new ComparableB(1);

var_dump($one == $two);
var_dump($one == $three);

?>
--EXPECTF--
string(22) "ComparableA::__compare"
bool(false)

Fatal error: Uncaught TypeError: ComparableA::__compare(): Argument #1 ($other) must be of type ComparableA, ComparableB given, called in %s__compare_with_typed_argument.php on line %d and defined in %s__compare_with_typed_argument.php:%d
Stack trace:
#0 %s__compare_with_typed_argument.php(%d): ComparableA->__compare(Object(ComparableB))
#1 {main}
  thrown in %s__compare_with_typed_argument.php on line %d