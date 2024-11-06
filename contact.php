<?php
/* Template Name: Contact */
get_header(); 
?>      

<main>
    <header class="contact-header">
        <h1>Contactez-nous</h1>
    </header>

    <div class="container">
        <section class="contact-content">
            <h2>Nous sommes là pour vous aider !</h2>
            <p>
                Si vous avez des questions ou besoin d'aide, n'hésitez pas à nous contacter. Remplissez simplement le formulaire ci-dessous et nous reviendrons vers vous dès que possible.
            </p>

            <!-- Formulaire de contact -->
            <form action="" method="post">
                <label for="name">Votre nom :</label>
                <input type="text" id="name" name="name" required placeholder="Entrez votre nom">

                <label for="email">Votre email :</label>
                <input type="email" id="email" name="email" required placeholder="Entrez votre email">

                <label for="message">Votre message :</label>
                <textarea id="message" name="message" rows="5" required placeholder="Votre message ici"></textarea>

                <button type="submit" name="submit">Envoyer</button>
            </form>
        </section>
    </div>
</main>

<?php
get_footer();
?>
