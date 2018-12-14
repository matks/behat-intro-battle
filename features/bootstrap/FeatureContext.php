<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var \Matks\Battle\Battle
     */
    private $battle;

    private $lastResult;

    public function __construct()
    {
    }

    /**
     * @Given I prepare the battle :battleName
     */
    public function iPrepareTheBattle($arg1)
    {
        $this->battle = new Matks\Battle\Battle($arg1);
    }

    /**
     * @Given I add :arg1 standard warriors to side :arg2
     */
    public function iAddStandardWarriorsToSide($arg1, $arg2)
    {
        for ($i = 1; $i <= (int)$arg1; $i++) {
            $warrior = new \Matks\Battle\Warrior((int)$arg2, 10, 10);
            $this->battle->addWarriorToSide($warrior);
        }
    }

    /**
     * @When the battle starts
     */
    public function theBattleStarts()
    {
        $this->lastResult = $this->battle->getBattleResult();
    }

    /**
     * @Then the battle winner is side :arg1
     */
    public function theBattleWinnerIsSide($arg1)
    {
        if ((int)$arg1 !== $this->lastResult) {
            throw new \RuntimeException('Failed !');
        }
    }


    /**
     * @Given I add :arg1 warriors with :arg3 health points and :arg4 attack points to side :arg2
     */
    public function iAddWarriorsWithHealthPointsAndAttackPointsToSide($arg1, $arg2, $arg3, $arg4)
    {
        for ($i = 1; $i <= (int)$arg1; $i++) {
            $warrior = new \Matks\Battle\Warrior((int)$arg2, (int)$arg4, (int)$arg3);
            $this->battle->addWarriorToSide($warrior);
        }
    }

    /**
     * @Then the battle winner is a draw
     */
    public function theBattleWinnerIsADraw()
    {
        if (null !== $this->lastResult) {
            throw new \RuntimeException('Failed !');
        }
    }
}
