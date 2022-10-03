<?php
$terms = array();
$terms_id = array();
if(is_archive())
{
	$terms[] = get_queried_object();
}
elseif(is_single())
{
	$terms = wp_get_post_terms(get_the_ID(), 'category');
}
foreach($terms as $term)
{
	if(!empty($term) && !is_wp_error($term))
	{
		$terms_id[] = $term->term_id;
		if($term->parent)
		{
			$parent = get_term($term->parent);
			if(!empty($parent) && !is_wp_error($parent))
			{
				$terms_id[] = $parent->term_id;
			}
		}
	}
}
?>
<div class="category-list clearfix">
	<h3 class="heading"><?php _e('Category', 'leo_product') ?></h3>
	<div class="mod-content">
		<ul class="list-unstyled">
			<?php 
			$terms = get_terms('category', 'parent=0'); //&orderby=name&order=ASC
			if(!empty($terms) && !is_wp_error($terms))
			{
				foreach($terms as $term)
				{
					$term->link = get_term_link($term);
					$childterms = get_terms('category', 'parent='.$term->term_id);
				?>
					<li class="term<?php echo $term->term_id ?><?php if($childterms) echo ' parent'; if($terms_id && in_array($term->term_id, $terms_id)) echo ' active'; ?>">
						<a href="<?php echo $term->link ?>"><i class="fa fa-angle-right"></i> <?php echo $term->name ?></a>
						<ul class="sub-menu">
						<?php if($childterms)
						{
							foreach($childterms as $childterm)
							{
								$childterm->link = get_term_link($childterm);
							?>
								<li class="term<?php echo $childterm->term_id ?><?php if($terms_id && in_array($childterm->term_id, $terms_id)) echo ' active'; ?>"><a href="<?php echo $childterm->link ?>"><?php echo $childterm->name ?></a></li>
							<?php
							}
						} ?>
						</ul>
					</li>
				<?php 
				} //$terms
			} //if(!empty($terms) ?>
		</ul>
	</div>
</div><!-- product_category-list  -->
