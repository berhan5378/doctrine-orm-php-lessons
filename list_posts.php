<?php
require_once "bootstrap.php";

use App\Entity\User; 
use Doctrine\ORM\EntityManagerInterface;

function fetchPostsForUser(EntityManagerInterface $em, $users)
{
   echo "\n","Author", "\t\t", "Title", "\t\t", "Content" ,"\n";
   echo "------". "\t\t". "-----". "\t\t". "--------"."\n";
    foreach($users as $user){
        foreach ($user->getPosts() as $post){  // get the post for user
            echo $user->getName(),"\t\t" ,$post->getTitle(), "\t",$post->getContent(),"\n";
        }
    } 
     echo "\n";
}
$UserRepository = $entityManager->getRepository(User::class);

// Find all Users
$users = $UserRepository->findAll();
if (empty($users)) {
    echo "No users found.\n";
} else{
    fetchPostsForUser($entityManager, $users);
}