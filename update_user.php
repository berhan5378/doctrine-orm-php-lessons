<?php
  require_once 'bootstrap.php';
  $entityManager = GetEntityManager();
if ($entityManager === false) {
    echo "Entity Manager could not be initialized.\n";
    exit(1);
} 

use App\Entity\User; 
use App\Entity\UserGroup;

$user = $entityManager->getRepository(User::class)->find(2);
$group = $entityManager->getRepository(UserGroup::class)->find(1);

// remove user from group 
if ($user && $group) {
       $user->removeGroup($group);
       $entityManager->persist($user); 
       echo "User removed from group successfully.\n";
} else {
       echo "User or group not found.\n";
}


// update post 
 
/*
foreach ($user->getPosts() as $post){  // get the post for user
      
    $post->setTitle('title');
    $post->setContent('content');
    echo 'Updated post';
    
}
*/
//Find Users by Criteria
/*
$users = $user->findBy(['email' => 'jane.doe@example.com']);

if ($users === null) {
    echo "User does not exist.\n";
    exit(1);
}
foreach($users as $user){
    $user->setName('Joy');
    $user->setEmail('joy@example.com');
    
    echo "User updated.\n";
    echo "Updated at: " . $user->getUpdatedAt()->format('Y-m-d H:i:s') . "\n";
}

*/
//Find User by ID
/*
$user = $userRepository->find(11);
echo $user ? $user->addUser('you'). "Updated User with ID " . $user->getId() . "\n": 'User not found';
*/

// Flush the changes to the database

$entityManager->flush();