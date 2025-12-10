<?php
#Quitar versión de WordPress
add_filter('the_generator', '__return_empty_string');

#Quitar veriones de scripts y estilos
function remove_script_version( $src ) {
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'remove_script_version', 15 );
add_filter( 'style_loader_src', 'remove_script_version', 15 );

#Quitar emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

#Quitar rutas innecesarias del <head>
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head'); 

#Quitar feeds si no los usas
function disable_feeds() {
    wp_die('Feeds deshabilitados por seguridad.');
}
add_action('do_feed', 'disable_feeds', 1);
add_action('do_feed_rdf', 'disable_feeds', 1);
add_action('do_feed_rss', 'disable_feeds', 1);
add_action('do_feed_rss2', 'disable_feeds', 1);
add_action('do_feed_atom', 'disable_feeds', 1);
?>
