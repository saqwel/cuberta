=== Cuberta ===
Contributors: Saqwel
Requires at least: WordPress 4.9.2
Version: 2.3.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: one-column, two-columns, right-sidebar, flexible-header, accessibility-ready, custom-colors, custom-header, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, post-formats, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready

== Description ==

Cuberta is a unique WordPress theme. It is adapted for wide and narrow screens. Cuberta has many options for customization site colors, fonts and front page layouts.
For more information about Cuberta please go to https://www.saqwel.ru/cuberta

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in Twenty Seventeen in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. Go to https://www.sawqel.ru/cuberta for a guide on how to customize this theme.
5. Navigate to Appearance > Customize in your admin panel and customize to taste.

== Copyright ==

Cuberta WordPress Theme, Copyright 2018 Saqwel.ru
Cuberta is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Cuberta bundles the following third-party resources:

Font Awesome icons, Copyright Dave Gandy
License: SIL Open Font License, version 1.1.
Source: https://fontawesome.com/license

Font Awesome fonts, Copyright Dave Gandy
License: SIL OFL 1.1 License
Source: https://fontawesome.com/license

Font Awesome stylesheet, Copyright Dave Gandy
License: MIT License
Source: https://fontawesome.com/license

Bundled header image
License: CC0 1.0 Universal (CC0 1.0)
Source: https://pxhere.com/en/photo/1015788

Alegreya SC font
License: Open Font License
Source: https://fonts.google.com/specimen/Alegreya+SC

Amatic SC font
License: Open Font License
Source: https://fonts.google.com/specimen/Amatic+SC

Anonymous Pro font
License: Open Font License
Source: https://fonts.google.com/specimen/Anonymous+Pro

Bad Script font
License: Open Font License
Source:  https://fonts.google.com/specimen/Bad+Script

Comfortaa font
License: Open Font License
Source: https://fonts.google.com/specimen/Comfortaa

Cormorant Garamond font
License: Open Font License
Source: https://fonts.google.com/specimen/Cormorant+Garamond

Cormorant Infant font
License: Open Font License
Source: https://fonts.google.com/specimen/Cormorant+Infant

Exo 2 font
License: Open Font License
Source: https://fonts.google.com/specimen/Exo+2

Gabriela font
License: Open Font License
Source: https://fonts.google.com/specimen/Gabriela

Jura font
License: Open Font License
Source: https://fonts.google.com/specimen/Jura

Kelly Slab font
License: Open Font License
Source: https://fonts.google.com/specimen/Kelly+Slab

Kurale font
License: Open Font License
Source: https://fonts.google.com/specimen/Kurale

Lobster font
License: Open Font License
Source: https://fonts.google.com/specimen/Lobster

Lora font
License: Open Font License
Source: https://fonts.google.com/specimen/Lora

Montserrat Alternates font
License: Open Font License
Source: https://fonts.google.com/specimen/Montserrat+Alternates

Neucha font
License: Open Font License
Source: https://fonts.google.com/specimen/Neucha

PT Mono font
License: Open Font License
Source: https://fonts.google.com/specimen/PT+Mono

Pangolin font
License: Open Font License
Source: https://fonts.google.com/specimen/Pangolin

Pattaya font
License: Open Font License
Source: https://fonts.google.com/specimen/Pattaya

Playfair Display SC font
License: Open Font License
Source: https://fonts.google.com/specimen/Playfair+Display+SC

Poiret One font
License: Open Font License
Source: https://fonts.google.com/specimen/Poiret+One

Roboto font
License: Apache License, Version 2.0
Source: https://fonts.google.com/specimen/Roboto

Ruslan Display font
License: Open Font License
Source: https://fonts.google.com/specimen/Ruslan+Display

Russo One font
License: Open Font License
Source: https://fonts.google.com/specimen/Russo+One

Seymour One font
License: Open Font License
Source: https://fonts.google.com/specimen/Seymour+One

Stalinist One font
License: Open Font License
Source: https://fonts.google.com/specimen/Stalinist+One

Ubuntu font
License: Ubuntu Font License
Source: https://fonts.google.com/specimen/Ubuntu

Underdog font
License: Open Font License
Source: https://fonts.google.com/specimen/Underdog

Vollkorn font
License: Open Font License
Source: https://fonts.google.com/specimen/Vollkorn

Yanone Kaffeesatz font
License: Open Font License
Source: https://fonts.google.com/specimen/Yanone+Kaffeesatz

== Changelog ==
= 2.3.2 =
* Released: April 15, 2018
Removed most of default text on front page.
Disabled home, search and login button from default.
Replaced href="/" with <?php echo esc_url( home_url() ) ?>.
Added subject tags.
Replaced 'sanitize_text_field' with 'esc_attr' in searchform.php.
Removed //add_theme_support( 'html5', array( 'script', 'style' ) );
Replaced 'get_stylesheet_directory_uri' with 'get_template_directory_uri'.
Removed empty file 'cuberta-editor-style.css'.

= 2.3.1 =
* Released: April 09, 2018

Minor title attribute fix in content.php

= 2.2 =
* Released: January 31, 2018

Removed wrong text-domain custom from functions.php

= 2.1 =
* Released: January 31, 2018

Added add_theme_support( "custom-header", $args )
Added add_theme_support( "custom-background", $args ) 
Fixed missing a text-domain. Function _e, with the arguments 'Your comment is awaiting moderation.'
Fontawesome moved from CDN to theme directory
Fixed non-printable characters from comments.php 