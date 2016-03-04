<?php

namespace App;

class Game
{
    /**
     * @var Field
     */
    private $field;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->field = new Field();
    }

    /**
     * @param array $ships
     * @throws \Exception
     */
    public function create(array $ships)
    {
        foreach ($ships as $ship) {
            $this->field->placeShip($ship);
        }
    }

    /**
     * @return Field
     */
    public function getField() : Field
    {
        return $this->field->getField();
    }

}
