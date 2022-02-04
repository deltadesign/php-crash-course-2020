<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception


# you can access query strings in the URL by using the SUPERGLOBAL $_GET['key'];
// echo '<pre>';
// var_dump($_GET);
// echo '<pre>';

# POST again you can access the array of values - these do not display in the URL and are more secure than using $_GET;
// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// exit; //kills the code

# SUPER GLOBAL $_SERVER
// echo '<pre>';
// var_dump($_SERVER);
// echo '<pre>';
// die;

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // SERVER REQUEST METHOD IS GET BY DEFAULT - ONLY RUN THIS CODE IF THE METHOD IS SET TO POST
    $image       = $_POST['image'];
    $title       = $_POST['title'];
    $description = $_POST['product_descripton'];
    $price       = $_POST['price'];
    $date        = date('Y-m-d H:i:s');

    # DO NOT USE EXEC DIRECTLY - INCREASED POTENTIAL FOR SQL INJECTION, ALSO USED NAMED PARAMETERS NOT VARIABLES eg:- :title :description :price
    // $pdo->prepare("INSERT INTO products (img, title, description, price, created_date) 
    //                VALUES ('', '$title', '$description', $price,'$date')
    //                ")

    $statement = $pdo->prepare("INSERT INTO products(img, title, description, price, created_date)
                 VALUES (:img, :title, :description, :price, :date )");

    $statement->bindValue(':img', $image);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', $date);
    $statement->execute();
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
    <!-- ACTION Describes where the form is submitted to ;  METHOD describes how the form is submitted using GET (THE DEFAULT OF FORMS) will parse the values as query strings in the URL -->
    <!-- <form action="create.php" method="get"> -->
    <form action="create.php" method="post">
        <div class="col-sm-12 col-md-6 mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label class="form-label">Product Description</label>
            <textarea rows="5" name="product_descripton" class="form-control"></textarea>
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" step=".01" name="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>

</html>