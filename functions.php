<?php
if (!defined('ABSPATH')) exit;

function antonio_services_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    register_nav_menus(array('primary' => __('Menu principal', 'antonio-services')));
}
add_action('after_setup_theme', 'antonio_services_setup');

function antonio_services_assets() {
    wp_enqueue_style('antoine-style', get_stylesheet_uri(), array(), '0.1.0');
}
add_action('wp_enqueue_scripts', 'antonio_services_assets');

function antonio_services_menu_fallback() {
    echo '<nav class="main-nav">';
    echo '<a href="' . esc_url(home_url('/services/')) . '">Mes services</a>';
    echo '<a href="' . esc_url(home_url('/a-propos/')) . '">À propos</a>';
    echo '<a href="' . esc_url(home_url('/contact/')) . '">Contact</a>';
    echo '</nav>';
}
/**
 * SEO - titres et descriptions
 */

/**
 * SEO - titres et descriptions
 */

function antonio_services_seo_title( $title ) {

    if ( is_front_page() ) {

        return 'Services & Compagnie | Aide et accompagnement à Grenoble';

    } elseif ( is_page('services') ) {

        return 'Services d’aide et d’accompagnement à Grenoble | Services & Compagnie';

    } elseif ( is_page('a-propos') ) {

        return 'À propos | Antonio — Services & Compagnie';

    } elseif ( is_page('contact') ) {

        return 'Contact | Services & Compagnie — Grenoble';

    }

    return $title;
}

add_filter('pre_get_document_title', 'antonio_services_seo_title');


function antonio_services_seo_description() {

    if ( is_front_page() ) {

        $description = 'Aide informatique, démarches, achats, installations et accompagnement à Grenoble et alentours. Services du quotidien, sorties et compagnie.';

    } elseif ( is_page('services') ) {

        $description = 'Aide informatique, démarches, achats, installations et assistance au quotidien à Grenoble et alentours.';

    } elseif ( is_page('a-propos') ) {

        $description = 'Découvrez Antonio, son approche et sa façon de proposer des services du quotidien, de l’aide et de l’accompagnement à Grenoble et alentours.';

    } elseif ( is_page('contact') ) {

        $description = 'Une question, un besoin ou une demande particulière ? Contactez Antonio pour en parler simplement.';

    } else {

        return;
    }

    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
}

add_action('wp_head', 'antonio_services_seo_description', 1);

/* =========================================================
   TYPE DE CONTENU : TÉMOIGNAGES
   ========================================================= */

function antonio_services_register_testimonials() {

    $labels = array(
        'name'                  => 'Témoignages',
        'singular_name'         => 'Témoignage',
        'menu_name'             => 'Témoignages',
        'add_new'               => 'Ajouter',
        'add_new_item'          => 'Ajouter un témoignage',
        'edit_item'             => 'Modifier le témoignage',
        'new_item'              => 'Nouveau témoignage',
        'view_item'             => 'Voir le témoignage',
        'search_items'          => 'Rechercher un témoignage',
        'not_found'             => 'Aucun témoignage trouvé',
        'not_found_in_trash'    => 'Aucun témoignage dans la corbeille',
    );

    register_post_type(
        'temoignage',
        array(
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-format-chat',
            'supports'           => array(
                'title',
                'editor',
            ),
            'show_in_rest'       => true,
        )
    );
}

add_action(
    'init',
    'antonio_services_register_testimonials'
);

/* =========================================================
   CHAMPS DES TÉMOIGNAGES
   ========================================================= */

function antonio_services_testimonial_metabox() {

    add_meta_box(
        'testimonial_details',
        'Informations du témoignage',
        'antonio_services_testimonial_metabox_html',
        'temoignage',
        'normal',
        'high'
    );
}

add_action(
    'add_meta_boxes',
    'antonio_services_testimonial_metabox'
);


function antonio_services_testimonial_metabox_html( $post ) {

    wp_nonce_field(
        'antonio_services_testimonial_save',
        'antonio_services_testimonial_nonce'
    );

    $prenom = get_post_meta(
        $post->ID,
        '_temoignage_prenom',
        true
    );

    $ville = get_post_meta(
        $post->ID,
        '_temoignage_ville',
        true
    );

    $note = get_post_meta(
        $post->ID,
        '_temoignage_note',
        true
    );

    ?>

    <p>
        <label for="temoignage_prenom">
            <strong>Prénom</strong>
        </label>
        <br>
        <input
            type="text"
            id="temoignage_prenom"
            name="temoignage_prenom"
            value="<?php echo esc_attr( $prenom ); ?>"
            style="width:100%;max-width:500px;"
        >
    </p>

    <p>
        <label for="temoignage_ville">
            <strong>Ville</strong>
        </label>
        <br>
        <input
            type="text"
            id="temoignage_ville"
            name="temoignage_ville"
            value="<?php echo esc_attr( $ville ); ?>"
            placeholder="Facultatif"
            style="width:100%;max-width:500px;"
        >
    </p>

    <p>
        <label for="temoignage_note">
            <strong>Note</strong>
        </label>
        <br>
        <select
            id="temoignage_note"
            name="temoignage_note"
        >
            <option value="">Choisir une note</option>
            <option value="5" <?php selected( $note, '5' ); ?>>★★★★★ — 5/5</option>
            <option value="4" <?php selected( $note, '4' ); ?>>★★★★☆ — 4/5</option>
            <option value="3" <?php selected( $note, '3' ); ?>>★★★☆☆ — 3/5</option>
            <option value="2" <?php selected( $note, '2' ); ?>>★★☆☆☆ — 2/5</option>
            <option value="1" <?php selected( $note, '1' ); ?>>★☆☆☆☆ — 1/5</option>
        </select>
    </p>

    <?php
}


