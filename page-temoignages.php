<?php
/*
Template Name: Page Témoignages
*/
get_header();
?>

<main>

  <section class="page-hero">
    <div class="container">
      <p class="eyebrow">Vos témoignages</p>

      <h1>Votre expérience compte pour moi.</h1>

      <p class="page-hero-intro">
        Vous avez fait appel à mes services ou partagé un moment avec moi ?
        Votre témoignage peut aider d'autres personnes à découvrir mon approche.
      </p>
    </div>
  </section>


  <section class="testimonials-intro">
    <div class="container">

      <p class="services-eyebrow">💬 Votre expérience</p>

      <h2>Quelques mots peuvent faire la différence.</h2>

      <p>
        Chaque personne accompagnée a une expérience différente.
        Vos impressions, vos remarques et vos petits mots sont précieux
        et peuvent aider d'autres personnes à mieux comprendre ce que
        je propose.
      </p>

      <p>
        Si vous avez envie de partager votre expérience, vous pouvez
        laisser un témoignage en quelques instants.
      </p>

      <a class="button" href="#laisser-un-temoignage">
        ✍️ Laisser un témoignage
      </a>

    </div>
  </section>


  <?php
  $testimonials = new WP_Query(
      array(
          'post_type'      => 'temoignage',
          'post_status'    => 'publish',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
      )
  );
  ?>

  <section class="testimonials-list">

    <div class="container">

      <div class="section-heading">
        <p class="services-eyebrow">Ils témoignent</p>

        <h2>
          Les témoignages de personnes que j'ai accompagnées
        </h2>
      </div>


      <?php if ( $testimonials->have_posts() ) : ?>

        <div class="testimonials-list-items">

          <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>

            <?php
            $prenom = get_post_meta(
                get_the_ID(),
                '_temoignage_prenom',
                true
            );

            $ville = get_post_meta(
                get_the_ID(),
                '_temoignage_ville',
                true
            );

            $note = get_post_meta(
                get_the_ID(),
                '_temoignage_note',
                true
            );
            ?>

            <article class="testimonial-card">

              <div class="testimonial-icon">💬</div>

              <?php if ( $note ) : ?>

                <div
                  class="testimonial-rating"
                  aria-label="Note <?php echo esc_attr( $note ); ?> sur 5"
                >
                  <?php echo str_repeat( '★', (int) $note ); ?>

                  <span>
                    <?php echo esc_html( $note ); ?>/5
                  </span>
                </div>

              <?php endif; ?>


              <div class="testimonial-content">
                <?php the_content(); ?>
              </div>


              <?php if ( $prenom || $ville ) : ?>

                <div class="testimonial-author">

                  <?php if ( $prenom ) : ?>
                    <strong>
                      <?php echo esc_html( $prenom ); ?>
                    </strong>
                  <?php endif; ?>

                  <?php if ( $prenom && $ville ) : ?>
                    <span> · </span>
                  <?php endif; ?>

                  <?php if ( $ville ) : ?>
                    <span>
                      <?php echo esc_html( $ville ); ?>
                    </span>
                  <?php endif; ?>

                </div>

              <?php endif; ?>

            </article>

          <?php endwhile; ?>

        </div>

        <?php wp_reset_postdata(); ?>


      <?php else : ?>

        <div class="testimonial-empty">

          <div class="testimonial-icon">💬</div>

          <h3>
            Les premiers témoignages arriveront bientôt.
          </h3>

          <p>
            Vous avez été accompagné par Antonio et souhaitez partager
            votre expérience ? Votre témoignage sera le bienvenu.
          </p>

         <a
            class="button"
            href="<?php echo esc_url( get_permalink() ); ?>#laisser-un-temoignage"
        >
            ✍️ Laisser un témoignage
        </a>

        </div>

      <?php endif; ?>

    </div>

  </section>

<section
    id="laisser-un-temoignage"
    class="testimonial-form-section"
>

  <div class="container">

    <div class="testimonial-form-card">

      <div class="testimonial-form-intro">

        <p class="services-eyebrow">
          ✍️ Votre témoignage
        </p>

        <h2>
          Partagez votre expérience
        </h2>

        <p>
          Prenez quelques instants pour me laisser un petit mot.
          Votre témoignage sera relu avant d'être publié sur le site.
        </p>

      </div>

      <form class="testimonial-form" method="post">

        <?php wp_nonce_field(
            'testimonial_form_action',
            'testimonial_nonce'
        ); ?>

        <input
          type="hidden"
          name="testimonial_form"
          value="1"
        >

        <div class="testimonial-form-grid">

          <div class="form-field">

            <label for="testimonial_prenom">
              Votre prénom *
            </label>

            <input
              type="text"
              id="testimonial_prenom"
              name="testimonial_prenom"
              required
            >

          </div>

          <div class="form-field">

            <label for="testimonial_ville">
              Votre ville
            </label>

            <input
              type="text"
              id="testimonial_ville"
              name="testimonial_ville"
              placeholder="Facultatif"
            >

          </div>

        </div>

        <div class="form-field">

          <label for="testimonial_note">
            Votre note *
          </label>

          <select
            id="testimonial_note"
            name="testimonial_note"
            required
          >

            <option value="">
              Choisir une note
            </option>

            <option value="5">
              ★★★★★ — 5/5
            </option>

            <option value="4">
              ★★★★☆ — 4/5
            </option>

            <option value="3">
              ★★★☆☆ — 3/5
            </option>

            <option value="2">
              ★★☆☆☆ — 2/5
            </option>

            <option value="1">
              ★☆☆☆☆ — 1/5
            </option>

          </select>

        </div>

        <div class="form-field">

          <label for="testimonial_message">
            Votre témoignage *
          </label>

          <textarea
            id="testimonial_message"
            name="testimonial_message"
            rows="6"
            required
            placeholder="Partagez simplement votre expérience..."
          ></textarea>

        </div>

        <button
          type="submit"
          class="button"
        >
          Envoyer mon témoignage
        </button>

        <p class="testimonial-form-note">
          Votre témoignage sera relu avant d'être publié sur le site.
        </p>

      </form>

    </div>

  </div>

</section>
  

</main>
<script>

<?php get_footer(); ?>