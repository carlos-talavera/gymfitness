<?php 
/*
    Template Name: Template para Galerías
*/
get_header(); ?>

    <main class="contenedor pagina seccion">
        <div class="contenido-principal">
           <?php while( have_posts() ): the_post(); ?>
            <h1 class="text-center texto-primario"><?php the_title(); ?></h1>

            <?php

                // Obtener la galería de la página actual
            
                $galeria = get_post_gallery(get_the_id(), false);
                $galeria_imagenes_ID = explode(',', $galeria['ids']); // Obtener los IDS y pasar de string a elementos de un array

            ?>

            <ul class="galeria-imagenes">
                <?php 

                    $i = 1;
                    foreach($galeria_imagenes_ID as $id): 
                        
                        $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
                        $imagen_thumb = wp_get_attachment_image_src($id, $size)[0]; // Obtener imagen a partir de su ID
                        $imagen = wp_get_attachment_image_src($id, 'full')[0];

                ?>

                    <li>
                        <a href="<?php echo $imagen; ?>" data-lightbox='galeria'>
                            <img src="<?php echo $imagen_thumb; ?>" alt="Img ID <?php echo $id; ?>">
                        </a>
                    </li>

                <?php $i++; endforeach; ?>
            </ul>

        <?php endwhile; ?>
        </div>
    </main>

<?php get_footer(); ?>