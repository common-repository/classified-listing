<?php
/**
 * Admin settings form
 *
 */

use Rtcl\Controllers\Settings\AdminSettings;
use Rtcl\Helpers\Functions;

?>
<div class="wrap rtcl-admin-main-settings rtcl-settings-active-<?php echo esc_attr( $this->active_tab ); ?><?php echo esc_attr( in_array( $this->active_tab,
	AdminSettings::EXTERNAL_IDS ) ? ' external' : '' ) ?>">
	<?php
	settings_errors();
	$this->show_messages();
	Functions::print_notices();
	?>
	<div class="rtcl-settings-nav-wrap">
		<ul class="nav-tab-wrapper">
			<?php
			foreach ( $this->tabs as $slug => $title ) {
				$class = "nav-tab nav-" . $slug;
				if ( $this->active_tab === $slug ) {
					$class .= ' nav-tab-active';
				}
				echo '<li>';
				echo '<a href="?post_type=' . esc_attr( rtcl()->post_type ) . '&page=rtcl-settings&tab=' . esc_attr( $slug ) . '" class="' . esc_attr( $class )
					 . '">' . esc_html( $title ) . '</a>';
				echo '</li>';
			}
			?>
		</ul>
	</div>
	<div class="rtcl-settings-form-wrap">
		<?php
		if ( ! empty( $this->subtabs ) ) {
			echo '<ul class="sub-settings">';
			$array_keys = array_keys( $this->subtabs );
			foreach ( $this->subtabs as $id => $label ) {
				echo '<li><a href="' . esc_url( admin_url( 'edit.php?post_type=' . rtcl()->post_type . '&page=rtcl-settings&tab=' . $this->active_tab
														   . '&section=' . sanitize_title( $id ) ) ) . '" class="nav-sub-' . esc_attr( strtolower( $label ) )
					 . ( $this->current_section == $id ? ' current' : '' ) . '">'
					 . esc_html( $label )
					 . '</a></li>';
			}
			echo '</ul>';
		}
		if ( in_array( $this->active_tab, AdminSettings::EXTERNAL_IDS ) ) {
			do_action( 'rtcl_admin_external_settings', $this->active_tab, $this->current_section );
		} else {
			?>
			<form method="post" action="">
				<?php
				do_action( 'rtcl_admin_settings_groups', $this->active_tab, $this->current_section );
				wp_nonce_field( 'rtcl-settings' );
				if ( $this->active_tab !== "addon_theme" ) {
					if ( 'tax_rate' === $this->current_section ) {
						submit_button( '', 'primary', 'submit', true, [ 'id' => 'rtcl-tax-save-button' ] );
					} else {
						submit_button();
					}

				}
				?>
			</form>
		<?php } ?>
	</div>
</div>