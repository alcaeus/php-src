--TEST--
Enum __compare
--FILE--
<?php

enum Foo {
    case Bar;

    public function __compare($other)
    {
        return 0;
    }
}

?>
--EXPECTF--
Fatal error: Enum Foo cannot include magic method __compare in %s on line %d
