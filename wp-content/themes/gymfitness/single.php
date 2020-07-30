<?php get_header(); ?>

    <main class="contenedor pagina seccion con-sidebar">
        <div class="contenido-principal">
           <?php get_template_part('template-parts/paginas'); // Incluir la página que es un fragmento del template, una parte de este ?>
        </div>
        <?php get_sidebar(); ?>
    </main>

<?php get_footer(); ?>