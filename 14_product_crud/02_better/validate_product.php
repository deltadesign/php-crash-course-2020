<?php

  $title       = $_POST['title'];
  $description = $_POST['product_descripton'];
  $price       = $_POST['price'];
  $imagePath   = '';
  $date        = date('Y-m-d H:i:s');

  if (!$title) {
    $errors[] = 'Please add the product title';
  }

  if (!$price) {
    $errors[] = 'Please add the product price';
  }


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

  }