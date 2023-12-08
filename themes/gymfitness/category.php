<?php
get_header();
?>

<main class="contenedor seccion">
    <?php 
        $categoria = get_queried_object();
    ?>
    <h1 class="text-primary text-center">Categoria:  <?php echo $categoria->name ?></h1>
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

<?php
get_footer();
?>