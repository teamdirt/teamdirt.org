<?php
	/**
	 * Checkout Form
	 *
	 * @author 		WooThemes
	 * @package 	WooCommerce/Templates
	 * @version	 	2.3.0
	 */

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $smof_data, $woocommerce, $current_user;

?>
	<div class="avada_myaccount_user">
	<span class="myaccount_user_container">
		<span class="username">
		<?php
			printf(
				__( 'Hello, %s:', 'Avada' ),
				$current_user->display_name
			);
		?>
		</span>
		<?php if($smof_data['woo_acc_msg_1']): ?>
			<span class="msg">
			<?php echo $smof_data['woo_acc_msg_1']; ?>
		</span>
		<?php endif; ?>
		<?php if($smof_data['woo_acc_msg_2']): ?>
			<span class="msg">
			<?php echo $smof_data['woo_acc_msg_2']; ?>
		</span>
		<?php endif; ?>
		<span class="view-cart">
			<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Avada'); ?></a>
		</span>
	</span>
	</div>

<?php
	wc_print_notices();

	do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
	if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
		echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
		return;
	}

// filter hook for include new pages inside the payment method
	$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

		<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="col2-set" id="customer_details">
				<div class="col-1">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>

				<div class="col-2">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>

			</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

		<?php // Avada edit ?>
		<?php if( $smof_data['woocommerce_one_page_checkout'] ) : ?>
			</div>
		<?php endif; ?>
		<?php // End Avada edit ?>

	</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>