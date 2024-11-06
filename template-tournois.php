<?php
/**
Template Name: Tournois
 */
get_header(); 
?>


<div class="tournois-list">
    <?php
    // Arguments pour récupérer les tournois
    $args = array(
        'post_type' => 'tournois', // Remplace 'tournois' par le nom de ton CPT
        'posts_per_page' => -1, // Affiche tous les tournois
    );

    // Exécution de la requête
    $tournois_query = new WP_Query($args);

    if ($tournois_query->have_posts()) :
        while ($tournois_query->have_posts()) : $tournois_query->the_post();
            // Affichage de chaque tournoi
            ?>
            <div class="tournoi-item">
    <a href="<?php the_permalink(); ?>" class="tournoi-link"> <!-- Lien vers le tournoi -->
        <div class="tournoi-image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="default-image.jpg" alt="Image par défaut"> <!-- Image par défaut si pas d'image -->
            <?php endif; ?>
        </div>

        <div class="tournoi-info">
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <span class="btn-voir-plus">Voir plus</span>
        </div>
    </a>
</div>
            <?php
        endwhile;
    else :
        echo '<p>Aucun tournoi trouvé.</p>';
    endif;

    // Réinitialiser la requête
    wp_reset_postdata();
    ?>
</div>



<?php
get_footer();
?>


