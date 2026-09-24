<?php get_header(); ?>
<main class="section"><div class="container">
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<article><h1 class="section-title"><?php the_title(); ?></h1><?php the_content(); ?></article>
<?php endwhile; else: ?><p>Aucun contenu.</p><?php endif; ?>
</div></main>
<?php get_footer(); ?>
