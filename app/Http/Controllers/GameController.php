<?php

namespace App\Http\Controllers;

use App\Game;
use App\Ship;
use App\Http\Requests;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homeAction()
    {
        return view("pages.index");
    }

    /**
     * Create the game, grid and place the ships.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function playAction()
    {
        $ships = [
            new Ship('Battleship', 5),
            new Ship('Destroyer', 4),
            new Ship('Destroyer', 4)
        ];

        (new Game())->create($ships);

        $this->setSession($ships, 0);

        return view("pages.play", compact('ships'));
    }

    /**
     * Perform ajax call with the shot.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function shotAction(Request $request)
    {
        $shot = $request->col . $request->row;

        $ships = session('ships');
        $shipsSunk = session('ships_sunk');

        $hit = false;
        $message = 'Miss!';

        $totalShips = count($ships);

        foreach($ships as $ship) {
            if ($ship->checkHit($shot)) {
                $hit = true;
                $message = 'Hit! ';

                if ($ship->isSunk()) {
                    $message = 'Ship ' . $ship->getName() . ' sunk!';
                    $shipsSunk++;
                }
            }
        }

        $this->setSession($ships, $shipsSunk);

        if ($totalShips == $shipsSunk) {
            $message = 'GAME OVER!';
        }

        return response()->json(['hit' => $hit, 'message' => $message]);
    }

    /**
     * @param array $ships
     * @param integer $shipsSunk
     */
    protected function setSession($ships, $shipsSunk) 
    {
        session(['ships' => $ships]);
        session(['ships_sunk' => $shipsSunk]);
    }
}
