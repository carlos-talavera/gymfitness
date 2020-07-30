<?php get_header(); // Página de blog ?>

    <main class="pagina seccion no-sidebars contenedor">
        <h1 class="text-center texto-primario h-blog">Blog</h1>
        <ul class="listado-blog">
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/loop', 'blog'); ?>
            <?php endwhile; ?>
        </ul>
    </main>

<?php get_footer(); ?>