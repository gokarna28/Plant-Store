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

// Access global $wpdb object
global $wpdb;

// Fetch user data from wp_customer table
$table_name = $wpdb->prefix . 'customer'; // wp_customer table name
$user_data = $wpdb->get_row(
    $wpdb->prepare(
        "SELECT * FROM $table_name WHERE ID = %d",
        $user_id
    )
);

// Access the customer_name property of the object
$display_name = $user_data->customer_name;

get_header();// call the header
?>

<section id="checkoutContainer" class="p-16 flex items-start gap-6">

    <container class="w-3/4 flex flex-col">
        <div class="mb-6 border-b bg-white p-4">
            <h2 class="text-2xl font-bold mb-4">Shipping Address</h2>
            <div>
                <div class="flex items-center gap-10 mb-2">
                    <div class="flex flex-col items-start">
                        <label class="text-lg mb-2">FullName</label>
                        <input id="name" class="border px-4 py-2 border-slate-400 rounded-md" type="text"
                            placeholder="enter your name" value="<?php echo $display_name; ?>" readonly>
                    </div>
                    <div class="flex flex-col items-start">
                        <label class="text-lg mb-2">Contact</label>
                        <input id="contactInfo" class="border px-4 py-2 border-slate-400 rounded-md" type="number"
                            placeholder="Enter your phone number" value="" required>
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <label class="text-lg mb-2">Shipping Address</label>
                    <textarea id="shipping_address" class="border border-slate-400 px-4 py-2 w-1/2 h-20 rounded-md"
                        placeholder="Enter your Shipping Address" required></textarea>
                </div>

            </div>

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