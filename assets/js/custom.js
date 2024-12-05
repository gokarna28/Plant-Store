jQuery(document).ready(function ($) {

    let cart = [];
    let total = 0;

    // Load cart from local storage on page load
    loadCart();
    updateCart();

    $('.productCart').on('click', function () {

        // Retrieve data attributes
        let productTitle = $(this).data('product-title');
        let productId = $(this).data('product-id');
        let productPrice = parseFloat($(this).data('product-price')); 
        let productAmount = parseInt($('#product_number').html() || 1); 
        // console.log(productAmount)

        // Check if the product already exists in the cart
        const ArrayIndex = cart.findIndex((item) => item.productId === productId);

        if (ArrayIndex > -1) {
            cart[ArrayIndex].productAmount += productAmount;
        } else {
            cart.push({ productTitle, productPrice, productId, productAmount });
        }

        updateCart();
        storeCart();
    });

    function storeCart() {
        localStorage.setItem("cart", JSON.stringify(cart));
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
        // Optionally update the cart display if needed
    }
});
