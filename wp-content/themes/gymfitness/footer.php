    
    <footer class="site-footer contenedor">
        <hr>

        <div class="contenido-footer">
            <?php
                
                $args = array(
                    'theme_location' => 'menu-principal', // Qué menú se va a mostrar
                    'container' => 'nav', // Qué tipo de elemento HTML se va a crear para mostrarlo
                    'container_class' => 'menu-principal' // Clase que tendrá el menú
                ); // Es convención de WordPress llamarlo args

                wp_nav_menu($args); // Mostrar el menú, agregarlo a la página
                
            ?>

            <p class="copyright text-center">Todos los derechos reservados. <?php echo get_blogInfo('name') . ' &copy; ' . date('Y'); ?></p>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>