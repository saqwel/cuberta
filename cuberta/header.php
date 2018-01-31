<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        if ( is_single() ) {
            $post = get_post( get_the_ID() );
            if ( strlen( $post->post_excerpt ) > 1 ) {
                $description = $post->post_excerpt;
            } else {
                $description = $post->post_title;
            }
        } elseif ( is_page() ) {
            $post = get_post( get_the_ID() );
            $description = cuberta_make_excerpt( $post->post_content );
        } else {
            $description = get_bloginfo( 'name' );
            $description += " - ";
            $description += get_bloginfo( 'description' );
        }
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="<?php echo $description; ?>">
        <?php 
        if ( is_singular() ) { 
            wp_enqueue_script( 'comment-reply' ); 
        }
        wp_head();
        global $defaults;
        ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper-main">
            <?php
            $menu = wp_nav_menu( array( 'theme_location'  => 'primary',
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
            if ( empty( $menu ) ) {
                $menu = false;
            }
            if ( get_theme_mod( 'cuberta_menu_home_button', $defaults['cuberta_menu_home_button'] ) ) {
                $home = true;
            } else {
                $home = false;
            }
            if ( get_theme_mod( 'cuberta_menu_search_button', $defaults['cuberta_menu_search_button'] ) ) {
                $search = true;
            } else {
                $search = false;
            }
            if ( get_theme_mod( 'cuberta_menu_login_button', $defaults['cuberta_menu_login_button'] ) ) {
                $login = true;
            } else {
                $login = false;
            }
            if ( $home || $menu || $search || $login ) :
            ?>
            <div class="cuberta-menu">
                <?php if ( $home ) : ?>
                    <a href="/" class="home-button"><span><?php _e( 'Home', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php if ( !empty( $menu ) ) : ?>
                    <a href="javascript:void(0)" class="menu-button"><span><?php _e( 'Menu', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php if ( $search ) : ?>
                    <a href="javascript:void(0)" class="search-button"><span><?php _e( 'Search', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php 
                if ( $login ) : 
                    if ( is_user_logged_in() ) {
                        $link  = wp_logout_url( $_SERVER['REQUEST_URI'] );
                        $class = "logout-button";
                        $text  = __( "Logout", 'cuberta' );
                    } else {
                        $link  = wp_login_url( $_SERVER['REQUEST_URI'] );
                        $class = "login-button";
                        $text  = __( "Login", 'cuberta' );
                    }
                    ?>
                    <a href="<?php echo $link; ?>" class="<?php echo $class; ?>"><span><?php echo $text; ?></span></a>
                <?php 
                endif;
                echo $menu;
                if ( $search ) : 
                    get_search_form();
                endif;
                ?>
            </div>
            
            <?php 
            endif;
            
            if ( get_theme_mod( 'cuberta_site_identity', $defaults['cuberta_site_identity'] ) ) {
                // https://core.trac.wordpress.org/ticket/37305
                $site_identity  = '<div id="header-text" itemscope itemtype="http://schema.org/Brand">';
                $site_identity .= get_custom_logo();
                $site_identity .= '<h2><a href="' . home_url() . '">'. get_bloginfo( 'name' ) . '</a></h2>';
                $site_identity .= '<div class="more">' . get_bloginfo( 'description' ) . '</div>';
                $site_identity .= '</div>'; 
            } else {
                $site_identity = '';
            }
            
            $header_image = '<header id="header-image">' . $site_identity . '</header>';
            if ( is_single() || is_page() ) {
                if ( has_post_thumbnail() ) {
                    $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
                    $header_image = '<header id="header-image" style="background: url(' . $url . ') 50% 50%;">' . $site_identity . '</header>';
                }
            }
            echo $header_image;

        ?>