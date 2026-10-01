<?php
/**
 * Template Name: Page Services
 */
get_header();
?>

<main class="services-page">

  <!-- HERO -->

  <section class="services-hero">
    <div class="container">

      <p class="services-eyebrow">Services &amp; Compagnie</p>

      <h1>Mes services</h1>

      <p class="services-intro">
        Une aide concrète au quotidien, des solutions numériques,
        de l'accompagnement et des moments de bien-être.
      </p>

    </div>
  </section>


  <!-- PRÉSENTATION -->

  <section class="services-presentation">
    <div class="container services-presentation-layout">

      <div class="services-presentation-photo">
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/contact-antonio.png"
          alt="Antonio en extérieur"
        >
      </div>

      <div class="services-presentation-text">

        <p class="services-eyebrow">Une aide qui reste humaine</p>

        <h2>Des services, mais surtout une présence.</h2>

        <p>
          Derrière chaque demande, il y a surtout une personne à écouter,
          un besoin à comprendre et une solution à trouver.
        </p>

        <p>
          Mon objectif est de vous simplifier les choses avec une approche
          simple, disponible et adaptée à vos besoins.
        </p>

      </div>

    </div>
  </section>


  <!-- LES 3 GRANDES CATÉGORIES -->

  <section class="services-section">

    <div class="container">

      <div class="services-category">

        <div class="services-category-intro">

          <span class="services-icon">💻</span>

          <h2>Informatique &amp; solutions numériques</h2>

          <p>
            Besoin d'aide avec votre ordinateur, votre smartphone,
            votre connexion internet ou un projet de site web ?
            Je peux vous accompagner, de l'installation au dépannage,
            jusqu'à la création d'un site personnalisé.
          </p>

          <a
            class="button"
            href="<?php echo esc_url( home_url('/informatique-grenoble/') ); ?>"
          >
            Découvrir mes services informatiques
          </a>

        </div>

      </div>


      <div class="services-category services-category-compagnie">

        <div class="services-category-intro">

          <span class="services-icon">🌿</span>

          <h2>Accompagnement &amp; sorties</h2>

          <p>
            Sorties, déplacements, démarches, achats ou simplement
            l'envie de partager un moment : je vous accompagne
            selon vos besoins et vos envies.
          </p>

          <a
            class="button"
            href="<?php echo esc_url( home_url('/accompagnement-grenoble/') ); ?>"
          >
            Découvrir l'accompagnement
          </a>

        </div>

      </div>


      <div class="services-category">

        <div class="services-category-intro">

          <span class="services-icon">🤲</span>

          <h2>Massage sensuel &amp; bien-être</h2>

          <p>
            Une nouvelle activité autour du bien-être et de la détente
            sera prochainement proposée.
          </p>

          <p>
            <strong>Prochainement — actuellement en formation.</strong>
          </p>

        </div>

      </div>


      <!-- ZONE D'INTERVENTION -->

      <section class="services-zone">

        <div class="container">

          <p class="services-eyebrow">📍 Zone d’intervention</p>

          <h2>Grenoble et les alentours</h2>

          <p>
            J’interviens à Grenoble et dans les communes alentours,
            dans un rayon d’environ 50 km.
          </p>

          <p>
            Chaque demande étant différente, n’hésitez pas à me contacter
            pour vérifier ensemble si je peux vous accompagner.
          </p>

        </div>

      </section>


      <!-- CONTACT -->

      <div class="services-cta">

        <h2>Vous avez un besoin particulier ?</h2>

        <p>
          Tout ne rentre pas forcément dans une liste.
          Présentez-moi simplement votre demande et nous verrons ensemble
          comment je peux vous aider.
        </p>

        <a
          class="button"
          href="<?php echo esc_url( home_url('/contact/') ); ?>"
        >
          Me contacter
        </a>

      </div>

    </div>

  </section>

</main>

<?php get_footer(); ?>