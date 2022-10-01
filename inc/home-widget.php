<?php


class ProductBox extends WP_Widget {
    function __construct() {
        parent::__construct(
            'ProductBox',
            'Product BOX',
            array( 'description'  =>  'Widget hiển thị SP theo chuyên mục' )
        );
        
        add_action('widgets_init', function() {
			register_widget( 'ProductBox' );
		});
    }

    function form( $instance ) {
        $default = array(
        );
        $instance = wp_parse_args( (array) $instance, $default );
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }

    function widget( $args, $instance ) {
        extract($args);
        $wid = 'widget_' . $args['widget_id'];
        $title = get_field('title', $wid);
        $number = get_field('number', $wid);
        $category_id = get_field('category', $wid);
        $category = get_term_by('id', $category_id, 'product_cat');
        $args = array(
            'posts_per_page' => $number,
            'product_cat' =>$category->slug,
            'post_type' => 'product',
            'orderby' => 'id', 
        );
        $products = new WP_Query( $args );
        ?>
            <div class="product_box_widget <?= $wid ?>">
                <h2 class="heading"><?= $title ?></h2>
                <div class="product_box_content row">
                    <?php
                    if($products->have_posts()) {
                    while( $products->have_posts() ) {
                            $products->the_post();
                    ?>
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <?php wc_get_template_part( 'content', 'product' ); ?>
                    </div>
                        <?php
                        }
                    } ?>
                </div>
            </div><!-- #product_box_<?= $args['widget_id'] ?> -->
        <?php

    }

}
$ProductBox = new ProductBox();
// end class ProductBox



class NewsBox extends WP_Widget {
    function __construct() {
        parent::__construct(
        'NewsBox',
        'BOX TIN TỨC',
        array( 'description'  =>  'Widget hiển thị bài viết theo chuyên mục' )
        );
        add_action('widgets_init', function() {
			register_widget( 'NewsBox' );
		});
    }

    function form( $instance ) {
        $default = array(
        );
        $instance = wp_parse_args( (array) $instance, $default );
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $wid = 'widget_' . $args['widget_id'];
        $title = get_field('title', $wid);
        $description = get_field('description', $wid);
        $post_number = get_field('so_luong', $wid);
        $cat = get_field('danh_muc', $wid);
        $args2 = array(
        'posts_per_page' => $post_number,
        'cat' => $cat,
        'orderby' => 'id',
        );
        $tintuc = new WP_Query( $args2 );
        ?>
        <section>
        <div>
            <a href="<?= get_category_link($cat)?>"><h3><?= $title ?></h3></a>
            <?= $description ?>
            </div>
            <div>
                <div class="owl-carousel" data-lg-items='3' data-md-items='3' data-sm-items='2' data-xs-items="2" data-nav="true">
                
                <?php
                if ($tintuc->have_posts()):
                while( $tintuc->have_posts() ) :
                $tintuc->the_post();
                ?>
                <article class="blog-item text-center">
                <div>
                    <div class="blog-item-thumbnail">           
                    <a href="<?php the_permalink()?>">
                        
                        <img src="<?php the_post_thumbnail_url('size470')?>" alt="<?php the_title()?>">
                        
                    </a>
                    </div>
                    <div class="blog-item-info m-4">
                    <h3 class="blog-item-name"><a style="color:#008141" href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                    <p class="blog-item-summary"><?= get_the_excerpt()?></p>
                    
                    </div>
                </div>
                </article>
                
                <?php
                endwhile;
                endif; ?>

            </div>
            </div>
        </section>
        <!--<div>
            <div class="deal">
                <div class="news-title clearfix">
                
                </div>
                <div >
                    <div>
                    <?php
                    if ($tintuc->have_posts()):
                    while( $tintuc->have_posts() ) :
                    $tintuc->the_post();
                    ?>
                        <div class="blog owl-carousel " data-lg-items="3" data-md-items="3" data-xs-items="2" data-nav="true">
                            <div class="product-thumbnail">
                                <a href="<?php the_permalink()?>">
                                    <img src="<?php the_post_thumbnail_url('size200')?>" alt="<?php the_title()?>">
                                </a>
                            </div>
                            <div class="news-info ">
                                    <a href="<?php the_permalink()?>"><h2><?php the_title()?></h2></a>
                                <p><?= get_the_excerpt()?></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php endwhile;endif; ?>
                    </div>
        
                </div>
            </div>
        </div>-->
        <?php
    }
}
$NewsBox = new NewsBox();
// end NewsBox




