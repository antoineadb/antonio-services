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