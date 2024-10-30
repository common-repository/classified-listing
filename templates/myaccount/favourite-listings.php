<?php
/**
 *
 * @author     RadiusTheme
 * @package    classified-listing/templates
 * @version    1.0.0
 */

use Rtcl\Helpers\Functions;
use Rtcl\Helpers\Pagination;

global $post;
?>

<div class="rtcl-favourite-listings">

	<?php if ( $rtcl_query->have_posts() ) : ?>
		<div class="rtcl-MyAccount-content-inner">
			<table class="rtcl-my-listing-table">
				<thead>
				<tr>
					<th><?php esc_html_e( 'Thumbnail', 'classified-listing' ); ?></th>
					<th class="title-cell"><?php esc_html_e( 'Title', 'classified-listing' ); ?></th>
					<th class="price-cell list-on-responsive"><?php esc_html_e( 'Price', 'classified-listing' ); ?></th>
					<th class="list-on-responsive"><?php esc_html_e( 'Action', 'classified-listing' ); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php while ( $rtcl_query->have_posts() ) : $rtcl_query->the_post();
					$post_meta  = get_post_meta( $post->ID );
					$listing    = rtcl()->factory->get_listing( $post->ID );
					$is_top     = (bool) get_post_meta( $listing->get_id(), '_top', true );
					$is_bump_up = (bool) get_post_meta( $listing->get_id(), '_bump_up', true );
					$tick_svg   = '<svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M3.99693 11.5L0.5 6.28586L1.37423 4.98233L3.99693 8.89293L9.62577 0.5L10.5 1.80353L3.99693 11.5Z" fill="black"/>
							</svg>';
					$cross_svg  = '<svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.2785 0.751988C10.2083 0.674642 10.125 0.613278 10.0332 0.57141C9.94147 0.529541 9.84311 0.50799 9.74377 0.50799C9.64443 0.50799 9.54607 0.529541 9.45431 0.57141C9.36255 0.613278 9.2792 0.674642 9.20903 0.751988L5.5 4.82358L1.79097 0.743645C1.72075 0.6664 1.63738 0.605126 1.54563 0.563321C1.45388 0.521516 1.35554 0.5 1.25623 0.5C1.15692 0.5 1.05859 0.521516 0.966835 0.563321C0.875085 0.605126 0.791718 0.6664 0.721495 0.743645C0.651273 0.82089 0.595569 0.912593 0.557565 1.01352C0.51956 1.11444 0.5 1.22262 0.5 1.33186C0.5 1.4411 0.51956 1.54927 0.557565 1.65019C0.595569 1.75112 0.651273 1.84282 0.721495 1.92007L4.43053 6L0.721495 10.0799C0.651273 10.1572 0.595569 10.2489 0.557565 10.3498C0.51956 10.4507 0.5 10.5589 0.5 10.6681C0.5 10.7774 0.51956 10.8856 0.557565 10.9865C0.595569 11.0874 0.651273 11.1791 0.721495 11.2564C0.791718 11.3336 0.875085 11.3949 0.966835 11.4367C1.05859 11.4785 1.15692 11.5 1.25623 11.5C1.35554 11.5 1.45388 11.4785 1.54563 11.4367C1.63738 11.3949 1.72075 11.3336 1.79097 11.2564L5.5 7.17642L9.20903 11.2564C9.27925 11.3336 9.36262 11.3949 9.45437 11.4367C9.54612 11.4785 9.64446 11.5 9.74377 11.5C9.84308 11.5 9.94141 11.4785 10.0332 11.4367C10.1249 11.3949 10.2083 11.3336 10.2785 11.2564C10.3487 11.1791 10.4044 11.0874 10.4424 10.9865C10.4804 10.8856 10.5 10.7774 10.5 10.6681C10.5 10.5589 10.4804 10.4507 10.4424 10.3498C10.4044 10.2489 10.3487 10.1572 10.2785 10.0799L6.56947 6L10.2785 1.92007C10.5667 1.60302 10.5667 1.06904 10.2785 0.751988Z" fill="black"/>
							</svg>';
					?>
					<tr>
						<td>
							<div class="listing-thumb">
								<a href="<?php the_permalink(); ?>"><?php $listing->the_thumbnail(); ?></a>
								<?php do_action( 'rtcl_my_listing_after_listing_thumb', $listing ); ?>
							</div>
						</td>
						<td class="title-cell">
							<div class="rtcl-ad-details">
								<a class="listing-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<ul class="rtcl-meta">
									<li>
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none"
											 xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												  d="M7.99941 1.60002C4.46479 1.60002 1.59941 4.4654 1.59941 8.00002C1.59941 11.5346 4.46479 14.4 7.99941 14.4C11.534 14.4 14.3994 11.5346 14.3994 8.00002C14.3994 4.4654 11.534 1.60002 7.99941 1.60002ZM0.399414 8.00002C0.399414 3.80266 3.80205 0.400024 7.99941 0.400024C12.1968 0.400024 15.5994 3.80266 15.5994 8.00002C15.5994 12.1974 12.1968 15.6 7.99941 15.6C3.80205 15.6 0.399414 12.1974 0.399414 8.00002ZM7.99941 3.20002C8.33078 3.20002 8.59941 3.46865 8.59941 3.80002V7.6292L11.0677 8.86337C11.3641 9.01156 11.4843 9.37196 11.3361 9.66835C11.1879 9.96474 10.8275 10.0848 10.5311 9.93668L7.73108 8.53668C7.52781 8.43505 7.39941 8.22729 7.39941 8.00002V3.80002C7.39941 3.46865 7.66804 3.20002 7.99941 3.20002Z"
												  fill="currentColor"/>
										</svg>
										<?php $listing->the_time(); ?>
									</li>
									<?php if ( $listing->has_category() ): ?>
										<li>
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none"
												 xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd"
													  d="M0.399414 1.00002C0.399414 0.668653 0.668044 0.400024 0.999414 0.400024H8.30189C8.46104 0.400024 8.61368 0.46326 8.72621 0.575815L15.0003 6.85154C15.384 7.23769 15.5994 7.76 15.5994 8.30441C15.5994 8.84881 15.384 9.37113 15.0003 9.75727L14.999 9.75853L9.76339 14.9955C9.57204 15.1871 9.34479 15.3392 9.09464 15.4429C8.84448 15.5466 8.57634 15.6 8.30554 15.6C8.03474 15.6 7.76659 15.5466 7.51644 15.4429C7.26649 15.3392 7.03941 15.1874 6.84815 14.996C6.8483 14.9961 6.84799 14.9958 6.84815 14.996L0.575342 8.72886C0.462703 8.61633 0.399414 8.46363 0.399414 8.30441V1.00002ZM1.59941 1.60002V8.05572L7.69631 14.1471C7.77623 14.2271 7.87162 14.2911 7.97607 14.3344C8.08052 14.3777 8.19247 14.4 8.30554 14.4C8.4186 14.4 8.53056 14.3777 8.635 14.3344C8.73945 14.2911 8.83436 14.2276 8.91428 14.1476L14.1491 8.91138C14.1493 8.91119 14.1489 8.91157 14.1491 8.91138C14.309 8.75015 14.3994 8.53162 14.3994 8.30441C14.3994 8.0772 14.3096 7.85924 14.1497 7.69801C14.1499 7.6982 14.1495 7.69782 14.1497 7.69801L8.05331 1.60002H1.59941ZM4.05065 4.65222C4.05065 4.32084 4.31928 4.05222 4.65065 4.05222H4.65795C4.98932 4.05222 5.25795 4.32084 5.25795 4.65222C5.25795 4.98359 4.98932 5.25222 4.65795 5.25222H4.65065C4.31928 5.25222 4.05065 4.98359 4.05065 4.65222Z"
													  fill="currentColor"/>
											</svg>
											<?php $listing->the_categories( true, true ); ?>
										</li>
									<?php endif; ?>
									<?php if ( $listing->has_location() && apply_filters( 'rtcl_my_listing_location_display', false ) ): ?>
										<li>
											<svg width="13" height="16" viewBox="0 0 13 16" fill="none"
												 xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd"
													  d="M6.49941 1.60002C5.20787 1.60002 3.96406 2.13406 3.04309 3.09309C2.12132 4.05295 1.59941 5.3598 1.59941 6.7273C1.59941 8.7224 2.84381 10.6471 4.19323 12.1303C4.85707 12.86 5.52277 13.4571 6.02302 13.8719C6.20793 14.0253 6.3696 14.1532 6.49941 14.2531C6.62922 14.1532 6.7909 14.0253 6.9758 13.8719C7.47605 13.4571 8.14176 12.86 8.8056 12.1303C10.155 10.6471 11.3994 8.7224 11.3994 6.7273C11.3994 5.3598 10.8775 4.05295 9.95571 3.09309C9.03481 2.13406 7.79095 1.60002 6.49941 1.60002ZM6.49941 15C6.15725 15.4929 6.1571 15.4928 6.15692 15.4926L6.15519 15.4914L6.15114 15.4886L6.13717 15.4788C6.12529 15.4704 6.10835 15.4583 6.08667 15.4427C6.04332 15.4114 5.98101 15.3658 5.90245 15.3068C5.74538 15.1886 5.523 15.0162 5.25705 14.7957C4.72605 14.3554 4.01676 13.7195 3.3056 12.9379C1.90502 11.3984 0.399414 9.18674 0.399414 6.7273C0.399414 5.05686 1.03643 3.4502 2.17756 2.26191C3.31949 1.0728 4.87357 0.400024 6.49941 0.400024C8.12525 0.400024 9.67931 1.0728 10.8213 2.26191C11.9624 3.4502 12.5994 5.05686 12.5994 6.7273C12.5994 9.18674 11.0938 11.3984 9.69321 12.9379C8.98207 13.7195 8.27277 14.3554 7.74177 14.7957C7.47582 15.0162 7.25344 15.1886 7.09637 15.3068C7.01781 15.3658 6.9555 15.4114 6.91215 15.4427C6.89047 15.4583 6.87353 15.4704 6.86166 15.4788L6.84769 15.4886L6.84363 15.4914L6.84235 15.4923C6.84218 15.4924 6.84157 15.4929 6.49941 15ZM6.49941 15L6.84235 15.4923C6.6366 15.6352 6.36267 15.6355 6.15692 15.4926L6.49941 15ZM6.49941 5.41821C5.84093 5.41821 5.26608 5.98118 5.26608 6.7273C5.26608 7.47342 5.84093 8.03639 6.49941 8.03639C7.1579 8.03639 7.73275 7.47342 7.73275 6.7273C7.73275 5.98118 7.1579 5.41821 6.49941 5.41821ZM4.06608 6.7273C4.06608 5.36469 5.13285 4.21821 6.49941 4.21821C7.86597 4.21821 8.93275 5.36469 8.93275 6.7273C8.93275 8.0899 7.86597 9.23639 6.49941 9.23639C5.13285 9.23639 4.06608 8.0899 4.06608 6.7273Z"
													  fill="currentColor"/>
											</svg>
											<?php $listing->the_locations( true, true ); ?>
										</li>
									<?php endif; ?>
									<li>
										<svg width="16" height="12" viewBox="0 0 16 12" fill="none"
											 xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												  d="M1.68652 6.00002C1.75679 6.11959 1.85087 6.27339 1.96807 6.45162C2.26198 6.89859 2.69741 7.49325 3.26297 8.08573C4.40426 9.28133 6.00763 10.4 7.99941 10.4C9.9912 10.4 11.5946 9.28133 12.7358 8.08573C13.3014 7.49325 13.7368 6.89859 14.0307 6.45162C14.1479 6.27339 14.242 6.11959 14.3123 6.00002C14.242 5.88045 14.1479 5.72666 14.0307 5.54843C13.7368 5.10146 13.3014 4.5068 12.7358 3.91431C11.5946 2.71868 9.9912 1.60002 7.99941 1.60002C6.00763 1.60002 4.40426 2.71868 3.26297 3.91431C2.69741 4.5068 2.26198 5.10146 1.96807 5.54843C1.85087 5.72666 1.75679 5.88045 1.68652 6.00002ZM14.9994 6.00002C15.5341 5.72781 15.534 5.72761 15.5339 5.72739L15.5329 5.72542L15.5307 5.7212L15.5235 5.70742C15.5175 5.6959 15.509 5.67975 15.4979 5.65928C15.4759 5.61834 15.4438 5.56009 15.402 5.48699C15.3183 5.34086 15.195 5.13494 15.0334 4.88912C14.7108 4.39859 14.2315 3.74325 13.6039 3.08574C12.3588 1.78137 10.4622 0.400024 7.99941 0.400024C5.53665 0.400024 3.64002 1.78137 2.39494 3.08574C1.76732 3.74325 1.28798 4.39859 0.96542 4.88912C0.803772 5.13494 0.680525 5.34086 0.596835 5.48699C0.554968 5.56009 0.522933 5.61834 0.500878 5.65928C0.489848 5.67975 0.481309 5.6959 0.475277 5.70742L0.468111 5.7212L0.465942 5.72542L0.465211 5.72684C0.465097 5.72706 0.464716 5.72781 0.999414 6.00002L0.464716 5.72781C0.377647 5.89884 0.377647 6.1012 0.464716 6.27223L0.999414 6.00002C0.464716 6.27223 0.464602 6.27201 0.464716 6.27223L0.465211 6.2732L0.465942 6.27463L0.468111 6.27885L0.475277 6.29263C0.481309 6.30415 0.489848 6.3203 0.500878 6.34077C0.522933 6.3817 0.554968 6.43996 0.596835 6.51306C0.680525 6.65919 0.803772 6.86511 0.96542 7.11093C1.28798 7.60146 1.76732 8.25683 2.39494 8.91433C3.64002 10.2186 5.53665 11.6 7.99941 11.6C10.4622 11.6 12.3588 10.2186 13.6039 8.91433C14.2315 8.25683 14.7108 7.60146 15.0334 7.11093C15.195 6.86511 15.3183 6.65919 15.402 6.51306C15.4438 6.43996 15.4759 6.3817 15.4979 6.34077C15.509 6.3203 15.5175 6.30415 15.5235 6.29263L15.5307 6.27885L15.5329 6.27463L15.5336 6.2732C15.5337 6.27298 15.5341 6.27223 14.9994 6.00002ZM14.9994 6.00002L15.5341 6.27223C15.6212 6.1012 15.621 5.89842 15.5339 5.72739L14.9994 6.00002ZM7.99941 4.72502C7.26618 4.72502 6.69032 5.30601 6.69032 6.00002C6.69032 6.69404 7.26618 7.27502 7.99941 7.27502C8.73264 7.27502 9.3085 6.69404 9.3085 6.00002C9.3085 5.30601 8.73264 4.72502 7.99941 4.72502ZM5.49032 6.00002C5.49032 4.62297 6.62392 3.52502 7.99941 3.52502C9.37491 3.52502 10.5085 4.62297 10.5085 6.00002C10.5085 7.37707 9.37491 8.47503 7.99941 8.47503C6.62392 8.47503 5.49032 7.37707 5.49032 6.00002Z"
												  fill="currentColor"/>
										</svg>
										<?php
										/* translators:  View count */
										echo sprintf( esc_html__( '%1$s Views', 'classified-listing' ), esc_html( number_format_i18n( $listing->get_view_counts() ) ) ); ?>
									</li>
								</ul>
							</div>
							<span class="rtcl-my-listings-table-toggle-info">
								<span class="rtcl-icon rtcl-icon-angle-down"></span>
							</span>
							<?php do_action( 'rtcl_listing_loop_extra_meta', $listing ); ?>
						</td>
						<td class="price-cell list-on-responsive"
							data-column="<?php esc_html_e( 'Price:', 'classified-listing' ); ?>">
							<?php Functions::print_html( $listing->get_price_html() ); ?>
						</td>
						<td class="list-on-responsive"
							data-column="<?php esc_html_e( 'Action:', 'classified-listing' ); ?>">
							<?php if ( apply_filters( 'rtcl_favourite_listing_actions_button_display', true ) ) { ?>
								<div class="rtcl-actions">
									<a href="#" class="rtcl-delete-favourite-listing rtcl-tooltip-wrapper"
									   data-id="<?php echo esc_attr( $post->ID ) ?>">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none"
											 xmlns="http://www.w3.org/2000/svg">
											<path
												d="M6.4 2.73171H9.6C9.6 2.31771 9.43143 1.92067 9.13137 1.62793C8.83131 1.33519 8.42435 1.17073 8 1.17073C7.57565 1.17073 7.16869 1.33519 6.86863 1.62793C6.56857 1.92067 6.4 2.31771 6.4 2.73171ZM5.2 2.73171C5.2 2.37297 5.27242 2.01775 5.41314 1.68633C5.55385 1.3549 5.7601 1.05376 6.0201 0.800099C6.28011 0.546436 6.58878 0.34522 6.92849 0.207939C7.2682 0.0706577 7.6323 0 8 0C8.3677 0 8.7318 0.0706577 9.07151 0.207939C9.41123 0.34522 9.7199 0.546436 9.9799 0.800099C10.2399 1.05376 10.4461 1.3549 10.5869 1.68633C10.7276 2.01775 10.8 2.37297 10.8 2.73171H15.4C15.5591 2.73171 15.7117 2.79338 15.8243 2.90316C15.9368 3.01293 16 3.16182 16 3.31707C16 3.47232 15.9368 3.62121 15.8243 3.73099C15.7117 3.84077 15.5591 3.90244 15.4 3.90244H14.344L13.408 13.3549C13.3362 14.0792 12.9904 14.7514 12.4381 15.2404C11.8859 15.7295 11.1666 16.0003 10.4208 16H5.5792C4.83349 16.0001 4.11448 15.7292 3.56236 15.2402C3.01024 14.7512 2.66459 14.0791 2.5928 13.3549L1.656 3.90244H0.6C0.44087 3.90244 0.288258 3.84077 0.175736 3.73099C0.063214 3.62121 0 3.47232 0 3.31707C0 3.16182 0.063214 3.01293 0.175736 2.90316C0.288258 2.79338 0.44087 2.73171 0.6 2.73171H5.2ZM6.8 6.43902C6.8 6.28378 6.73679 6.13489 6.62426 6.02511C6.51174 5.91533 6.35913 5.85366 6.2 5.85366C6.04087 5.85366 5.88826 5.91533 5.77574 6.02511C5.66321 6.13489 5.6 6.28378 5.6 6.43902V12.2927C5.6 12.4479 5.66321 12.5968 5.77574 12.7066C5.88826 12.8164 6.04087 12.878 6.2 12.878C6.35913 12.878 6.51174 12.8164 6.62426 12.7066C6.73679 12.5968 6.8 12.4479 6.8 12.2927V6.43902ZM9.8 5.85366C9.95913 5.85366 10.1117 5.91533 10.2243 6.02511C10.3368 6.13489 10.4 6.28378 10.4 6.43902V12.2927C10.4 12.4479 10.3368 12.5968 10.2243 12.7066C10.1117 12.8164 9.95913 12.878 9.8 12.878C9.64087 12.878 9.48826 12.8164 9.37574 12.7066C9.26321 12.5968 9.2 12.4479 9.2 12.2927V6.43902C9.2 6.28378 9.26321 6.13489 9.37574 6.02511C9.48826 5.91533 9.64087 5.85366 9.8 5.85366ZM3.7872 13.2425C3.83035 13.677 4.0378 14.0802 4.36909 14.3735C4.70039 14.6669 5.1318 14.8294 5.5792 14.8293H10.4208C10.8682 14.8294 11.2996 14.6669 11.6309 14.3735C11.9622 14.0802 12.1697 13.677 12.2128 13.2425L13.1392 3.90244H2.8608L3.7872 13.2425Z"
												fill="#646464"/>
										</svg>
										<span
											class="rtcl-tooltip"><?php esc_html_e( 'Delete', 'classified-listing' ); ?></span>
									</a>
								</div>
							<?php } ?>
						</td>
					</tr>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</tbody>
			</table>
		</div>
		<!-- pagination here -->
		<?php Pagination::pagination( $rtcl_query, true ); ?>
	<?php else : ?>
		<p class="rtcl-no-data-found"> <?php esc_html_e( 'No listing found.', 'classified-listing' ) ?></p>
	<?php endif; ?>

</div>