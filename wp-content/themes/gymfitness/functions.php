<?php

/* Escribir funciones que se comuniquen con WordPress por medio de un hook, importante usar un prefijo (como el nombre de la página) para evitar problemas con funciones que tengan el mismo nombre */

/** Consultas reutilizables **/

require get_template_directory() . '/inc/queries.php';
require get_template_directory() . '/inc/shortcodes.php'; // Importantísimo

// Cuando el tema es activado

function gymfitness_setup() {

    // Habilitar imágenes destacadas

    add_theme_support('post-thumbnails');

    // Títulos SEO, con esto se cambia el título de la página de ser la URL a el título como tal de lo que se está viendo, y ayuda al SEO, obvio

    add_theme_support('title-tag');

    // Agregar imágenes de tamaño personalizado, usar plugin Regenerate Thumbnails para regenerar las imágenes automáticamente y no tener que volver a subir todas para que acepten los nuevos tamaños que creamos

    add_image_size('square', 350, 350, true); // Nombre, ancho, alto, y si queremos que WordPress corte la imagen
    add_image_size('portrait', 350, 724, true); // Más alto que ancho
    add_image_size('cajas', 400, 375, true); 
    add_image_size('mediano', 700, 400, true); 
    add_image_size('blog', 966, 644, true); 

}

add_action('after_setup_theme', 'gymfitness_setup');

// Poder crear menús

function gymfitness_menus() {

    register_nav_menus(array(

        'menu-principal' => __('Menu Principal', 'gymfitness') // Lo que entiende WordPress => Lo que se muestra al usuario, los guiones bajos son para traducir, el primer argumento es lo que se mostrará, y el segundo el text domain, que usualmente es el definido en el tema, se pueden agregar cuantos menús deseemos

    ));

}

// Hooks en WordPress = Funciones que se ejecutan en determinado momento y lugar

add_action('init', 'gymfitness_menus'); // init hace referencia a que se ejecutará en cuanto se inicialice la página, y el otro argumento es el nombre de la función a ejecutar, esto hace que se puedan agregar menús en el tema

/* Scripts y styles, o sea, JavaScript y CSS */

function gymfitness_scripts_styles() {

    // Normalize

    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    // SlickNav CSS

    wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');

    // Google Fonts

    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');

    if(is_page('galeria')):

        // Lightbox CSS

        wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3');

    endif;

    if(is_page('contacto')):

        // Leaflet CSS

        wp_enqueue_style('leafletCSS', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css', array(), '1.6.0');

    endif;

    if(is_page('inicio')):

        // BxSilder CSS

        wp_enqueue_style('bxsliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');

    endif;

    // La hoja de estilos principal

    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0'); // Nombre del archivo a cargar, se recomienda que se use el nombre de la tecnología, por ejemplo Angular ($handle),  el segundo es la ruta del archivo, en este caso la función obtendrá la ruta del archivo de estilos ($src), el tercero son las dependencias, cuando no haya se pasa un arreglo vacío, en este caso se le pasa normalize porque necesitamos que normalize se cargue antes que nuestros estilos, pues primero hay que reiniciar los estilos por default, y luego ya aplicar los nuestros, al final es decir que style depende de normalize ($deps), el cuarto es la versión, es importante colocar una porque si se instala un plugin de caché, si se hacen cambios en la hoja de estilos, solo con cambiar la versión, se va a regenerar el caché ($ver), y el quinto es en qué dispositivo se va a usar la hoja de estilos, por ejemplo en una impresora, hay que indicarlo para que si alguien imprime tu página web, existan estilos que la impresora entienda y se vea bien la impresión, se puede eliminar si no hay uno en específico porque el default son todos los dispositivos ($media)

    // SlickNav JS

    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true); // Importantísimo agregar la dependencia de jQuery, el último parámetro es $in_footer, true para ponerlo en el footer, y false para ponerlo en el header

    if(is_page('galeria')): // Solo cargar Lightbox en la parte de la galería

        // Lightbox JS

        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true); 

    endif;

    if(is_page('contacto')):

        // Leaflet JS

        wp_enqueue_script('leafletJS', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', array(), '1.6.0', true);

    endif;

    if(is_page('inicio')):

        // BxSilder JS

        wp_enqueue_script('bxsliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);

    endif;

    // Scripts personalizados, propios

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles'); // Cargar hojas de estilo en la parte frontal del sitio web, también pueden ser scripts, archivos de JS o sus frameworks

/* Definir Zona de Widgets */

function gymfitness_widgets() {

    register_sidebar(array( // Se llama así porque en un inicio los widgets se ponían en el sidebar, pero después la gente comenzó a ponerlos en otros lugares
        'name' => 'Sidebar 1', // Nombre que se muestra en el panel de administración
        'id' => 'sidebar_1', // Nombre que se muestra a WordPress
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center texto-primario">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center texto-primario">',
        'after_title' => '</h3>'
    ));

}

add_action('widgets_init', 'gymfitness_widgets');

/* Imagen Hero */

function gymfitness_hero_image() {

    // Obtener ID página principal

    $front_page_id = get_option('page_on_front');

    // Obtener ID imagen

    $id_imagen = get_field('imagen_hero', $front_page_id); // La imagen es un custom field

    // Obtener imagen

    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

    // Style CSS

    wp_register_style('custom', false); // False para no agregar un archivo, solo inyectar el código

    wp_enqueue_style('custom');

    $imagen_destacada_css = "
        body.home .site-header {

            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url($imagen);

        }
    ";

    // Agregar estilos al estilo custom

    wp_add_inline_style('custom', $imagen_destacada_css);

}

add_action('init', 'gymfitness_hero_image', 0);
