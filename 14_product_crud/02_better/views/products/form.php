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
        <img src="/<?php echo $product['img']; ?>" alt="<?php echo $product['description']; ?>" class="prod-img-edit">
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
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>

</form>