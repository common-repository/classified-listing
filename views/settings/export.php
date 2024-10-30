<div class="rtcl-import-export rtcl">
	<div class="rtcl-export-wrap">
		<div class="rtcl-export-inner-wrap">
			<div class="rtcl-export-group">
				<h5><?php _e( "Export Categories, Location & Settings", "classified-listing" ); ?></h5>
				<p><?php _e( "Export categories, location & settings as json file.", "classified-listing" ); ?></p>
				<a id="rtcl-export-cat-loc-json" class="btn btn-primary"><?php _e( "Export", "classified-listing" ); ?></a>
			</div>
			<div class="rtcl-export-group">
				<h5><?php _e( "Export Listings", "classified-listing" ); ?></h5>
				<p><?php _e( "Export listings as CSV file.", "classified-listing" ); ?></p>
				<a id="rtcl-export-listings-csv" href="<?php echo admin_url('admin-ajax.php')?>?action=rtcl_listings_export" class="btn btn-primary"><?php _e( "Export", "classified-listing" ); ?></a>
			</div>
		</div>
	</div>
</div>