<?php
  require_once 'bootstrap.php';
  $entityManager = GetEntityManager();
if ($entityManager === false) {
    echo "Entity Manager could not be initialized.\n";
    exit(1);
} 

use App\Entity\User; 
//use App\Entity\UserGroup;
$user = $entityManager->getRepository(User::class)->find(11);
/* $group = $entityManager->getRepository(UserGroup::class)->find(6);

if ($group) {
    $group->setName('Four');
    $entityManager->persist($group);

    echo "User removed from group successfully.\n";
} else {
    echo "User or group not found.\n";
}
*/
 

foreach ($user->getPosts() as $post){  // get the post for user
      
    $post->setTitle('title');
    $post->setContent('content');
    echo 'yes';
}

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
/*
$user = $userRepository->find(11);
echo $user ? $user->addUser('you'). "Updated User with ID " . $user->getId() . "\n": 'User not found';
*/

// Flush the changes to the database

$entityManager->flush();