<?php
//ciclo  de WordPress
while (have_posts()) : the_post();
    the_title('<h1 class="text-center text-primary">', '</h1>');
    //Agrega imagenes destacadas
    if (has_post_thumbnail()) {
        the_post_thumbnail('full', array('class' => 'imagen-destacada'));
    }

    the_content();
endwhile;
