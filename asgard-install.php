<?php
require_once __DIR__.'/../utils/FileManager.php';

\Asgard\Utils\FileManager::copy(__DIR__.'/app/newsletter', 'app/newsletter');
\Asgard\Utils\FileManager::copy(__DIR__.'/web/newsletter', 'web/newsletter');