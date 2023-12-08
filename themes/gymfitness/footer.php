<footer class="footer contenedor">
    <div class="footer-contenido">
        <?php
        $args = [
            'theme_location' => 'menu-principal',
            'container' => 'nav',
            'container_class' => 'menu-principal'
        ];

        wp_nav_menu($args);

        ?>
        <p class="copyright"> Todos los derechos reservados,
            &COPY;<?php echo get_bloginfo() . ' ' . date('Y'); ?>
        </p>
    </div>
</footer>
<!-- Agregar el menu de opciones de WordPress -->
<?php wp_footer();  ?>
</body>
</html>