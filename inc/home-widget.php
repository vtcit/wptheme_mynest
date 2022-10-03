<?php


if(!function_exists('_the_entry_date'))
{
	function _the_entry_date()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if(get_the_time('U') !== get_the_modified_time('U'))
		{
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
		}

		printf($time_string,
			esc_attr(get_the_date('c')),
			get_the_date(),
			esc_attr(get_the_modified_date('c')),
			get_the_modified_date()
		);
	}
}


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
        $default = [];
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
        $slideshow = get_field('slideshow', $wid);
        $number = get_field('number', $wid);
        $category_id = get_field('category', $wid);
        $category = get_term_by('id', $category_id, 'product_cat');
        $is_category = (!empty($category) && !is_wp_error($category));
        $args = [
            'posts_per_page' => $number,
            'post_type' => 'product',
            'orderby' => 'id', 
        ];
        $link = 'javascript:;';
        if($is_category) {
            $args['product_cat'] = $category->slug;
            $link = get_term_link($category);
        }
        $products = new WP_Query($args);;
        ?>
            <section class="myblock widget product_box_widget <?= $wid ?>">
                <div class="widget-header">
                    <h2 class="widget-title heading"><a href="<?= $link ?>"><?= $title ?></a></h2>
                    <div class="btns"><a href="<?= $link ?>" class="btn btn-default"><?= __('Xem tất cả', 'vpw_theme') ?></a></div>
                </div>
                <div class="widget-content product-list <?= (($slideshow != true)? 'row row-sm row-list' : 'owl-carousel owl-theme" data-dots="true" data-items="5" data-items-lg="5" data-items-md="4') ?>">
                    <?php
                    if($products->have_posts()) {
                    while( $products->have_posts() ) {
                            $products->the_post();
                    ?>
                    <div class="item <?= (($slideshow != true)? 'col-md-15 col-sm-4 col-xs-6' : '') ?>">
                        <?php wc_get_template_part( 'content', 'product' ); ?>
                    </div>
                        <?php
                        }
                    } ?>
                </div>
            </section><!-- #<?= $wid ?> -->
        <?php

    }

}
$ProductBox = new ProductBox();
// end class ProductBox



class NewsBox extends WP_Widget {
    function __construct() {
        parent::__construct(
        'NewsBox',
        'News Box',
        array( 'description'  =>  'Widget hiển thị bài viết theo chuyên mục' )
        );
        add_action('widgets_init', function() {
			register_widget( 'NewsBox' );
		});
    }

    function form( $instance ) {
        $default = [];
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
        $number = get_field('number', $wid);
        $category_id = get_field('category', $wid);
        $category = get_category($category_id);
        $args = array(
            'posts_per_page' => $number,
            'cat' => $category->slug,
            'orderby' => 'id',
        );
        $posts = new WP_Query( $args );
        ?>
        <section class="myblock widget new_box_widget <?= $wid ?>">
            <div class="widget-header">
                <h2 class="widget-title heading"><a href="<?= get_category_link($category)?>"><?= $title ?></a></h2>
                <div class="btns hidden"><a href="<?= get_category_link($category)?>" class="btn btn-default"><?= __('Xem tất cả', 'vpw_theme') ?></a></div>
            </div>
            <div class="row row-list post-list">
                <?php
                if ($posts->have_posts()) {
                    while( $posts->have_posts()) {
                        $posts->the_post();
                        echo '<div class="item col-md-3 col-sm-6 col-xs-12">';
                        get_template_part('template-parts/post/content-list-table', get_post_format());
                        echo '</div><!-- item -->';
                    }

                }
                ?>
            </div><!-- .new_box_widget_# -->
        </section>
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
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $widgetClass = 'widget_'.$args['widget_id'];
        ?>
        <div class="myblock widget banner_widget <?= $widgetClass ?>">
            <div class="row">
                <?php
                    if( have_rows('banner','option') ) {
                    while ( have_rows('banner','option') )  {
                        the_row();
                        $img = get_sub_field('image');
                        $desc = get_sub_field('description');
                        $link = get_sub_field('link');
                ?>
                <div class="item col-sm-6">
                        <figure>
                            <a href="<?= $link ?>">
                                <img src="<?= $img ?>" alt="<?= esc_attr($desc) ?>" />
                                <figcaption><?= $desc ?></figcaption>
                            </a>
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
        $default = [];
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
        <section class="myblock widget textbox_widget <?= $wid ?>">
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
        $default = [];
        $instance = wp_parse_args( (array) $instance, $default );
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    function widget( $args, $instance ) {
        extract($args);
        $wid = 'widget_' . $widget_id;
        $title = get_field('title', $wid);
        if( have_rows('text_multi', $wid) ) { ?>
            <section class="myblock widget <?= $wid ?>">
                <?php if($title) { ?>
                    <div class="widget-header">
                        <h2 class="widget-title heading"><?= $title ?></h2>
                    </div>
                <?php } ?>
                <div class="inner row">
                    <?php
                    while ( have_rows('text_multi', $wid) )  {
                        the_row();
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                    ?>
                        <div class="item col-xs-12">
                            <div class="textbox-intro-inner">
                                <?php if($title) { ?><h3 class="textbox-title"><?= $title ?></h3><?php } ?>
                                <div class="textbox-desc"><?= $description ?></div>
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
