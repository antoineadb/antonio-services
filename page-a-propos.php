<?php
/**
 * Template Name: Page À propos
 */
get_header();
?>

<main class="about-page">

  <section class="about-hero">
    <div class="container">

      <p class="about-eyebrow">À propos de moi</p>

      <h1>Antonio, tout simplement.</h1>

      <p class="about-intro">
        Aujourd'hui retraité, je souhaite mettre mon temps et mon expérience
        au service des autres, simplement et humainement.
      </p>

    </div>
  </section>


  <section class="about-main">
    <div class="container about-layout">

      <div class="about-photo-large">
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/about-antonio.png"
          alt="Antonio en combinaison de plongée"
        >
      </div>


      <div class="about-text">

        <h2>Un peu de moi</h2>

        <p class="about-lead">
          À 64 ans, aujourd'hui retraité, je bénéficie d'une grande
          disponibilité que je souhaite mettre au service des autres.
        </p>

        <p>
          J'aime les choses simples : rendre service, trouver une solution
          quand quelque chose bloque, découvrir de nouveaux endroits et
          partager de bons moments.
        </p>

        <p>
          Je peux vous aider dans votre quotidien, vous accompagner dans
          vos démarches ou vos achats, vous aider avec votre informatique,
          mais aussi simplement être présent lorsque vous avez envie de
          sortir ou de partager un moment.
        </p>

        <p>
          Restaurant, cinéma, théâtre, spectacle, événement, balade ou
          sortie… l'accompagnement peut prendre différentes formes,
          selon vos envies et vos besoins.
        </p>

      </div>

    </div>
  </section>


  <section class="about-values">
    <div class="container">

      <div class="about-values-intro">

        <p class="about-eyebrow">Ma façon de faire</p>

        <h2>Simple, disponible et à l'écoute.</h2>

        <p>
          Mon approche est simple : vous écouter, comprendre ce dont vous
          avez besoin et vous accompagner sérieusement, avec discrétion,
          bienveillance et convivialité.
        </p>

      </div>


      <div class="about-values-grid">

        <div class="about-value">
          <div class="about-value-icon">🤝</div>
          <h3>Écouter</h3>
          <p>
            Prendre le temps de comprendre votre demande et vos attentes.
          </p>
        </div>

        <div class="about-value">
          <div class="about-value-icon">💡</div>
          <h3>Trouver une solution</h3>
          <p>
            Chercher avec vous une solution simple et adaptée à votre situation.
          </p>
        </div>

        <div class="about-value">
          <div class="about-value-icon">🌿</div>
          <h3>Partager</h3>
          <p>
            Parce qu'un service peut aussi être l'occasion de passer un bon moment.
          </p>
        </div>

      </div>

    </div>
  </section>


  <section class="about-cta">
    <div class="container">

      <h2>Vous souhaitez en parler ?</h2>

      <p>
        Une question, un besoin particulier ou simplement envie d'échanger ?
        Présentez-moi votre demande.
      </p>

      <a
        class="button"
        href="<?php echo esc_url( home_url('/contact/') ); ?>"
      >
        Me contacter
      </a>

    </div>
  </section>

</main>

<?php get_footer(); ?>