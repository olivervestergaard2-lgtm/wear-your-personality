<?php
// Kør funktionen, når WordPress indlæser CSS og JavaScript.
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style';
    $theme = wp_get_theme();

    // Indlæs hovedtemaets style.css først.
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),
        $theme->parent()->get( 'Version' )
    );

    // Indlæs derefter child themes style.css.
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get( 'Version' )
    );
}