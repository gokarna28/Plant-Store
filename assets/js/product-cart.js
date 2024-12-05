
$(document).ready(function () {
    alert('ksjadfklh')
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    console.log(cart)
    let total = 0;

    if (cart.length > 0) {
        let CartItems = $('#cartItems');
        
        // Clear the cart area before appending
        CartItems.empty();

        // Loop through the cart and append items
        cart.forEach((item) => {
            CartItems.append(`
                <div class="cart-item">
                    <h3>${item.productTitle}</h3>
                    <p>Price: $${item.productPrice}</p>
                    <p>Amount: ${item.productAmount}</p>
                    <p>Quantity: ${item.quantity}</p>
                    <p>Total: $${(item.productPrice * item.productAmount * item.quantity).toFixed(2)}</p>
                </div>
            `);

            total += item.productPrice * item.productAmount * item.quantity;
        });

        // Update the total cart value
        // $('#totalCart').html(total.toFixed(2));
    } else {
        $('#cartItems').html("<p>Your cart is empty.</p>");
    }
});
 alert('ajklsdfhjkl')