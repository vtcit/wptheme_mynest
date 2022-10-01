<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<div class="breadcrumbs">
		<div class="container">
			<?php echo custom_breadcrumbs() ?>
		</div>
	</div>
	<header class="woocommerce-products-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 category-info__text">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<div class="page-title-wrapper"><h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1></div>
					<?php endif; ?>
				</div>
				<div class="col-md-8 category-description">
					<?php do_action( 'woocommerce_product_description' ); ?>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row">
			<div class="col-md-3 hidden-xs hidden-sm">
				<?php get_sidebar() ?>
			</div>
			<div class="col-md-9 archive-product-main">
		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>

	</div><!-- category-main  -->
		</div><!-- row -->
	</div><!-- container main -->
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
