<?php

namespace Rtcl\Controllers\Ajax;

class Ajax {
	public function __construct() {
		new ListingAdminAjax();
		new AjaxGallery();
		Checkout::getInstance();
		new AjaxCFG();
		new PublicUser();
		new Import();
		new Export();
		new AjaxListingType();
		InlineSearchAjax::init();
		FilterAjax::init();
		FormBuilderAjax::getInstance()->init();
		FormBuilderAdminAjax::getInstance()->init();
		FilterFormAdminAjax::getInstance()->init();
	}
}