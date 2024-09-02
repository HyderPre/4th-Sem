// Get all "Quick View" buttons
const quickViewButtons = document.querySelectorAll('.quick_button');

// Add click event listener to each "Quick View" button
quickViewButtons.forEach(button => {
    button.addEventListener('click', handleQuickViewClick);
});

function handleQuickViewClick(event) {
    event.preventDefault(); // Prevent the default link behavior

    // Get the parent product div
    const productDiv = event.target.closest('.single_product');

    // Extract the relevant information from the product div
    const productImage = productDiv.querySelector('.primary_img img').src;
    const productPrice = productDiv.querySelector('.current_price').textContent;
    const productDescription = productDiv.querySelector('.product_desc p').textContent;

    // Redirect to the product page with the extracted data as query parameters
    const product = `product.php?image=${encodeURIComponent(productImage)}&price=${encodeURIComponent(productPrice)}&description=${encodeURIComponent(productDescription)}`;
    window.location.href = product;
}