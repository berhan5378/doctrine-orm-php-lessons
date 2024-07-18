<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

require_once 'vendor/autoload.php';

$isDevMode = true;  
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// Register the annotation loader
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl(new AnnotationDriver(new AnnotationReader(), [__DIR__."/src"]));

// Database configuration parameters
$conn = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'blog_application',
];

try {
    $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);
   function GetEntityManager(): EntityManager
{
    global $entityManager;
    return $entityManager;
}
} catch (\Exception $e) {
    echo "Error creating EntityManager: " . $e->getMessage() . "\n";
    return false;
}
