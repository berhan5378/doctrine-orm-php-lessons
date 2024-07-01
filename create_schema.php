<?php
$entityManager = require_once 'bootstrap.php';

use Doctrine\ORM\Tools\SchemaTool;

// Get the metadata of the entities
$classes = $entityManager->getMetadataFactory()->getAllMetadata();

// Create SchemaTool instance
$schemaTool = new SchemaTool($entityManager);

try {
    // Drop and create the schema
    $schemaTool->dropSchema($classes);
    $schemaTool->createSchema($classes);
    echo "Database schema created successfully.\n";
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
