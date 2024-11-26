<?php
get_header();
?>
<section class="grid grid-cols-2 h-auto p-16 gap-10">
    <!-- Image Section -->
    <div class="w-full h-full">
        <?php if (has_post_thumbnail()): ?>
            <?php $featured_image = get_the_post_thumbnail_url(); ?>
            <img src="<?php echo $featured_image; ?>" class="w-full h-full object-cover" />
        <?php endif; ?>
    </div>

    <!-- Content Section -->
    <div class="px-8 flex flex-col">
        <h2 class="text-4xl font-bold mb-4"><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
        <div class="mt-6 mb-6 flex items-center justify-between">
            <?php
            $product_price = get_post_meta($post->ID, '_plantStore_product_price', true);
            $product_discount = get_post_meta($post->ID, '_plantStore_product_discount', true); ?>

            <p class="text-2xl text-slate-700"><?php
            if (!empty($product_discount)) {
                $discounted_price = $product_price - ($product_price * $product_discount) / 100;

                echo "<span class='line-through text-slate-400'>Rs. $product_price</span> " . "Rs. " . $discounted_price;
            } else {
                echo "Rs. " . $product_price;
            }
            ?></p>

            <p class="text-lg text-slate-700"><?php
            if (!empty($product_discount)) {
                echo "Discount " . $product_discount . "%";
            }
            ?></p>
        </div>

        <div class="flex w-full items-center gap-6">
            <div class="flex items-center border h-full">
                <span class="border p-2 hover:bg-gray-200 h-full flex items-center cursor-pointer"><i class="fa-solid fa-minus"></i></span>
                <p class="border p-3 h-full flex items-center ">1</p>
                <span class="border p-2 hover:bg-gray-200 h-full flex items-center cursor-pointer"><i class="fa-solid fa-plus"></i></span>
            </div>
            <div class="flex w-full space-x-2 items-center">
                <button class="bg-blue-500 hover:bg-blue-600 w-full py-4 text-xl text-white font-bold">Buy Now</button>
                <button class="bg-orange-500 hover:bg-orange-600 w-full py-4 text-xl text-white font-bold">Add to
                    Cart</button>
            </div>
        </div>
    </div>
</section>

<section>Related products</section>

<?php
get_footer();