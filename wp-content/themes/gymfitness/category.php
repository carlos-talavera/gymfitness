<?php get_header(); ?>

    <main class="pagina seccion no-sidebars contenedor">
        <?php $categoria = get_queried_object(); // Retorna el query más actual, el que se esté ejecutando en ese preciso momento ?>
        <h2 class="text-center texto-primario">Categoría: <?php echo $categoria->name; ?></h2>
        <ul class="listado-blog">
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/loop', 'blog'); ?>
            <?php endwhile; ?>
        </ul>
    </main>

<?php get_footer(); ?>