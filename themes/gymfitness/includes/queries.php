<?php

function listado_clases($cantidad = -1)
{
?>
    <ul class="listado-grid">
        <?php

        $args = array(
            'post_type' => 'gymfitness_clases',
            'posts_per_page' => $cantidad
        );
        $clases = new WP_Query($args);

        while ($clases->have_posts()) {
            $clases->the_post();
        ?>

            <li class="card">
                <?php the_post_thumbnail() ?>
                <div class="contenido">

                    <a href="<?php the_permalink() ?>">
                        <h3> <?php the_title(); ?> </h3>
                    </a>

                    <?php
                    $hora_inicio = get_field("hora_inicio");
                    $hora_fin = get_field('hora_fin');
                    ?>

                    <p> <?php the_field('dias_clase'); ?> - de
                        <?php echo $hora_inicio . ' a ' . $hora_fin; ?>
                    </p>
                </div>
            </li>

        <?php
        };
        wp_reset_postdata();
        ?>
    </ul>
<?php
}

function listado_instructores()
{
?>
    <h2 class="text-center text-primary instructores-heading">Nuestros instructores</h2>
    <ul class="listado-grid instructores">

        <?php
        $args = array(
            'post_type' => 'instructores'
        );

        $instructores = new WP_Query($args);

        while ($instructores->have_posts()) {
            $instructores->the_post();
        ?>

            <li class="instructor text-center">
                <?php the_post_thumbnail('large') ?>

                <div class="contenido">
                    <h3> <?php the_title() ?></h3>
                    <?php the_content() ?>

                    <div class="especialidad-contenedor">
                        <?php
                        $especialidad = get_field('especialidad');

                        foreach ($especialidad as $e) {
                        ?>
                            <span class="especialidad"> <?php echo esc_html($e); ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>
        <?php
        };
        wp_reset_postdata();
        ?>
    </ul>
<?php
}

function listado_testimoniales()
{
?>
    <ul class="listado-testimoniales swiper-wrapper">

        <?php
        $args = array(
            'post_type' => 'testimoniales'
        );

        $testimoniales = new WP_Query($args);

        while ($testimoniales->have_posts()) {
            $testimoniales->the_post();
        ?>

            <li class="testimonial swiper-slide">
                <blockquote>
                    <?php the_content() ?>
                </blockquote>
                <footer>
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <p> <?php the_title() ?> </p>
                </footer>
            </li>
        <?php
        };
        wp_reset_postdata();
        ?>
    </ul>
<?php
}
