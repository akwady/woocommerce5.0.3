<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">

	<?php if ( $show_shipping ) : ?>

	<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
		<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address">

	<?php endif; ?>

	<div class="col-md-6">
        <p class="title-woocommerce woocommerce-column__title"><?php _e( 'Billing address', 'woocommerce' ); ?></p>

        <address>
            <?php echo wp_kses_post( $order->get_formatted_billing_address( __( 'N/A', 'woocommerce' ) ) ); ?>

            <?php if ( $order->get_billing_phone() ) : ?>
                <p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
            <?php endif; ?>

            <?php if ( $order->get_billing_email() ) : ?>
                <p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
            <?php endif; ?>
        </address>
    </div>

	<?php if ( $show_shipping ) : ?>

		</div><!-- /.col-1 -->

        <div class="col-md-6">
            <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address">
                <p class=" title-woocommerce woocommerce-column__title"><?php _e( 'Shipping address', 'woocommerce' ); ?></p>
                <address>
                    <?php echo wp_kses_post( $order->get_formatted_shipping_address( __( 'N/A', 'woocommerce' ) ) ); ?>
                </address>
            </div>
        </div>
        <!-- /.col-2 -->

	</section><!-- /.col2-set -->

	<?php endif; ?>

</section>