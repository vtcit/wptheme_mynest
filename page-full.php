<?php

/**

* Template Name: Page full

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
<div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="content_detail">
        <?php the_content()?>
    </div>
</div>
</div>
</div>


<?php get_footer(); ?>