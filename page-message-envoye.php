<?php
/*
Template Name: Page Message envoyé
*/

get_header();
?>

<main class="message-sent-page">

  <section class="message-sent-hero">
    <div class="message-sent-decoration message-sent-decoration-one"></div>
    <div class="message-sent-decoration message-sent-decoration-two"></div>

    <div class="message-sent-card">

      <div class="message-sent-icon" aria-hidden="true">
        ✓
      </div>

      <p class="message-sent-eyebrow">
        Services & Compagnie
      </p>

      <h1>Votre message a bien été envoyé.</h1>

      <p class="message-sent-lead">
        Je vous répondrai dès que possible.
      </p>

      <p class="message-sent-text">
        Merci pour votre message et pour votre confiance.
        J’ai bien reçu votre demande et je prendrai le temps
        de vous répondre.
      </p>

      <a class="button message-sent-button"
         href="<?php echo esc_url( home_url('/') ); ?>">
        ← Retour à l'accueil
      </a>

      <div class="message-sent-signature">
        <strong>Antonio — Services & Compagnie</strong>
        <span>Un coup de main pour vous simplifier la vie</span>
      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>