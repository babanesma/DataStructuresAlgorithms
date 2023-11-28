<?php

namespace Unit\Babanesma\DataStructures\Collections;

use Babanesma\DataStructures\Collections\Counter;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public static function integersDataProvider()
    {
        $integersFixtures = require_once(__DIR__ . '/fixtures/counter/integers.php');
        $stringsFixtures = require_once(__DIR__ . '/fixtures/counter/strings.php');
        $objectsFixtures = require_once(__DIR__ . '/fixtures/counter/objects.php');

        return [
            $integersFixtures,
            $stringsFixtures,
            $objectsFixtures,
        ];
    }

    /**
     * @dataProvider integersDataProvider
     */
    public function testCount($insertData, $removeData, $objects, $expectations)
    {
        $counter = new Counter();

        foreach ($insertData as $data) {
            foreach ($data as $d) {
                $counter->add($d);
            }
        }

        foreach ($removeData as $data) {
            foreach ($data as $d) {
                $counter->remove($d);
            }
        }

        foreach ($expectations as $key => $count) {
            $this->assertEquals($count, $counter->count($objects[$key]));
        }
    }

    public function testRemoveThrowsException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$element not found');
        $counter = new Counter();
        $counter->add(1);

        $counter->remove(2);
    }
}
