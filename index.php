<?php
get_header(); // Call the header
?>
<div class="p-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'products',
        'posts_per_page' => 8,
        'paged' => $paged,
    );
    $products_loop = new WP_Query($args);

    if ($products_loop->have_posts()) {
        while ($products_loop->have_posts()) {
            $products_loop->the_post();
            $image_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            $product_price = get_post_meta($post->ID, '_plantStore_product_price', true);
            ?>

            <a class="bg-slate-50 shadow-md hover:shadow-lg" href="<?php the_permalink(); ?>">
                <div class="relative h-96 w-full">
                    <img src="<?php echo $image_path[0]; ?>" 
                         class="w-full h-full object-cover" />
                </div>
                <div class="px-4 py-2">
                    <p class="text-xl font-bold"><?php the_title(); ?></p>
                    <p class="text-lg text-slate-600 mb-2">Rs. <?php echo $product_price; ?></p>
                    <div class="flex space-x-2">
                        <button class="bg-blue-500 flex-1 text-white text-xl px-4 py-2 hover:bg-blue-600">Buy Now</button>
                        <button class="bg-orange-500 flex-1 text-white text-xl px-4 py-2 hover:bg-orange-600">Add To Cart</button>
                    </div>
                </div>
            </a>
            <?php
        }
    } else {
        echo '<p class="text-center text-lg text-slate-500">No products found.</p>';
    }
    ?>

    <div class="col-span-full mt-8">
        <?php
        $big = 999999999; // Need an unlikely integer
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $products_loop->max_num_pages,
            'aria_current' => 'page',
            'prev_text' => __('Previous'),
            'next_text' => __('Next'),
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'plain',
        ));
        ?>
    </div>
</div>
<?php
get_footer(); // Call the footer
?>
