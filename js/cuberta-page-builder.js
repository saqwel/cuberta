// jQuery page builder script

jQuery( document ).ready( function ( $ ) {
    // Ready does not works properly without window.onload()
    window.onload = function () {
        $( document ).page_build();
        $( window ).resize( function () {
            $( "main" ).css( "height", "auto" );
            $( document ).page_build();
        } );
        $( '.cuberta-menu' ).click( function () {
            $( "main" ).css( "height", "auto" );
            $( document ).page_build();
        } );
        $( '.cuberta-menu' ).find( "li" ).click( function () {
            $( "main" ).css( "height", "auto" );
            $( document ).page_build();
        } );
    }
} );

( function ( $ ) {
    $.fn.page_build = function () {
        full_h = $( window ).height();
        main_h = $( "main" ).height();
        main_pt = parseInt( $( "main" ).css( "padding-top" ) );
        main_pb = parseInt( $( "main" ).css( "padding-bottom" ) );
        if ( $( '.cuberta-menu' ).length ) {
            menu_h = $( ".cuberta-menu" ).height();
            menu_pt = parseInt( $( ".cuberta-menu" ).css( "padding-top" ) );
            menu_pb = parseInt( $( ".cuberta-menu" ).css( "padding-bottom" ) );
        } else {
            menu_h = 0;
            menu_pt = 0;
            menu_pb = 0;
        }
        footer_h = $( ".footer-item" ).height();
        footer_pt = parseInt( $( ".footer-item" ).css( "padding-top" ) );
        footer_pb = parseInt( $( ".footer-item" ).css( "padding-bottom" ) );
        footer_mt = parseInt( $( ".footer-item" ).css( "margin-top" ) );

        all_h = main_h + main_pt + main_pb + menu_h + menu_pt + menu_pb + footer_h + footer_pt + footer_pb + footer_mt;
        need_h = full_h - ( main_pt + main_pb + menu_h + menu_pt + menu_pb + footer_h + footer_pt + footer_pb + footer_mt );

        if ( full_h > all_h ) {
            $( "main" ).css( "height", need_h );
        }

        return this;
    };
} )( jQuery );