<?php

namespace Matks\Battle;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\DBAL\Schema\Table;
use Doctrine\ORM\Mapping\Column;

/**
 * @Entity @Table(name="warriors")
 **/
class Warrior
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @Column(type="integer")
     *
     * @var integer
     */
    private $side;

    /**
     * @Column(type="integer")
     *
     * @var integer
     */
    private $attackPoints;

    /**
     * @Column(type="integer")
     *
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
