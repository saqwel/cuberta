<?php

// This is required, but do not used
if ( ! isset( $content_width ) ) {
    $content_width = 900;
}

if ( !function_exists( 'cuberta_theme_setup' ) ) :

    function cuberta_theme_setup() {
        load_theme_textdomain( 'cuberta', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array(
            'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        // Add theme support for Custom Logo.
        add_theme_support( 'custom-logo', array(
                'width'       => 100,
                'height'      => 100,
                'flex-width'  => true,
        ) );
        
        // https://core.trac.wordpress.org/ticket/42804
        
        // Post thumbnails settings
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 300, 300 );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'cuberta' ),
        ) );

        // Header image
        $args = array( 
            'default-image' => get_template_directory_uri() . '/images/cuberta-default.jpg',
            'header-text'   => false 
        );
        add_theme_support( 'custom-header', $args );
        register_default_headers( array(
            'default-image' => array(
                'url'           => get_template_directory_uri() . '/images/cuberta-default.jpg',
                'thumbnail_url' => get_template_directory_uri() . '/images/cuberta-default.jpg',
                'description'   => __( 'Default Header Image', 'cuberta' )
            ),
        ) );
    }

endif; // cuberta_theme_setup
add_action( 'after_setup_theme', 'cuberta_theme_setup' );

/**
 * Registers an editor stylesheet for the theme.
 */
function cuberta_add_editor_styles() {
    add_editor_style( 'cuberta-editor-style.css' );
}
add_action( 'admin_init', 'cuberta_add_editor_styles' );

