<?php
$entityManager = require_once 'bootstrap.php';

if ($entityManager === false) {
    echo "Entity Manager could not be initialized.\n";
    exit(1);
}

use App\Entity\User;

// Create a new User instance
$user = new User();
$user->setName('John Doe');
$user->setEmail('john.doe@example.com');

// Persist the user to the database
$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
