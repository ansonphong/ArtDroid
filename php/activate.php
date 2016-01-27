<?php  
add_action("after_switch_theme", "theme_install", 10 , 2);  

function theme_install(){
	postworld_install(array(
		'tables' => array(
			
			)
		));
}


add_action("after_switch_theme", "theme_activate_artdroid", 10 ,  2);
function theme_activate_artdroid($oldname, $oldtheme=false){

	/**
	 * Check if there are any menus created.
	 * If there is a menu, set the first menu as the main menu.
	 * If not, create an empty menu, add up to 3 pages to the menu,
	 * and then set that as the primary menu.
	 */

	/**
	 * Flush permalinks, so that /blog works.
	 */

}

?>