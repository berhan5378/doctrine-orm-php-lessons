<?php 

require_once "bootstrap.php";

use App\Entity\User;

$entityManager = GetEntityManager();

// Fetch the user by ID (replace 1 with the actual user ID)
$user = $entityManager->find(User::class, 5);

if ($user === null) {
    echo "No user found.\n";
    exit(1);
}

echo "User: " . $user->getName() . "\n";
echo "Email: " . $user->getEmail() . "\n";

// Fetch and print groups
echo "Groups:\n";
foreach ($user->getGroups() as $group) {
    echo "- " . $group->getName() . "\n";
    echo "- " . $group->getId() . "\n";
}
