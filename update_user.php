<?php
$entityManager = require_once 'bootstrap.php';

if ($entityManager === false) {
    echo "Entity Manager could not be initialized.\n";
    exit(1);
} 

use App\Entity\User;

// Find a user by its primary key (ID)
$userId = 1;
$user = $entityManager->find(User::class, $id=$userId);

if ($user === null) {
    echo "User with ID $userId does not exist.\n";
    exit(1);
}

// Update the user's name and email
$user->setName('Jane Doe');
$user->setEmail('jane.doe@example.com');

// Flush the changes to the database
$entityManager->flush();

echo "Updated User with ID " . $user->getId() . "\n";
