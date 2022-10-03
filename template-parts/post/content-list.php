<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage tuanict/leo
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if(has_post_thumbnail()) echo '<div class="post-image"><a href="'.get_permalink().'" class="thumb resize">'.get_the_post_thumbnail($post->ID, 'large').'</a></div>';
	?>
	<header class="entry-header post-heading">
		<?php
			the_title('<h2 class="entry-title heading"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>');
			//if(is_front_page() && is_home())
			edit_post_link(sprintf(__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'leo_product' ), get_the_title()), '<p class="edit-link small">', '</p>');
		?>
	</header><!-- .entry-header -->
	<div class="entry-meta small clearfix">
		<strong class="hidden"><span class="vcard author"><span class="fn"><?php the_author() ?></span></span></strong>
		<i><?php _the_entry_date() ?></i>
		<span class="hidden">
			| <span class="post-terms"><span class="item"><?php the_category('</span><span class="term-item">, '); ?></span></span> <span class="post-tags"><?php the_tags(' | '); ?></span>
		</span>
	</div><!-- entry-meta -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<div class="readmore text-right"><a href="<?php the_permalink() ?>"><i class="fa fa-angle-right"></i> <?php _e('Read more') ?></a></div>
</article><!-- #post-## -->
