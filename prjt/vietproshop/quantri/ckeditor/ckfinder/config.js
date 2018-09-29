/*
Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
For licensing, see license.txt or http://cksource.com/ckfinder/license
*/

CKFinder.customConfig = function( config )
{
	// Define changes to default configuration here.
	// For the list of available options, check:
	// http://docs.cksource.com/ckfinder_2.x_api/symbols/CKFinder.config.html

	// Sample configuration options:
	// config.uiColor = '#BDE31E';
	// config.language = 'fr';
	// config.removePlugins = 'basket';
	config.filebrowserBrowseUrl= 'http://localhost/vietproshop/quantri/ckeditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl= 'http://localhost/vietproshop/quantri/ckeditor/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserUploadUrl= 'http://localhost/vietproshop/quantri/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl= 'http://localhost/vietproshop/quantri/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';


};
