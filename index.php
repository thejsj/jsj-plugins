<?php

    $queried_object = get_queried_object();

    if(is_404()){
        $this_object = new FourOFour();
    }
    elseif(is_front_page() || is_home()){
        $this_object = new Home($queried_object);
    }
    elseif(is_singular()){
         if(is_single() || is_page()){
            $this_object = new Single($queried_object);
        }
    }
    elseif(is_post_type_archive()){
        $this_object = new PieceDisplay($queried_object);
    }
    elseif(is_category()){
        $this_object = new PostDisplay($queried_object);
    }
    else {
        $this_object = new FourOFour();
    }
    
    $json_mode = false;

    /* Render Content */
    get_header(); ?>
<?php $this_object->render_template(); ?>
<?php get_footer(); ?>