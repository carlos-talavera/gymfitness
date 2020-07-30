<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // En esta función corren muchas funciones, pero una de ellas es la de wp_enqueue_scripts, que al ser llamada aquí, cargará la hoja de estilos ?>
</head>
<body <?php body_class(); // Generar ciertas clases únicas del body ?>>

    <header class="site-header">
        <div class="contenedor header-grid">
            <div class="barra-navegacion">
                <div class="logo">
                    <a href="<?php echo esc_url(site_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); // Obtiene la ruta del servidor y la carpeta actual, para tener funciones portables ?>/img/logo.svg">
                    </a>
                </div>
                
                <?php
                
                    $args = array(
                        'theme_location' => 'menu-principal', // Qué menú se va a mostrar
                        'container' => 'nav', // Qué tipo de elemento HTML se va a crear para mostrarlo
                        'container_class' => 'menu-principal' // Clase que tendrá el menú
                    ); // Es convención de WordPress llamarlo args

                    wp_nav_menu($args); // Mostrar el menú, agregarlo a la página
                
                ?>
            </div> <!-- .barra-navegacion -->

            <div class="tagline text-center">
                <h1><?php the_field('encabezado_hero'); ?></h1>
                <p><?php the_field('contenido_hero'); ?></p>
            </div>
        </div>
    </header>