<?php
/**
 * Custom ACF and any data
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function dlinq_fellows_lister(){
    $fellow_index = '';
    $html = '';
     if( have_rows('fellow_details') ):

        // Loop through rows.
        while( have_rows('fellow_details') ) : the_row();

            // Load sub field value.
            $name = get_sub_field('name');
            $clean_name = sanitize_title($name);
            $title = get_sub_field('title');
            $image = get_sub_field('image');
            $focus = get_sub_field('project_focus');
            $theme = get_sub_field('project_theme');
            $impact = get_sub_field('project_impact');
            // Do something...
            $fellow_index .= "
                <div class='fellow-link'><a href='#{$clean_name}'>{$name}</a></div>
            ";
            $html .= "
                <div class='fellow' id='{$clean_name}'>
                    <h2>{$name}</h2>
                    <div class='fellow-title'>{$title}</div>
                    <div class=''>{$focus}</div>
                    <div class=''>{$theme}</div>
                    <div class=''>{$impact}</div>
                </div>
            ";
        // End loop.
        endwhile;
        echo "<div class='fellow-index'>{$fellow_index}</div> {$html}";
        // No value.
        else :
            // Do something...
        endif;
}


//save acf json
add_filter('acf/settings/save_json', 'this_json_save_point');
 
function this_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory(). '/acf-json'; //replace w get_stylesheet_directory() for theme
    
    
    // return
    return $path;
    
}


// load acf json
add_filter('acf/settings/load_json', 'this_json_load_point');

function this_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
    
    
    // return
    return $paths;
    
}