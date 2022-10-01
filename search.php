<?php

/**

* Template : Danh mục

*/

?>
<?php get_header(); ?>

<div class="cd-main-content">
            <div id="blog">
    
    <div class="main-content">
        <?php
        dynamic_sidebar('blog-sidebar');
        ?>
        <div class="breadcrumbs ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo custom_breadcrumbs()?>
                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .breadcrumbs -->


        <!-- Begin content -->
        <div class="container">
            <div class="blog-content">
                <div class="row"> 
                    <div class="col-md-9 col-sm-8 col-xs-12" id="blog-container">
                        <div class="articles clearfix" id="layout-page">
                            
                            <?php 
                            if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post();
                            ?>

                            <hr class="line-blog">
                            
                            <div class="news-content">
                                <div class="row">
                                    
                                    <div class="col-sm-5 col-xs-12 img-article">
                                        <a href="<?php the_permalink()?>"><div><div><img src="<?php the_post_thumbnail_url('size380')?>" data-mce-src="<?php the_post_thumbnail_url('size380')?>"></div></div></a>
                                    </div>
                                    
                                    <div class=" col-sm-7 ">
                                        <h2 class="title-article"><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
                                        <div class="body-content">

                                            <p><?php echo get_the_excerpt()?></p>
                                        </div>
                                        <!-- End: Nội dung bài viết -->
                                        
                                    </div>
                                </div>
                            </div>

                            <?php
                            endwhile; // end of the loop. ?>
                            <?php endif; ?> 

                            <hr class="line-blog">
                            
                            
                            <!-- End: Nội dung blog --> 

                        </div>
                        <div class="col-sm-12">
                            <div id="pagination" class="">
                                <?php
                                global $wp_query;
                                $big = 999999999; 
                                echo paginate_links( array(

                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

                                'format'=> '?paged=%#%',

                                'prev_text'=> __('«'),

                                'next_text' => __('»'),

                                'current' => max( 1, get_query_var('paged') ),

                                'total' => $wp_query->max_num_pages

                                ) );

                                ?>
                                
                            </div>
                            <!-- End: Phân trang blog --> 
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 hidden-xs clearfix">
                        <!-- Begin sidebar blog -->
                        <div class="sidebar">
                            <?php
                            dynamic_sidebar('sidebar-3');
                            ?>
                        </div>
                        <!-- End sidebar blog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
    
</div>
<script>
$(document).ready(function(){
    $('.hot-blog img').imagesLoaded(function(){
        var he = $('#block-hot').height()/2;
        if(he>0)
            $('.fixhot').height(he-2);
})
})
</script>
</div>


<?php get_footer(); ?>