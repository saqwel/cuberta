<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <?php 
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) == 1 ) {
            wp_enqueue_script( 'comment-reply' ); 
        }
        wp_head();
        global $cuberta_defaults;
        ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper-main">
            <?php
            $cuberta_menu_parameters = array( 
                'theme_location'  => 'primary',
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
            );
            if ( !empty( wp_nav_menu( $cuberta_menu_parameters ) ) ) {
                $cuberta_menu = true;
            } else {
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
                    <a href="/" class="home-button"><span><?php esc_html_e( 'Home', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php if ( !empty( wp_nav_menu( $cuberta_menu_parameters ) ) ) : ?>
                    <a href="javascript:void(0)" class="menu-button"><span><?php esc_html_e( 'Menu', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php if ( $cuberta_search ) : ?>
                    <a href="javascript:void(0)" class="search-button"><span><?php esc_html_e( 'Search', 'cuberta' ); ?></span></a>
                <?php endif; ?>
                <?php 
                if ( $cuberta_login ) : 
                    if ( is_user_logged_in() ) {
                        $cuberta_link  = wp_logout_url( filter_input( INPUT_SERVER, 'REQUEST_URI' ) );
                        $cuberta_class = "logout-button";
                        $cuberta_text  = __( "Logout", 'cuberta' );
                    } else {
                        $cuberta_link  = wp_login_url( filter_input( INPUT_SERVER, 'REQUEST_URI' ) );
                        $cuberta_class = "login-button";
                        $cuberta_text  = __( "Login", 'cuberta' );
                    }
                    ?>
                    <a href="<?php echo esc_url( $cuberta_link ); ?>" class="<?php echo esc_attr( $cuberta_class ); ?>"><span><?php echo esc_html( $cuberta_text ); ?></span></a>
                <?php 
                endif;
                // Place menu below buttons
                if ( !empty( wp_nav_menu( $cuberta_menu_parameters ) ) ) {
                    echo wp_nav_menu( $cuberta_menu_parameters );
                }
                if ( $cuberta_search ) : 
                    get_search_form();
                endif;
                ?>
            </div>
            
            <?php 
            endif;
            // Set post thumbnail if it is set
            if ( ( is_single() || is_page() ) && has_post_thumbnail() ) {
                $cuberta_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
                $cuberta_header_style = "background-image: url(" . esc_url( $cuberta_url ) . ");";
            } else {
                $cuberta_header_style = '';
            }
            ?>

            <header id="header-image" style="<?php echo esc_attr( $cuberta_header_style ); ?>">
                <?php if ( get_theme_mod( 'cuberta_site_identity', $cuberta_defaults['cuberta_site_identity'] ) ) { ?>
                    <?php // https://core.trac.wordpress.org/ticket/37305 ?>
                    <div id="header-text" itemscope itemtype="http://schema.org/Brand">
                    <?php 
                    $cuberta_logo_html_allow = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array(),
                            'class' => array(),
                            'rel' => array(),
                            'itemprop' => array()
                        ),
                        'img' => array(
                            'width' => array(),
                            'height' => array(),
                            'src' => array(),
                            'class' => array(),
                            'alt' => array(),
                            'itemprop' => array()
                        ),
                    );
                    echo wp_kses( get_custom_logo(), $cuberta_logo_html_allow ); 
                    ?>
                    <h2><a href="<?php echo esc_url( home_url() ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
                    <div class="more"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></div>
                    </div>
                <?php } ?>
            </header>