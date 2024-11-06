<?php
get_header(); ?>

<div class="single-tournoi">
    <?php
    // Boucle pour afficher le tournoi unique
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
            <div class="tournoi-thumbnail">
                <?php the_post_thumbnail('large'); ?> <!-- Affiche l'image du tournoi -->
            </div>

            <div class="tournoi-content">
                <?php the_content(); ?> <!-- Affiche le contenu complet du tournoi -->
            </div>

            <!-- Si tu veux afficher des informations supplémentaires, comme les équipes, tu peux les récupérer ici -->
            <div class="tournoi-equipes">
                <h2>Équipes participant au tournoi</h2>
                <?php
                // Si tu as une relation entre tournois et équipes (via ACF par exemple), tu peux afficher les équipes
                $equipes = get_field('equipes_participants'); // Remplace par le champ personnalisé approprié
                if ($equipes) :
                    foreach ($equipes as $equipe) : ?>
                        <div class="equipe-item">
                            <h3><?php echo get_the_title($equipe); ?></h3> <!-- Affiche le titre de l'équipe -->
                        </div>
                    <?php endforeach;
                else :
                    echo '<p>Aucune équipe trouvée.</p>';
                endif;
                ?>
            </div>

        <?php endwhile;
    else :
        echo '<p>Tournoi non trouvé.</p>';
    endif;
    ?>

    <a href="<?php echo esc_url(home_url('/tournois')); ?>">Retour à l'archive des tournois</a>

</div>

<?php get_footer(); ?>
