<?php
/*
    * Template Name: Contenido Centrado (No Sidebars)
    */
get_header();
?>

<main class="contenedor seccion">
    <?php
    while (have_posts()) : the_post();
        the_title('<h1 class="text-center text-primary">', '</h1>');

        //Obtener la galeria
        $galeria = get_post_gallery(get_the_ID(), false);

        //Obtener los IDs en un array
        $imagenes_galeria_ID =  explode(",", $galeria['ids']);

    ?>
        <ul class="galeria-imagenes">
            <?php
            foreach ($imagenes_galeria_ID as $id) {
                $imagen_grande = wp_get_attachment_image_src($id, 'large')[0];
                $imagen_full = wp_get_attachment_image_src($id, 'full')[0];

            ?>
                <li>
                    <a data-lightbox="galeria" href="<?php echo $imagen_full; ?>">
                        <img src="<?php echo $imagen_grande; ?>" alt='imagen de la galeria'>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php


    endwhile;
    ?>
</main>

<?php
get_footer();
