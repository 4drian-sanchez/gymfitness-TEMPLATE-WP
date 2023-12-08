<?php
get_header();
?>

<section class="bienvenida contenedor seccion">
    <h2 class="text-center text-primary"><?php echo the_field('heading_bienvenida') ?></h2>
    <p class="text-center"><?php echo the_field('texto_bienvenida') ?></p>
</section>

<section class="areas seccion">

    <div class="area">
        <?php
        $areas1 = get_field('area_1');
        $imagen1 = $areas1['imagen']['sizes']['large'];
        $texto1 = $areas1['texto'];
        ?>
        <img src="<?php echo esc_attr($imagen1) ?>" alt="">
        <p><?php echo esc_html($texto1) ?></p>
    </div>

    <div class="area">
        <?php
        $areas2 = get_field('area_2');
        $imagen2 = $areas2['imagen']['sizes']['large'];
        $texto2 = $areas2['texto'];
        ?>
        <img src="<?php echo esc_attr($imagen2) ?>" alt="">
        <p><?php echo esc_html($texto2) ?></p>
    </div>

    <div class="area">
        <?php
        $areas3 = get_field('area_3');
        $imagen3 = $areas3['imagen']['sizes']['large'];
        $texto3 = $areas3['texto'];
        ?>
        <img src="<?php echo esc_attr($imagen3) ?>" alt="">
        <p><?php echo esc_html($texto3) ?></p>
    </div>

    <div class="area">
        <?php
        $areas4 = get_field('area_4');
        $imagen4 = $areas4['imagen']['sizes']['large'];
        $texto4 = $areas4['texto'];
        ?>
        <img src="<?php echo esc_attr($imagen4) ?>" alt="">
        <p><?php echo esc_html($texto4) ?></p>
    </div>
</section>

<main class="contenedor">
    <h2 class="text-center text-primary">Nuestras clases</h2>
    <?php listado_clases(4) ?>

    <div class="contenedor-boton">
        <a 
            href="<?php echo esc_url( get_permalink(37) ) ?>" class="btn btn-primary text-center"
            >Todas nuestras clases</a>
    </div>
</main>

    <section class="contenedor seccion">
        <?php listado_instructores() ?>
    </section>

    <section class="testimoniales ">
        <h2 class="text-center text-rpimary">Testimoniales</h2>
        <div class="testimoniales-contenedor swiper">
            <?php listado_testimoniales() ?>
        </div>
    </section>

    <!-- BLOGS -->
    <section class="contenedor seccion text-center">
        <h2 class="text-primary">Nuestro Blog</h2>
        <p>Aprende tips de nuestros instructores expertos</p>

        <ul class="listado-grid">
            <?php 
                $args = [
                    'post_type' => 'post',
                    'post_per_page' => 4
                ];

                $blogs = new WP_Query($args);

                while($blogs->have_posts()) {
                    $blogs-> the_post();

                    get_template_part('template-parts/blog');
                }

                wp_reset_postdata();
            ?>
        </ul>
    </section>
<?php
get_footer();
?>