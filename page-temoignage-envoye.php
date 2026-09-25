<?php
/*
Template Name: Page Témoignage envoyé
*/

get_header();
?>
<?php
echo '<div style="padding:40px;background:#ffeb3b;color:#000;font-size:30px;font-weight:bold;text-align:center;">TEST DU MODÈLE TÉMOIGNAGE ENVOYÉ</div>';
?>
<main>

  <section class="page-hero">

    <div class="container">

      <p class="eyebrow">Votre témoignage</p>

      <h1>Merci pour votre témoignage !</h1>

      <p class="page-hero-intro">
        Votre témoignage a bien été transmis.
        Il sera relu avant d'être publié sur le site.
      </p>

    </div>

  </section>


  <section class="message-sent-section">

    <div class="container">

      <div class="message-sent-card">

        <div class="message-sent-icon">💬</div>

        <h2>Votre message a bien été reçu.</h2>

        <p>
          Merci d'avoir pris le temps de partager votre expérience.
          Votre témoignage sera relu avant d'être publié.
        </p>

        <a
          class="button"
          href="<?php echo esc_url( home_url( '/temoignages/' ) ); ?>"
        >
          ← Retour aux témoignages
        </a>

      </div>

    </div>

  </section>

</main>

<?php get_footer(); ?>