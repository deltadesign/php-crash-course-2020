<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception

// echo '<pre>';
// var_dump($_FILES); // $_SUPERGLOBAL that shows the files uploaded;
// echo '<pre>';
// die;

# you can access query strings in the URL by using the SUPERGLOBAL $_GET['key'];
// echo '<pre>';
// var_dump($_GET);
// echo '<pre>';

# POST again you can access the array of values - these do not display in the URL and are more secure than using $_GET;
// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// exit; //kills the code

# SUPER GLOBAL $_SERVER // SUPER GLOBALS are available everywhere in the code.  
// echo '<pre>';
// var_dump($_SERVER);
// echo '<pre>';
// die; // kills the code here too

$errors = [];

$image       = '';
$title       = '';
$description = '';
$price       = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // SERVER REQUEST METHOD IS GET BY DEFAULT - ONLY RUN THIS CODE IF THE METHOD IS SET TO POST
    // $image       = $_POST['image'];
    $title       = $_POST['title'];
    $description = $_POST['product_descripton'];
    $price       = $_POST['price'];
    $date        = date('Y-m-d H:i:s');

    if (!$title) {
        $errors[] = 'Please add the product title';
    }

    if (!$price) {
        $errors[] = 'Please add the product price';
    }

    //CREATING A DIRECTORY FOR IMAGES;

    if (!is_dir('images')) { # if no dir called images exists - create one
        mkdir('images');
    }

    # DO NOT USE EXEC DIRECTLY - INCREASED POTENTIAL FOR SQL INJECTION, ALSO USED NAMED PARAMETERS NOT VARIABLES eg:- :title :description :price
    // $pdo->prepare("INSERT INTO products (img, title, description, price, created_date) 
    //                VALUES ('', '$title', '$description', $price,'$date')
    //                ")

    if (empty($errors)) {

        $image = $_FILES['image'] ?? null;
        $imagePath = '';
        if ($image && $image['tmp_name']) {

            $imagePath = 'images/' . randomString(5) . '/' . $image['name']; // creates a randomly named folder to store the images;

            mkdir(dirname($imagePath)); # makes a directory inside images for the file

            move_uploaded_file($image['tmp_name'], $imagePath); // moves the file from the temp location to the new directory;
        }

        $statement = $pdo->prepare("INSERT INTO products(img, title, description, price, created_date)
                 VALUES (:img, :title, :description, :price, :date )");

        $statement->bindValue(':img', $imagePath);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
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

    <title>Create New Product</title>
</head>
<h1>Create New Product</h1>
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
    <form action="create.php" method="post" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>