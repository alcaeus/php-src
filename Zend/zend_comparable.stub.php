<?php

/**
 * @generate-class-entries
 * @generate-c-enums
 */

enum CompareResult: int
{
    case Smaller = -1;
    case Equal = 0;
    case Greater = 1;
    case Uncomparable = 2;
}

interface Comparable
{
    public function compareTo(mixed $other): CompareResult|int;
}
