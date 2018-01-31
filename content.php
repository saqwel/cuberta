<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Cuberta
 * @since Cuberta 1.0
 */
// Get datetime
$datetime = get_the_date( 'Y-m-d' ) . 'T';
$datetime .= get_the_time( 'H-i-s' );
$d        = get_the_date( "d" );
$m        = get_the_date( "M" );
$y        = get_the_date( "Y" );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_front_page() ) { ?>
        <header class="entry-header">
            <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        </header><!-- .entry-header -->
        <div class="entry-meta">
            <?php cuberta_entry_meta_less(); ?>
        </div>
        <div class="entry-image">
            <p>
                <a title="<?php esc_attr( the_title() ); ?>" href="<?php esc_url( the_permalink() ); ?>">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </a>
            </p>
        </div>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
        <?php } else { ?>
        <header class="entry-header">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
            ?>
        </header><!-- .entry-header -->
        <div class="entry-meta">
            <?php cuberta_entry_meta(); ?>
        </div>
        <div class="entry-content">
            <?php

            if ( is_single() ) {
                the_content();
                /* translators: %s: Name of current post */
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><h3 class="page-links-title">' . __( 'Pages:', 'cuberta' ) . '</h3>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '%',
                    'separator'   => ' ',
                ) );
            } else {
                the_excerpt();
            }
            ?>
        </div><!-- .entry-content -->

        <?php
        // Author bio.
        if ( is_single() && get_the_author_meta( 'description' ) ) :
            get_template_part( 'author-bio' );
        endif;
        ?>

        <footer class="entry-footer">
            <?php edit_post_link( __( 'Edit', 'cuberta' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-footer -->
    <?php } ?>

</article><!-- #post-## -->
