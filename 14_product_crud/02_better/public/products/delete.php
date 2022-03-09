<?php

require_once '../../database.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    die;
}

$statement = $pdo->prepare("DELETE from products WHERE id = :id");

$statement->bindValue(':id', $id); // creates a variable for the value;
$statement->execute();

header('Location: index.php');
