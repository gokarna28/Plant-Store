<?php
/**
 * header template
 */
?>

<nav class="bg-slate-50 border-b shadow-sm flex items-center justify-between p-4">
    <div class="w-full">
        <a class="navbar-brand" href="<?php echo site_url(); ?>">
            <?php
            $logoImage = get_header_image();
            $siteName = get_bloginfo('name');

            if (!empty($logoImage)) {
                ?>
                <img src="<?php echo $logoImage; ?>" alt="logo image" width="150">
                <?php
            } else {
                ?>
                <h1 class="text-3xl font-bold"><?php echo $siteName; ?></h1>
                <?php
            }
            ?>
        </a>
    </div>
    <div class="w-full">
        <!-- calling nav items -->
        <?php wp_nav_menu(array(
            'theme_location' => 'primary-menu'
            ,
            'menu_class' => 'header-nav'
        )) ?>
    </div>
    <div class="w-1/2">
        <a href="login.php">
        <i class="fa-regular fa-user"></i>
        </a>
        <a href="">
        <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
</nav>