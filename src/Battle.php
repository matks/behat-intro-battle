<?php

namespace Matks\Battle;

class Battle
{
    const SIDE_1 = 1;
    const SIDE_2 = 2;

    /**
     * @var array
     */
    private $mapping;

    /**
     * @var string
     */
    private $battleName;

    /**
     * @param string $battleName
     */
    public function __construct($battleName)
    {
        $this->mapping = [];
        $this->battleName = $battleName;
    }

    /**
     * @param Warrior $warrior
     * @param int $sideId
     */
    public function addWarriorToSide(Warrior $warrior)
    {
        $sideId = $warrior->getSide();

        if (!in_array($sideId, [self::SIDE_1, self::SIDE_2])) {
            throw new \Exception('Only allowed sides: 1 or 2');
        }

        if (!array_key_exists($sideId, $this->mapping)) {
            $this->mapping[$sideId] = [];
        }

        $this->mapping[$sideId][] = $warrior;
    }

    /**
     * @return int|null null winning side ID or null if draw
     */
    public function getBattleResult()
    {
        $sideStats = [];

        foreach ($this->mapping as $sideId => $warriors) {

            $attackPointsTotal = 0;
            $healthPointsTotal = 0;

            /** @var Warrior $warrior */
            foreach ($warriors as $warrior) {
                $attackPointsTotal += $warrior->getAttackPoints();
                $healthPointsTotal += $warrior->getHealthPoints();
            }

            $sideStats[$sideId] = [
                'attack' => $attackPointsTotal,
                'health' => $healthPointsTotal,
            ];
        }

        if ($sideStats[self::SIDE_1]['attack'] > $sideStats[self::SIDE_2]['health']) {
            return self::SIDE_1;
        } elseif ($sideStats[self::SIDE_2]['attack'] > $sideStats[self::SIDE_1]['health']) {
            return self::SIDE_2;
        } else {
            return null;
        }
    }
}
