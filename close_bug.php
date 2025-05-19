<?php
// close_bug.php <bug-id>

require_once "bootstrap.php";

$theBugId = $argv[1];

$bug = $entityManager->find("Bug", (int)$theBugId);

if (!$bug) {
    echo "Bug not found.\n";
    exit(1);
}

$bug->close();
$entityManager->flush();

echo "Bug #" . $theBugId . " has been closed.\n";
