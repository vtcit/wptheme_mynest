<?php

/**

* Template : Chi tiết

*/
$categories = get_the_category($post->ID);
basix_setPostViews($post->ID);

?>

<?php get_header();the_post();?>

<div class="breadcrumbs">
    <div class="container">
        <h2 class="category-name"><?php echo $categories[0]->name; ?></h2>
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
        <h1><?php the_title(); ?></h1>
        <time><i>Đăng ngày : <?php the_time('d-m-Y')?></i></time>
        <?php the_content()?>
        <?php
        $categories = get_the_category($post->ID);
        $args = array( 'posts_per_page' =>14,'orderby'=>'rand', 'offset'=> 1, 'category' => $categories['0']->term_id );
        $myposts = get_posts( $args );
        if($myposts){
        ?>

        <div class="block-newsOther">
        <h3>Bài viết liên quan:</h3>
        <div class="row">
        <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

        <div class="col-xs-12">
        <h4>
        <a href="<?php the_permalink()?>" target="_self" title="<?php the_title()?>">
        <i class="fa fa-chevron-right" aria-hidden="true">
        </i> <?php the_title()?></a></h4>
        </div>
        <?php endforeach;  wp_reset_postdata();?>


        </div>
        </div>


        <?php } ?>

    </div>
</div>
</div>
</div>



<?php get_footer(); ?>


