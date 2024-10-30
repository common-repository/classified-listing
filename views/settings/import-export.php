<div class="wrap rtcl-import-export-wrapper">

	<h2><?php esc_html_e( "Export Import Settings", 'classified-listing' ); ?></h2>
	<?php
	$active_tab = isset( $_GET['tab'] ) && $_GET['tab'] ? esc_attr( $_GET['tab'] ) : 'export';
	?>

	<h2 class="nav-tab-wrapper">
		<a href="?post_type=rtcl_listing&page=rtcl-import-export&tab=export"
		   class="nav-tab <?php echo $active_tab == 'export' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( "Export", 'classified-listing' ); ?></a>
		<a href="?post_type=rtcl_listing&page=rtcl-import-export&tab=import"
		   class="nav-tab <?php echo $active_tab == 'import' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( "Import", 'classified-listing' ); ?></a>
	</h2>

	<?php
	if ( $active_tab == 'import' ) {
		require_once RTCL_PATH . 'views/settings/import.php';
	} elseif ( $active_tab == 'export' ) {
		require_once RTCL_PATH . 'views/settings/export.php';
	}
	?>
</div><!-- /.wrap -->