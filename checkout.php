<?php
/**
 * Template Name: Checkout
 */

if (!session_id()) {
    session_start();
}


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    wp_redirect(home_url('/login-page'));
    exit;
}

// Get user ID from session
$user_id = intval($_SESSION['user_id']);




get_header();// call the header
?>

<section id="checkoutContainer" class="p-16 flex items-start gap-6">

    <container class="w-3/4 flex flex-col">
        <div class="mb-6 border-b bg-white p-4">
            <h2 class="text-2xl font-bold">Shipping Address</h2>
            <p>User Name</p>
            <p>contact number</p>
            <p>Address</p>
        </div>
        <div class="bg-white p-4">
            <h2 class="text-2xl mb-4 font-bold">Product Details</h2>
            <div id="checkoutItems">
                <!-- checkout items will be added here  -->
            </div>
        </div>

    </container>
    <container id="orderSummary" class="bg-white shadow-md w-1/4 p-4">
        <!-- order summary will be append here dynamically -->
    </container>

</section>
<?php

 ?>
<body>
 <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
 <input type="text" id="amount" name="amount" value="100" required>
 <input type="text" id="tax_amount" name="tax_amount" value ="10" required>
 <input type="text" id="total_amount" name="total_amount" value="110" required>
 <input type="text" id="transaction_uuid" name="transaction_uuid" value="2413028" required>
 <input type="text" id="product_code" name="product_code" value ="EPAYTEST" required>
 <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
 <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
 <input type="text" id="success_url" name="success_url" value="https://esewa.com.np" required>
 <input type="text" id="failure_url" name="failure_url" value="https://google.com" required>
 <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
 <input type="text" id="signature" name="signature" value="i94zsd3oXF6ZsSr/kGqT4sSzYQzjj1W/waxjWyRwaME=" required>
 <input value="Submit" type="submit">
 </form>
</body>
 
<?php
 
get_footer();