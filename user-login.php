<?php
/***
 * Template Name: Login
 */


if (!session_id()) {
    session_start();
}
global $wpdb;

// Check if the form is submitted
if (isset($_POST['login_btn'])) {
    // Sanitize and validate the form data
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    // Check if the username is an email or username
    if (is_email($username)) {
        // Search for the email in the custom table
        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}customer WHERE customer_email = %s", $username));
    } else {
        // Search for the username in the custom table
        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}customer WHERE username = %s", $username));
    }

    // Verify password
    if ($user && $password === $user->password) {
        // Password matches, store user data in session
        $_SESSION['user_id'] = $user->id;
        // $_SESSION['username'] = $user->username;
        // $_SESSION['email'] = $user->customer_email;
        // $_SESSION['fullname'] = $user->customer_name;

        // After storing user data in the session
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';


        // Redirect to the front page
        wp_redirect(home_url());
        exit;
    } else {
        // If no match, display an error message
        echo 'Invalid username or password. Please try again.';
    }
}
?>

<main>
    <div>
        <h2>Login</h2>
        <form method="post">
            <div>
                <label for="username">Username or Email</label>
                <input type="text" name="username" placeholder="Enter your username or email" required />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required />
            </div>
            <div>
                <button type="submit" name="login_btn">Login</button>
                <p>Don't have an account? <a href="<?php echo site_url(); ?>/register-page">Register</a></p>
            </div>
        </form>
    </div>
</main>