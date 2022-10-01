<?php

/**

 * Template : Chi tiết

 */

?>

<?php get_header(); the_post()?>

<div class="breadcrumbs">
    <div class="container">
        <h2 class="category-name"><?php the_title(); ?></h2>
        <?php echo custom_breadcrumbs() ?>
    </div>
</div>


<div class="container">
<div class="">
<div id="column-left" class="col-sm-3 col-md-3 col-lg-3 col-xs-12 hidden-xs hidden-sm">
    <?php get_sidebar()?>
</div>
<div id="content" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="content_detail">
        <?php the_content()?>
    </div>
</div>
</div>
</div>

<?php get_footer(); ?>