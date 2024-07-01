<?php
require_once 'vendor/autoload.php';
$entityManager = require_once 'bootstrap.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . "/src");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_sqlite',
    'path'     => __DIR__ . '/db.sqlite',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config); 
echo "Doctrine ORM is installed and configured!";