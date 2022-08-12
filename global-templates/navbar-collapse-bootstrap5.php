<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav>
    		<div class="menu-links">
    			<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'fellows',
							'fallback_cb'     => '',
							'menu_id'         => 'fellows-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
	    		<!-- <a href="https://dlinq.middcreate.net">DLINQ</a>
	    		<a href="mailto:dlinq@middcreate.net?subject=Digital%20Teaching%20and%20Learning%20Fellowship">Contact Us</a>
	    		<a href="#apply">Apply</a> -->
	    	</div>
</nav>