<?php
get_header();
?>

<main class="contenedor seccion">
    <?php
    //ciclo  de WordPress
    while (have_posts()) : the_post();

        the_title('<h1 class="text-center text-primary">', '</h1>');
        the_content();

    endwhile;
    ?>
</main>

<?php
get_footer();
?>