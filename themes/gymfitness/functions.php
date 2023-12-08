<?php
//agrega los widgets
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';

//Agrega imagenes destacadas
function gymfitness_setup()
{
    add_theme_support("post-thumbnails");

    /* ¿Qué hace la siguiente línea?*/  
    add_theme_support('title-tag');
};
add_action('after_setup_theme', 'gymfitness_setup');

//Muestra el menu
function gymfitness_menus()
{

    register_nav_menus([
        /* el segundo argumento es el text domain*/
        'menu-principal' => __('Menu principal', 'gymfitness')
    ]);
};
add_action('init', 'gymfitness_menus');

//Agrega los estilos y JavaScript
function gymfitness_scripts()
{
    //css
    wp_enqueue_style(
        'normalize',
        get_stylesheet_directory_uri() . '/normalize.css',
        array(),
        '8.0.1',
        'all'
    );
    wp_enqueue_style(
        'style',
        get_stylesheet_uri(),
        array('normalize'),
        '1.0.0'
    );

    if (is_page('galeria')) {
        wp_enqueue_style(
            'lightbox',
            get_template_directory_uri() . '/css/lightbox.min.css',
            array('normalize', 'style'),
            '2.11.4'
        );
    }

    if (is_front_page()) {
        wp_enqueue_style(
            'swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array('normalize', 'style'),
            '11.0.4'
        );
    }

    //js

    if (is_page('galeria')) {
        wp_enqueue_script(
            'lightbox',
            get_template_directory_uri() . '/js/lightbox.min.js',
            array('jquery'),
            '2.11.4',
            true
        );
    }
    
    wp_enqueue_script(
        'app',
        get_template_directory_uri() . '/js/app.js',
        array(),
        '1.0.0',
        true
    );

    if (is_front_page()) {
        wp_enqueue_script(
            'swiper',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array(),
            '11.0.4',
            true
        );
        wp_enqueue_script(
            'anime',
            'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js',
            array('app'),
            true
        );
    }


};
add_action('wp_enqueue_scripts', 'gymfitness_scripts');

//Definir zona de widgets
function gymfitness_widgets()
{
    register_sidebar(array(
        'name' => 'sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center primary">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center primary">',
        'after_title' => '</h3>'
    ));
};

add_action('widgets_init', 'gymfitness_widgets');


//Crear Shortcode

function gymfitness_ubicacion_shortcode()
{
?>
    <div class="mapa">
        <?php
        //Mostrar el mapa 
        if (is_page('contacto')) {
            the_field('ubicacion');
        };

        ?>
    </div>

    <!-- Falto agregar sandinblue para envio de correos!! -->
<?php
    echo do_shortcode('[contact-form-7 id="3660f3e" title="Formulario de contacto 1"]');
}

add_shortcode('gymfitness_ubicacion', 'gymfitness_ubicacion_shortcode');

/* Añadiendo imagenes de fondo dinámicamente desde el servidor */
function gymfitness_hero_imagen()
{

    //Obtener el ID de la página
    $front_id = get_option('page_on_front');

    //Obtener la imagen
    $id_imagen = get_field('hero_imagen', $front_id)["id"];

    //Obtener la ruta de la imagen
    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

    //Crear css
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $imagen_destacada = "
    body.home .header {
        background-image: linear-gradient( to right, rgb(0 0 0 / .75), rgb(0 0 0 / .75)),
                            url($imagen)
    }";

    //inyectar css
    wp_add_inline_style('custom', $imagen_destacada);
};

add_action('init', 'gymfitness_hero_imagen');
