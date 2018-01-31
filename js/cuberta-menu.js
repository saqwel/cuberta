// jQuery page builder script

jQuery( document ).ready( function ( $ ) {
    $( ".menu-button" ).click( function () {
        if ( $( ".main-menu" ).hasClass( "toggle-on" ) ) {
            $( ".main-menu" ).removeClass( "toggle-on" );
            $( this ).removeClass( "toggle-on" );
        } else {
            $( ".main-menu" ).addClass( "toggle-on" );
            $( this ).addClass( "toggle-on" );
        }
    } );
    $( ".search-button" ).click( function () {
        if ( $( ".search" ).hasClass( "toggle-on" ) ) {
            $( ".search" ).removeClass( "toggle-on" );
            $( this ).removeClass( "toggle-on" );
        } else {
            $( ".search" ).addClass( "toggle-on" );
            $( this ).addClass( "toggle-on" );
        }
    } );

    $( ".main-menu" ).find( ".sub-menu" ).toggle();
    $( ".main-menu" ).find( ".children" ).toggle();
    $( ".main-menu" ).find( ".menu-item-has-children" ).click( function () {
        $( this ).children( ".sub-menu" ).toggle();
        if ( $( this ).children( ".sub-menu" ).is( ":visible" ) ) {
            $( this ).addClass( "menu-item-toggled" );
        } else {
            $( this ).removeClass( "menu-item-toggled" );
        }
    } )

    $( ".main-menu" ).find( ".page_item_has_children" ).click( function () {
        $( this ).children( ".children" ).toggle();
        if ( $( this ).children( ".children" ).is( ":visible" ) ) {
            $( this ).addClass( "menu-item-toggled" );
        } else {
            $( this ).removeClass( "menu-item-toggled" );
        }
    } )
    $( ".main-menu" ).find( "li" ).click( function ( event ) {
        event.stopPropagation();
    } )
    $( ".main-menu" ).find( "a" ).click( function ( e ) {
        e.stopPropagation();
    } );
} );

( function ( $ ) {
    return this;
} )( jQuery );