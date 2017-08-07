<?php
/**
 * Social Share Buttons Output
 *
 * @package Ocean WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get sharing sites
$sites = ops_social_share_sites();

// Return if there aren't any sites enabled
if ( empty( $sites ) ) {
	return;
}

// Vars
$product_title 	= get_the_title();
$product_url	= get_permalink();
$product_img	= wp_get_attachment_url( get_post_thumbnail_id() ); ?>

<div class="product-share clr">

	<ul class="ocean-social-share clr">

		<?php
		// Loop through sites
		foreach ( $sites as $site ) :

			// Twitter
			if ( 'twitter' == $site ) { ?>

				<li class="twitter">
					<a href="https://twitter.com/intent/tweet?status=<?php echo rawurlencode( $product_title ); ?>+<?php echo esc_url( $product_url ); ?>" target="_blank">
						<span class="fa fa-twitter"></span>
						<div class="product-share-text"><?php esc_html_e( 'Tweet This Product', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

			<?php }
			// Facebook
			if ( 'facebook' == $site ) { ?>

				<li class="facebook">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode( esc_url( $product_url ) ); ?>" target="_blank">
						<span class="fa fa-facebook"></span>
						<div class="product-share-text"><?php esc_html_e( 'Share on Facebook', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

			<?php }
			// Pinterest
			if ( 'pinterest' == $site ) { ?>

				<li class="pinterest">
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $product_url ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&amp;description=<?php echo rawurlencode( $product_title ); ?>" target="_blank">
						<span class="fa fa-pinterest-p"></span>
						<div class="product-share-text"><?php esc_html_e( 'Pin This Product', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

			<?php }
			// Mail
			if ( 'email' == $site ) { ?>

				<li class="email">
					<a href="mailto:?subject=<?php echo rawurlencode( $product_title ); ?>&amp;body=<?php echo esc_url( $product_url ); ?>" target="_blank">
						<span class="fa fa-envelope-o"></span>
						<div class="product-share-text"><?php esc_html_e( 'Mail This Product', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

			<?php } ?>

		<?php endforeach; ?>

	</ul>

</div><!-- .entry-share -->