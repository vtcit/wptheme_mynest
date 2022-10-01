<?php
/**
* Template Name: TRANG CHỦ
*/
?>
<?php get_header(); ?>

<div class="container home-slideshow">
    <div class="row row-md">
        <div class="col-md-9 col-md-offset-3">
            <div id="slideshow" class="owl-carousel owl-theme" data-items="1">
                <?php
                    if( have_rows('slideshow','option') ) {
                    while ( have_rows('slideshow','option') )  {
                        the_row();
                        $title = get_sub_field('title');
                ?>
                <div class="item">
                    <div class="thumb resize" >
                        <img src="<?php the_sub_field('image') ?>" alt="<?php esc_attr($title) ?>" />
                    </div>
                    <div class="description text-center">
                        <div class="inner">
                            <h2>
                                <a href="<?php esc_url(the_sub_field('link')) ?>"><?= $title ?></a>
                            </h2>
                            <?php the_sub_field('description') ?>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <!-- #slideshow -->
        </div>
    </div>
</div>

<div class="container home-sidebar">
    <?php dynamic_sidebar('trangchu'); ?>
</div>
<!-- product_menu_list -->
<script type="text/javascript">
    // jQuery(function ($) {

    // });
</script>
<?php get_footer(); ?>
