<?php

// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception
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
  // $image       = $_POST['image'];
  $title       = $_POST['title'];
  $description = $_POST['product_descripton'];
  $price       = $_POST['price'];
  // $date        = date('Y-m-d H:i:s'); # NOT NEEDED FOR UPDATE

  if (!$title) {
    $errors[] = 'Please add the product title';
  }

  if (!$price) {
    $errors[] = 'Please add the product price';
  }

  //CREATING A DIRECTORY FOR IMAGES;

  // if (!is_dir('images')) { # if no dir called images exists - create one
  //   mkdir('images');
  // }

  # DO NOT USE EXEC DIRECTLY - INCREASED POTENTIAL FOR SQL INJECTION, ALSO USED NAMED PARAMETERS NOT VARIABLES eg:- :title :description :price
  // $pdo->prepare("INSERT INTO products (img, title, description, price, created_date) 
  //                VALUES ('', '$title', '$description', $price,'$date')
  //                ")

  if (empty($errors)) {

    $image = $_FILES['image'] ?? null;
    $imagePath = $product['img'];

    if ($image && $image['tmp_name']) {

      if ($product['img']) { ## deletes the existing image
        unlink($product['img']);
      }

      $imagePath = 'images/' . randomString(5) . '/' . $image['name']; // creates a randomly named folder to store the images;

      mkdir(dirname($imagePath)); # makes a directory inside images for the file

      move_uploaded_file($image['tmp_name'], $imagePath); // moves the file from the temp location to the new directory;
    }

    $statement = $pdo->prepare(
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


  // $image       = '';
  // $title       = '';
  // $description = '';
  // $price       = '';
}

?>
<?php include_once 'views/partials/header.php'; ?>
<h1>Update Product: <b><?php echo $product['title']; ?></b></h1>

<?php include_once 'views/products/form.php' ?>

<?php include_once 'views/partials/footer.php'; ?>