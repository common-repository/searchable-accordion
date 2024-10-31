<?php
/**
 * Plugin Name: TinyMCE Custom Class
 * Plugin URI: http://sitepoint.com
 * Version: 1.0
 * Author: Tim Carr
 * Author URI: http://www.n7studios.co.uk
 * Description: TinyMCE Plugin to wrap selected text in a custom CSS class, within the Visual Editor
 * License: GPL2
 */
 
class NafsAccTinyMCE_Custom_Class {
 
    /**
    * Constructor. Called when the plugin is initialised.
    */
    function __construct() {
 
 		if ( is_admin() ) {
		    add_action( 'init', array( &$this, 'setup_tinymce_plugin' ) );
		    add_action( 'admin_enqueue_scripts', array( &$this, 'admin_scripts_css' ) );
		    add_action( 'admin_print_footer_scripts', array( &$this, 'admin_footer_scripts' ) );
		}

    }

    /**
	* Check if the current user can edit Posts or Pages, and is using the Visual Editor
	* If so, add some filters so we can register our plugin
	*/
	function setup_tinymce_plugin() {
	 
	    // Check if the logged in WordPress User can edit Posts or Pages
	    // If not, don't register our TinyMCE plugin
	    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
	        return;
	    }
	 
	    // Check if the logged in WordPress User has the Visual Editor enabled
	    // If not, don't register our TinyMCE plugin
	    if ( get_user_option( 'rich_editing' ) !== 'true' ) {
	        return;
	    }
	 
	    // Setup some filters
	    add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
	    add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );
	 
	}

	/**
	 * Adds a TinyMCE plugin compatible JS file to the TinyMCE / Visual Editor instance
	 *
	 * @param array $plugin_array Array of registered TinyMCE Plugins
	 * @return array Modified array of registered TinyMCE Plugins
	 */
	function add_tinymce_plugin( $plugin_array ) {
		// Check if the logged in WordPress User can edit Posts or Pages
	    
	    // Check if the logged in WordPress User has the Visual Editor enabled
	    // If not, don't register our TinyMCE plugin
	    if ( get_user_option( 'rich_editing' ) == 'true' && current_user_can( 'edit_posts' ) &&current_user_can( 'edit_pages' )) {
	 add_thickbox();
	 echo '	<table id="map-insert-info" style="height:0; display:block;"><tbody><tr><td>	<div id="my-content-id" style="display:none;">
			<div class="wrap">
			<div id="tabs-container">';
 			echo '<div class="tab"><div id="tab-1" class="tab-content">';
			echo $current_maps = $this->getForm();
			echo '</div>';
			echo '</div>';
	echo ' 	</div>
			</div></div></td></tr><tr><td>';

	echo '<a title="Create an accrodion item" style="width:0; height:0; font-size:0; color:transparent;	" href="#TB_inline?width=600&height=550&inlineId=my-content-id" class="thickbox" id="nafs_accordion_popuptrigger">View my inline content!</a></td></tr></tbody></table>';
	    $plugin_array['custom_class'] = plugin_dir_url( __FILE__ ) . 'tinymce-custom-class.js';
	    return $plugin_array;
		}
	}
function getForm()
{
	return '<div class="form-wrap-nafs_gmap">Please fill in, all the boxes with appropriate values.
	<div class="nafs-form-el-wrap">
	<label for="nafs-item-title">Item Title</label>
	<input type="text" name="nafs-item-title" id="nafs-item-title" class="form-input-tip">
	<div class="help">Enter the title of current accordion item</div>
	</div>
	<div class="nafs-form-el-wrap">
	<label for="nafs-item-discription">Content</label>
	<textarea name="nafs-item-discription" id="nafs-item-discription" class="form-input-tip"></textarea>
	<div class="help">Enter the content to be shown inside accordion</div>
	</div>
	<div class="nafs-form-el-wrap">
	<label for="nafs-item-type">Filter Type</label>
	<input type="text" name="nafs-item-type" id="nafs-item-type" class="form-input-tip">
	<div class="help">Filter Type will be used to create a list, which will help to do filter action (on the display)</div>
	</div>

	<div class="nafs-form-el-wrap">
	<label for="nafs-insert-custom">&nbsp;</label>
	<button class="button custom-lat-lng" id="nafs-insert-custom">INSERT</button>
	</div>
	</div>';
}
	/**
	 * Adds a button to the TinyMCE / Visual Editor which the user can click
	 * to insert a custom CSS class.
	 *
	 * @param array $buttons Array of registered TinyMCE Buttons
	 * @return array Modified array of registered TinyMCE Buttons
	 */
	function add_tinymce_toolbar_button( $buttons ) {
	 
	    array_push( $buttons, 'custom_class' );
	    return $buttons;
	 
	}

	/**
	* Enqueues CSS for TinyMCE Dashicons
	*/
	function admin_scripts_css() {

		wp_enqueue_style( 'tinymce-custom-class', plugins_url( 'tinymce-custom-class.css', __FILE__ ) );
		add_editor_style( plugins_url('tinymce-custom-class-editor.css', __FILE__ ) );

	}

/**
* Adds the Custom Class button to the Quicktags (Text) toolbar of the content editor
*/
function admin_footer_scripts() {

	// Check the Quicktags script is in use
	if ( ! wp_script_is( 'quicktags' ) ) {
		return;
	}
	?>

	<?php

}
 
}
 
$tinymce_custom_class = new NafsAccTinyMCE_Custom_Class;