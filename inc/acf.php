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
            $image_url = $image['sizes']['medium'];
            
            $focus = get_sub_field('project_focus');
            $focus_prompt = get_sub_field_object('project_focus')['label'];

            $theme = get_sub_field('project_theme');
            $theme_prompt = get_sub_field_object('project_theme')['label'];

            $impact = get_sub_field('project_impact');
            $impact_prompt = get_sub_field_object('project_impact')['label'];

            // Do something...
            $fellow_index .= "
                <li class='fellow-link'><a href='#{$clean_name}'>{$name}</a></li>
            ";
            $html .= "
                <div class='fellow' id='{$clean_name}'>
                    <div class='fellow-img'>
                        <img src='{$image_url}' alt='Bio picture for {$name}.'>
                        <h2>{$name}</h2>
                        <div class='fellow-title'>{$title}</div>
                    </div>
                    <div class='fellow-text'>                        
                        <h3>{$focus_prompt}</h3>
                        {$focus}
                        <h3>{$theme_prompt}</h3>
                        {$theme}
                        <h3>{$impact_prompt}</h3>                        
                        {$impact}
                    </div>
                </div>
            ";
        // End loop.
        endwhile;
        echo "<div class='fellow-index'><ul>{$fellow_index}</ul></div><div class='fellow-box'>{$html}</div>";
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