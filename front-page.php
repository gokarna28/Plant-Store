
<?php get_header();
?>
<main>
    <!-- landing section  -->
    <section class=" flex w-full h-screen border-b">
        <div class="w-3/5 px-16 pt-20">
            <h2 class="text-5xl font-bold mb-10">Bringing the beauty of nature to your doorstep</h2>
            <div class="flex gap-10 h-96 mb-10">
                <div class="w-1/2 h-full flex items-center justify-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing-flower.jpg"
                        class="w-full h-full object-contain" alt="Landing Flower" />
                </div>
                <div class="w-1/2 items-start  flex flex-col justify-center">
                    <p class="text-lg text-slate-700 mb-6">We are your one-stop destination for things related to plants
                        &
                        gardening,
                        providing you with high-quality products and expert advice to help you.</p>
                    <button class="bg-green-800 items-center text-white px-6 py-4 text-xl hover:bg-green-900">
                        Shop Now</button>
                </div>
            </div>
            <div class="flex items-center gap-5">
                <p class="text-3xl font-bold">880+<br><span class="text-sm font-normal">Happy Customer</span></p>
                <p class="text-3xl font-bold">650+<br><span class="text-sm font-normal">Type of Plants</span></p>
                <p class="text-3xl font-bold">320+<br><span class="text-sm font-normal">Unique Flower Pots</span></p>
            </div>
        </div>
        <div class="w-2/5 bg-green-200">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing.jpg"
                class="w-full h-full object-cover" />
        </div>

    </section>

    <!-- category section  -->
    <section class="w-full h-screen pt-20">
        <h2 class="text-5xl font-bold mb-10 text-center">Hello, plant lovers.</h2>
        <ul class="flex gap-10 justify-center text-xl text-slate-700 mb-10">
            <?php
            $categories = get_terms([
                'taxonomy' => 'categories',
                'hide_empty' => false,
            ]);
            ?>
            <li class="hover:text-blue-400 cursor-pointer">All</li>
            <?php
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo "<li class='category_list bg-slate-400 hover:text-blue-400 cursor-pointer' value='{$category->slug}'>" . $category->name . "</li>";
                }
            }
            ?>
        </ul>

        <div class="p-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            <?php
            $args = array(
                'post_type' => 'products',
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categories',
                        'field' => 'slug',
                        'terms' => 'indoor-plants',
                    )
                ),
            );
            $products_loop = new WP_Query($args);

            if ($products_loop->have_posts()) {
                while ($products_loop->have_posts()) {
                    $products_loop->the_post();
                    $image_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                    $product_price = get_post_meta($post->ID, '_plantStore_product_price', true);
                    $product_discount = get_post_meta($post->ID, '_plantStore_product_discount', true);
                    ?>

                    <a class="bg-slate-50 shadow-md hover:shadow-lg" href="<?php the_permalink(); ?>">
                        <div class="relative h-96 w-full">
                            <img src="<?php echo $image_path[0]; ?>" class="w-full h-full object-cover" />
                        </div>
                        <div class="px-4 py-2">
                            <p class="text-xl font-bold"><?php the_title(); ?></p>

                            <p class="text-lg text-slate-600 mb-2 flex items-center justify-between">
                                <span>
                                    <?php

                                    if (!empty($product_discount)) {
                                        $discounted_price = $product_price - ($product_price * $product_discount) / 100;

                                        echo "<span class='line-through text-slate-400'>Rs. $product_price</span> " . "Rs. " . $discounted_price;
                                    } else {
                                        echo "Rs. " . $product_price;
                                    }
                                    ?>
                                </span>
                                <?php
                                if (!empty($product_discount)) {
                                    echo "<span class='text-sm'>Discount " . $product_discount . "%" . "</span>";
                                }
                                ?>
                            </p>
                            <div class="flex space-x-2">
                                <button class="bg-blue-500 flex-1 text-white text-xl px-4 py-2 hover:bg-blue-600">Buy
                                    Now</button>
                                <button class="bg-orange-500 flex-1 text-white text-xl px-4 py-2 hover:bg-orange-600">Add To
                                    Cart</button>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            } else {
                echo '<p class="text-center text-lg text-slate-500">No products found.</p>';
            }

            ?>
        </div>

    </section>
</main>

<?php
get_footer();