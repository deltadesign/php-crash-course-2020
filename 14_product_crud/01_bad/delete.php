<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    die;
}

$statement = $pdo->prepare("DELETE from products WHERE id = :id");

$statement->bindValue(':id', $id); // creates a variable for the value;
$statement->execute();

header('Location: index.php');
