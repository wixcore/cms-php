# WixCore CMS
HMVC Flexible site management system

# Installation
1. We clone the repository.
2. Extract the files to the root directory of the site.
3. Updating the composer for autoloading
```
composer update
```
4. Create a database and import into it dump schema.sql
5. In the files (config.php) we specify the connection parameters.
```
<?php
'db' => [
    'host'     => 'localhost',
    'db_name'  => 'cms-php',
    'username' => 'root',
    'password' => '',
    'charset'  => 'utf8'
]
```