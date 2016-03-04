<?php

use App\Ship;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class shipTest extends TestCase
{

    public function testCreateShip()
    {
        $vessel = new Ship('Test', 3);

        $this->assertEquals('Test', $vessel->getName());
        $this->assertEquals(3, $vessel->getLength());
    }

    public function testChangeShipNameAndLength()
    {
        $vessel = new Ship('Test', 3);

        $vessel->setName('Ship');
        $this->assertEquals('Ship', $vessel->getName());

        $vessel->setLength(4);
        $this->assertEquals(4, $vessel->getLength());

        $this->assertFalse($vessel->isSunk());

        $vessel->setLength(1);

        $this->assertTrue($vessel->hit()->isSunk());
    }
}
