<?php
  require_once 'bootstrap.php';
  $entityManager = GetEntityManager();
if ($entityManager === false) {
    echo "Entity Manager could not be initialized.\n";
    exit(1);
} 

use App\Entity\User;
$userRepository = $entityManager->getRepository(User::class);

//Find Users by Criteria
/*
$users = $userRepository->findBy(['email' => 'jan.doe@example.com']);

if ($users === null) {
    echo "User does not exist.\n";
    exit(1);
}
foreach($users as $user){
    $user->setName('Jane Doe');
    $user->setEmail('jane.doe@example.com');
    
    echo "Updated User with ID " . $user->getId() . "\n";
}
*/

//Find User by ID

$user = $userRepository->find(2);
echo $user ? $user->setName('Jane Doe'). "Updated User with ID " . $user->getId() . "\n": 'User not found';


// Flush the changes to the database

$entityManager->flush();