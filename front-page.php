<?php get_header(); ?>
<?php
$hero_image = wp_get_attachment_image_url(6, 'full');

?>
<main>
<section class="hero" style="--hero-image: url('<?php echo esc_url($hero_image); ?>');">
  <div class="hero-inner">
    <div class="hero-copy">
      <div class="eyebrow">Services &amp; Compagnie</div>
      <h1>Besoin d'aide ?<br>Je suis là.</h1>

      <p>
        Services du quotidien, compagnie et accompagnement.<br>
        Informatique, démarches, achats, installation de matériel…<br>
        Restaurant, cinéma, théâtre, <br>événement ou simplement
        l'envie de partager un moment agréable.
      </p>
    </div>
  </div>
</section>

<section id="services" class="section">
  <div class="container">
    <h2 class="section-title">Mes services</h2>

    <p class="section-intro">
      Je m'adapte à vos besoins sur la région grenobloise.
      Une démarche à effectuer, un ordinateur à configurer,
      une commande à gérer… ou simplement envie de partager un moment agréable.
    </p>

    <div class="cards">

      <article class="card">
        <div class="card-icon">🤲</div>
        <h3>Besoin d'aide</h3>
        <p class="card-subtitle">Services du quotidien</p>
        <p>
          Informatique, démarches, achats en ligne, installations,
          réglages et assistance pour toutes ces petites choses
          qui peuvent vite devenir compliquées.
        </p>
        <a href="<?php echo esc_url( home_url('/services/') ); ?>" class="card-link">
          En savoir plus →
        </a>
      </article>

      <article class="card">
        <div class="card-icon">🌿</div>
        <h3>Un moment à partager</h3>
        <p class="card-subtitle">Compagnie &amp; accompagnement</p>
        <p>
          Restaurant, cinéma, théâtre, spectacle, événement,
          sortie ou simplement l'envie de passer un bon moment
          en agréable compagnie.
        </p>
         <a href="<?php echo esc_url( home_url('/services/') ); ?>" class="card-link">En savoir plus →</a>
      </article>

    </div>

    <div class="services-more">
      <p>
        <strong>Une demande qui ne rentre dans aucune catégorie ?</strong><br>
        Parlez-m'en simplement, nous verrons ensemble ce que je peux vous proposer.
      </p>

      <a class="services-more-link" href="<?php echo esc_url( home_url('/contact/') ); ?>">
        Me contacter →
      </a>
    </div>

  </div>
</section>

<section id="apropos" class="section alt">
  <div class="container about">

    <div class="about-photo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/about-antonio.png"
           alt="Antonio en combinaison de plongée sur la mer">
    </div>

        <div class="about-content">

      <div class="about-eyebrow">À propos de moi</div>

      <h2>Antonio, tout simplement.</h2>

      <p class="about-lead">
        J'aime les choses simples : rendre service, trouver une solution quand quelque chose bloque,
        découvrir de nouveaux endroits et partager de bons moments.
      </p>

      <p>
        À 64 ans, aujourd'hui retraité, je dispose d'une grande liberté et d'une disponibilité
        que je souhaite mettre au service des autres.
      </p>

      <p>
        Je peux vous aider dans votre quotidien, vous accompagner dans vos démarches ou vos achats,
        vous aider avec votre informatique, mais aussi simplement être présent lorsque vous avez
        envie de sortir ou de partager un moment.
      </p>

      <p>
        Restaurant, cinéma, théâtre, spectacle, événement, balade ou sortie…
        l'accompagnement peut prendre différentes formes, selon vos envies et vos besoins.
      </p>

      <p>
        Mon approche est simple : vous écouter, comprendre ce dont vous avez besoin et vous
        accompagner sérieusement, avec discrétion, bienveillance et convivialité.
      </p>
    </div>

  </div>
</section>

<section class="section how-it-works">
  <div class="container">

    <h2 class="section-title">Comment ça marche ?</h2>

    <p class="section-intro">
      Rien de compliqué. On échange simplement pour comprendre votre besoin
      et voir ensemble comment je peux vous aider.
    </p>

    <div class="steps">

      <article class="step">
        <div class="step-number">01</div>
        <div>
          <h3>Vous me contactez</h3>
          <p>
            Vous m'expliquez simplement ce dont vous avez besoin,
            par téléphone ou par message.
          </p>
        </div>
      </article>

      <article class="step">
        <div class="step-number">02</div>
        <div>
          <h3>On en parle</h3>
          <p>
            Nous échangeons tranquillement pour comprendre votre demande
            et voir comment je peux vous accompagner.
          </p>
        </div>
      </article>

      <article class="step">
        <div class="step-number">03</div>
        <div>
          <h3>On s'organise</h3>
          <p>
            Nous définissons ensemble le moment, le lieu et les modalités
            qui conviennent à chacun.
          </p>
        </div>
      </article>

    </div>

  </div>
</section>

<section id="contact" class="contact-band">
  <div class="container contact-content">

    <div class="contact-eyebrow">Un besoin, une envie, une idée ?</div>

    <h2 class="section-title">Besoin d'aide ?</h2>

    <p>
      Informatique, démarches, achats, accompagnement, sortie, événement…
      ou simplement envie de partager un moment agréable.
    </p>

    <p>
      Expliquez-moi simplement ce que vous recherchez.
      Nous verrons ensemble comment je peux vous aider.
    </p>

   <a class="button" href="<?php echo esc_url( home_url('/contact/') ); ?>">
      Me contacter
    </a>

  </div>
</section>
</main>

<?php get_footer(); ?>
