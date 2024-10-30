<?php

namespace Rtcl\Widgets;

use Rtcl\Helpers\Functions;
use Rtcl\Models\WidgetFields;
use WP_Widget;

class AjaxFilter extends WP_Widget {

	protected $widget_slug;
	protected $instance;
	protected $hideAbleCount = 6;
	public $filterData;

	public function __construct() {

		$this->widget_slug = 'rtcl-widget-ajax-filter';

		parent::__construct(
			$this->widget_slug,
			esc_html__( 'Classified Listing Ajax Filter', 'classified-listing' ),
			[
				'classname'   => 'rtcl ' . $this->widget_slug . '-class',
				'description' => esc_html__( 'Classified Listing Ajax Filter', 'classified-listing' )
			]
		);
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_scripts() {
		do_action( 'rtcl_widget_ajax_filter_scripts', $this );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		$filters                 = Functions::get_option( 'rtcl_filter_settings' );
		$filterData              = ! empty( $filters[ $instance['filter_id'] ] ) ? $filters[ $instance['filter_id'] ] : [];
		$filterData['filter_id'] = $instance['filter_id'];
		$this->filterData        = $filterData;
		$this->instance          = $instance;
		?>
		<div class="rtcl-widget-ajax-filter-wrapper"
			 data-options="<?php
			 // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			 echo htmlspecialchars( wp_json_encode( $filterData ) ); ?>">
			<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $args['before_widget'];

			if ( ! empty( $instance['title'] ) ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			if ( empty( $this->filterData['items'] ) ) {
				?>
				<p><?php esc_html_e( 'No filter form is selected', 'classified-listing' ); ?></p>
				<?php
			} else {
				Functions::get_template( 'widgets/ajax-filter',
					[
						'object'     => $this,
						'filterData' => $filterData
					]
				);
			}

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $args['after_widget'];
			?>
		</div>
		<?php
	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$filters               = Functions::get_option( 'rtcl_filter_settings' );
		$instance              = $old_instance;
		$instance['title']     = ! empty( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['filter_id'] = ! empty( $new_instance['filter_id'] ) && in_array( $new_instance['filter_id'], array_keys( $filters ) ) ? $new_instance['filter_id'] : '';

		return $instance;
	}

	/**
	 * @param array $instance
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$filters = Functions::get_option( 'rtcl_filter_settings' );
		$filters = ! empty( $filters ) && is_array( $filters ) ? array_map( function ( $filter ) {
			return $filter['name'];
		},
			$filters ) : [];

		// Add none value at beginning of the array 
		$filters      = array_merge( [ '' => __( 'Select one', 'classified-listing' ) ], $filters );
		$fields       = [
			'title'     => [
				'label' => esc_html__( 'Title', 'classified-listing' ),
				'type'  => 'text'
			],
			'filter_id' => [
				'label'   => esc_html__( 'Select a filter form', 'classified-listing' ),
				'type'    => 'select',
				'options' => $filters
			]
		];
		$instance     = wp_parse_args( $instance, [ 'title' => esc_html__( 'Filter', 'classified-listing' ) ] );
		$widgetFields = new WidgetFields( $fields, $instance, $this );
		$widgetFields->render();
	}

	/**
	 * @param array       $itemData
	 * @param array       $options
	 * @param null|string $itemHtml
	 *
	 * @return string
	 */
	public function render_filter_item( $itemData, $options, $itemHtml = null ) {

		return sprintf( '<div class="rtcl-ajax-filter-item rtcl-%s is-open%s">
					                <div class="rtcl-filter-title-wrap">
										<div class="rtcl-filter-title">%s%s</div>
										<i class="rtcl-icon rtcl-icon-angle-down"></i>
									</div>
									<div class="rtcl-filter-content%s" data-options="%s">%s</div>
					            </div>',
			$options['name'],
			! empty( $itemData['active'] ) ? ' is-active' : '',
			apply_filters( 'rtcl_widget_ajax_filter_' . $options['name'] . '_title', $itemData['title'] ),
			! empty( $options['allow_rest'] ) ? ' <span class="rtcl-reset rtcl-icon rtcl-icon-cw">' : '',
			! empty( $options['ajax_load'] ) ? ' rtcl-ajax' : '',
			htmlspecialchars( wp_json_encode( $options ) ),
			$itemHtml
		);
	}
}