<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception

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
    <a href="create.php" class="btn btn-sm btn-success">Create Product</a>
</p>

<body>

    <form action="create.php" method="get">
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