<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=prod_crud', 'root', ''); // new PDO('dnsString','port','dbname','user','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // when an error occurs throw an exception

$statement = $pdo->prepare('SELECT * FROM PRODUCTS ORDER BY created_date DESC'); //prepare the statement to be executed on the database

$statement->execute(); // execute the statement

$products = $statement->fetchAll(PDO::FETCH_ASSOC); // fetch each record as an associative array and store this a the products variable;

// echo '<pre>';
// var_dump($products);
// echo '<pre>';

function clean_date($t) // cleans up the date format
{
  $t = strtotime($t);
  return date('d-M-Y', $t);
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

  <title>Project CRUD</title>
</head>
<h1>Products</h1>
<p>
  <a href="create.php" class="btn btn-sm btn-success">Create Product</a>
</p>

<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product) : ?>
        <tr>
          <th scope="row"><?php echo $product['id']; ?></th>
          <td><img src="<?php echo $product['img']; ?>" alt="" class="prod-img"></td>
          <td><?php echo $product['title']; ?></td>
          <td><?php echo $product['price']; ?></td>
          <td><?php echo clean_date($product['created_date']) ?></td>
          <td>
            <a href="update.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
            <!-- use the href to pass a query string with the ID -->
            <form class="inner-form" action="delete.php" method="post">
              <input type="hidden" name="id" value="<?= $product['id'] ?>">
              <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
            </form>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>