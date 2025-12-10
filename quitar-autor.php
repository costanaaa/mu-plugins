<?php
# Eliminar autor del front-end
add_filter('the_author', function() { return ''; });
add_filter('get_the_author_display_name', function() { return ''; });
add_filter('the_author_posts_link', function() { return ''; });

# Eliminar metadatos
add_filter('author_meta', function() { return ''; });
add_filter('get_the_author_description', function() { return ''; });

# Ocultar enlaces /author/usuario
add_filter('author_link', function() { return home_url('/'); });

# Bloquear páginas del tipo /author/usuario
add_action('template_redirect', function() {
    if (is_author()) {
        wp_redirect(home_url('/'), 301);
        exit;
    }
});
?>
