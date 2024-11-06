<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-left">
            <!-- Menu de gauche -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-pied',
                'container' => false,
                'menu_class' => 'footer-menu-list',
            ));
            ?>
        </div>

        <div class="footer-right">
            <div class="social-links">
                <!-- Discord et X -->
                <a href="https://discord.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/logo/discord.svg" alt="Discord Logo" class="footer-logo">
                </a>
                <a href="https://x.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/logo/x.svg" alt="X Logo" class="footer-logo">
                </a>
                <a href="https://x.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/logo/twitch.svg" alt="twitch Logo" class="footer-logo">
                </a>
                <a href="https://x.com" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/logo/instagram.svg" alt="instagram Logo" class="footer-logo">
                </a>
            </div>
        </div>
    </div>

    <div class="footer-mentions">
        <!-- Mentions légales en dessous -->
       <p class="mentions-legales">
    <a href="<?php echo get_permalink( get_page_by_path( 'mention-legale' ) ); ?>">Mentions Légales</a>
</p>
    </div>
</footer>

</body>
</html>