class BannerBox extends WP_Widget {
    function __construct() {
        parent::__construct(
        'BannerBox',
        'Banner Box',
        array( 'description'  =>  'Banner Box show banner width Image, Link, Description' )
        );
        add_action('widgets_init', function() {
			register_widget( 'BannerBox' );
		});
    }

    function form( $instance ) {
        $default = [];
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr($instance['title']);
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $widgetClass = 'widget_'.$args['widget_id'];
        ?>
        <div class="banners <?= $widgetClass ?>">
            <div class="row">
                <?php
                    if( have_rows('banner','option') ) {
                    while ( have_rows('banner','option') )  {
                        the_row();
                ?>
                <div class="item col-sm-6">
                        <figure class="thumb resize">
                            <img src="<?php the_sub_field('image') ?>" alt="<?php esc_attr(the_sub_field('description')) ?>" />
                            <figcaption><?= the_sub_field('description') ?></figcaption>
                        </figure>
                </div>
                
                <?php
                        }
                    }
                ?>
            </div>
        </div>

        <?php
    }
}
$BannerBox = new BannerBox();
// end BannerBox


class InfomationBox extends WP_Widget {
    function __construct() {
        parent::__construct(
        'InfomationBox',
        'Infomation Box',
        array( 'description'  =>  'Widget hiển thị nội dung' )
        );
        add_action('widgets_init', function() {
			register_widget( 'InfomationBox' );
		});
    }
    function form( $instance ) {
        $default = array(
        );
        $instance = wp_parse_args( (array) $instance, $default );
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $wid = 'widget_' . $args['widget_id'];
        $title = get_field('title', $wid);
        $description = get_field('description', $wid);
        $image = get_field('image', $wid);
        $link = get_field('link', $wid);
        $link_text = get_field('link_text', $wid);
        ?>
        <section class="myblock section_textbox <?= $wid ?>">
            <div class="inner row">
                <?php if($image) { ?>
                    <div class="textbox-img col-xs-12"><img src="<?= esc_url($image) ?>" alt="<?= esc_attr($title) ?>" /></div>
                <?php } ?>
                <div class="textbox-intro col-xs-12">
                    <div class="textbox-intro-inner">
                        <h2 class="textbox-title"><?= $title ?></h2>
                        <div class="textbox-desc"><?= $description ?></div>
                    </div>
                    <?php if($link) { ?><div class="btns"><a href="<?= esc_url($link) ?>" class="btn btn-warning"><?= $link_text ?></a></div><?php } ?>
                </div>
            </div>
        </section>

        <?php
    }
}
$InfomationBox = new InfomationBox();
// end InfomationBox



class TextmultiBox extends WP_Widget {
    function __construct() {
        parent::__construct(
        'TextmultiBox',
        'Text Multi Box',
        array( 'description'  =>  'Widget hiển thị nội dung' )
        );
        add_action('widgets_init', function() {
			register_widget( 'TextmultiBox' );
		});
    }
    function form( $instance ) {
        $default = array(
        );
        $instance = wp_parse_args( (array) $instance, $default );
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $wid = 'widget_' . $widget_id;
        if( have_rows('text_multi', $wid) ) { ?>
            <section class="myblock section_textmultibox <?= $wid ?>">
                <div class="inner row">
                    <?php
                    while ( have_rows('text_multi', $wid) )  {
                        the_row();
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                        $link_text = get_sub_field('link_text');
                    ?>
                        <div class="item col-xs-12">
                            <div class="row">
                                <?php if($image) { ?>
                                    <div class="textbox-img col-xs-12"><img src="<?= esc_url($image) ?>" alt="<?= esc_attr($title) ?>" /></div>
                                <?php } ?>
                                <div class="textbox-intro col-xs-12">
                                    <div class="textbox-intro-inner">
                                        <?php if($title) { ?><h2 class="textbox-title"><?= $title ?></h2><?php } ?>
                                        <div class="textbox-desc"><?= $description ?></div>
                                    </div>
                                    <?php if($link) { ?><div class="btns"><a href="<?= esc_url($link) ?>" class="btn btn-warning"><?= $link_text ?></a></div><?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } // while ?>
                </div>
            </section>
        <?php
        } // have_rows
    }
}
$TextmultiBox = new TextmultiBox();
// end TextmultiBox
