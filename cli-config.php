<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);