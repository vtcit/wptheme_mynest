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
		if($images_id = get_post_meta($post->ID, 'header_images', true))
		{
			$img_id = reset($images_id);
			echo '<div class="post-image header-image"><a href="'.get_permalink().'" class="thumb resize">'.wp_get_attachment_image($img_id, 'large').'</a></div>';
		}
	?>
	<header class="entry-header post-heading">
		<?php
			if(isset($post->is_list) && $post->is_list==true)
			{
				the_title('<h3 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h3>');
			}
			elseif(is_page())
			{
				the_title('<h1 class="entry-title page-header">', '</h1>');
			}
			else
			{
				the_title('<h2 class="entry-title heading"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>');
			}
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<div class="entry-meta clearfix" style="display: none">
		<div class="text-right">
			<i><?php _the_entry_date() ?></i>
			<br />
			<strong><span class="vcard author"><span class="fn"><?php echo $_SERVER['SERVER_NAME']; //the_author() ?></span></span></strong>
		</div>
	</div><!-- entry-meta -->
</article><!-- #post-## -->
