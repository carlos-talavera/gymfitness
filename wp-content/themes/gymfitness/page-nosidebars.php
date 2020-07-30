<?php
/*
* Template Name: Contenido Centrado (No Sidebars)
*/
    get_header();

?>
    <main class="contenedor pagina seccion no-sidebar">
        <div class="contenido-principal">
            <?php get_template_part('template-parts/paginas'); // Incluir la página que es un fragmento del template, una parte de este ?>
        </div>
    </main>
<?php get_footer(); ?>