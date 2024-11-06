<?php


 function theme_enqueue_styles() {
        wp_enqueue_style('style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
    }
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');




// Enregistrement du menu
function register_my_menus() {
    register_nav_menus(
        array(
            'menu-tete' => 'Menu de Tête', // Menu principal en haut
            'menu-pied' => 'Menu du Footer' // Menu dans le footer
        )
    );
}
add_action('after_setup_theme', 'register_my_menus');
function hide_admin_bar_for_non_admins() {
    if (!current_user_can('administrator')) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('wp', 'hide_admin_bar_for_non_admins');



function assign_template_to_tournois_page($template) {
    if (is_page('tournois')) { // Remplace 'tournois' par l'ID ou le slug de ta page
        $template = locate_template('template-tournois.php');
    }
    return $template;
}
add_filter('template_include', 'assign_template_to_tournois_page');


