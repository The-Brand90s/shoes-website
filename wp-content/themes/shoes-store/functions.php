<?php
/**
 * Shoes Store Theme Functions
 */

// Register theme supports
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));

// Enqueue styles and scripts
function shoes_store_enqueue_assets() {
    wp_enqueue_style('shoes-store-style', get_stylesheet_uri());
    wp_enqueue_script('shoes-store-alpine', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', array(), null, true);
    wp_enqueue_script('shoes-store-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    
    // Pass PHP data to JavaScript
    wp_localize_script('shoes-store-script', 'shoesStoreData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('shoes_store_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'shoes_store_enqueue_assets');

// Register menus
function shoes_store_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'shoes-store'),
        'footer' => __('Footer Menu', 'shoes-store')
    ));
}
add_action('init', 'shoes_store_register_menus');

// WooCommerce Support
add_theme_support('woocommerce');

// Product image size
if (function_exists('wc_get_image_size')) {
    add_image_size('woocommerce_thumbnail', 280, 280, true);
}

// Custom product query
function get_featured_products($limit = 8) {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'meta_key' => '_featured',
        'meta_value' => 'yes'
    );
    return new WP_Query($args);
}

// Ajax add to cart
add_action('wp_ajax_add_to_cart', 'shoes_store_ajax_add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'shoes_store_ajax_add_to_cart');

function shoes_store_ajax_add_to_cart() {
    check_ajax_referer('shoes_store_nonce', 'nonce');
    
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']) ?: 1;
    
    WC()->cart->add_to_cart($product_id, $quantity);
    
    wp_send_json_success(array(
        'message' => 'Product added to cart',
        'cart_count' => WC()->cart->get_cart_contents_count()
    ));
}
?>