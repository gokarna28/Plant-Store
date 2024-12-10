<?php
/**
 * Template Name: User Profile
 */

if (!session_id()) {
    session_start();
}

//logout
if (isset($_POST['logout'])) {
    // Destroy session and log the user out
    session_unset();
    session_destroy();
    wp_redirect(home_url('/login-page'));
    exit;
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    wp_redirect(home_url('/login-page'));
    exit;
}

// Get user ID from session
$user_id = intval($_SESSION['user_id']); // Ensure it's an integer for safety

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

// If user data exists, display it
if ($user_data) {
    $username = esc_html($user_data->username);
    $email = esc_html($user_data->customer_email);
    $fullname = esc_html($user_data->customer_name);
} else {
    echo 'No user data found.';
    exit;
}

get_header();
?>

<!-- Display User Profile -->
<h1>User Profile</h1>
<p><strong>Username:</strong> <?php echo $username; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Full Name:</strong> <?php echo $fullname; ?></p>

<!-- Logout Form -->
<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>


<section class="flex bg-white">
    <container class="w-1/4 border-r">
        <div>Profile</div>
        <div>Order</div>
        <div>Payment</div>
        <div>Logout</div>
    </container>
    <container class="bg-slate-400 w-3/4">date</container>
</section>
<?php
get_footer();
