<?php
get_header(); //call the header
?>
<div class="p-16 gap-10">
    <?php
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => 6,
    );
    $products_loop = new WP_Query($args);
    // echo "<pre>";
    // var_dump($products_loop);
    // echo "<pre>";
    
    if (have_posts()) {
        while ($products_loop->have_posts()) {

            $products_loop->the_post();
            $Product_image = get_the_post_thumbnail_url();
            // echo $Product_image;
            ?>

            <div class="w-1/4 bg-slate-50 shadow-md">
                <div class="h-">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product1.jpg"
                        class="w-full h-full object-cover" />
                </div>
                <div class="px-4 py-2">
                    <p class="text-xl font-bold"><?php the_title(); ?></p>
                    <p class="text-lg text-slate-600 mb-2"></p>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 w-full text-white text-xl px-4 py-2 hover:bg-blue-600">Buy Now</button>
                        <button class="bg-orange-500 w-full text-white text-xl px-4 py-2 hover:bg-orange-600">Add To
                            Cart</button>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    ?>

</div>
<?php get_footer(); //call the footer
