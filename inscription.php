<?php
/* Template Name: Création Compte */

// Gestion de la soumission du formulaire
if (isset($_POST['register_user'])) {
    $username = sanitize_text_field($_POST['username']);
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $confirm_password = sanitize_text_field($_POST['confirm_password']);

    // Vérification si les mots de passe correspondent
    if ($password === $confirm_password) {
        // Création de l'utilisateur
        $user_id = wp_create_user($username, $password, $email);

        if (!is_wp_error($user_id)) {
            // Mise à jour des informations de l'utilisateur (prénom, nom)
            wp_update_user(array(
                'ID' => $user_id,
                'first_name' => $first_name,
                'last_name' => $last_name
            ));

            // Connexion automatique après inscription
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);

            // Redirection vers la page d'accueil après l'inscription
            wp_redirect(home_url());
            exit;
        } else {
            // En cas d'erreur lors de la création de l'utilisateur
            echo '<p class="error">Erreur lors de l\'inscription : ' . $user_id->get_error_message() . '</p>';
        }
    } else {
        // Les mots de passe ne correspondent pas
        echo '<p class="error">Les mots de passe ne correspondent pas.</p>';
    }
}

get_header(); ?>

<div class="account-form-container">
    <h2>Créer un Compte</h2>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" required>
        
        <label for="first_name">Prénom</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Nom</label>
        <input type="text" name="last_name" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <label for="confirm_password">Confirmer le mot de passe</label>
        <input type="password" name="confirm_password" required>

        <input type="submit" name="register_user" value="S'inscrire" class="btn btn-primary">
    </form>
</div>

<?php get_footer(); ?>
