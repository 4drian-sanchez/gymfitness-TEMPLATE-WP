<?php
get_header();
?>

<main class="contenedor seccion con-sidebar">
    <section>
        <?php
        get_template_part('template-parts/pagina')
        ?>
    </section>
    <aside>
        <?php get_sidebar(); ?>
    </aside>

</main>

<?php
get_footer();
?>