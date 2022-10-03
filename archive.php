<?php get_header(); ?>
<div class="breadcrumbs clearfix">
	<div class="container">
		<ol class="breadcrumb" itemprop="breadcrumb">
			<li><a href="<?php echo esc_url(home_url('/')); ?>"><span class="fa fa-home"></span><span class="sr-only"> <?php _e('Homepage') ?></span></a></li>
			<li><?php echo single_cat_title('', false) ?></li>
		</ol>
	</div>
</div><!-- breadcrumbs -->
<main id="main">
	<div class="container">
		<div class="heading_page">
			<h1 class="page-header"><?php echo single_cat_title('', false) ?></h1>
			<div class="description"><?php the_archive_description(); ?></div>
		</div><!-- .page-header -->
		<div class="row">
			<div class="col-md-8">
				<?php
				if(have_posts())
				{ ?>
					<div class="row row-list post-list">
					<?php
						while(have_posts())
						{
							the_post();
							echo '<div class="item col-md-4 col-sm-6 col-xs-12">';
							get_template_part('template-parts/post/content-list-table', get_post_format());
							echo '</div><!-- item -->';
						}
						wp_reset_postdata();
					?>
					</div>
				<?php
				}
				else
				{
					get_template_part('template-parts/post/content', 'none');
				}
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar() ?>
			</div>
		</div>
	</div><!-- .container -->
</main>

<?php get_footer(); ?>
