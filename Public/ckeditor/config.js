/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'zh-cn';
	config.entities = true;
	config.tabSpaces = 8;
	// config.enterMode = CKEDITOR.ENTER_P;
	config.enterMode = CKEDITOR.ENTER_BR;
	//ckfinder config
	config.filebrowserImageBrowseUrl= '/ckfinder/ckfinder.html?Type=Images'; 
	config.uiColor = '#FFFFFF';
	config.toolbar =
        [
            ['Source'],

            // ['Save','NewPage','Preview','-','Templates'],
            ['Preview'],

			// ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
			['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],

			// ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
			['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],

			// ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
			['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',],

			// ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
			['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],

			"/",

			// ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
			['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],

			// ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			
			// ['Link','Unlink','Anchor'],
			['Link','Unlink','Anchor'],

			// ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
			['Image','Table','HorizontalRule','Smiley','SpecialChar'],
			
			// ['Styles','Format','Font','FontSize'],
			['Styles','Format','Font','FontSize'],

			// ['TextColor','BGColor'],
			['TextColor','BGColor'],
			
			// ['Maximize', 'ShowBlocks','-','About']
			['Maximize']
        ]
};
