


	
	
	
	tinymce.init({
		selector : '',
   
		plugins : 'image textcolor colorpicker',
		toolbar : 'image forecolor backcolor undo redo | styleselect | fontsizeselect | bold italic | link image ,alignleft aligncenter alignright | table',
		
		
       
        
    
		images_upload_url : document.location.origin +  '/tp/public_html' +  '/upload.php',
		automatic_uploads : false,

		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', document.location.origin + '/tp/public_html'  + '/upload.php');

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
        
	});



	
tinymce.init({
	selector: '#txt-lg',
	plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
	imagetools_cors_hosts: ['picsum.photos'],
	menubar: 'file edit view insert format tools table help',
	toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
	toolbar_sticky: true,
	autosave_ask_before_unload: true,
	autosave_interval: '30s',
	autosave_prefix: '{path}{query}-{id}-',
	autosave_restore_when_empty: false,
	autosave_retention: '2m',
	image_advtab: true,
	link_list: [
	  { title: 'My page 1', value: 'http://www.tinymce.com' },
	  { title: 'My page 2', value: 'http://www.moxiecode.com' }
	],
	image_list: [
	  { title: 'My page 1', value: 'http://www.tinymce.com' },
	  { title: 'My page 2', value: 'http://www.moxiecode.com' }
	],
	image_class_list: [
	  { title: 'None', value: '' },
	  { title: 'Some class', value: 'class-name' }
	],
	importcss_append: true,
	images_upload_url : document.location.origin +  '/tp/public_html' +  '/upload.php',
		automatic_uploads : false,

		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', document.location.origin + '/tp/public_html'  + '/upload.php');

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
	templates: [
		  { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
	  { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
	  { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
	],
	template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
	template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
	height: 600,
	image_caption: true,
	
	noneditable_noneditable_class: 'mceNonEditable',
	toolbar_mode: 'sliding',
	contextmenu: 'link image imagetools table',
	content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   });
   
  
   tinymce.init({
	selector: "textarea #txt-sm",
	menubar: false,
	plugins : 'textcolor colorpicker',
	toolbar: 'undo redo | styleselect | forecolor | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
});
	

tinymce.init({
	selector: "textarea.form-control.sm",
	menubar: false,
	placeholder: "Ask a question or post an update...",
  menubar: false,
  skin: "outside",
  toolbar_location: "bottom",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste",
		"textcolor colorpicker"
    ],
    toolbar: "insertfile undo redo | forecolor | fontsizeselect| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | table"
});



// --txtdescriopt
/* <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --> */
/* <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> */
//  <script>
// tinymce.init({
//   selector: '#description-textarea',
//   plugins: 'image code',
//   toolbar: 'undo redo | link image | code',
//   // enable title field in the Image dialog
//   image_title: true, 
//   // enable automatic uploads of images represented by blob or data URIs
//   automatic_uploads: true,
//   // add custom filepicker only to Image dialog
//   file_picker_types: 'image',
//   file_picker_callback: function(cb, value, meta) {
//     var input = document.createElement('input');
//     input.setAttribute('type', 'file');
//     input.setAttribute('accept', 'image/*');

//     input.onchange = function() {
//       var file = this.files[0];
//       var reader = new FileReader();
      
//       reader.onload = function () {
//         var id = 'blobid' + (new Date()).getTime();
//         var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
//         var base64 = reader.result.split(',')[1];
//         var blobInfo = blobCache.create(id, file, base64);
//         blobCache.add(blobInfo);

//         // call the callback and populate the Title field with the file name
//         cb(blobInfo.blobUri(), { title: file.name });
//       };
//       reader.readAsDataURL(file);
//     };
    
//     input.click();
//   }
// });
// </script>

/**
 * Bootstrap Confirm Delete
 * Author: Tom Kaczocha <tom@rawphp.org>
 * Licensed under the MIT license
 */


( function ( $, window, document, undefined )
{
    var bootstrap_confirm_delete = function ( element, options )
    {
        this.element = $( element );
        this.settings = $.extend(
            {
                debug: false,
                heading: 'Delete',
                message: 'Are you sure you want to delete this item?',
                data_type: null,
                callback: null,
                delete_callback: null,
                cancel_callback: null
            }, options || {}
        );

        this.onDelete = function ( event )
        {
            event.preventDefault();

            var plugin = $( this ).data( 'bootstrap_confirm_delete' );

            if ( undefined !== $( this ).attr( 'data-type' ) )
            {
                var name = $( this ).attr( 'data-type' );

                plugin.settings.heading = 'Delete ' + name[ 0 ].toUpperCase() + name.substr( 1 );
                plugin.settings.message = 'Are you sure you want to delete this ' + name + '?';
            }

            if ( null === document.getElementById( 'bootstrap-confirm-delete-container' ) )
            {
                $( 'body' ).append( '<div id="bootstrap-confirm-delete-container"><div id="bootstrap-confirm-dialog" class="modal fade"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 id="bootstrap-confirm-dialog-heading"></h4></div><div class="modal-body"><p id="bootstrap-confirm-dialog-text"></p></div><div class="modal-footer"><button id="bootstrap-confirm-dialog-cancel-delete-btn" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button><a id="bootstrap-confirm-dialog-delete-btn" href="#" class="btn btn-danger pull-right">Delete</a></div></div></div></div></div>' );
            }

            $( '#bootstrap-confirm-dialog-heading' ).html( plugin.settings.heading );
            $( '#bootstrap-confirm-dialog-text' ).html( plugin.settings.message );
            $( '#bootstrap-confirm-dialog' ).modal( 'toggle' );

            var deleteBtn = $( 'a#bootstrap-confirm-dialog-delete-btn' );
            var cancelBtn = $( 'a#bootstrap-confirm-dialog-cancel-delete-btn' );
            var hasCallback = false;

            if ( null !== plugin.settings.callback )
            {
                if ( $.isFunction( plugin.settings.callback ) )
                {
                    deleteBtn.attr( 'data-dismiss', 'modal' ).off('.bs-confirm-delete').on( 'click.bs-confirm-delete', { originalObject: $( this ) }, plugin.settings.callback );
                    hasCallback = true;
                }
                else
                {
                    console.log( plugin.settings.callback + ' is not a valid callback' );
                }
            }
            if ( null !== plugin.settings.delete_callback )
            {
                if ( $.isFunction( plugin.settings.delete_callback ) )
                {
                    deleteBtn.attr( 'data-dismiss', 'modal' ).off('.bs-confirm-delete').on( 'click.bs-confirm-delete', { originalObject: $( this ) }, plugin.settings.delete_callback );
                    hasCallback = true;
                }
                else
                {
                    console.log( plugin.settings.delete_callback + ' is not a valid callback' );
                }
            }
            if ( !hasCallback &&  '' !== event.currentTarget.href )
            {
                deleteBtn.attr( 'href', event.currentTarget.href );
            }

            if ( null !== plugin.settings.cancel_callback )
            {
                cancelBtn.off('.bs-confirm-delete').on( 'click.bs-confirm-delete', { originalObject: $( this ) }, plugin.settings.cancel_callback );
            }
        };
    };

    $.fn.bootstrap_confirm_delete = function ( options )
    {
        return this.each( function ()
        {
            var element = $( this );

            if ( element.data( 'bootstrap_confirm_delete' ) )
            {
                return element.data( 'bootstrap_confirm_delete' );
            }

            var plugin = new bootstrap_confirm_delete( this, options );

            element.data( 'bootstrap_confirm_delete', plugin );
            element.off('.bs-confirm-delete').on( 'click.bs-confirm-delete', plugin.onDelete );

            return plugin;
        } );
    };
}( jQuery, window, document, undefined ));