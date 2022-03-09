<?php

// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception

/** @var $pdo \PDO */ ## DOC BLOCK - this help some ID's (PHP storm) see the $pdo variable that is imported below in database.php

require_once 'database.php';
require_once 'functions.php';

$id = $_GET['id'] ?? null;

if (!$id) {
  header('Location: index.php');
  die;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($product);
// echo '</pre>';

// die;

$errors = [];

// $image       = '';
$title       = $product['title'];
$description = $product['description'];
$price       = $product['price'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // SERVER REQUEST METHOD IS GET BY DEFAULT - ONLY RUN THIS CODE IF THE METHOD IS SET TO POST

    require_once "validate_product.php";

    if(empty($errors)) {$statement = $pdo->prepare(
      "UPDATE products SET img = :img, 
                           title = :title, 
                           description  = :description, price = :price 
                           WHERE id = :id"
    );

    $statement->bindValue(':id', $id);
    $statement->bindValue(':img', $imagePath);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    // $statement->bindValue(':date', $date);
    $statement->execute();

    header('Location: index.php'); //redirects user to index.php
  }
}
?>
<?php include_once 'views/partials/header.php'; ?>
<h1>Update Product: <b><?php echo $product['title']; ?></b></h1>

<?php include_once 'views/products/form.php' ?>

<?php include_once 'views/partials/footer.php'; ?>