<?php get_header(); ?>
<div class="breadcrumbs clearfix">
	<div class="container">
		<ol class="breadcrumb" itemprop="breadcrumb">
			<li><a href="<?php echo esc_url(home_url('/')); ?>"><span class="fa fa-home"></span><span class="sr-only"> <?php _e('Home', 'leo_blog') ?></span></a></li>
			<?php
			$categories = get_the_category();
			if(!empty($categories))
			{
				foreach($categories as $cat)
				{
			?>
				<li class="term-item" typeof="v:Breadcrumb"><a href="<?php echo esc_url(get_category_link($cat->term_id)) ?>" rel="v:url" property="v:title"><?php echo esc_html($cat->name) ?></a></li>
			<?php
				}
			} ?>
		</ol>
	</div>
</div><!-- breadcrumbs -->
<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php
				while(have_posts())
				{
					the_post();
					get_template_part('template-parts/post/content', get_post_format());
				}
			?>
			<div class="col-md-4">
				<?php get_sidebar() ?>
			</div>
		</div>
	</div><!-- .container -->
</main>

<?php get_footer(); ?>
