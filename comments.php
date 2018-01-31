<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage C`uberta
 * @since Cuberta 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php printf( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'Comments title', 'cuberta' ), number_format_i18n( get_comments_number() ) ); ?>
        </h2>

        <div class="comment-list">
            <?php
            wp_list_comments( array(
                'avatar_size' => 64,
                'walker'      => new cuberta_Walker_Comment,
                'callback'    => 'cuberta_format_comment',
            ) );
            ?>
        </div><!-- .comment-list -->

    <?php endif; // have_comments()  ?>

    <?php if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'cuberta' ); ?></p>
    <?php endif; ?>

    <div class="nav-links"><?php paginate_comments_links( array( 'prev_text' => '', 'next_text' => '' ) ); ?></div>

    <?php 

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    $fields = array(
        'author' =>
            '<p class="comment-form-author"><label for="author">' . __( 'Name', 'cuberta' ) .
            ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" ' . $aria_req . ' /></p>',

        'email' =>
            '<p class="comment-form-email"><label for="email">' . __( 'Email', 'cuberta' ) .
            ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
            '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
            '" ' . $aria_req . ' /></p>',

        'url' =>
            '<p class="comment-form-url"><label for="url">' . __( 'Website', 'cuberta' ) . '</label>' .
            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" /></p>',
    );
    comment_form( array( 'fields' => apply_filters( 'comment_form_default_fields', $fields ) ) );
    ?>

</div><!-- .comments-area -->
