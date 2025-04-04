<?php include "inc/header.php"; ?>

<h2>Add Product Form</h2>
<form action="handelers/add_product.php" method="POST">
    <div class="mb-3">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-control">
    </div>

    
    <div class="mb-3">
        <label for="type" class="form-label">Product Type:</label>
        <select name="type" id="type" class="form-select">
            <option value="Add_to_cart" >Add to cart</option>
            <option value="View options" >View options</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include "inc/footer.php"; ?>