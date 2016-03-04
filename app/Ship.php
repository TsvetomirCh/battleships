<?php

namespace App;

class Ship
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $length;

    /**
     * @var array
     */
    private $coordinates;

    /**
     * @var int
     */
    private $shots;

    /**
     * Vessel constructor.
     * @param string $name
     * @param int $length
     */
    public function __construct(string $name, int $length)
    {
        $this->name = $name;
        $this->length = $length;
        $this->coordinates = [];
        $this->shots = 0;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getLength() : int
    {
        return $this->length;
    }

    /**
     * @return array
     */
    public function getCoordinates() : array
    {
        return $this->coordinates;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length)
    {
        $this->length = $length;
    }

    /**
     * @param array $coordinates
     */
    public function setCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return bool
     */
    public function isSunk() : bool
    {
        return $this->shots >= $this->length ? true : false;
    }

    /**
     * @return Ship
     */
    public function hit() : Ship
    {
        $this->shots++;

        return $this;
    }

    /**
     * @return int
     */
    public function getShots() : int
    {
        return $this->shots;
    }

    /**
     * @param $position
     * @return bool
     */
    public function checkHit($position) : bool
    {
        $result = in_array($position, $this->getCoordinates());

        if ($result === true) {
            $this->hit();
        }

        return $result;
    }
}
