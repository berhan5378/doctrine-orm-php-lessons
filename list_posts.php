<?php
require_once "bootstrap.php";

use App\Entity\Post;

// Create a repository for the Post entity
$postRepository = $entityManager->getRepository(Post::class);

// Find all posts
$posts = $postRepository->findAll();

if (empty($posts)) {
    echo "No posts found.\n";
} else {
    foreach ($posts as $post) {
        echo sprintf("Title: %s\n", $post->getTitle());
        echo sprintf(" Content: %s\n", $post->getContent());
        echo sprintf(" Author: %s\n", $post->getUser()->getName());
    }
}
