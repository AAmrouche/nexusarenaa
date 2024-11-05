<?php

function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Enregistrement du menu
function register_my_menu() {
    register_nav_menu('menu-tete', 'Menu de Tête');
}
add_action('after_setup_theme', 'register_my_menu');






