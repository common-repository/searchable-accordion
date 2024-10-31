var counter =0;
function nafsInsertCustom()
{
		var customShortCode = '';
		var title 			= jQuery("#nafs-item-title").val();
		var discription 	= jQuery("#nafs-item-discription").val();
		var type 			= jQuery("#nafs-item-type").val();
		var caret = "caret_pos_holder";
		if(++counter==1)
		customShortCode +='<div  id="nafs_accordion">';
		customShortCode += '<div data-type="accordion-section" data-filter="'+type+'">';
		customShortCode += '<h3 data-type="accordion-section-title">'+title+'</h3>';
		customShortCode += '<div class="accordion-content" data-type="accordion-section-body">'+discription+'</div>';
		customShortCode += '</div>';
		customShortCode += '<span id='+caret+'></span>';
		if(counter==1)
		customShortCode +='</div>';
		return customShortCode;
}
(function() {
    tinymce.PluginManager.add( 'custom_class', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('custom_class', {
            title: 'Insert Accordion',
            cmd: 'insert_nafs_accordion',
            icon: 'icon dashicons-sort',
        });
 
        // Add Command when Button Clicked
        editor.addCommand('insert_nafs_accordion', function() {
			//document.getElementById("theButton").onclick();
			var i=0;
			jQuery('#nafs_accordion_popuptrigger').trigger('click');
				
		jQuery("#nafs-insert-custom").click(function(){
		
					 editor.selection.select(editor.dom.select('span#caret_pos_holder')[0]); //select the span
                     editor.dom.remove(editor.dom.select('span#caret_pos_holder')[0]); //remove the span
					var nafscustomShortCode = nafsInsertCustom();
					editor.execCommand('mceInsertContent', false, nafscustomShortCode); 
					 editor.selection.select(editor.dom.select('span#caret_pos_holder')[0]); //select the span
			});
				
        });

				
        // Enable/disable the button on the node change event
        editor.onNodeChange.add(function( editor ) {
            // Get selected text, and assume we'll disable our button
            var selection = editor.selection.getContent();
            var disable = true;

            // If we have some text selected, don't disable the button
            if ( selection ) {
                disable = false;
            }

            // Define whether our button should be enabled or disabled
           // editor.controlManager.setDisabled( 'custom_class', disable );
        });
    });
})();