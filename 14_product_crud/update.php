<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception

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

function randomString($n) # GENERATES A RANDOM STR $n characters long;
{
  $chars = 'qwertyuiopasdfghjklzxcvbnm0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
  $str = '';
  for ($i = 0; $i < $n; $i++) {
    $index = rand(0, strlen($chars) - 1);
    $str .= $chars[$index];
  }

  return $str;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="app.css">

  <title>Edit: <?php echo $product['title']; ?></title>
</head>
<h1>Update <b><?php echo $product['title']; ?></b></h1>
<p>
  <a href="index.php" class="btn btn-sm btn-success">View Products</a>
</p>

<body>
  <?php if (!empty($errors)) : ?>
    <div class="alert alert-danger col-sm-12 col-md-6">
      <?php foreach ($errors as $error) : ?>
        <div class="mb-1"><?php echo $error; ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <!-- ACTION Describes where the form is submitted to ;  METHOD describes how the form is submitted using GET (THE DEFAULT OF FORMS) will parse the values as query strings in the URL -->
  <!-- <form action="create.php" method="get"> -->
  <form method="post" enctype="multipart/form-data">
    <?php if ($product['img']) : ?>
      <img src="<?php echo $product['img']; ?>" alt="<?php echo $product['description']; ?>" class="prod-img-edit">
    <?php endif; ?>

    <!-- enctype for loading files -->
    <div class="col-sm-12 col-md-6 mb-3">
      <label class="form-label">Product Image</label>
      <input type="file" name="image" class="form-control" value="<?= $image ?>">
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="<?= $title ?>">
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
      <label class="form-label">Product Description</label>
      <textarea rows="5" name="product_descripton" class="form-control"><?= $description ?></textarea>
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
      <label class="form-label">Product Price</label>
      <input type="number" step=".01" name="price" class="form-control" value="<?= $price ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>

</body>

</html>