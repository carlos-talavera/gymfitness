<?php get_header(); ?>

    <main class="contenedor pagina seccion con-sidebar">
        <div class="contenido-principal">
           <?php get_template_part('template-parts/paginas'); // Incluir la página que es un fragmento del template, una parte de este ?>
        </div>
        <?php get_sidebar('clases'); // Especificar el archivo del sidebar, solo con el nombre después del guion ?>
    </main>

<?php get_footer(); ?>