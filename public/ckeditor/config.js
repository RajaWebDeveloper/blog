/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.image2_alignClasses = [ 'image-left', 'image-center', 'image-right' ];
    config.image2_captionedClass = 'image-captioned';

    config.extraPlugins = 'btgrid';

};
