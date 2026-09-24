<?php
/*
Template Name: Page Message envoyé
*/

get_header();

$photo = get_template_directory_uri() . '/assets/about-antonio.png';
?>

<main class="message-sent-page">
    <section class="message-sent-hero">
        <div class="container">
            <div class="message-sent-card">

                <div class="message-sent-content">

                    <div class="message-sent-icon">✓</div>

                    <p class="message-sent-eyebrow">
                        SERVICES &amp; COMPAGNIE
                    </p>

                    <h1>
                        Votre message a bien été envoyé.
                    </h1>

                    <p class="message-sent-lead">
                        Je vous répondrai dès que possible.
                    </p>

                    <p class="message-sent-text">
                        Merci pour votre message et pour votre confiance.
                        J’ai bien reçu votre demande et je prendrai le temps
                        de vous répondre.
                    </p>

                    <a class="button" href="<?php echo esc_url( home_url('/') ); ?>">
                        ← Retour à l'accueil
                    </a>

                    <div class="message-sent-signature">
                        <strong>Antonio — Services &amp; Compagnie</strong>
                        <span>Un coup de main pour vous simplifier la vie</span>
                    </div>

                </div>

                <div class="message-sent-photo">
                    <img
                        src="<?php echo esc_url($photo); ?>"
                        alt="Antonio en plongée"
                    >
                </div>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>