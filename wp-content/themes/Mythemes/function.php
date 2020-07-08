<?php
    function university_files(){
        //load css and js
        wp_enqueue_style('university_main',get_stylesheet_uri());
        //name,

    }

 add_action('wp_enqueue_scripts','university_files');

 ?>