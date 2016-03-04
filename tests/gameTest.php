<?php

use App\Game;
use App\Ship;

class gameTest extends TestCase
{
    public function testCreateGamePlaceHitAndSinkShip()
    {
        $ships = [
            new Ship('Battleship', 1)
        ];

        $game = new Game();
        $game->create($ships);

        $shot = "A1";
        $hit = false;
        $message = '';
        foreach($ships as $ship) {
            //simulate
            $ship->setCoordinates(['A1']);

            if ($ship->checkHit($shot)) {
                $message = 'HIT!';
                $hit = true;
                if ($ship->isSunk()) {
                    $message = 'Yey! Ship ' . $ship->getName() . ' sank!';
                }
            }
        }

        $this->assertEquals('Yey! Ship Battleship sank!', $message);
        $this->assertTrue($hit);
    }

    public function testCreateGamePlaceHitAndMiss()
    {
        $ships = [
            new Ship('Battleship', 1)
        ];

        $game = new Game();
        $game->create($ships);

        $shot = "A2";
        $hit = false;
        $message = 'Miss!';
        foreach($ships as $ship) {
            //simulate
            $ship->setCoordinates(['A1']);

            if ($ship->checkHit($shot)) {
                $message = 'HIT!';
                $hit = true;
                if ($ship->isSunk()) {
                    $message = 'Yey! Ship ' . $ship->getName() . ' sank!';
                }
            }
        }

        $this->assertEquals('Miss!', $message);
        $this->assertFalse($hit);
    }

    public function testHomeScreen()
    {
        $this->visit('/')
             ->see('Play');
    }
}