function cuberta_header_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'cuberta' ),
        'id'            => 'cuberta-sidebar-1',
        'description'   => __( 'This widget area is placed in the footer.', 'cuberta' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        /* translators: %s is a serial number of a widget area */
        'name'          => sprintf( __( 'Front Page Widget Area %s', 'cuberta' ), '1' ),
        'id'            => 'cuberta-fpwa-1',
        'description'   => __( 'This widget area is the highest front page widget area.', 'cuberta' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        /* translators: %s is a serial number of a widget area */
        'name'          => sprintf( __( 'Front Page Widget Area %s', 'cuberta' ), '2' ),
        'id'            => 'cuberta-fpwa-2',
        'description'   => __( 'This widget is between Welcome text and Three boxes area.', 'cuberta' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        /* translators: %s is a serial number of a widget area */
        'name'          => sprintf( __( 'Front Page Widget Area %s', 'cuberta' ), '3' ),
        'id'            => 'cuberta-fpwa-3',
        'description'   => __( 'This widget area is between Three boxes area and Latest posts area.', 'cuberta' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        /* translators: %s is a serial number of a widget area */
        'name'          => sprintf( __( 'Front Page Widget Area %s', 'cuberta' ), '4' ),
        'id'            => 'cuberta-fpwa-4',
        'description'   => __( 'This widget area is a last widget area of the front page.', 'cuberta' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'cuberta_header_sidebar' );

// Scripts and stylesheets
function cuberta_page_builder() {
    wp_enqueue_script(
    'cuberta-menu', get_template_directory_uri() . '/js/cuberta-menu.js', array( 'jquery' )
    );
    wp_enqueue_script(
    'cuberta-page-builder', get_template_directory_uri() . '/js/cuberta-page-builder.js', array( 'jquery' )
    );
    wp_enqueue_style( 'cuberta-google-fonts', 'https://fonts.googleapis.com/css?family=Alegreya+SC|Amatic+SC|Anonymous+Pro|Bad+Script|Comfortaa|Cormorant+Garamond|Cormorant+Infant|Exo+2|Gabriela|Jura|Kelly+Slab|Kurale|Lobster|Lora|Montserrat+Alternates|Neucha|PT+Mono|Pangolin|Pattaya|Playfair+Display+SC|Poiret+One|Roboto|Ruslan+Display|Russo+One|Seymour+One|Stalinist+One|Ubuntu|Underdog|Vollkorn|Yanone+Kaffeesatz&amp;subset=cyrillic', false ); 
    wp_enqueue_style( 'cuberta-fontawesome-fonts', get_template_directory_uri() . '/css/cuberta-font-awesome.min.css', false ); 
    wp_enqueue_style( 'cuberta-main-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'cuberta_page_builder' );

// Sanitize checkbox
function cuberta_sanitize_checkbox( $value ) {
    if ( $value === true || $value === false ) {
        return $value;
    } else {
        return false;
    }
}

// Fake sanitize
function cuberta_sanitize_callback( $value ) {
    return $value;
}

// Sanitize integers
function cuberta_sanitize_integer( $value ) {
    if ( preg_match( "/[0-9]+/", $value ) ) {
        return $value;
    } else {
        return false;
    }
}

// Set default settings
$cuberta_defaults = array(
    'cuberta_site_identity'             => true,
    'cuberta_all_headers_color'         => '#c00',
    'cuberta_footer_color'              => '#fff',
    'cuberta_footer_background'         => '#666',
    'cuberta_footer_headers_color'      => '#fff',
    'cuberta_links_color'               => '#000',
    'cuberta_menu_color'                => '',
    'cuberta_menu_background'           => '',
    'cuberta_meta_links_color'          => '#000',
    'cuberta_meta_text_color'           => '#666',
    'cuberta_site_header_color'         => '#fff',
    'cuberta_site_description_color'    => '#fff',
    'cuberta_all_headers_font'          => '',
    'cuberta_site_header_font'          => '',
    'cuberta_front_page_welcome'        => '',
    'cuberta_front_page_welcome_show'   => false,
    'cuberta_front_page_boxes_show'     => false,
    'cuberta_front_page_latest_show'    => true,
    'cuberta_front_page_box_1'          => '',
    'cuberta_front_page_box_2'          => '',
    'cuberta_front_page_box_3'          => '',
    'cuberta_menu_home_button'          => false,
    'cuberta_menu_bars_button'          => true,
    'cuberta_menu_search_button'        => false,
    'cuberta_menu_login_button'         => false
);

// Create filter
function cuberta_get_settings_defaults() {
    global $cuberta_defaults;
    return apply_filters( 'cuberta_settings_defaults', $cuberta_defaults );
}

// Cuberta settings
function cuberta_customize_register( $wp_customize ) {
    global $cuberta_defaults;
    // Display or not site identity
    $wp_customize->add_setting( 'cuberta_site_identity', array(
        'default'           => $cuberta_defaults['cuberta_site_identity'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_site_identity', array(
        'label'       => __( 'Display site identity', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'title_tagline',
        'settings'    => 'cuberta_site_identity',
    )
    )
    );

    // Colors
    // All headers color
    $wp_customize->add_setting( 'cuberta_all_headers_color', array(
        'default'           => $cuberta_defaults['cuberta_all_headers_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_all_headers_color', array(
        'label'    => __( 'All Headers Color', 'cuberta' ),
        'description' => __( 'This color applies for all headers', 'cuberta' ),
        'section'  => 'colors',
        'settings' => 'cuberta_all_headers_color',
    )
    )
    );
    // All Links Color
    $wp_customize->add_setting( 'cuberta_links_color', array(
        'default'           => $cuberta_defaults['cuberta_links_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_links_color', array(
        'label'       => __( 'All Links Color', 'cuberta' ),
        'description' => __( 'This color applies for all links', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_links_color',
    )
    )
    );
    
    // Footer Background Color
    $wp_customize->add_setting( 'cuberta_footer_background', array(
        'default'           => $cuberta_defaults['cuberta_footer_background'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_footer_background', array(
        'label'       => __( 'Footer Background Color', 'cuberta' ),
        'description' => __( 'This color applies for footer background', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_footer_background',
    )
    )
    );
    // Footer Font Color
    $wp_customize->add_setting( 'cuberta_footer_color', array(
        'default'           => $cuberta_defaults['cuberta_footer_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_footer_color', array(
        'label'       => __( 'Footer Font Color', 'cuberta' ),
        'description' => __( 'This color applies for footer text and links', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_footer_color',
    )
    )
    );
    // Footer Headers Color
    $wp_customize->add_setting( 'cuberta_footer_headers_color', array(
        'default'           => $cuberta_defaults['cuberta_footer_headers_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_footer_headers_color', array(
        'label'       => __( 'Footer Headers Color', 'cuberta' ),
        'description' => __( 'This color applies for footer headers', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_footer_headers_color',
    )
    )
    );
    // Menu Background Color
    $wp_customize->add_setting( 'cuberta_menu_background', array(
        'default'           => $cuberta_defaults['cuberta_menu_background'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_menu_background', array(
        'label'       => __( 'Menu Background Color', 'cuberta' ),
        'description' => __( 'This color applies for menu background', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_menu_background',
    )
    )
    );
    // Menu Font color
    $wp_customize->add_setting( 'cuberta_menu_color', array(
        'default'           => $cuberta_defaults['cuberta_menu_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_menu_color', array(
        'label'       => __( 'Menu Links Color', 'cuberta' ),
        'description' => __( 'This color applies for menu links and sidebar links', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_menu_color',
    )
    )
    );
    // Meta Links Color
    $wp_customize->add_setting( 'cuberta_meta_links_color', array(
        'default'           => $cuberta_defaults['cuberta_meta_links_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_meta_links_color', array(
        'label'       => __( 'Meta Links Color', 'cuberta' ),
        'description' => __( 'This color applies for links under article header (meta data)', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_meta_links_color',
    )
    )
    );
    // Meta Text Color
    $wp_customize->add_setting( 'cuberta_meta_text_color', array(
        'default'           => $cuberta_defaults['cuberta_meta_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_meta_text_color', array(
        'label'       => __( 'Meta Text Color', 'cuberta' ),
        'description' => __( 'This color applies for text under article header (meta data)', 'cuberta' ),
        'section'     => 'colors',
        'settings'    => 'cuberta_meta_text_color',
    )
    )
    );
    // Site title color
    $wp_customize->add_setting( 'cuberta_site_header_color', array(
        'default'           => $cuberta_defaults['cuberta_site_header_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_site_header_color', array(
        'label'    => __( 'Site Header Color', 'cuberta' ),
        'description' => __( 'This color applies for main site title', 'cuberta' ),
        'section'  => 'colors',
        'settings' => 'cuberta_site_header_color',
    )
    )
    );
    // Site description color
    $wp_customize->add_setting( 'cuberta_site_description_color', array(
        'default'           => $cuberta_defaults['cuberta_site_description_color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Color_Control(
    $wp_customize, 'cuberta_site_description_color', array(
        'label'    => __( 'Site Description Color', 'cuberta' ),
        'description' => __( 'This color applies for site description', 'cuberta' ),
        'section'  => 'colors',
        'settings' => 'cuberta_site_description_color',
    )
    )
    );

    // Fonts
    $cuberta_fonts_array = array(
        'Alegreya SC'           => 'Alegreya SC',
        'Amatic SC'             => 'Amatic SC',
        'Anonymous Pro'         => 'Anonymous Pro',
        'Bad Script'            => 'Bad Script',
        'Comfortaa'             => 'Comfortaa',
        'Cormorant Garamond'    => 'Cormorant Garamond',
        'Cormorant Infant'      => 'Cormorant Infant',
        'Exo 2'                 => 'Exo 2',
        'Gabriela'              => 'Gabriela',
        'Jura'                  => 'Jura',
        'Kelly Slab'            => 'Kelly Slab',
        'Kurale'                => 'Kurale',
        'Lobster'               => 'Lobster',
        'Lora'                  => 'Lora',
        'Montserrat Alternates' => 'Montserrat Alternates',
        'Neucha'                => 'Neucha',
        'PT Mono'               => 'PT Mono',
        'Pangolin'              => 'Pangolin',
        'Pattaya'               => 'Pattaya',
        'Playfair Display SC'   => 'Playfair Display SC',
        'Poiret One'            => 'Poiret One',
        'Roboto'                => 'Roboto',
        'Ruslan Display'        => 'Ruslan Display',
        'Russo One'             => 'Russo One',
        'Seymour One'           => 'Seymour One',
        'Stalinist One'         => 'Stalinist One',
        'Ubuntu'                => 'Ubuntu',
        'Underdog'              => 'Underdog',
        'Vollkorn'              => 'Vollkorn',
        'Yanone Kaffeesatz'     => 'Yanone Kaffeesatz'
    );
    $wp_customize->add_setting( 'cuberta_site_header_font', array(
        'default'           => $cuberta_defaults['cuberta_site_header_font'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_section( 'cuberta_site_header_font_section', array(
        'title'    => 'Cuberta. ' . __( 'Headers fonts', 'cuberta' ),
        'priority' => 75,
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_site_header_font', array(
        'label'    => __( 'Choose font for site header', 'cuberta' ),
        'section'  => 'cuberta_site_header_font_section',
        'settings' => 'cuberta_site_header_font',
        'type'     => 'select',
        'choices'  => $cuberta_fonts_array
    )
    )
    );
    $wp_customize->add_setting( 'cuberta_all_headers_font', array(
        'default'           => $cuberta_defaults['cuberta_all_headers_font'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_all_headers_font', array(
        'label'    => __( 'Choose font for all headers', 'cuberta' ),
        'section'  => 'cuberta_site_header_font_section',
        'settings' => 'cuberta_all_headers_font',
        'type'     => 'select',
        'choices'  => $cuberta_fonts_array
    )
    )
    );

    // Welcome text
    $wp_customize->add_section( 'cuberta_front_page_section', array(
        'title'    => 'Cuberta. ' . __( 'Front page', 'cuberta' ),
        'priority' => 71,
    ) );
    // Show/hide welcome text
    $wp_customize->add_setting( 'cuberta_front_page_welcome_show', array(
        'default'           => $cuberta_defaults['cuberta_front_page_welcome_show'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox',
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_front_page_welcome_show', array(
        'label'       => __( 'Display Welcome Text', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'cuberta_front_page_section',
        'settings'    => 'cuberta_front_page_welcome_show',
    )
    )
    );
    // Set page instead of welcome text
    $wp_customize->add_setting( 'cuberta_front_page_welcome', array(
        'default'           => $cuberta_defaults['cuberta_front_page_welcome'],
        'sanitize_callback' => 'cuberta_sanitize_integer',
    ) );
    $wp_customize->add_control( 'cuberta_front_page_welcome_control', array(
        'label'         => __( 'Front page welcome text', 'cuberta' ),
        'section'       => 'cuberta_front_page_section',
        'type'          => 'dropdown-pages',
        'settings'      => 'cuberta_front_page_welcome',
    ) );
    
    // Show/hide welcome boxes
    $wp_customize->add_setting( 'cuberta_front_page_boxes_show', array(
        'default'           => $cuberta_defaults['cuberta_front_page_boxes_show'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox',
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_front_page_boxes_show', array(
        'label'       => __( 'Display Three boxes', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'cuberta_front_page_section',
        'settings'    => 'cuberta_front_page_boxes_show',
    )
    )
    );
    
    // Set pages for each box
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( 'cuberta_front_page_box_' . $i, array(
            'default'           => $cuberta_defaults['cuberta_front_page_box_' . $i ],
            'sanitize_callback' => 'cuberta_sanitize_integer',
        ) );
        $wp_customize->add_control( 'cuberta_front_page_box_control_' . $i, array(
            /* translators: %d is a serial number of front page box */
            'label'    => sprintf( __( 'Front page box %d', 'cuberta' ), $i ),
            'section'  => 'cuberta_front_page_section',
            'type'     => 'dropdown-pages',
            'settings' => 'cuberta_front_page_box_' . $i,
        ) );
    }
    
    // Show/hide welcome boxes
    $wp_customize->add_setting( 'cuberta_front_page_latest_show', array(
        'default'           => $cuberta_defaults['cuberta_front_page_latest_show'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox',
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_front_page_latest_show', array(
        'label'       => __( 'Display Latest Posts', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'cuberta_front_page_section',
        'settings'    => 'cuberta_front_page_latest_show',
    )
    )
    );

    $sentence_1 = __( 'You can set four buttons in the header of Cuberta theme.', 'cuberta' );
    $sentence_2 = __( 'You have to assign some menu to Primary menu area to display Main menu button in the header. You can set other buttons visibility with checkboxes below.', 'cuberta' );
    $home   = __( 'Home', 'cuberta' );
    $menu   = __( 'Main menu', 'cuberta' );
    $search = __( 'Search', 'cuberta' );
    $login  = __( 'Login', 'cuberta' );
    $description = "<p>$sentence_1</p> <ul><li>$home</li><li>$menu</li><li>$search</li><li>$login</li></ul> <p>$sentence_2<p>";
    // Menu settings
    $wp_customize->add_section( 'cuberta_menu_settings_section', array(
        'title'    => 'Cuberta. ' . __( 'Header settings', 'cuberta' ),
        'description' => $description,
        'priority' => 73,
    ) );
    // Display Home Button
    $wp_customize->add_setting( 'cuberta_menu_home_button', array(
        'default'           => $cuberta_defaults['cuberta_menu_home_button'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox',
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_menu_home_button', array(
        'label'       => __( 'Display Home Button', 'cuberta' ),
        'description' => __( 'This is home icon in the header of theme', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'cuberta_menu_settings_section',
        'settings'    => 'cuberta_menu_home_button',
    )
    )
    );
    // Display Search Button
    $wp_customize->add_setting( 'cuberta_menu_search_button', array(
        'default'           => $cuberta_defaults['cuberta_menu_search_button'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_menu_search_button', array(
        'label'       => __( 'Display Search Button', 'cuberta' ),
        'description' => __( 'This is search icon in the header of theme', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'cuberta_menu_settings_section',
        'settings'    => 'cuberta_menu_search_button',
    )
    )
    );
    // Display Login Button
    $wp_customize->add_setting( 'cuberta_menu_login_button', array(
        'default'           => $cuberta_defaults['cuberta_menu_login_button'],
        'sanitize_callback' => 'cuberta_sanitize_checkbox'
    ) );
    $wp_customize->add_control(
    new WP_Customize_Control(
    $wp_customize, 'cuberta_menu_login_button', array(
        'label'       => __( 'Display Login Button', 'cuberta' ),
        'description' => __( 'This is login icon in the header of theme', 'cuberta' ),
        'type'        => 'checkbox',
        'section'     => 'cuberta_menu_settings_section',
        'settings'    => 'cuberta_menu_login_button',
    )
    )
    );
}

add_action( 'customize_register', 'cuberta_customize_register' );

// Styles from admin panel
function cuberta_customize_css() {
    global $cuberta_defaults;
    ?>
    <style type="text/css">
        #header-text h1 a,
        #header-text h2 a,
        #header-text h3 a,
        #header-text h4 a,
        #header-text h5 a,
        #header-text h6 a {
            <?php
            $font_family = get_theme_mod( 'cuberta_site_header_font', $cuberta_defaults['cuberta_site_header_font'] );
            if ( '' !== $font_family ) {
                echo 'font-family: "' . esc_html( $font_family ) . '";';
            }
            ?>
            color: <?php echo esc_html( get_theme_mod( 'cuberta_site_header_color', $cuberta_defaults['cuberta_site_header_color'] ) ); ?>;
        }

        .more {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_site_description_color', $cuberta_defaults['cuberta_site_description_color'] ) ); ?>;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6, 
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a {
            <?php
            $font_family = get_theme_mod( 'cuberta_all_headers_font', $cuberta_defaults['cuberta_all_headers_font'] );
            if ( '' !== $font_family ) {
                echo 'font-family: "' . esc_html( $font_family ) . '";';
            }
            ?>
            color: <?php echo esc_html( get_theme_mod( 'cuberta_all_headers_color', $cuberta_defaults['cuberta_all_headers_color'] ) ); ?>;
        }

        .cuberta-menu .search-submit,
        .cuberta-menu a::after,
        .cuberta-menu li::after,
        .main-menu li::after,
        .main-menu a {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_menu_color', $cuberta_defaults['cuberta_menu_color'] ) ); ?>;
        }

        .footer-item div,
        .footer-item div li,
        .footer-item div a,
        .footer-item div span,
        .footer-item div .search-submit {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_footer_color', $cuberta_defaults['cuberta_footer_color'] ) ); ?>;
        }
        
        .footer-item h1,
        .footer-item h2,
        .footer-item h3,
        .footer-item h4,
        .footer-item h5,
        .footer-item h6 {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_footer_headers_color', $cuberta_defaults['cuberta_footer_headers_color'] ) ); ?>;
        }
        
        .entry-meta div {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_meta_text_color', $cuberta_defaults['cuberta_meta_text_color'] ) ); ?>;
        }
        
        .entry-meta a,
        .entry-meta time {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_meta_links_color', $cuberta_defaults['cuberta_meta_links_color'] )); ?>;
        }

        a {
            color: <?php echo esc_html( get_theme_mod( 'cuberta_links_color', $cuberta_defaults['cuberta_links_color'] ) ); ?>;
        }

        .cuberta-menu {
            background-color: <?php echo esc_html( get_theme_mod( 'cuberta_menu_background', $cuberta_defaults['cuberta_menu_background'] ) ); ?>;
        }

        .footer-item {
            background-color: <?php echo esc_html( get_theme_mod( 'cuberta_footer_background', $cuberta_defaults['cuberta_footer_background'] ) ); ?> ;
        }
        
        #header-image {
            background-image: url(<?php echo esc_url( get_header_image() ); ?>);
            background-color: #f0ead6;
        }
    </style>
    <?php
}

add_action( 'wp_head', 'cuberta_customize_css' );

// Comments callback function
function cuberta_format_comment( $comment, $args, $depth ) {

    ?>

    <div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        <div class="comment-meta">
            <?php $avatar = get_avatar( $comment, $args['avatar_size'] ); ?>
            <?php if ( 0!=strlen( $avatar ) ) : ?>
            <div class="comment-meta-avatar">
                <?php 
                $cuberta_avatar_html_allow = array(
                    'img' => array(
                        'width' => array(),
                        'height' => array(),
                        'src' => array(),
                        'class' => array(),
                        'alt' => array(),
                        'srcset' => array()
                    ),
                );
                echo wp_kses( $avatar, $cuberta_avatar_html_allow );
                ?>
            </div>
            <?php endif; ?>
            <div class="comment-meta-text">
                <div class="comment-meta-author"><?php printf( '%s', get_comment_author_link() ); ?></div>
                <time class="comment-meta-datetime" datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date() . " " . get_comment_time(); ?></time>
            </div>
        </div>

        <?php if ( $comment->comment_approved == '0' ) : ?>
            <div><?php esc_html_e( 'Your comment is awaiting moderation.', 'cuberta' ); ?></div>
        <?php endif; ?>

        <?php comment_text(); ?>

        <div class="reply">
            <?php 
            comment_reply_link( array_merge( $args, array( 
                'depth' => $depth, 
                'max_depth' => $args['max_depth']
            ) ) );
            ?>
        </div>
    </div>

    <?php
}

// Change comments layout
class Cuberta_Walker_Comment extends Walker_Comment {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // do nothing.
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        // do nothing.
    }

    function end_el( &$output, $comment, $depth = 0, $args = array() ) {
        // do nothing, and no </li> will be created
    }

}

// More link
function cuberta_modify_read_more_link() {
    $link = esc_url( get_permalink() );
	if ( is_admin() ) {
		return $link;
    }
    
    $read = __( 'Read', 'cuberta' );
    return "<p class='more-link-button'><a class='more-link' href='$link'>$read</a></p>";
}

add_filter( 'the_content_more_link', 'cuberta_modify_read_more_link' );
add_filter( 'excerpt_more', 'cuberta_modify_read_more_link' );


// Display meta
if ( !function_exists( 'cuberta_entry_meta' ) ) :

    function cuberta_entry_meta() {
        if ( is_sticky() && is_home() && !is_paged() ) {
            printf( '<div class="featured">%s</div> ', esc_html__( 'Featured', 'cuberta' ) );
        }

        $format = get_post_format();
        if ( current_theme_supports( 'post-formats', $format ) ) {
            printf( '<div class="entry-format">%1$s: <a href="%2$s">%3$s</a></div>', sprintf( '<span>%s </span>', esc_html( _x( 'Format', 'Used before post format.', 'cuberta' ) ) ), esc_url( get_post_format_link( $format ) ), esc_html( get_post_format_string( $format ) )
            );
        }

        if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
            
            $time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';

            $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), get_the_date()
            );

            printf( '<div class="posted-on"><label>%1$s: </label><span class="icon"><a href="%2$s">%3$s</a></span></div> ', esc_html( _x( 'Posted on', 'Used before publish date.', 'cuberta' ) ), esc_url( get_permalink() ), wp_kses( $time_string, 'post' )
            );
        }

        if ( 'post' == get_post_type() ) {
            if ( is_singular() || is_multi_author() ) {
                printf( '<div class="author"><label>%1$s: </label><span class="icon"> <a href="%2$s">%3$s</a></span></div> ', esc_html( _x( 'Author', 'Used before post author name.', 'cuberta' ) ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() 
                );
            }

            $categories_list = get_the_category_list( ', ' );
            if ( $categories_list && cuberta_categorized_blog() ) {
                printf( '<div class="cat-links"><label>%1$s: </label><span class="icon">%2$s</span></div> ', esc_html( _x( 'Categories', 'Used before category names.', 'cuberta' ) ), wp_kses( $categories_list, 'post' )
                );
            }

            $tags_list = get_the_tag_list( '', ', ' );
            if ( $tags_list ) {
                printf( '<div class="tags-links"><label>%1$s: </label><span class="icon">%2$s</span></div>', esc_html( _x( 'Tags', 'Used before tag names.', 'cuberta' ) ), wp_kses( $tags_list, 'post' )
                );
            }
        }
    }

endif;


// Display less meta for front page columns
if ( !function_exists( 'cuberta_entry_meta_less' ) ) :

    function cuberta_entry_meta_less() {
        if ( is_sticky() && is_home() && !is_paged() ) {
            printf( '<div class="featured">%s</div> ', esc_html__( 'Featured', 'cuberta' ) );
            $separator = "";
        } else {
            $separator = "";
        }

        if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
            
            $time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';

            $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), get_the_date()
            );

            printf( '<div class="posted-on"><label>%1$s: </label><span class="icon"><a href="%2$s">%3$s</a></span></div> ', esc_html( _x( 'Posted on', 'Used before publish date.', 'cuberta' ) ), esc_url( get_permalink() ), wp_kses( $time_string, 'post' )
            );
            $separator = "";
        } else {
            $separator = "";
        }

        if ( 'post' == get_post_type() ) {

            $categories_list = get_the_category_list( ', ' );
            if ( $categories_list && cuberta_categorized_blog() ) {
                printf( '<div class="cat-links"><label>%1$s: </label><span class="icon">%2$s</span></div> ', esc_html( _x( 'Categories', 'Used before category names.', 'cuberta' ) ), wp_kses( $categories_list, 'post' )
                );
            }
        }
    }

endif;

// One or more categories attached to post
function cuberta_categorized_blog() {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
        'fields'     => 'ids',
        'hide_empty' => 1,
        // We only need to know if there is more than one category.
        'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so cuberta_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so cuberta_categorized_blog should return false.
        return false;
    }
}

// Change categories count design
function cuberta_add_span_cat_count( $links ) {
    $links = str_replace( '</a> (', ' (', $links );
    $links = str_replace( ')', ')</a>', $links );
    return $links;
}

add_filter( 'wp_list_categories', 'cuberta_add_span_cat_count' );

// Make custom excerpts for three boxes on front page
function cuberta_make_excerpt( $text, $excerpt_length ) {
    $excerpt_string = '';
    $array = str_word_count( strip_tags( $text ), 1 );
    if ( count( $array ) > $excerpt_length ) {
        for ( $i = 0; $i < $excerpt_length; $i++ ) {
            $excerpt_string = $excerpt_string . $array[ $i ] . " ";
        }
        $excerpt_string .= "...";
    } else {
        for ( $i = 0; $i < count( $array ); $i++ ) {
            $excerpt_string = $excerpt_string . $array[ $i ] . " ";
        }
    }
    return $excerpt_string;
}
