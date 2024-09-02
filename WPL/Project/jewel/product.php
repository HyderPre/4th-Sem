<?php
include ("./header.php");

// Get the product image, price, and description from the query parameters
$productImage = isset($_GET['image']) ? urldecode($_GET['image']) : 'product-image.jpg';
$productPrice = isset($_GET['price']) ? urldecode($_GET['price']) : '$99.99';
$productDescription = isset($_GET['description']) ? urldecode($_GET['description']) : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc ut aliquam tincidunt, nunc nisl aliquam mauris, eget aliquam nisl nunc vel mauris.';
?>

<div class="product-container">
    <div class="product-image">
        <img src="<?php echo $productImage; ?>" alt="Product Image">
    </div>
    <div class="product-details">
        <h2 class="product-title">Product Name</h2>
        <p class="product-price"><?php echo $productPrice; ?></p>
        <div class="product-quantity">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
        </div>
        <button class="add-to-cart">Add to Cart</button>
        <div class="product-description">
            <h3>Product Description</h3>
            <p><?php echo $productDescription; ?></p>
        </div>
        <div class="product-reviews">
            <h3>Customer Reviews</h3>
            <!-- Add reviews here -->
        </div>
    </div>
</div>


<?php include ("./footer.php"); ?>