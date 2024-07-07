<?php 

require_once "bootstrap.php";

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

function fetchUserAndGroups(EntityManagerInterface $em, $users)
{
   echo "\n","Users", "\t\t", "Groups" ,"\n";
   echo "------". "\t\t". "-----". "\n";
    foreach($users as $user){
        foreach ($user->getGroups() as $group){  // get the group for user
            echo $user->getName(),"\t\t" ,$group->getName(),"\n";
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
    fetchUserAndGroups($entityManager, $users);
}