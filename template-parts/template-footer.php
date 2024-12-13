<?php
/**
 * footer template
 */

?>
<div class="bg-green-900 text-white py-10 px-16">
    <div class="flex items-start w-full">
        <div class="w-2/5 flex">
            <a class="flex justify-center w-1/2" href="<?php echo site_url(); ?>">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" width="100" class="mb-4" />
            </a>
            <div class="w-3/4">
                <p class="text-sm mb-4">Discover the beauty of nature with our handpicked collection of premium plants.
                    Whether
                    you're a seasoned gardener or a first-time plant parent, we offer a variety of indoor and outdoor
                    plants
                    that will bring life and freshness to any space. Start transforming your home into a green oasis
                    today!
                </p>
                <a class="border w-full py-2 px-4 rounded-md cursor-pointer hover:bg-white hover:text-black" href="">Get
                    Started</a>
            </div>
        </div>
        <div class="w-1/5 text-center">
            <h2 class="text-2xl font-bold mb-4">Nav Menu</h2>
            <style>
                .header-nav {
                    /* background-color: red; */
                    display: flex;
                    flex-direction: column;
                }
            </style>
            <?php wp_nav_menu(array(
                'theme_location' => 'primary-menu'
                ,
                'menu_class' => 'header-nav'
            )) ?>
        </div>
        <div class="w-1/5 text-center">
            <h2 class="text-2xl font-bold mb-4">Categories</h2>
            <?php
            $categories = get_terms([
                'taxonomy' => 'categories',
                'hide_empty' => false,
            ]);
            // var_dump($categories);
            foreach ($categories as $category) {
                ?>
                <p class="text-lg hover:text-sky-500 mb-2"><?php echo $category->name; ?></p>
                <?php
            }
            ?>
        </div>

        <div class="w-1/5 text-center">
            <h2 class="text-2xl font-bold mb-4">Get in touch</h2>
            <p class="text-lg mb-2">Email:gokarnachy28@gmail.com</p>
            <div class="flex items-center justify-center gap-4">
                <input class="border rounded-md py-1 px-2" type="text" placeholder="Type here ..." />
                <button
                    class="border bg-transparent text-lg py-1 px-2 rounded-md hover:bg-white hover:text-black">Send</button>
            </div>
        </div>
    </div>