<?php
get_header();
?>

<main class="contenedor seccion">
    <?php
    get_template_part('template-parts/post')
    ?>

</main>

<div class="comentarios">
    <?php comment_form() ?>

    <!-- Mostrar comentarios -->
    <h3 class="text-center text-primary">Comentarios</h3>
    <ul class="listado-comentarios">
        <?php 
        
            $comentarios = get_comments([
                'post_id' => $post->ID,
                'status' => 'approve'
            ]);

            if($comentarios) {
                wp_list_comments([
                    'per_page' => 10,
                    'reverse_top_level' => false
                ], $comentarios);
            }else {
                ?>
                    <h4 class="text-center text-primary">No hay comentarios</h4>
                <?php
            }
        ?>
    </ul>
</div>
<?php
get_footer();
?>