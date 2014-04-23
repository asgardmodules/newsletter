<?php
require_once 'paths.php';
require _CORE_DIR_.'core.php';
\Asgard\Core\App::loadDefaultApp();

\Asgard\Utils\FileManager::copy(__DIR__.'/app/newsletter', _DIR_.'app/newsletter');
\Asgard\Utils\FileManager::copy(__DIR__.'/web/newsletter', _DIR_.'web/newsletter');

\Asgard\Orm\MigrationsManager::addMigrationFile(__DIR__.'/migrations/Newsletter.php');
\Asgard\Orm\MigrationsManager::migrate('Newsletter');
