<?php

namespace Rtcl\Services\FormBuilder;

class LocalizedString {

	public static function public() {
		$strings = [
			'enable'          => __( 'Enable', 'classified-listing' ),
			'type'            => __( 'Type', 'classified-listing' ),
			'open'            => __( 'Open', 'classified-listing' ),
			'save'            => __( 'Save', 'classified-listing' ),
			'submit'          => __( 'Submit', 'classified-listing' ),
			'update'          => __( 'Update', 'classified-listing' ),
			'change'          => __( 'Change', 'classified-listing' ),
			'error_saving'    => __( 'Error while saving data', 'classified-listing' ),
			'select_color'    => __( 'Select Color', 'classified-listing' ),
			'character_limit' => __( 'Character limit', 'classified-listing' ),
			'confirm'         => __( 'Are you sure to remove?', 'classified-listing' ),
			'select_item'     => __( 'Please select an item', 'classified-listing' ),
			'type_search'     => __( 'Type to search', 'classified-listing' ),
			'add_new'         => __( 'Add New', 'classified-listing' ),
			'required'        => __( 'Field is required', 'classified-listing' ),
			'upload'          => __( 'Upload', 'classified-listing' ),
			'edit'            => __( 'Edit', 'classified-listing' ),
			'delete'          => __( 'Delete', 'classified-listing' ),
			'past_error'      => __( 'Pasting this exceeds the maximum allowed number of ___ characters for the input.', 'classified-listing' ),
			'reCaptcha'       => [
				'error' => __( 'reCaptcha site key is missing.', 'classified-listing' )
			],
			'location'        => [
				'select' => __( 'Please select a location first', 'classified-listing' )
			],
			'file'            => [
				'description'        => __( 'Description', 'classified-listing' ),
				'caption'            => __( 'Caption', 'classified-listing' ),
				'featured'           => __( 'Featured', 'classified-listing' ),
				'add_feature'        => __( 'Add to feature', 'classified-listing' ),
				'file_name'          => __( 'File name', 'classified-listing' ),
				'file_type'          => __( 'File type', 'classified-listing' ),
				'file_size'          => __( 'File size', 'classified-listing' ),
				'dimensions'         => __( 'Dimensions', 'classified-listing' ),
				'uploaded_on'        => __( 'Uploaded on', 'classified-listing' ),
				'upload_btn'         => __( 'Click or drag file to this area to upload', 'classified-listing' ),
				'attachment_details' => __( 'Attachment Details', 'classified-listing' ),
				'upload_success'     => __( 'File successfully uploaded', 'classified-listing' ),
				'remove_success'     => __( 'File successfully removed', 'classified-listing' ),
				'upload_error'       => __( 'Error while uploading file', 'classified-listing' ),
				'remove_error'       => __( 'Error while removing file.', 'classified-listing' ),
				'updating_error'     => __( 'Error while updating file.', 'classified-listing' ),
				'getting_error'      => __( 'Error while getting data', 'classified-listing' ),
			],
			'map'             => [
				'enter_address'      => __( 'Enter address, please', 'classified-listing' ),
				'marker_with_pop_up' => __( 'A marker with a popup.', 'classified-listing' ),
				'latitude'           => __( 'Latitude', 'classified-listing' ),
				'longitude'          => __( 'Longitude', 'classified-listing' ),
				'dont_show_map'      => __( 'Don\'t show the Map', 'classified-listing' ),
			],
			'repeater'        => [
				'max_error' => __( 'Maximum repeater field applied', 'classified-listing' ),
			],
			'pricing'         => [
				'select_currency' => __( 'Select a currency', 'classified-listing' ),
				'currency'        => __( 'Currency', 'classified-listing' ),
				'no_unit'         => __( 'No unit', 'classified-listing' ),
				'max'             => __( 'Max', 'classified-listing' ),
			],
			'bsh'             => [
				'open_24'             => __( 'Open 24 hours', 'classified-listing' ),
				'open_24_7'           => __( 'Open 24 hours 7 days', 'classified-listing' ),
				'open_selected_hours' => __( 'Open for Selected Hours', 'classified-listing' ),
				'special_hours'       => __( 'Special Hours - Overrides', 'classified-listing' ),
				'once'                => __( 'Once', 'classified-listing' ),
				'repeat'              => __( 'Repeat', 'classified-listing' ),
				'timezone'              => __( 'Timezone', 'classified-listing' ),
				'select_timezone'              => __( 'Select a timezone', 'classified-listing' ),
			]
		];

		return apply_filters( 'rtcl_fb_localized_public_strings', $strings );
	}

	public static function admin() {
		$adminStrings = [];
		$adminStrings = apply_filters( 'rtcl_fb_localized_admin_strings', $adminStrings );

		$strings          = self::public();
		$strings['admin'] = $adminStrings;

		return $strings;
	}
}