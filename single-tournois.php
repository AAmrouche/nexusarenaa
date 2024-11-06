<?php
get_header(); ?>

<div class="single-tournoi">
    <?php
    // Boucle pour afficher le tournoi unique
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <!-- Titre du tournoi -->
            <h1 class="titre-tournois"><?php the_title(); ?></h1>
            
            <!-- Image du tournoi -->
            <div class="tournoi-thumbnail">
                <?php the_post_thumbnail('large'); ?> <!-- Affiche l'image du tournoi -->
            </div>

            <!-- Encadré pour la date et l'heure -->
            <div class="tournoi-date-heure">
                <?php 
                // Récupérer la date et l'heure depuis le champ SCF
                $date_heure = get_field('datetournois');
                if ($date_heure) : ?>
                    <span class="tournoi-date">
                        <?php echo date('d F Y - H:i', strtotime($date_heure)); ?> <!-- Affiche la date et l'heure -->
                    </span>
                <?php endif; ?>
            </div>

            <!-- Description du tournoi (contenu de l'article) -->
            <div class="tournoi-content">
                <?php the_content(); ?> <!-- Affiche le contenu complet du tournoi -->
            </div>


        <?php endwhile;
    else :
        echo '<p>Tournoi non trouvé.</p>';
    endif;
    ?>

  <div>
        <a href="<?php echo home_url('/liste-des-equipes'); ?>">
    <button>Participer ! </button>
        </a>
    </div>

</div>

<?php get_footer(); ?>
