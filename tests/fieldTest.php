<?php

use App\Field;

class fieldTest extends TestCase
{

    public function testCreateField()
    {
        $letters = range('A', 'J');
        $lettersFixedIndex = array_combine(range(1, count($letters)), array_values($letters));
        $expectedField = [];

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $expectedField[$lettersFixedIndex[$i]][$j] = '.';
            }
        }

        $field = new Field();

        $this->assertEquals($expectedField, $field->getField());
    }

    public function testCheckField()
    {
        $field = new Field();

        $this->assertEquals(true, $field->scanField(4, 3, 4, 1));
    }
}
