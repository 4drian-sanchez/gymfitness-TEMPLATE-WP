<?php
get_header();
?>

<main class="contenedor seccion">

    <?php
    $author = get_queried_object();
    ?>

    <h1 class="text-primary text-center">Autor:
        <?php echo $author->data->display_name ?>
    </h1>

    <p class="text-center"> <?php echo get_the_author_meta('description', $author->data->ID) ?></p>

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