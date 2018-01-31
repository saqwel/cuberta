<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <?php 
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) == 1 ) {
        //if ( is_singular() ) { 
            wp_enqueue_script( 'comment-reply' ); 
        }
        wp_head();
        global $cuberta_defaults;
        ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper-main">
            <?php
            $cuberta_menu = wp_nav_menu( array( 'theme_location'  => 'primary',
                'container'       => 'nav',
                'container_class' => 'main-menu',
                'container_id'    => '',
                'menu_class'      => 'main-menu',
                'menu_id'         => '',
                'echo'            => false,
                'fallback_cb'     => '__return_false',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul>%3$s</ul>',
                'depth'           => 0,
                'walker'          => '' 
            ) );
            if ( empty( $cuberta_menu ) ) {
                $cuberta_menu = false;
            }
            if ( get_theme_mod( 'cuberta_menu_home_button', $cuberta_defaults['cuberta_menu_home_button'] ) ) {
                $cuberta_home = true;
            } else {
                $cuberta_home = false;
            }
            if ( get_theme_mod( 'cuberta_menu_search_button', $cuberta_defaults['cuberta_menu_search_button'] ) ) {
                $cuberta_search = true;
            } else {
                $cuberta_search = false;
            }
            if ( get_theme_mod( 'cuberta_menu_login_button', $cuberta_defaults['cuberta_menu_login_button'] ) ) {
                $cuberta_login = true;
            } else {
                $cuberta_login = false;
            }
            if ( $cuberta_home || $cuberta_menu || $cuberta_search || $cuberta_login ) :
            ?>
            <div class="cuberta-menu">
                <?php if ( $cuberta_home ) : ?>
                    <a href="/" class="home-button"><span><?php _e( 'Home', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php if ( !empty( $cuberta_menu ) ) : ?>
                    <a href="javascript:void(0)" class="menu-button"><span><?php _e( 'Menu', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php if ( $cuberta_search ) : ?>
                    <a href="javascript:void(0)" class="search-button"><span><?php _e( 'Search', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php 
                if ( $cuberta_login ) : 
                    if ( is_user_logged_in() ) {
                        $cuberta_link  = wp_logout_url( $_SERVER['REQUEST_URI'] );
                        $cuberta_class = "logout-button";
                        $cuberta_text  = __( "Logout", 'cuberta' );
                    } else {
                        $cuberta_link  = wp_login_url( $_SERVER['REQUEST_URI'] );
                        $cuberta_class = "login-button";
                        $cuberta_text  = __( "Login", 'cuberta' );
                    }
                    ?>
                    <a href="<?php echo $cuberta_link; ?>" class="<?php echo $cuberta_class; ?>"><span><?php echo $cuberta_text; ?></span></a>
                <?php 
                endif;
                echo $cuberta_menu;
                if ( $cuberta_search ) : 
                    get_search_form();
                endif;
                ?>
            </div>
            
            <?php 
            endif;
            
            if ( get_theme_mod( 'cuberta_site_identity', $cuberta_defaults['cuberta_site_identity'] ) ) {
                // https://core.trac.wordpress.org/ticket/37305
                $cuberta_site_identity  = '<div id="header-text" itemscope itemtype="http://schema.org/Brand">';
                $cuberta_site_identity .= get_custom_logo();
                $cuberta_site_identity .= '<h2><a href="' . home_url() . '">'. get_bloginfo( 'name' ) . '</a></h2>';
                $cuberta_site_identity .= '<div class="more">' . get_bloginfo( 'description' ) . '</div>';
                $cuberta_site_identity .= '</div>'; 
            } else {
                $cuberta_site_identity = '';
            }
            
            $cuberta_header_image = '<header id="header-image">' . $cuberta_site_identity . '</header>';
            if ( is_single() || is_page() ) {
                if ( has_post_thumbnail() ) {
                    $cuberta_url = wp_get_attachment_url( get_post_thumbnail_id( $cuberta_post->ID ), 'post-thumbnail' );
                    $cuberta_header_image = '<header id="header-image" style="background: url(' . $ucuberta_rl . ') 50% 50%;">' . $cuberta_site_identity . '</header>';
                }
            }
            echo $cuberta_header_image;

        ?>