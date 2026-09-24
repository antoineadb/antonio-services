<?php
/**
 * Template Name: Page Contact
 */

/**
 * Traitement du formulaire de contact
 */

$contact_status = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form']) ) {

    /* Vérification de sécurité */
    if (
        ! isset($_POST['contact_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field( wp_unslash($_POST['contact_nonce']) ),
            'contact_form_action'
        )
    ) {
        $contact_status = 'error';

    } else {

        /* Récupération et nettoyage des données */
        $name = isset($_POST['contact_name'])
            ? sanitize_text_field( wp_unslash($_POST['contact_name']) )
            : '';

        $email = isset($_POST['contact_email'])
            ? sanitize_email( wp_unslash($_POST['contact_email']) )
            : '';

        $subject = isset($_POST['contact_subject'])
            ? sanitize_text_field( wp_unslash($_POST['contact_subject']) )
            : '';

        $message = isset($_POST['contact_message'])
            ? sanitize_textarea_field( wp_unslash($_POST['contact_message']) )
            : '';

        /* Vérification des champs */
        if (
            empty($name) ||
            empty($email) ||
            empty($subject) ||
            empty($message) ||
            ! is_email($email)
        ) {

            $contact_status = 'error';

        } else {

            /* Adresse qui recevra les messages */
            $to = 'antonio.contact38@gmail.com';

            /* Sujet du mail */
            $mail_subject = 'Nouveau message depuis Services & Compagnie';

            /* Contenu du mail */
            $mail_message =
                "Nouveau message reçu depuis le site Services & Compagnie.\n\n" .
                "Nom : " . $name . "\n" .
                "E-mail : " . $email . "\n" .
                "Objet : " . $subject . "\n\n" .
                "Message :\n" .
                $message . "\n";

            /*
             * On utilise l'adresse du visiteur comme Reply-To.
             * Ainsi, lorsque tu répondras au mail, ta réponse
             * ira directement à la personne qui t'a écrit.
             */
            $headers = array(
                'Reply-To: ' . $name . ' <' . $email . '>'
            );

            /* Envoi */
            $sent = wp_mail($to, $mail_subject, $mail_message, $headers);

            if ( $sent ) {
                wp_safe_redirect( home_url('/message-envoye/') );
                exit;
            }

            $contact_status = 'error';
        }
    }
}

get_header();
?>

<main class="contact-page">

  <section class="contact-hero">
    <div class="container">

      <p class="contact-eyebrow">Contact</p>

      <h1>Parlons de votre besoin.</h1>

      <p class="contact-intro">
        Une question, une demande, une envie de parler de votre projet ?
        Expliquez-moi simplement ce que vous recherchez.
      </p>

    </div>
  </section>

  <section class="contact-section">
    <div class="container contact-layout">

      <div class="contact-info">

        <h2>Je suis là pour vous écouter.</h2>

        <div class="contact-photo">
          <img
            src="<?php echo get_template_directory_uri(); ?>/assets/contact-antonio.png"
            alt="Antonio en extérieur"
          >
        </div>

        <p>
          Que ce soit pour une aide ponctuelle, une démarche, un achat,
          un accompagnement ou simplement l'envie de partager un moment,
          vous pouvez me présenter votre demande.
        </p>

        <p>
          Je vous répondrai dès que possible.
        </p>

        <div class="contact-availability">
          <strong>Antonio</strong>
          <span>Services &amp; Compagnie</span>
          <span>Grenoble et alentours · Sur rendez-vous</span>
        </div>

      </div>

      <div class="contact-form-wrapper">

        <h2>Votre message</h2>

        <?php if ( $contact_status === 'success' ) : ?>

          <div class="contact-message contact-message-success">
            <strong>Votre message a bien été envoyé.</strong>
            <span>Je vous répondrai dès que possible.</span>
          </div>

        <?php elseif ( $contact_status === 'error' ) : ?>

          <div class="contact-message contact-message-error">
            <strong>Votre message n'a pas pu être envoyé.</strong>
            <span>Vérifiez les informations saisies ou réessayez dans quelques instants.</span>
          </div>

        <?php endif; ?>

        <form class="contact-form" method="post">

          <?php wp_nonce_field( 'contact_form_action', 'contact_nonce' ); ?>

          <input type="hidden" name="contact_form" value="1">

          <!-- Champ anti-spam invisible -->
          <div class="contact-honeypot" aria-hidden="true">
            <label for="contact-website">Site web</label>
            <input
              type="text"
              id="contact-website"
              name="contact_website"
              tabindex="-1"
              autocomplete="off"
            >
          </div>

          <div class="form-group">
            <label for="contact-name">Votre nom</label>
            <input
              type="text"
              id="contact-name"
              name="contact_name"
              value="<?php echo isset($_POST['contact_name']) ? esc_attr( wp_unslash($_POST['contact_name']) ) : ''; ?>"
              required
            >
          </div>

          <div class="form-group">
            <label for="contact-email">Votre adresse e-mail</label>
            <input
              type="email"
              id="contact-email"
              name="contact_email"
              value="<?php echo isset($_POST['contact_email']) ? esc_attr( wp_unslash($_POST['contact_email']) ) : ''; ?>"
              required
            >
          </div>

          <div class="form-group">
            <label for="contact-subject">Objet</label>
            <input
              type="text"
              id="contact-subject"
              name="contact_subject"
              value="<?php echo isset($_POST['contact_subject']) ? esc_attr( wp_unslash($_POST['contact_subject']) ) : ''; ?>"
              required
            >
          </div>

          <div class="form-group">
            <label for="contact-message">Votre message</label>
            <textarea
              id="contact-message"
              name="contact_message"
              rows="7"
              required
            ><?php echo isset($_POST['contact_message']) ? esc_textarea( wp_unslash($_POST['contact_message']) ) : ''; ?></textarea>
          </div>

          <button type="submit" class="button">
            Envoyer ma demande
          </button>

        </form>

      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>