<?php
  require_once 'bootstrap.php';

  use App\Entity\User;
  use Doctrine\ORM\EntityManagerInterface;

function createUser(EntityManagerInterface $em, $name, $email)
{
  // Create a new User instance
    $user = new User();
    $user->setName($name);
    $user->setEmail($email);
  // Persist the user to the database
    $em->persist($user);
    $em->flush(); // Flush to save changes

    echo "User created successfully.\n";
}
createUser($entityManager, 'berhan', 'berhan@gmail.com');