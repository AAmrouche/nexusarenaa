<?php
get_header(); 

// Vérifie si nous sommes sur une page d'équipe
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <h1 class="team-title"><?php the_title(); ?></h1>
        <div class="team-description"><?php the_content(); ?></div>

        <h3 class="team-members-title">Membres de l'équipe</h3>
        <ul class="team-members-list">
            <?php
            // Récupérer les informations des membres de l'équipe via SCF (Simple Custom Fields)
            $chef_du_groupe = get_field('chef_du_groupe'); // ID de l'utilisateur du chef
            $membre_2 = get_field('membre_2'); // ID de l'utilisateur membre 2
            $membre_3 = get_field('membre_3'); // ID de l'utilisateur membre 3
            $membre_4 = get_field('membre_4'); // ID de l'utilisateur membre 4
            $membre_5 = get_field('membre_5'); // ID de l'utilisateur membre 5

            // Fonction pour afficher un membre par son ID utilisateur
            function afficher_membre($user_id) {
                if ($user_id) :
                    $user_info = get_userdata($user_id); // Récupérer les données de l'utilisateur
                    if ($user_info) :
                        return esc_html($user_info->display_name); // Afficher le nom de l'utilisateur
                    else :
                        return 'Utilisateur non trouvé'; // En cas d'erreur
                    endif;
                else :
                    return 'Membre non spécifié'; // En cas d'absence d'ID
                endif;
            }

            // Afficher le chef du groupe
            if ($chef_du_groupe) :
                echo '<li class="member-item"><strong>Chef du groupe:</strong> ' . afficher_membre($chef_du_groupe) . '</li>';
            else :
                echo '<li>Aucun chef de groupe spécifié.</li>';
            endif;

            // Afficher les autres membres
            $membres = [$membre_2, $membre_3, $membre_4, $membre_5];
            foreach ($membres as $membre) {
                if ($membre) {
                    echo '<li class="member-item">' . afficher_membre($membre) . '</li>';
                } else {
                    echo '<li>Membre non spécifié</li>';
                }
            }
            ?>
        </ul>

        <h3 class="team-tournaments-title">Tournois associés</h3>
        <ul class="team-tournaments-list">
            <?php
            // Récupérer les tournois auxquels l'équipe participe
            $participe = get_field('participe'); // 'participe' est le champ ACF pour les tournois
            if ($participe) :
                foreach ($participe as $tournoi_id) :
                    // Récupérer l'objet tournoi à partir de l'ID
                    $tournoi = get_post($tournoi_id);
                    if ($tournoi) : ?>
                        <li class="tournament-item">
                            <a href="<?php echo get_permalink($tournoi->ID); ?>" class="tournament-link">
                                <?php echo esc_html($tournoi->post_title); ?>
                            </a>
                        </li>
                    <?php endif;
                endforeach;
            else : ?>
                <li>Aucun tournoi associé à cette équipe.</li>
            <?php endif; ?>
        </ul>

    <?php endwhile; 
endif;

get_footer();
?>
