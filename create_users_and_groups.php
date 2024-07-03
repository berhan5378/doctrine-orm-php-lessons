<?php
 
 require_once 'bootstrap.php';

use App\Entity\User;
use App\Entity\UserGroup;

$user1 = new User();
$user1->setName('Alice');
$user1->setEmail('alice@example.com');

$user2 = new User();
$user2->setName('Bob');
$user2->setEmail('bob@example.com');

$group1 = new UserGroup();
$group1->setName('Group One');

$group2 = new UserGroup();
$group2->setName('Group Two');

$user1->addGroup($group1);
$user1->addGroup($group2);
$user2->addGroup($group1);

$entityManager->persist($user1);
$entityManager->persist($user2);
$entityManager->persist($group1);
$entityManager->persist($group2);
$entityManager->flush();

echo "Users and groups created and associated.\n";