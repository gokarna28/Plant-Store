<?php
/***
 * Template Name: Register 
 */

global $wpdb;

// Check if the form is submitted
if (isset($_POST['register_btn'])) {
    // Sanitize and validate the form data
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $fullname = sanitize_text_field($_POST['fullname']);

    // Hash the password before storing
    // $hashed_password = wp_hash_password($password);

    // Prepare the data for insertion
    $data = array(
        'username' => $username,
        'password' => $password,
        'customer_name' => $fullname,
        'customer_email' => $email,
        'created_at' => current_time('mysql'),
    );

    // var_dump($data);

    $table_name = $wpdb->prefix . 'customer';
    $wpdb->insert($table_name, $data);


    // Check for success and handle accordingly
    if ($wpdb->insert_id) {
        echo 'Registration successful!';
    } else {
        echo 'Registration failed. Please try again.';
    }
}
?>

<main>
    <div>
        <h2>Plant Store</h2>
        <form method="post">
            <div>
                <lable>Username</lable>
                <input type="text" name="username" placeholder="Enter your email" />
            </div>
            <div>
                <lable>Password</lable>
                <input type="password" name="password" placeholder="Enter your password" />
            </div>
            <div>
                <lable>FullName</lable>
                <input type="text" name="fullname" placeholder="Enter your fullname" />
            </div>
            <div>
                <lable>Email</lable>
                <input type="email" name="email" placeholder="Enter your email" />
            </div>
            <div>
                <button type="submit" name="register_btn">Register</button>
                <p>Don't have account? <a href="<?php echo site_url() ?>/login-page">Login</a></p>
            </div>
        </form>
    </div>
</main>