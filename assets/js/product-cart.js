
jQuery(document).ready(function ($) {
    // alert('alskfdjhl');
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    // console.log(cart)

    let total = 0;

    if (cart.length > 0) {
        let CartItems = $('#cartItems');

        // Clear the cart area before appending
        CartItems.empty();

        // Loop through the cart and append items
        cart.forEach((item) => {
            CartItems.append(`
                <tr class="border-b hover:bg-slate-300 text-xl">
                  <td class="text-center"><input type='checkbox'></td>
                  <td class="flex items-center gap-4">
                    <a href="/products/${item.productSlug}" class="w-20 h-20 bg-red-300">
                      <img src="${item.productImage}" alt="product featured image" class="object-fill w-full h-full"/>
                    </a>
                    <h2>${item.productTitle}</h2>
                  </td>
                  <td class="text-center">Rs. <span>${item.productPrice}</span></td>
                  <td class="text-center">${item.productAmount}</td>
                 <td class="text-center">Rs.<span> ${item.productPrice * item.productAmount}</span></td>
                </tr>
            `);

            total += item.productPrice * item.productAmount * item.quantity;
        });

    } else {
        $('#cartItemsContainer').html("<p>Your cart is empty.</p>");
    }

    //clear cart
    $('#cleatCart').on('click', () => {
        var confirmDelete = confirm("Are you sure, you want to clear the cart data.");
        let CartItems = $('#cartItems');

        if (confirmDelete) {
            // alert('delete success fully')
            localStorage.clear();
            $('#cartItemsContainer').html("<p>Your cart is empty.</p>");
            $('#totalCart').html('00.00');
            cart = [];
        }
    })

});




