<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <!-- Logo cliquable pour la page d'accueil -->
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/logo.svg" alt="Logo du site">
        </a>
    </div>

    <!-- Menu principal pour les grandes tailles d'écran -->
    <nav class="main-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-tete',
            'container' => false,
            'menu_class' => 'menu-list'
        ));
        ?>
    </nav>

    

    <!-- Bouton burger pour les petits écrans -->
    <div class="burger-menu" id="burgerMenu">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Overlay pour mobile -->
<div class="mobile-overlay" id="mobileOverlay">
    <!-- Photo de profil à gauche -->
    <div class="profile-picture">
        <img src="<?php echo get_template_directory_uri(); ?>/profile.jpg" alt="Photo de profil">
    </div>

    <!-- Menu overlay pour mobile -->
    <nav class="mobile-menu">
        <ul class="mobile-menu-list">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-tete',
                'container' => false,
                'items_wrap' => '%3$s'
            ));
            ?>
        </ul>
    </nav>
    
    <!-- Boutons Connexion/Inscription en bas de l'overlay -->
    <div class="auth-buttons-overlay">
        <?php if (is_user_logged_in()) : ?>
            <a href="<?php echo wp_logout_url(home_url()); ?>">Déconnexion</a>
        <?php else : ?>
            <a href="/connexion">Connexion</a>
            <a href="/inscription">Inscription</a>
        <?php endif; ?>
    </div>

    <!-- Bouton de fermeture -->
    <button class="close-btn" id="closeBtn">&times;</button>
</div>

</header>

<?php wp_footer(); ?>
</body>
</html>


<script>

    document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const closeBtn = document.getElementById('closeBtn');

    // Ouvre l'overlay au clic sur le burger menu
    burgerMenu.addEventListener('click', function() {
        mobileOverlay.style.display = 'flex';
    });

    // Ferme l'overlay au clic sur la croix
    closeBtn.addEventListener('click', function() {
        mobileOverlay.style.display = 'none';
    });
});

</script>
