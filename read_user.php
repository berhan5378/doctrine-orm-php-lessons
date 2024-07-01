<?php
$entityManager = require_once 'bootstrap.php';

if ($entityManager === false) {
    echo "Entity Manager could not be initialized.\n";
    exit(1);
}

use App\Entity\User;

// Define the User ID you want to retrieve
$userId = 1;

// Retrieve the User from the database
$user = $entityManager->find(User::class, $userId);

if ($user === null) {
    echo "No user found for ID $userId.\n";
} else {
    echo "User found:\n";
    echo "ID: " . $user->getId() . "\n";
    echo "Name: " . $user->getName() . "\n";
    echo "Email: " . $user->getEmail() . "\n";
}
?>
