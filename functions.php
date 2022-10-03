<?php
/**
 * Register Custom Navigation Walker
 */


defined('_DOMAIN_TEXT_DOMAIN') or define('_DOMAIN_TEXT_DOMAIN', 'vpw_theme');
function register_navwalker() {
	require_once get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/* Thêm Menu */
register_nav_menus(array('primary' => 'Menu chính'));
register_nav_menus(array('mobile' => 'Mobile '));
register_nav_menus(array('danhmuc' => 'Danh mục'));
// Thay doi duong dan logo admin
function wpc_url_login(){
    return "#"; // duong dan vao website cua ban
}
add_filter('login_headerurl', 'wpc_url_login');

// mô tả ngắn

function description_short($more) {
    return '...';
}
add_filter( 'excerpt_more', 'description_short' );

function vpw_style() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('owl.carousel.min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', null, '2.3.4', true);
    wp_enqueue_script('bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', null, '3.3.7', true);
    wp_enqueue_script('site', get_template_directory_uri() . '/js/site.js', null, '221003.3', true);

    wp_enqueue_style('bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', [], '3.3.7');
    wp_enqueue_style('font-awesome.min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', [], '4.7.0');
    wp_enqueue_style('owl.carousel.min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], '2.3.4');
    wp_enqueue_style('owl.theme.default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css', [], '2.3.4');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', [], '221001.1');

    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], '221003.2');
		
}
add_action('wp_enqueue_scripts', 'vpw_style');

// Widget addmin
function vpw_admin_style() {
        wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin/admin.css');
        wp_enqueue_script('script_7', get_template_directory_uri() . '/admin/menu-image-admin.js');
}
add_action('admin_enqueue_scripts', 'vpw_admin_style');
add_action('login_head', 'vpw_admin_style');
/* Thêm sidebar */
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'          => 'Homepage',
        'id'            => 'trangchu',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="%2$s"><div class="inner">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h2 class="heading widget-heading">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="%2$s"><div class="inner">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h2 class="heading widget-heading">',
        'after_title'   => '</h2>'
    ));

        register_sidebar(array(
            'name'          => 'Promotion Sale Woocommerce',
            'id'            => 'promotion_sale',
            'description'   => 'Promotion Sale for Woocommerce, displayed after excerpt of product',
            'before_widget' => '<div id="%1$s" class="%2$s"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h2 class="heading widget-heading">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => 'After Product Image Woocommerce',
            'id'            => 'after_product_image',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s after_product_image-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));
        register_sidebar(array(
            'name'          => 'Right single product summary Woocommerce',
            'id'            => 'right_single_product_summary',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s right_single_product_summary-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));

         register_sidebar(array(
            'name'          => 'Footer 1',
            'id'            => 'footer1',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s footer-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));   
        register_sidebar(array(
            'name'          => 'Footer 2',
            'id'            => 'footer2',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s footer-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));
        register_sidebar(array(
            'name'          => 'Footer 3',
            'id'            => 'footer3',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s footer-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));
        register_sidebar(array(
            'name'          => 'Footer 4',
            'id'            => 'footer4',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s footer-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));
        register_sidebar(array(
            'name'          => 'Footer 5',
            'id'            => 'footer5',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="%2$s footer-widget"><div class="inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="heading widget-heading">',
            'after_title'   => '</h3>'
        ));
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/* Menu bootstrap Wordpress */
include_once dirname(__FILE__) . '/inc/home-widget.php';
require_once( dirname( __FILE__ ) . '/theme-option/option.php');

