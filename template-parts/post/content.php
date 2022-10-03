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
			the_title('<h1 class="page-header entry-title">', '</h1>');
			//if(is_front_page() && is_home())
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
	<hr />
	<?php
	$cat_array = array();
	if($cats = get_the_category($post->ID))
	{
		foreach($cats as $key1 => $cat)
		{
			$cat_array[$key1] = $cat->slug;
		}
	}

	//get the categories a post belongs to
	$tag_array = array();
	if($tags = get_the_tags($post->ID))
	{
		foreach($tags as $key2 => $tag)
		{
			$tag_array[$key2] = $tag->slug;
		}
	}
	$args = array(
		'posts_per_page' => 3,
		'post__not_in' => array(get_the_ID()),
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $cat_array,
				'include_children' => false 
			),
			array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => $tag_array,
			)
		)
	);
	if($myposts = get_posts($args))
	{
	?>
	<div class="row row-list post-list">
		<?php foreach($myposts as $k=>$post)
		{
			setup_postdata($post);
			echo '<div class="item col-md-4 col-sm-6 col-xs-12">';
			get_template_part('template-parts/post/content-list-table');
			echo '</div><!-- item -->';
		}
		wp_reset_postdata();
		?>
	</div>
	<?php
	} ?>
</article><!-- #post-## -->
