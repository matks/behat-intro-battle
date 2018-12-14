<?php

namespace Matks\Battle;

use Doctrine\ORM\EntityManager;

class Battle
{
    const SIDE_1 = 1;
    const SIDE_2 = 2;

    /**
     * @var string
     */
    private $battleName;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param string $battleName
     * @param EntityManager $battleName
     */
    public function __construct($battleName, EntityManager $entityManager)
    {
        $this->battleName = $battleName;
        $this->entityManager = $entityManager;
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

        $this->entityManager->persist($warrior);
        $this->entityManager->flush();
    }

    /**
     * @return int|null null winning side ID or null if draw
     */
    public function getBattleResult()
    {
        $sideStats = [];

        $dql = 'SELECT w FROM Matks\Battle\Warrior w';

        $query = $this->entityManager->createQuery($dql);
        $allWarriors = $query->getResult();

        $attackPointsTotal = [
            self::SIDE_1 => 0,
            self::SIDE_2 => 0,
        ];
        $healthPointsTotal = [
            self::SIDE_1 => 0,
            self::SIDE_2 => 0,
        ];

        foreach ($allWarriors as $warrior) {

            $attackPointsTotal[$warrior->getSide()] += $warrior->getAttackPoints();
            $healthPointsTotal[$warrior->getSide()] += $warrior->getHealthPoints();
        }

        $sideStats = [
            self::SIDE_1 => [
                'attack' => $attackPointsTotal[self::SIDE_1],
                'health' => $healthPointsTotal[self::SIDE_1],
            ],
            self::SIDE_2 => [
                'attack' => $attackPointsTotal[self::SIDE_2],
                'health' => $healthPointsTotal[self::SIDE_2],
            ]
        ];

        if ($sideStats[self::SIDE_1]['attack'] > $sideStats[self::SIDE_2]['health']) {
            return self::SIDE_1;
        } elseif ($sideStats[self::SIDE_2]['attack'] > $sideStats[self::SIDE_1]['health']) {
            return self::SIDE_2;
        } else {
            return null;
        }
    }
}
