<?php  
///// INSTALL POSTWORLD /////
add_action("after_switch_theme", "postworld_install", 10 , 2);  

add_action("after_switch_theme", "theme_activate_artdroid", 10 ,  2);
function theme_activate_artdroid($oldname, $oldtheme=false){

	/**
	 * Check if there are any menus created.
	 * If there is a menu, set the first menu as the main menu.
	 * If not, create an empty menu, add up to 3 pages to the menu,
	 * and then set that as the primary menu.
	 */

}

?>