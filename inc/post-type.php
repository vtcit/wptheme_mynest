<?php

if( have_rows('post_type','option') ):
function custom_post_type() {
while ( have_rows('post_type','option') ) : the_row();
$tieude=get_sub_field('tieu_de');
$duongdan=get_sub_field('duong_dan');
$icon=get_sub_field('icon');
$tendm=get_sub_field('ten_danh_muc');
$duongdandm=get_sub_field('duong_dan_dm');
    /*
    * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
    */
    $label = array(
    'name' => $tieude, //Tên post type dạng số nhiều
    'singular_name' => $tieude //Tên post type dạng số ít
    );

    /*
    * Biến $args là những tham số quan trọng trong Post Type
    */
    $args = array(
    'labels' => $label, //Gọi các label trong biến $label ở trên
    'description' => $tieude, //Mô tả của post type
    'supports' => array(
    'title',
    'editor',
    'excerpt',
    'author',
    'thumbnail',
    'comments',
    'trackbacks',
    'revisions',
    'custom-fields'
    ), //Các tính năng được hỗ trợ trong post type
    'taxonomies' => array( $duongdandm), //Các taxonomy được phép sử dụng để phân loại nội dung
    'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
    'public' => true, //Kích hoạt post type
    'show_ui' => true, //Hiển thị khung quản trị như Post/Page
    'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
    'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
    'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
    'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
    'menu_icon' => $icon, //Đường dẫn tới icon sẽ hiển thị
    'can_export' => true, //Có thể export nội dung bằng Tools -> Export
    'has_archive' => true, //Cho phép lưu trữ (month, date, year)
    'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
    'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
    'capability_type' => 'post' //
    );
    register_post_type( $duongdan, $args );
endwhile;
}
add_action( 'init', 'custom_post_type', 0 );

// Register Custom Taxonomy
function custom_taxonomy() {


while ( have_rows('post_type','option') ) : the_row();
$y=$i++;
$tieude=get_sub_field('tieu_de');
$duongdan=get_sub_field('duong_dan');
$icon=get_sub_field('icon');
$tendm=get_sub_field('ten_danh_muc');
$duongdandm=get_sub_field('duong_dan_dm');




/* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
 */
$labels = array(
        'name' => $tendm,
        'singular' => $tendm,
        'menu_name' => $tendm
);

/* Biến $args khai báo các tham số trong custom taxonomy cần tạo
 */
$args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
);

/* Hàm register_taxonomy để khởi tạo taxonomy
 */
register_taxonomy($duongdandm, $duongdan, $args);



endwhile;
}
add_action( 'init', 'custom_taxonomy', 0 );
endif;


