<?php

/**

* Template : Danh mục

*/

?>
<?php get_header();

?>

<div class="breadcrumbs">
	<div class="container">
		<h2 class="category-name"><?php woocommerce_page_title(); ?></h2>
		<?php echo custom_breadcrumbs() ?>
  	</div>
</div>

<div class="container categories-ms">
<div class="">
<div id="column-left" class="col-sm-3 col-md-3 col-lg-3 col-xs-12 hidden-xs hidden-sm">
	<?php get_sidebar()?>
</div>
<div id="content" class="col-xs-12 col-sm-12 col-md-9 col-lg-9 category_page">


<?php 
if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post();
?>
<div  class="box-article-item">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<a href="<?php the_permalink()?>">
				<img src="<?php the_post_thumbnail_url('size270')?>" alt="<?php the_title()?>">
			</a>
		</div>
		<div class="col-xs-12 col-sm-8">
			<h3 class="title-article-inner"><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
			<div class="post-detail">
				<a><?php echo get_the_author()?></a> - <?php the_time('d/m/Y')?>
			</div>
			<div class="text-blog">
				
				<p><p><?php echo get_the_excerpt()?></p></p>
				
			</div>	
		</div>
	</div>
</div>
<?php
endwhile; // end of the loop. ?>
<?php endif; ?>


<nav>
<ul class="pagination clearfix">
<?php
global $wp_query;
$big = 999999999; 
echo paginate_links( array(

'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

'format'=> '?paged=%#%',

'prev_text'=> __('«'),

'next_text' => __('»'),

'current' => max( 1, get_query_var('paged') ),

'total' => $wp_query->max_num_pages

) );

?>
</ul>
</nav>

</div>
</div>
</div>



<?php get_footer(); ?>