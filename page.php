<?php get_header(); ?>
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
		<div class="row">
			<div class="col-md-8">
			<?php
				while(have_posts())
				{
					the_post();
					$_parent_id = (int)$post->post_parent;
					$_post_id = $post->ID;
					get_template_part('template-parts/page/content', 'page');
					$args = array(
						//'number' => -1,
						'parent'	=> $post->ID,
						'sort_column' => 'ID',
						'sort_order' => 'ASC',
					);
					if($pages_child = get_pages($args))
					{
					?>
						<div class="row row-list post-list post-childs">
							<?php
							foreach($pages_child as $k => $post)
							{
								setup_postdata($post);
								$post->is_list = true;
								echo '<div class="item col-lg-3 col-md-3 col-sm-6 col-xs-12">';
								get_template_part('template-parts/page/content-list', 'page');
								echo '</div><!-- item -->';
							}
							wp_reset_postdata();
							?>
						</div>
					<?php
					}
					if($_parent_id)
					{
						$args = array(
							//'number' => -1,
							'parent'	=> $_parent_id,
							'exclude'	=> array($_post_id),
							'sort_column' => 'ID',
							'sort_order' => 'ASC',
						);
						if($pages_child = get_pages($args))
						{
							$_parent = get_page($_parent_id);
					?>
							<h2 class="heading"><?php echo $_parent->post_title ?> khác</h2>
							<div class="row row-list post-list post-same-parent">
								<?php
								foreach($pages_child as $k => $post)
								{
									setup_postdata($post);
									$post->is_list = true;
									echo '<div class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">';
									get_template_part('template-parts/page/content-list', 'page');
									echo '</div><!-- item -->';
								}
								wp_reset_postdata();
								?>
							</div>
					<?php
						}
					}
				}
				$args = array(
					'posts_per_page' => 3,
					//'post__not_in' => array(get_the_ID())
				);
				if($myposts = get_posts($args))
				{
					$news_id = get_option('page_for_posts');
				?>
					<h2 class="heading">
						<?php
						if($news_id)
							echo '<a href="'.get_the_permalink($news_id).'">'.get_the_title($news_id).'</a>';
						else
							_e('News', 'leo_blog');
						?>
					</h2>
				<div class="row row-list post-list">
					<?php foreach($myposts as $k=>$post)
					{
						setup_postdata($post);
						echo '<div class="item col-lg-4 col-md-4 col-sm-12 col-xs-12">';
						get_template_part('template-parts/post/content-list-table');
						echo '</div><!-- item -->';
					}
					wp_reset_postdata();
					?>
				</div>
				<?php
				}
			?>
			<div class="col-md-4">
				<?php get_sidebar() ?>
			</div>
		</div>
	</div><!-- .container -->
</main>

<?php get_footer(); ?>