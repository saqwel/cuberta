<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Cuberta
 * @since Cuberta 1.0
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'cuberta' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p>
                <?php
                /* translators: Link to post-new.php */
                printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cuberta' ), esc_url( admin_url( 'post-new.php' ) ) ) );
                ?>
            </p><br>

        <?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cuberta' ); ?></p><br>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cuberta' ); ?></p><br>
            <?php get_search_form(); ?>

        <?php endif; ?>

    </div><!-- .page-content -->
</section><!-- .no-results -->
