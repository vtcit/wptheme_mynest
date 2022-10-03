<?php

/**

* Template Name: Page full

*/

?>
<?php get_header();?>

<div class="breadcrumbs clearfix">
	<div class="container">
		<ol class="breadcrumb" itemprop="breadcrumb">
			<li><a href="<?php echo esc_url(home_url('/')); ?>"><span class="fa fa-home"></span><span class="sr-only"> <?php _e('Home', 'leo_blog') ?></span></a></li>
			<?php
			if($post->post_parent)
			{
				$page_parent = get_page($post->post_parent);
				echo '<li typeof="v:Breadcrumb"><a href="'.get_page_link($page_parent->ID).'">'.$page_parent->post_title.'</a></li>';
			}
			else
			{
			?>
				<li class="active" typeof="v:Breadcrumb"><a class="disabled" href="<?php the_permalink() ?>" rel="v:url" property="v:title"><?php the_title() ?></a></li>
			<?php
			}
			?>
		</ol>
	</div>
</div><!-- breadcrumbs -->


<main id="main">
	<div class="container">
			<?php while(have_posts()) {
					the_post();
					get_template_part('template-parts/page/content', 'page');
            } ?>
                
	</div><!-- .container -->
</main>
<?php get_footer(); ?>