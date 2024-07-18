<?php
 
 require_once 'bootstrap.php';

use App\Entity\User;
use App\Entity\UserGroup;
use Doctrine\ORM\EntityManagerInterface;

function addUserToGroup(EntityManagerInterface $em, $name, $groupName)
{
    $userRepository = $em->getRepository(User::class);
    $user = $userRepository->findOneBy(["name" => "$name"]);
    $groupRepository = $em->getRepository(UserGroup::class);
    $group = $groupRepository->findOneBy(["name" => "$groupName"]);
 
    if (!$user || !$group  ) {
        echo "User or Group not found.\n";
        return;
    }

    $user->addGroup($group);

    $em->persist($user);
    $em->flush();

    echo "User added to group successfully.\n";
}
$username='bini';
$groupname='Three';
addUserToGroup($entityManager, $username, $groupname);