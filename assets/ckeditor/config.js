/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.uiColor = '#AADC6E';
	config.language = 'vi';
	// config.extraPlugins = 'youtube,widget,btgrid,bt_table,blockquote,glyphicons,emojione,btbutton,lineutils';
	// config.extraPlugins = 'youtube,widget,btgrid,bt_table,blockquote,glyphicons,emojione,btbutton,lineutils,simpleImageUpload,simpleImagesUpload';
	config.extraPlugins = 'youtube,widget,btgrid,bt_table,blockquote,glyphicons,emojione,btbutton,lineutils,simpleImagesUpload,simpleImagesSelect,lineheight';

	config.uploadUrl = '../assets/ckeditor/upload.php'; // Kèm theo plugin simpleImageUpload

	config.youtube_width = '500';
	config.youtube_height = '480';
	config.youtube_related = true;
	config.youtube_older = false;
	config.youtube_privacy = false;
	config.line_height = "1.0;1.1;1.2;1.3;1.4;1.5;1.6;1.7;1.8;1.9;2.0;2.1;2.2;2.3;2.4;2.5";

	config.allowedContent = true;
	config.bootstrapTab_managePopupContent = true;
	config.mj_variables_allow_html = false;
	config.image_removeLinkByEmptyURL = false;
};
