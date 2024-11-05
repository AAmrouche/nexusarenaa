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

    <!-- Menu overlay pour mobile -->
    <div class="mobile-overlay" id="mobileOverlay">
        <nav class="mobile-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-tete',
                'container' => false,
                'menu_class' => 'mobile-menu-list'
            ));
            ?>
        </nav>
        <button class="close-btn" id="closeBtn">&times;</button>
    </div>
</header>
