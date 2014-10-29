<?php
class PanoramaGalleryPage extends GalleryPage {

	static $singular_name = 'Panorama Gallery';
	static $plural_name = 'Panorama Galleries';
	static $description = 'A page type for listing panorama images';
	//private static $can_be_root = false;
	private static $allowed_children = array();

	private static $icon = "gallery/images/pageicons/gallery.png";
	
}
class PanoramaGalleryPage_Controller extends GalleryPage_Controller {

	public function init() {
		parent::init();
		//Requirements::javascript('mysite/thirdparty/panorama-viewer/jquery.panorama_viewer.min.js');
		//Requirements::css('mysite/thirdparty/panorama-viewer/panorama_viewer.css');
		//Requirements::javascript('mysite/javascript/PanoramaGalleryPage.js');
	}
	
}