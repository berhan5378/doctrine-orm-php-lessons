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
  try {
    $em->persist($user);
    $em->flush(); // Flush to save changes
  } catch (\Exception $e) {
      echo "An error occurred: " . $e->getMessage();
  }

    echo "User created with ID " . $user->getId() . "\n";
    echo "Created at: " . $user->getCreatedAt()->format('Y-m-d H:i:s') . "\n";
    echo "Updated at: " . $user->getUpdatedAt()->format('Y-m-d H:i:s') . "\n";
}
createUser($entityManager, 'bini', 'bini@gmail.com');