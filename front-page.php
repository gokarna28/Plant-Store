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
    <section class="w-full h-screen pt-20 px-16 mb-20">
        <h2 class="text-5xl font-bold mb-10 text-center">Hello, plant lovers.</h2>
        <ul class="flex gap-10 justify-center text-xl text-slate-700 mb-10">
            <?php
            $categories = get_terms([
                'taxonomy' => 'categories',
                'hide_empty' => false,
            ]);
            $category_slugs = array();
            foreach ($categories as $category) {
                $category_slugs[] = $category->slug;
            }

            ?>
            <li class='category_list hover:text-blue-400 text-blue-400 cursor-pointer'
                data-slug="<?php echo implode(',', $category_slugs); ?>">All</li>
            <?php
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo "<li class='category_list hover:text-blue-400 cursor-pointer' data-slug='{$category->slug}'>" . $category->name . "</li>";
                }
            }
            ?>
        </ul>
        <!-- category-filter  -->
        <div id="results" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            <?php

            $args = array(
                'post_type' => 'products',
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categories',
                        'field' => 'slug',
                        'terms' => $category_slugs,
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
                    $post_slug = get_post_field('post_name', $post->ID);

                    ?>
                    <div>
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
                            </div>
                        </a>
                        <div class="flex space-x-2">
                            
                            <button class="productCart bg-orange-500 flex-1 text-white text-xl px-4 py-2 hover:bg-orange-600"
                                data-product-title="<?php the_title(); ?>" 
                                data-product-id="<?php echo $post->ID; ?>"
                                data-product-price="<?php
                                if (!empty($product_discount)) {
                                    $discounted_price = $product_price - ($product_price * $product_discount) / 100;
                                    echo $discounted_price;
                                } else {
                                    echo $product_price;
                                }
                                ?>" data-product-image="<?php echo $image_path[0]; ?>"
                                data-product-slug="<?php echo $post_slug; ?>"
                                >Add To
                                Cart</button>
                        </div>
                    </div>

                    <?php
                }
            } else {
                echo '<p class="text-center text-lg text-slate-500">No products found.</p>';
            }

            ?>
        </div>
        <?php

        ?>
    </section>

    <!-- offer section  -->
    <section class="w-full h-screen mb-20 bg-green-100">
        <div class="flex items-center justify-center py-20 px-16">
            <div class="w-1/2 h-full pr-16">
                <h2 class="text-5xl mb-6 font-bold">Exclusive Offer</h2>
                <p class="text-xl mb-6 text-slate-700">Every Plant Purchase is a gift that keeps on giving. Earn coins,
                    redeem, and much more for exclusive
                    discounts.</p>
                <div class="grid grid-cols-2 gap-10 pt-6">
                    <button
                        class="transition duration-700 box-border bg-green-800 text-white px-6 py-4 text-xl hover:bg-transparent hover:border border-green-800 hover:text-black font-bold">
                        Learn More
                    </button>
                    <button
                        class="transition duration-700 box-border hover:bg-green-800 px-6 py-4 text-xl border bg-transparent border-green-800 font-bold">
                        Refer a Friend
                    </button>
                </div>


            </div>
            <div class="w-1/2 h-full">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.jpg"
                    class="w-full h-full object-cover" />
            </div>
        </div>
    </section>

    <!-- blogs section  -->
    <section class="w-full h-screen mb-20">
        <h2 class="text-5xl font-bold text-center">Seeds of thoughts</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 p-16 gap-10">
            <?php

            $args = array(
                'post_type' => 'products',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categories',
                        'field' => 'slug',
                        'terms' => $category_slugs,
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
                            <p><?php the_content(); ?></p>
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