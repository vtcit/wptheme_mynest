<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage tuanict/leo
 * @since 1.0
 * @version 1.0
 */
$thumbsize = 'medium';
if(isset($post->thumbsize))
{
	$thumbsize = $post->thumbsize;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if(has_post_thumbnail()) echo '<div class="post-image"><a href="'.get_permalink().'" class="thumb resize">'.get_the_post_thumbnail($post->ID, $thumbsize).'</a></div>';
	?>
	<header class="entry-header">
		<?php
			the_title('<h3 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h3>');
			//if(is_front_page() && is_home())
		?>
	</header><!-- .entry-header -->
	<div class="entry-meta small clearfix hidden">
		<strong><span class="vcard author"><span class="fn"><?php the_author() ?></span></span></strong> <i><?php leo_the_entry_date() ?></i>
		|
		<span class="post-terms"><span class="item"><?php the_category('</span><span class="term-item">, '); ?></span></span> <span class="post-tags"><?php the_tags(' | '); ?></span>
	</div><!-- entry-meta -->
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
