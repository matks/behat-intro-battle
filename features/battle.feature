Feature: Battle
  As a battle organizer
  I should be able to create battles and get the output


  Scenario: Hastings battle: 2 vs 1
    Given I prepare the battle "Hastings"
    And I add "2" standard warriors to side "1"
    And I add "1" standard warriors to side "2"
    When the battle starts
    Then the battle winner is side 1

  Scenario: Carthago battle: 6 vs 10
    Given I prepare the battle "Carthago"
    And I add "6" standard warriors to side "1"
    And I add "10" standard warriors to side "2"
    When the battle starts
    Then the battle winner is side 2

  Scenario: Troy battle: 5 vs 5 but less HP on side 2
    Given I prepare the battle "Troy"
    And I add "5" warriors with 100 health points and 200 attack points to side "1"
    And I add "5" warriors with 90 health points and 200 attack points to side "2"
    When the battle starts
    Then the battle winner is side 1

  Scenario: Verdun battle: 5 vs 5
    Given I prepare the battle "Verdun"
    And I add "5" standard warriors to side "1"
    And I add "5" standard warriors to side "2"
    When the battle starts
    Then the battle winner is a draw
