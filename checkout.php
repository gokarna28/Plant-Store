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
get_footer();