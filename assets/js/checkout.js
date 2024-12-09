jQuery(document).ready(function ($) {
    let checkout = JSON.parse(localStorage.getItem("checkout")) || [];

    console.log(checkout);

    let priceTotal = 0;
    let quantityTotal = 0;

    if (checkout.length > 0) {
        let checkOutItems = $('#checkoutItems');

        // Clear the cart area before appending
        checkOutItems.empty();

        // Loop through the cart and append items
        checkout.forEach((product) => {
            checkOutItems.append(`
                <div class="flex w-full justify-between mb-4">
                    <div class="flex gap-4">
                       <div href="" class="w-20 h-20 bg-red-300">
                        <img src="${product.image}" alt="product featured image" class="object-cover w-full h-full" />
                       </div>
                        <p class="text-xl">${product.title}</p>
                    </div>
                    <p class="text-xl">Rs. ${product.price}</p>
                    <p class="text-xl mr-6">Qty: ${product.amount}</p>
                </div>
            `);

            priceTotal += product.price * product.amount;
            quantityTotal += product.amount;
        });

        // Generate the UUID

        // Generate the UUID (ensure this is defined before using it)
        function generateUUID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0,
                    v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        // Example usage:
        var uuid = generateUUID();
        console.log('Generated UUID:', uuid);

        var total_amount =priceTotal;  // Total amount
        var transaction_uuid = uuid;  // Unique transaction ID
        var product_code = 'EPAYTEST';  // Product code
        var secret_key = '8gBm/:&EnhH.1/q';  // Your eSewa secret key

        console.log(total_amount)
        console.log(transaction_uuid)
        console.log(product_code)
        console.log(secret_key)
        
        // Concatenate the string to hash
        var string_to_hash = total_amount + transaction_uuid + product_code;

        // Generate the signature using HMAC-SHA256 and base64 encoding
        var hash = CryptoJS.HmacSHA256(string_to_hash, secret_key);
        var signature = CryptoJS.enc.Base64.stringify(hash);

        console.log('Generated Signature:', signature);

        // Append the order summary
        $('#orderSummary').append(`  
            <form class="w-1/2 m-10 flex flex-col items-center" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                <input class="hidden" type="text" id="amount" name="amount" value="${priceTotal}" required>
                <input class="hidden" type="text" id="tax_amount" name="tax_amount" value="0" required>
                <input class="hidden" type="text" id="total_amount" name="total_amount" value="${priceTotal}" required>
                <input class="hidden" type="text" id="transaction_uuid" name="transaction_uuid" value="${uuid}" required>
                <input class="hidden" type="text" id="product_code" name="product_code" value="EPAYTEST" required>
                <input class="hidden" type="text" id="product_service_charge" name="product_service_charge" value="0" required>
                <input class="hidden" type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                <input class="hidden" type="text" id="success_url" name="success_url" value="http://plants-store.local/payment-success/" required>
                <input class="hidden" type="text" id="failure_url" name="failure_url" value="http://plants-store.local/payment-failed/" required>
                <input class="hidden" type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                <input class="hidden" type="text" id="signature" name="signature" value="${signature}" required>
                
                <h2 class="text-2xl font-bold mb-2">Order Summary</h2>
                <p class="flex items-center w-full justify-between text-slate-500 text-lg mb-4"><span>Items Total(${quantityTotal})</span><span>Rs. ${priceTotal}</span></p>
                <p class="flex items-center w-full justify-between font-bold mb-4 border-t pt-2 text-lg"><span>Total:</span><span>Rs.${priceTotal}</span></p>
                <button type="submit" value="submit" class="bg-green-500 px-4 py-2 text-white text-xl hover:bg-orange-600 w-full">Proceed to pay</button>
            </form>
        `);
    } else {
        $('#checkoutContainer').html("<p>You don't have selected any product.</p>");
    }
});
