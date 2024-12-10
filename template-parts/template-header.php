<?php
/**
 * header template
 */

?>

<nav class="bg-slate-50 border-b shadow-sm flex items-center justify-between p-4">
    <div class="w-full">
        <a class="navbar-brand flex items-center gap-2" href="<?php echo site_url(); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="logo image" width="50">
            <h1 class="text-3xl font-bold"><?php echo get_bloginfo('name'); ?></h1>
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
    <div class="w-1/2 flex items-ceter gap-4">
        <a href="<?php echo site_url('user-profile'); ?>"
            class="bg-yellow-300 w-14 h-14 flex justify-center items-center rounded-full">
            <i class="fa-regular fa-user font-thin text-3xl"></i>
        </a>

        <a href="<?php echo site_url('cart'); ?>" class="flex items-center bg-blue-500 rounded-full px-4 py-2">
            <div class="flex items-ceter text-xl gap-4 text-white">
                <i class="fa-solid fa-cart-shopping mb-0"></i>
                <!-- cart product will be here dynamically -->
                <div class="text-xl">Rs. <span id="totalCart">00.00</span></div>
            </div>
        </a>
    </div>
</nav>