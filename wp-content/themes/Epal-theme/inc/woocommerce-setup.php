<?php 

//Add Template Woocommerce
$storefront = (object) array(
    'main'       => require 'class-storefront.php',
);


//Sửa Đổi Mặc Định gallery của woocommerce
add_action( 'after_setup_theme', 'yourtheme_setup' );
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}


// Tối ưu Woocommerce css, js
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles()
{
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
    if ( function_exists( 'is_woocommerce' ) )
    {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() )
        {
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
}


add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_form' );
function custom_checkout_form( $fields ) {
    unset($fields['billing']['billing_postcode']); //Ẩn postCode
    unset($fields['billing']['billing_state']); //Ẩn bang hạt
    unset($fields['billing']['billing_address_2']); //Ẩn địa chỉ 2
    unset($fields['billing']['billing_company']); //Ẩn công ty
//    unset($fields['billing']['billing_country']);// Ẩn quốc gia
    unset($fields['billing']['billing_last_name']);//Ẩn last name
    unset($fields['billing']['billing_city']); //Ẩn select box chọn thành phố
    return $fields;
}

function custom_checkout_field_label( $fields ) {
    $fields['first_name']['label'] = 'Họ và tên';
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'custom_checkout_field_label' );



// Hiển thị "Còn Hàng" / "Tạm hết hàng"
add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {

    // Change In Stock Text
    $currentlang = get_bloginfo('language');
    if ( $_product->is_in_stock() ) {
        if($currentlang=="vi"):
            $availability['availability'] = __('Còn hàng', 'woocommerce');
        elseif($currentlang=="en-GB"):
            $availability['availability'] = __('Available', 'woocommerce');
        endif;
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        if($currentlang=="vi"):
            $availability['availability'] = __('Tạm hết hàng', 'woocommerce');
        elseif($currentlang=="en-GB"):
            $availability['availability'] = __('Sold Out', 'woocommerce');
        endif;
    }
    return $availability;
}


//Function chạy giỏ hàng ajax
add_filter('add_to_cart_fragments', 'woocommerceframework_header_add_to_cart_fragment');
function woocommerceframework_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="cart-ajax"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a></span>
    <?php
    $fragments['span.cart-ajax'] = ob_get_clean();
    return $fragments;
}


// Giới hạn columns sản phẩm 
function loop_columns() {
    return 4; 
}
add_filter('loop_shop_columns', 'loop_columns', 999);


// Giới hạn số lượng sản phẩm 
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
    $cols = 12;
    return $cols;
}

?>