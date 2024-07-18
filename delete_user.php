<?php
   require_once 'bootstrap.php';
   $entityManager = GetEntityManager();

 if ($entityManager === false) {
     echo "Entity Manager could not be initialized.\n";
     exit(1);
 }
use App\Entity\User;
//use App\Entity\UserGroup;
//use App\Entity\Post;

// Find a user by its primary key (ID)
$userId = 3;
$user = $entityManager->find(User::class, $userId);

if (!$user) {
    throw new \Exception("User not found.");
}

// Remove the user from the database
$entityManager->remove($user);
$entityManager->flush();

echo "Deleted User with ID " . $userId . "\n";
