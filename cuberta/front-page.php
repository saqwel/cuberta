<?php
/**
 * @package WordPress
 * @subpackage Cuberta
 * @since Cuberta 1.0
 *
 * Displays front page.
 *
 */
get_header();
global $defaults;
?>

<main>
    <div class="content">
        <?php if ( is_active_sidebar( 'fpwa-1' ) ) : ?>
            <!-- First sidebar -->
            <div>
                <?php dynamic_sidebar( 'fpwa-1' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'cuberta_front_page_welcome_show', $defaults['cuberta_front_page_welcome_show'] ) ) : ?>
            <!-- Welcome text -->
            <div id="front-text">
                <?php
                $id_page_welcome = get_theme_mod( 'cuberta_front_page_welcome', $defaults['cuberta_front_page_welcome'] );
                if ( $id_page_welcome > 0 ) :
                    $post      = get_post( $id_page_welcome );
                    $posttitle = esc_html( $post->post_title );
                    echo "<h2>$posttitle</h2>";
                    ?>
                    <div class="entry-content">
                        <?php
                        $content = $post->post_content;
                        $content = apply_filters( 'the_content', $content );
                        echo $content;
                        ?>
                    </div><!-- .entry-content -->
                    <?php else : ?>
                    <h2><?php _e( 'Welcome text', 'cuberta' ); ?></h2>
                    <div class="entry-summary clearfix">
                        <p>
                            <?php _e( "Cuberta is WordPress theme. Theme which fully uses entire width of the page, depending on the size of the screen. Site administrator can customize color scheme, headers fonts, replace front page items with widgets. Theme contains built-in main menu, social menu, front page.", 'cuberta' ); ?>
                        </p>
                    </div><!-- .entry-content -->
                <?php endif; ?>
            </div><!-- #front-text -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'fpwa-2' ) ) : ?>
            <!-- Second sidebar -->
            <div>
                <?php dynamic_sidebar( 'fpwa-2' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'cuberta_front_page_boxes_show', $defaults['cuberta_front_page_boxes_show'] ) ) : ?>
            <!-- Featered three boxes -->
            <div id="front-featured">
                <?php
                $titles_array = array( __( 'Color scheme', 'cuberta' ),
                    __( 'Headers fonts', 'cuberta' ),
                    __( 'Front page', 'cuberta' )
                );
                $bodies_array = array( __( 'Administrator can customize most of site elements colors.', 'cuberta' ),
                    __( 'Site administrator can select one of 30 fonts for displaying headers.', 'cuberta' ),
                    __( 'Any front page layout may be hidden and replaced by widget.', 'cuberta' )
                );
                $icons_array = array( 'entry-color', 'entry-fonts', 'entry-front-page' );
                ?>
                <div class="articles">

                    <?php for ( $i = 1; $i <= 3; $i++ ) { ?>
                        <?php $box = 'cuberta_front_page_box_' . $i; ?>
                        <article>
                            <?php $id_page = get_theme_mod( $box, $defaults[ $box ] ); ?>
                            <?php if ( $id_page > 0 ) : ?>
                                <?php $post = get_post( $id_page ); ?>
                                <header>
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <p>
                                            <a title="<?php echo $post->post_title; ?>" href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                    <h3><a href="<?php echo esc_url( get_permalink( $id_page ) ); ?>" rel="bookmark"><?php echo esc_html( $post->post_title ); ?></a></h3>
                                </header><!-- .entry-header -->
                                <div class="entry-summary clearfix">
                                    <?php echo cuberta_make_excerpt( $post->post_content ); ?>
                                </div><!-- .entry-content -->
                            <?php else : ?>
                                <header>
                                    <?php $j = $i-1; ?>
                                    <h3 class="entry-icon <?php echo $icons_array[ $j ]; ?>"><?php echo $titles_array[ $j ]; ?></h3>
                                </header>
                                <div class="entry-summary clearfix">
                                    <p><?php echo $bodies_array[ $j ]; ?><p>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php } ?>
                </div>
            </div><!-- #front-featured -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'fpwa-3' ) ) : ?>
            <!-- Third sidebar -->
            <div>
                <?php dynamic_sidebar( 'fpwa-3' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'cuberta_front_page_latest_show', $defaults['cuberta_front_page_latest_show'] ) ) : ?>
            <!-- Latest posts -->
            <div id="front-latest">
                <!--h2><?php _e( 'Latest posts', 'cuberta' ); ?></h2-->
                <?php
                if ( have_posts() ) :
                    //query_posts();
                    // Start the loop.
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );

                    // End the loop.
                    endwhile;

                // If no content, include the "No posts found" template.
                else :
                    get_template_part( 'content', 'none' );

                endif;
                ?>
            </div><!-- #front-latest -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'fpwa-4' ) ) : ?>
            <!-- Fourth sidebar -->
            <div>
                <?php dynamic_sidebar( 'fpwa-4' ); ?>
            </div>
            <!-- #Fourth sidebar -->
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>