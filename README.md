Behat introduction: battle
==========================

To add behat:
```
composer require behat/behat --dev
vendor/bin/behat --init
```

To run behat
```
vendor/bin/behat
```

To see sqlite content
```
sqlite3
.open db.sqlite
SELECT * FROM warriors;
```
