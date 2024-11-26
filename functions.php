<?php

function theme01_enqueue_scripts()
{
    //register styles
    wp_register_style(
        'style-css',
        get_stylesheet_uri(),
        [],
        filemtime(get_template_directory() . '/style.css'),
        'all'
    );


    //register scripts
    wp_register_script(
        'main-js',
        get_template_directory_uri() . '/assets/main.js',
        [],
        filemtime(get_template_directory() . '/assets/main.js'),
        true
    );


    //enqueue style
    wp_enqueue_style('style-css');

    //wnqueue scripts
    wp_enqueue_script('main-js');

}
add_action('wp_enqueue_scripts', 'theme01_enqueue_scripts');

//register menu 
register_nav_menus(
    array('primary-menu' => 'Header Menu')
);

add_theme_support('post-thumbnails');
function theme01_custom_post_type_products()
{
    register_post_type(
        'products',
        array(
            'labels' => array(
                'name' => _x('Products', 'products', 'text_domain'),
                'singular_name' => _x('Product', 'product', 'text_domain'),
                'menu_name' => __('Products', 'text_domain'),
                'name_admin_bar' => __('Post Type', 'text_domain'),
                'archives' => __('Product Archives', 'text_domain'),
                'attributes' => __('Product Attributes', 'text_domain'),
                'parent_item_colon' => __('Parent Product:', 'text_domain'),
                'all_items' => __('All Products', 'text_domain'),
                'add_new_item' => __('Add New Products', 'text_domain'),
                'add_new' => __('Add New', 'text_domain'),
                'new_item' => __('New Product', 'text_domain'),
                'edit_item' => __('Edit Product', 'text_domain'),
                'update_item' => __('Update Product', 'text_domain'),
                'view_item' => __('View Product', 'text_domain'),
                'view_items' => __('View Product', 'text_domain'),
                'search_items' => __('Search Product', 'text_domain'),
                'not_found' => __('Not found', 'text_domain'),
                'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
                'featured_image' => __('Featured Image', 'text_domain'),
                'set_featured_image' => __('Set featured image', 'text_domain'),
                'remove_featured_image' => __('Remove featured image', 'text_domain'),
                'use_featured_image' => __('Use as featured image', 'text_domain'),
                'insert_into_item' => __('Insert into Product', 'text_domain'),
                'uploaded_to_this_item' => __('Uploaded to this Product', 'text_domain'),
                'items_list' => __('Products list', 'text_domain'),
                'items_list_navigation' => __('Products list navigation', 'text_domain'),
                'filter_items_list' => __('Filter Products list', 'text_domain'),
            ),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_admin' => true,
            'rewrite' => array('slug' => 'products'),
            'supports' => array('title', 'editor', 'thumbnail'),

        )
    );
}
add_action('init', 'theme01_custom_post_type_products');



function plantStore_product_fields()
{
    add_meta_box(
        "product_details",
        'Product Details',
        'plantStore_product_details_callback',
        'products',
        "normal",
        "default",
    );
}
add_action('add_meta_boxes', 'plantStore_product_fields');


function plantStore_product_details_callback($post)
{
    $product_price = get_post_meta($post->ID, '_plantStore_product_price', true);
    $product_discount = get_post_meta($post->ID, '_plantStore_product_discount', true);
    ?>
    <div>
        <div>
            <label for="Product_price">Price</label>
            <input type="number" name="product_price" value="<?php echo $product_price ?>" placeholder="product price"
                required>
        </div>
        <div>
            <label for="Product_price">Discount Amount</label>
            <input type="number" name="product_discount" value="<?php echo $product_discount; ?>"
                placeholder="product discount">
        </div>
    </div>
    <?php
}

function plantStore_product_details_save($product_id)
{
    if (isset($_POST['product_price'])) {
        update_post_meta($product_id, '_plantStore_product_price', $_POST['product_price']);
    }
    if (isset($_POST['product_discount'])) {
        update_post_meta($product_id, '_plantStore_product_discount', $_POST['product_discount']);
    }
}
add_action('save_post', 'plantStore_product_details_save');