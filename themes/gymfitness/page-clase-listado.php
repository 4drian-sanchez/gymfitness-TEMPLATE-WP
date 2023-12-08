<?php
/*
    * Template Name: Listado de clases (No Sidebars)
    */
get_header();
?>

<main class="contenedor seccion">
    <?php
    get_template_part('template-parts/pagina')
    ?>
    <?php listado_clases() ?>
</main>

<?php
get_footer();
