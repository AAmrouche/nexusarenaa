<?php
/* Template Name: Page Connexion */

// Gestion de la soumission du formulaire de connexion
if (isset($_POST['login_user'])) {
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    // Tentative de connexion
    $creds = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => isset($_POST['remember']) ? true : false,
    );

    $user = wp_signon($creds, false);

    // Vérification si la connexion est réussie
    if (!is_wp_error($user)) {
        // Connexion réussie, redirection vers la page d'accueil ou une autre page
        wp_redirect(home_url());
        exit;
    } else {
        // Erreur lors de la connexion, récupération du message d'erreur
        $login_error = $user->get_error_message();
    }
}

get_header(); ?>

<div class="account-form-container">
    <h2>Se connecter</h2>

    <?php if (isset($login_error)): ?>
        <p class="error"><?php echo $login_error; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Nom d'utilisateur ou adresse e-mail</label>
        <input type="text" name="username" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <label for="remember">
            <input type="checkbox" name="remember"> Se souvenir de moi
        </label>

        <input type="submit" name="login_user" value="Se connecter" class="btn btn-primary">
    </form>

    <p><a href="<?php echo wp_lostpassword_url(); ?>">Mot de passe oublié ?</a></p>
</div>

<?php get_footer(); ?>
