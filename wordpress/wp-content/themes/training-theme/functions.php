<?php




    function training_theme_support(){
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }

    add_action('after_setup_theme','training_theme_support');

    function training_menus(){
        $location = array(
            'primary' => "Desktop  Primary Left sidebar",
            'footer'=>"Footer menu items"
        );

        register_nav_menus($location);
    }

    add_action('init','training_menus');



    function training_theme_register_style () {
        $version = wp_get_theme()->get( 'Version' );
         wp_enqueue_style('training-style', get_template_directory_uri() . "/style.css", array('bootstrap-style'), $version, 'all');
         wp_enqueue_style('bootstrap-style', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
         wp_enqueue_style('awesome-tyle', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    
    }

    add_action ('wp_enqueue_scripts', 'training_theme_register_style');

    function training_theme_register_script () {
        $version = wp_get_theme()->get( 'Version' );
         wp_enqueue_script('jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
         wp_enqueue_script('popper',"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
         wp_enqueue_script('bootstrap-script',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
         wp_enqueue_script('training-script',get_template_directory_uri() . "/assets/js/main.js", array(), $version, true);
    

    }

    add_action ('wp_enqueue_scripts', 'training_theme_register_script');


    function training_widget_area(){
        register_sidebar(
            array(
                'before_title'=>'<h2>',
                'after_title'=>'</h2>',
                'before_widget'=>'',
                'after_widget'=>'',
                'name'=>'Sidebar Area',
                'id'=>'sidebar-1',
                'description'=>'Sidebar Widget Area'
            )
        );

        register_sidebar(
            array(
                'before_title'=>'<h2>',
                'after_title'=>'</h2>',
                'before_widget'=>'',
                'after_widget'=>'',
                'name'=>'Footer Area',
                'id'=>'footer-1',
                'description'=>'Footer Widget Area'
            )
        );
    }

    add_action('widgets_init','training_widget_area');

?>