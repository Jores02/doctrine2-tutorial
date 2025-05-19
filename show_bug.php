<?php
// show_bug.php <bug-id>
require_once "bootstrap.php";

$bugId = $argv[1];
$bug = $entityManager->find("Bug", (int)$bugId);

if (!$bug) {
    echo "Bug not found.\n";
    exit(1);
}

echo "Bug: " . $bug->getDescription() . "\n";
echo "Status: " . $bug->getStatus() . "\n";
echo "Created: " . $bug->getCreated()->format('d.m.Y') . "\n";
echo "Reported by: " . $bug->getReporter()->getName() . "\n";
echo "Assigned to: " . $bug->getEngineer()->getName() . "\n";

foreach ($bug->getProducts() as $product) {
    echo "Platform: " . $product->getName() . "\n";
}
