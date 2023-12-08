<?php
get_header();
?>

<main class="contenedor seccion">
    <ul class="listado-grid">
        <?php
        while (have_posts()) {
            the_post();
        ?>
        <?php
            get_template_part('/template-parts/blog');
        }
        ?>
    </ul>
</main>

<div class="paginador">
    <?php
    the_posts_pagination();
/*     posts_nav_link() */
    ?>
</div>
<?php
get_footer();
?>