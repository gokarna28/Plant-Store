<?php
/**
 * Template Name: Home
 */
?>
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
            <li>All</li>
            <li>Indoor Plants</li>
            <li>Outdoor Plants</li>
            <li>Herbs + Veggies</li>
        </ul>

        <div class="w-full flex items-center  px-16 gap-10">
           
            <div class="w-1/4 bg-slate-50 shadow-md">
                <div class="h-">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product1.jpg"
                        class="w-full h-full object-cover" />
                </div>
                <div class="px-4 py-2">
                    <p class="text-xl font-bold">Calathea Pin-Stripe Plant</p>
                    <p class="text-lg text-slate-600 mb-2">$113.00</p>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 w-full text-white text-xl px-4 py-2 hover:bg-blue-600">Buy Now</button>
                        <button class="bg-orange-500 w-full text-white text-xl px-4 py-2 hover:bg-orange-600">Add To
                            Cart</button>
                    </div>
                </div>
            </div>
            <div class="w-1/4 bg-slate-50 shadow-md">
                <div class="h-">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product1.jpg"
                        class="w-full h-full object-cover" />
                </div>
                <div class="px-4 py-2">
                    <p class="text-xl font-bold">Calathea Pin-Stripe Plant</p>
                    <p class="text-lg text-slate-600 mb-2">$113.00</p>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 w-full text-white text-xl px-4 py-2 hover:bg-blue-600">Buy Now</button>
                        <button class="bg-orange-500 w-full text-white text-xl px-4 py-2 hover:bg-orange-600">Add To
                            Cart</button>
                    </div>
                </div>
            </div>
            <div class="w-1/4 bg-slate-50 shadow-md">
                <div class="h-">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product1.jpg"
                        class="w-full h-full object-cover" />
                </div>
                <div class="px-4 py-2">
                    <p class="text-xl font-bold">Calathea Pin-Stripe Plant</p>
                    <p class="text-lg text-slate-600 mb-2">$113.00</p>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 w-full text-white text-xl px-4 py-2 hover:bg-blue-600">Buy Now</button>
                        <button class="bg-orange-500 w-full text-white text-xl px-4 py-2 hover:bg-orange-600">Add To
                            Cart</button>
                    </div>
                </div>
            </div>
            <div class="w-1/4 bg-slate-50 shadow-md">
                <div class="h-">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product1.jpg"
                        class="w-full h-full object-cover" />
                </div>
                <div class="px-4 py-2">
                    <p class="text-xl font-bold">Calathea Pin-Stripe Plant</p>
                    <p class="text-lg text-slate-600 mb-2">$113.00</p>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 w-full text-white text-xl px-4 py-2 hover:bg-blue-600">Buy Now</button>
                        <button class="bg-orange-500 w-full text-white text-xl px-4 py-2 hover:bg-orange-600">Add To
                            Cart</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>
<?php
get_footer();