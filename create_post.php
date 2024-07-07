<?php
require_once 'bootstrap.php'; 

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

function createPost(EntityManagerInterface $em, $title, $content, $userId)
{
    $user = $em->getRepository(User::class)->find($userId);

    if (!$user) {
        echo "User not found.\n";
        return;
    }

    $post = new Post();
    $post->setTitle($title);
    $post->setContent($content);
    $post->setUser($user);

    $em->persist($post);
    $em->flush();

    echo "Post created successfully.\n";
}
createPost($entityManager, 'Thrid Post', 'Content of the thrid Post', 2);