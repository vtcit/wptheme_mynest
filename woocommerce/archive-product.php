<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<?php if ( woocommerce_product_loop() ) { ?>
	<header class="woocommerce-products-header">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			<div class="category-info__text">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<div class="page-title-wrapper"><h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1></div>
				<?php endif; ?>
				<?php
					do_action( 'woocommerce_before_shop_loop' );
				?>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row row-sm row-main">
			<div class="col-md-15  col-sm-3 hidden-x">
				<?php get_sidebar() ?>
			</div>
			<div class="col-md-45 col-sm-9">
				<?php
				
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */

					woocommerce_product_loop_start();
				
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
				
							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );
							echo '<div class="item col-md-3 col-xs-6">';
							wc_get_template_part( 'content', 'product' );
							echo '</div>';
						}
					}
				
					woocommerce_product_loop_end();
				
					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>
			</div>
		</div><!-- row -->
	</div><!-- container main -->
<?php
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>		


<?php
get_footer( 'shop' );
