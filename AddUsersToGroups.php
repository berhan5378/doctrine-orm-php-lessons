<?php
 
 require_once 'bootstrap.php';

use App\Entity\User;
use App\Entity\UserGroup;
use Doctrine\ORM\EntityManagerInterface;

function addUserToGroup(EntityManagerInterface $em, $userId, $groupId)
{
    $user = $em->getRepository(User::class)->find($userId);
    $group = $em->getRepository(UserGroup::class)->find($groupId);

    if (!$user  ) {
        echo "User or Group not found.\n";
        return;
    }

    $user->addGroup($group);

    $em->persist($user);
    $em->flush();

    echo "User added to group successfully.\n";
}
$id=2;
$groupId=1;
addUserToGroup($entityManager, $id, $groupId);