<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title() ?></h1>
        <?php the_content() ?>

    <?php endwhile; ?>
<?php else : ?>
    Товара нет.
<?php endif; ?>

<?php get_footer() ?>