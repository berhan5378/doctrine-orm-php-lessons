<?php
require_once "bootstrap.php";

use App\Entity\User;
$entityManager = GetEntityManager();
// Create a repository for the User entity
$userRepository = $entityManager->getRepository(User::class);

// Find all users

$users = $userRepository->findAll();
if (empty($users)) {
    echo "No users found.\n";
} else {
    echo "\n","User","\t\t","Email","\n";
    echo "-----"."\t\t"."-----"."\n";
    foreach ($users as $user) {
        echo  $user->getName(),"\t\t",$user->getEmail(),"\n";
    }
     echo "\n";
}


//Find User by ID
/*
$user = $userRepository->find(2);
echo $user ? $user->getName() : 'User not found';
*/

//Find One User by Criteria
/*
$user = $userRepository->findOneBy(['email' => 'jane.doe@example.com']);
echo $user ? $user->getName() : 'User not found';
*/

//Find Users by Criteria
/*
$users = $userRepository->findBy(['name' => 'Jane Doe','email' => 'jane.doe@example.com']);
foreach ($users as $user) {
    echo $user->getName() . "\n";
}
*/