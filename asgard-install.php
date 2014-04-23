<?php
require_once 'paths.php';
require_once _VENDOR_DIR_.'autoload.php'; #composer autoloader
\Asgard\Core\App::loadDefaultApp();

\Asgard\Utils\FileManager::copy(__DIR__.'/app/newsletter', _DIR_.'app/newsletter');
\Asgard\Utils\FileManager::copy(__DIR__.'/web/newsletter', _DIR_.'web/newsletter');

\Asgard\Orm\Libs\MigrationsManager::addMigrationFile(__DIR__.'/migrations/Newsletter.php');
\Asgard\Orm\Libs\MigrationsManager::migrate('Newsletter');
