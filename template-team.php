<?php
/* Template Name: Page des équipes */
get_header(); ?>

<div class="titre-tournois">
    <h1>Équipes</h1>

    <?php
    // La boucle pour afficher toutes les équipes
    $args = array(
        'post_type' => 'equipe', // CPT pour les équipes
        'posts_per_page' => -1, // Affiche toutes les équipes
    );

    $team_query = new WP_Query($args);

    if ($team_query->have_posts()) :
        echo '<div class="teams-grid">'; // Grid container pour les équipes

        while ($team_query->have_posts()) : $team_query->the_post();
            ?>

            <div class="team-card">
                <!-- Image de l'équipe -->
                <div class="team-card-image">
                    <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large'); // Image agrandie pour occuper tout le haut de la card
                    }
                    ?>
                </div>

                <!-- Nom de l'équipe -->
                <div class="team-card-title">
                    <h2><?php the_title(); ?></h2>
                </div>

                <!-- Bouton "Voir plus" -->
                <div class="team-card-footer">
                    <a href="<?php the_permalink(); ?>" class="see-more-button">Voir plus</a>
                </div>
            </div><!-- .team-card -->

        <?php endwhile;

        echo '</div>'; // Fermeture de la grille
    else : ?>
        <p>Aucune équipe trouvée.</p>
    <?php endif; ?>

</div><!-- .all-teams -->

<?php get_footer(); ?>
