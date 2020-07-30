<?php get_header(); // Esta página funciona porque utilizamos el slug de nuestras-clases, que corresponde a la página de clases, de otra forma, no funcionaría ?>

    <main class="contenedor pagina seccion no-sidebar">
        <div class="text-center">
            <?php get_template_part('template-parts/paginas'); // Incluir la página que es un fragmento del template, una parte de este ?>
            <?php gymfitness_lista_clases(); ?>
        </div>
    </main>

<?php get_footer(); ?>