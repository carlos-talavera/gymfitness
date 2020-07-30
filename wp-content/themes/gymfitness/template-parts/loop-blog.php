    
    <li class="card gradient">
        <?php the_post_thumbnail('mediano'); ?>
        <?php the_category(); ?>
        <div class="contenido">
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
            <p class="meta">
                <span>Por: </span>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); // URL de los posts del autor de la entrada ?>">
                    <?php echo get_the_author_meta('display_name'); // Agregar nombre y cambiar alias y el nombre a mostrar desde los ajustes de WP ?>
                </a>
            </p>
            <p class="meta">
                <span>Fecha: </span>
                <?php the_time(get_option('date_format')); // options.php ?>
            </p>
        </div>
    </li>