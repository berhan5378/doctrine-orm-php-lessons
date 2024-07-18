<?php
require_once 'bootstrap.php'; 

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

function createPost(EntityManagerInterface $em, $title, $content, $email)
{
    $userRepository = $em->getRepository(User::class);
    $user = $userRepository->findOneBy(["email" => "$email"]);
    if (!$user) {
        echo "User not found.\n";
        return;
    }

    $post = new Post();
    $post->setTitle($title);
    $post->setContent($content);
    $post->setUser($user);

    try {
        $em->persist($post);
        $em->flush(); // Flush to save changes
      } catch (\Exception $e) {
          echo "An error occurred: " . $e->getMessage();
      }

    echo "Post created successfully.\n";
}
createPost($entityManager, 'thrid Post', 'Content of the thrid Post', 'bini@gmail.com');