function antonio_services_save_testimonial_meta( $post_id ) {

    if (
        ! isset( $_POST['antonio_services_testimonial_nonce'] ) ||
        ! wp_verify_nonce(
            sanitize_text_field(
                wp_unslash(
                    $_POST['antonio_services_testimonial_nonce']
                )
            ),
            'antonio_services_testimonial_save'
        )
    ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( wp_is_post_revision( $post_id ) ) {
        return;
    }

    if ( get_post_type( $post_id ) !== 'temoignage' ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['temoignage_prenom'] ) ) {

        update_post_meta(
            $post_id,
            '_temoignage_prenom',
            sanitize_text_field(
                wp_unslash(
                    $_POST['temoignage_prenom']
                )
            )
        );
    }

    if ( isset( $_POST['temoignage_ville'] ) ) {

        update_post_meta(
            $post_id,
            '_temoignage_ville',
            sanitize_text_field(
                wp_unslash(
                    $_POST['temoignage_ville']
                )
            )
        );
    }

    if ( isset( $_POST['temoignage_note'] ) ) {

        $note = absint(
            $_POST['temoignage_note']
        );

        if ( $note >= 1 && $note <= 5 ) {

            update_post_meta(
                $post_id,
                '_temoignage_note',
                $note
            );

        } else {

            delete_post_meta(
                $post_id,
                '_temoignage_note'
            );
        }
    }
}

add_action(
    'save_post_temoignage',
    'antonio_services_save_testimonial_meta'
);

add_action(
    'save_post_temoignage',
    'antonio_services_save_testimonial_meta'
);

/* =========================================================
   FORMULAIRE PUBLIC DES TÉMOIGNAGES
   ========================================================= */

function antonio_services_handle_testimonial_form() {

    if (
        ! isset( $_POST['testimonial_form'] ) ||
        $_POST['testimonial_form'] !== '1'
    ) {
        return;
    }

    if (
        ! isset( $_POST['testimonial_nonce'] ) ||
        ! wp_verify_nonce(
            sanitize_text_field(
                wp_unslash( $_POST['testimonial_nonce'] )
            ),
            'testimonial_form_action'
        )
    ) {
        return;
    }

    $prenom = isset( $_POST['testimonial_prenom'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['testimonial_prenom'] )
        )
        : '';

    $ville = isset( $_POST['testimonial_ville'] )
        ? sanitize_text_field(
            wp_unslash( $_POST['testimonial_ville'] )
        )
        : '';

    $note = isset( $_POST['testimonial_note'] )
        ? absint( $_POST['testimonial_note'] )
        : 0;

    $message = isset( $_POST['testimonial_message'] )
        ? sanitize_textarea_field(
            wp_unslash( $_POST['testimonial_message'] )
        )
        : '';

    if (
        empty( $prenom ) ||
        empty( $message ) ||
        $note < 1 ||
        $note > 5
    ) {
        return;
    }

    $post_id = wp_insert_post(
        array(
            'post_type'    => 'temoignage',
            'post_title'   => 'Témoignage de ' . $prenom,
            'post_content' => $message,
            'post_status'  => 'pending',
        ),
        true
    );

    if ( is_wp_error( $post_id ) ) {
        return;
    }

    update_post_meta(
        $post_id,
        '_temoignage_prenom',
        $prenom
    );

    update_post_meta(
        $post_id,
        '_temoignage_ville',
        $ville
    );

    update_post_meta(
        $post_id,
        '_temoignage_note',
        $note
    );

    /* =========================================================
    NOTIFICATION PAR E-MAIL
    ========================================================= */

    $to = 'antonio.contact38@gmail.com';

    $mail_subject = 'Nouveau témoignage à relire — Services & Compagnie';

    $mail_message =
        "Un nouveau témoignage vient d'être déposé sur le site.\n\n" .
        "Prénom : " . $prenom . "\n" .
        "Ville : " . ( $ville ? $ville : 'Non renseignée' ) . "\n" .
        "Note : " . $note . "/5\n\n" .
        "Témoignage :\n" .
        $message . "\n\n" .
        "Le témoignage est actuellement en attente de relecture.\n\n" .
        "Vous pouvez le consulter dans WordPress :\n" .
        get_edit_post_link( $post_id, '' );

    wp_mail(
        $to,
        $mail_subject,
        $mail_message
    );

    wp_safe_redirect(
        home_url( '/temoignage-envoye/' )
    );

    exit;
    }

add_action(
    'template_redirect',
    'antonio_services_handle_testimonial_form'
);

/* =========================================================
   COMPTEUR DE VISITES
   ========================================================= */

function antonio_services_count_visit() {

    if ( is_admin() ) {
        return;
    }

    if ( current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( wp_doing_ajax() ) {
        return;
    }

    if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
        return;
    }

    if ( is_feed() ) {
        return;
    }

    if ( isset( $_COOKIE['antonio_visit_counted'] ) ) {
        return;
    }

    $count = (int) get_option(
        'antonio_services_visit_count',
        0
    );

    $count++;

    update_option(
        'antonio_services_visit_count',
        $count
    );

    setcookie(
        'antonio_visit_counted',
        '1',
        time() + 1800,
        COOKIEPATH,
        COOKIE_DOMAIN
    );
}

add_action(
    'template_redirect',
    'antonio_services_count_visit'
);

add_action( 'template_redirect', 'antonio_services_count_visit' );


function antonio_services_get_visit_count() {

    return (int) get_option(
        'antonio_services_visit_count',
        0
    );
}