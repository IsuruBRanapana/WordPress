<?php
/**
 * The template for displaying Search Results pages.
 * @package Veterinary Pet Care
 */

get_header(); ?>

<?php
    $left_right = get_theme_mod( 'veterinary_pet_care_layout','Right Sidebar');
    if($left_right == 'Right Sidebar'){ ?>
        <div id="blog_post">    
            <div class="innerlightbox">
                <div class="container"> 
                    <div class="row">       
                        <div class="col-lg-9 col-md-9">
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                        'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>      
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($left_right == 'Left Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="col-lg-9 col-md-9">
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                        'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div> 
                    </div>                   
                </div>
            </div>
        </div>
    <?php }else if($left_right == 'One Column'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                        <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content' );
                            endwhile;
                              else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                    'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>                   
                </div>
            </div>
        </div>
    <?php }else if($left_right == 'Three Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-6 col-md-6">
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                        'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    </div>               
                </div>
            </div>
        </div>
    <?php }else if($left_right == 'Four Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-3 col-md-3">
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                        'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($left_right == 'Grid Layout'){ ?>
        <div id="blog_post">
            <div class="innerlightbox">
                <div class="container"> 
                    <div class="row">       
                        <div class="col-lg-8 col-md-8">
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <div class="row">               
                                <?php if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                                        get_template_part( 'template-parts/grid-layout' );
                                    endwhile;
                                      else :
                                        get_template_part( 'no-results' );
                                    endif; 
                                ?>
                            </div>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                        'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>      
                        <div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else {?>
        <div id="blog_post">    
            <div class="innerlightbox">
                <div class="container"> 
                    <div class="row">       
                        <div class="col-lg-9 col-md-9">
                            <h1 class="search-title"><?php /* translators: %s: search term */ printf(esc_html('Search Results for: %s','veterinary-pet-care'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'veterinary-pet-care' ),
                                        'next_text'          => __( 'Next page', 'veterinary-pet-care' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'veterinary-pet-care' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>      
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php get_footer(); ?>