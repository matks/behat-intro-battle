<?php

namespace Matks\Battle;

class Warrior
{
    /**
     * @var integer
     */
    private $side;

    /**
     * @var integer
     */
    private $attackPoints;

    /**
     * @var integer
     */
    private $healthPoints;

    /**
     * @param int $side
     * @param int $attackPoints
     * @param int $healthPoints
     */
    public function __construct($side, $attackPoints, $healthPoints)
    {
        $this->side = $side;
        $this->attackPoints = $attackPoints;
        $this->healthPoints = $healthPoints;
    }

    /**
     * @return int
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * @return int
     */
    public function getAttackPoints()
    {
        return $this->attackPoints;
    }

    /**
     * @return int
     */
    public function getHealthPoints()
    {
        return $this->healthPoints;
    }


}
