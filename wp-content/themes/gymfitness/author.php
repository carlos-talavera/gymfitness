<?php get_header(); ?>

    <main class="pagina seccion no-sidebars contenedor">
        <?php $autor = get_queried_object(); // Retorna el query más actual, el que se esté ejecutando en ese preciso momento ?>
        <h2 class="text-center texto-primario">Autor: <?php echo $autor->data->display_name; ?></h2>
        <p class="text-center"><?php echo get_the_author_meta('description', $autor->data->id); ?></p>
        <ul class="listado-blog">
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/loop', 'blog'); ?>
            <?php endwhile; ?>
        </ul>
    </main>

<?php get_footer(); ?>