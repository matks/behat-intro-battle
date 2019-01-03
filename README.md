Behat introduction: battle
==========================

To add behat:
```
composer require behat/behat --dev
vendor/bin/behat --init
```

To setup sqlite tests database
```
vendor/bin/doctrine orm:schema-tool:create
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
