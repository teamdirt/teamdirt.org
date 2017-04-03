<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version		2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 )
	return;
?>
<nav class="woocommerce-pagination">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         	=> esc_url( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),			
			'format' 		=> '',
			'current'      	=> max( 1, get_query_var( 'paged' ) ),
			'total'        	=> $wp_query->max_num_pages,
			'prev_text' 	=> '<span class="page-prev"></span>' . __('Previous', 'Avada'),
			'next_text' 	=> __('Next', 'Avada'). '<span class="page-next"></span>',
			'type'			=> 'plain',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) ) );
	?>
</nav>