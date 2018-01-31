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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->
    <?php
    if ( !is_home() ) {
        if ( has_post_thumbnail() ) {
            $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
            echo "<style>#img {background: url($url) 50% 50%;}</style>";
        }
    }
    ?>
    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content();

        if ( is_single() ) {
            wp_link_pages( array(
                'before'      => '<div class="page-links"><h1 class="page-links-title">' . __( 'Pages:', 'cuberta' ) . '</h1>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '%',
                'separator'   => ' ',
            ) );
        }
        ?>
    </div><!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'cuberta' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
</article><!-- #post-## -->
