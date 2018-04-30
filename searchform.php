<?php
/**
 * @package WordPress
 * @subpackage Cuberta
 * @since Cuberta 1.0
 *
 * Displays search form where added "get_search_form()".
 *
 */
?>

<div class="search">
    <form method="get" class="search-form" action="/">
        <input class="search-field" placeholder="" value="<?php esc_attr( the_search_query() ); ?>" name="s" type="search">
        <div class="search-submit-parent"><input class="search-submit" value="" name="search-submit" type="submit"></div>
    </form>
</div>