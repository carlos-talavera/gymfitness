<?php /* Loop de WordPress */ while( have_posts() ): the_post(); // Mientras haya posts, muestra el post, o más bien, recupera la info. del post ?>
    <h1 class="text-center texto-primario"><?php the_title(); ?></h1>
<?php
    if(has_post_thumbnail()):

        the_post_thumbnail('blog', array('class' => 'imagen-destacada')); // Agregar imagen a la página, se le pueden agregar tamaños, las imágenes están en uploads, bueno, ya no las pone ahí, solo le cambia el tamaño en el elemento img en HTML, sí las pone ahí, pero no tenía instalada la extensión Imagemagick jeje, locooo, ya jaló

    endif;
?>
    <?php

        // Revisar si el custom post type es clases
    
        if(get_post_type() === 'gymfitness_clases') {

            $hora_inicio = get_field('hora_inicio');
            $hora_fin = get_field('hora_fin');

            ?>
            <p class="informacion-clase"><?php the_field('dias_clase'); ?> - <?php echo $hora_inicio . ' a ' . $hora_fin; // the_field para mostrar un custom field ?></p>

    <?php } ?>

    <?php the_content(); ?>

<?php endwhile; ?>