function basix_getPostViews($postID) {
    $count_key = 'basix_post_views_count';
    $count     = get_post_meta($postID, $count_key, TRUE);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function basix_setPostViews($postID) {
    $count_key = 'basix_post_views_count';
    $count     = get_post_meta($postID, $count_key, TRUE);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Tìm kiếm sản phẩm theo danh mục
function kt_advanced_search_query($query) {

    if($query->is_search()) {
        
        // tag search
        if (isset($_GET['cat']) && $_GET['cat']) {
            $taxquery = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => array( $_GET['cat'] ),
                    'operator' => 'IN'
                ),
                'relation' => 'OR',
            );
            $query->tax_query  = $taxquery;
            $query->query_vars['tax_query'] = $query->tax_query;
        }
        return $query;
    }

}
add_action('pre_get_posts', 'kt_advanced_search_query');


function _add_star_rating() {
        global $product; //$woocommerce, 
        $average = $product->get_average_rating()? intval($product->get_average_rating()) : 4;
        echo '<div class="averages">';
        for($i=0;$i<$average;$i++) {
            echo '<i class="fa fa-star"></i>';
        }
        for($i=$average;$i<5;$i++) {
            echo '<i class="fa fa-star-o"></i>';
        }
        echo '</div>';
}
add_action('woocommerce_shop_loop_item_title', '_add_star_rating' );

// Breadcrumbs
function custom_breadcrumbs1() {

    // Settings
    $separator          = ' —› ';
    $breadcrums_id      = 'breadcrumb';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = __('Homepage');
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                if(!empty($post_type_object) || !empty($post_type_archive)) echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                if(!empty($post_type_object) || !empty($post_type_archive)) echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

// Hien flash sale theo %
add_filter( 'woocommerce_sale_flash', 'ask_percentage_sale', 11, 3 );
function ask_percentage_sale( $text, $post, $product ) {
    $discount = 0;
    if ( $product->get_type() == 'variable' ) {
        $available_variations = $product->get_available_variations();								
        $maximumper = 0;
        for ($i = 0; $i < count($available_variations); ++$i) {
            $variation_id=$available_variations[$i]['variation_id'];
            $variable_product1= new WC_Product_Variation( $variation_id );
            $regular_price = $variable_product1->get_regular_price();
            $sales_price = $variable_product1->get_sale_price();
            if( $sales_price ) {
                $percentage= round( ( ( $regular_price - $sales_price ) / $regular_price ) * 100 ) ;
                if ($percentage > $maximumper) {
                    $maximumper = $percentage;
                }
            }        
        }
        $text = '<span class="onsale sale-percent">-' . $maximumper  . '%</span>';
    } elseif ( $product->get_type() == 'simple' ) {
        $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
        $text = '<span class="onsale sale-percent">-' . $percentage . '%</span>';
    }   

    return $text;
}

function vpw_theme_woo() {
    // Declare WooTheme support
    // https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'vpw_theme_woo' );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 5);

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


//Trở về trình soạn thảo văn bản cũ trên bản wp mới nhất
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
add_filter('use_block_editor_for_post', '__return_false');

/*// bảo trì
function cswp_maintenance_mode(){
    if(!current_user_can('edit_themes') || !is_user_logged_in()){
        wp_die('
	<img style="width:100%;" src="https://citgroup.vn/wp-content/uploads/2020/10/citgroup-banner-1.png" title="CIT-Group">
        	<br /><h1 style="color:red; text-align:center">Bảo trì hệ thống</h1><br />Hiện tại chúng tôi đang bảo trì để nâng cấp hệ thống. Vui lòng quay lại sau ít phút! Liên hệ nhanh 0842.272.868');
    }
}
add_action('get_header', 'cswp_maintenance_mode');**/
// add_action( 'admin_init', 'my_remove_menu_pages' );
// function my_remove_menu_pages() {
//   global $user_ID;
//   if(is_admin() && $user_ID == '3'){ //Thay ID người dùng ở đây
//    remove_menu_page( 'wpcf7' ); 
//    remove_menu_page( 'plugins.php' ); // Menu Plugins
//    remove_menu_page( 'users.php' ); // Menu Thành viên
//    remove_menu_page( 'tools.php' ); // Menu Công cụ
//    remove_menu_page( 'options-general.php' ); // Menu cài đặt
//     }
// }
