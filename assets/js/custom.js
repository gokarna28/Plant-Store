jQuery(document).ready(function ($) {

    let cart = [];
    let total = 0;

    // Load cart from local storage on page load
    loadCart();
    updateCart();

    $('.productCart').on('click', function () {

        // Retrieve data attributes
        let productTitle = $(this).data('product-title');
        let productImage = $(this).data('product-image');
        let productId = $(this).data('product-id');
        let productSlug = $(this).data('product-slug');
        let productPrice = parseFloat($(this).data('product-price'));
        let productAmount = parseInt($('#product_number').html() || 1);

        // console.log(productTitle)
        // console.log(productImage)
        // console.log(productId)
        // console.log(productSlug)
        // console.log(productPrice)
        // console.log(productAmount)


        // Check if the product already exists in the cart
        const ArrayIndex = cart.findIndex((item) => item.productId === productId);

        if (ArrayIndex > -1) {
            cart[ArrayIndex].productAmount += productAmount;
        } else {
            cart.push({ productTitle, productPrice, productId, productAmount, productImage, productSlug });
        }

        updateCart();
        storeCart();
    });

    function storeCart() {
        localStorage.setItem("cart", JSON.stringify(cart));
        alert('Add to cart successfully');
    }

    function loadCart() {
        const storedCart = localStorage.getItem("cart");
        if (storedCart) {
            cart = JSON.parse(storedCart);
        }
    }

    function updateCart() {
        total = 0;
        cart.forEach((item) => {
            total += item.productPrice * item.productAmount;
        });

        $('#totalCart').html(total.toFixed(2));
    }







    ///add the data to the checkout page when click buynow button
    $('.buyNow').on('click', function () {
        // Retrieve data attributes
        let productTitle = $(this).data('product-title');
        let productImage = $(this).data('product-image');
        let productId = $(this).data('product-id');
        let productSlug = $(this).data('product-slug');
        let productPrice = parseFloat($(this).data('product-price'));
        let productAmount = parseInt($('#product_number').html() || 1);
    
        // Log product data to console for debugging
        console.log(productTitle);
        console.log(productImage);
        console.log(productId);
        console.log(productSlug);
        console.log(productPrice);
        console.log(productAmount);
    
        // Create an object to store the product details
        let productData = {
            title: productTitle,
            image: productImage,
            id: productId,
            slug: productSlug,
            price: productPrice,
            amount: productAmount
        };
    
        // Check if there are already products stored in localStorage
        let checkout = JSON.parse(localStorage.getItem('checkout')) || [];
    
        // Add the new product data to the cart array
        checkout.push(productData);
    
        // Save the updated cart array back to localStorage
        localStorage.setItem('checkout', JSON.stringify(checkout));
    
        // Optionally, redirect to checkout page
        window.location.href = 'http://plants-store.local/checkout/';
    });
    
});

