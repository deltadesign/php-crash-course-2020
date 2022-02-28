<?php

require_once 'database.php';
require_once 'functions.php';

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

$product     = [
    'img'         => '',
    'title'         => '',
    'description'   => '',
    'price'         => '',
];

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

?>

<?php include_once 'views/partials/header.php'; ?>

<title>Create New Product</title>
<h1>Create New Product</h1>
<p>
    <a href="index.php" class="btn btn-sm btn-success">View Products</a>
</p>

<?php include_once 'views/products/form.php' ?>
<?php include_once 'views/partials/footer.php'; ?>