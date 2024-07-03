<?php
/**
 * @author  wpWax
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Directorist\Directorist_Single_Listing;
$listing = Directorist_Single_Listing::instance();

if ( ! $listing->get_contents() ) {
	return;
}
?>

<div class="directorist-card directorist-card-listing-description <?php echo esc_attr( $class ); ?>" <?php $listing->section_id( $id );?>>

	<div class="directorist-card__header" id="cost">

		<h4 class="directorist-card__header--title"><?php directorist_icon( $icon );?><?php echo esc_html( $label ); ?></h4>

	</div>

	<div class="directorist-card__body">

		<div class="directorist-single-info directorist-single-info-description">

			<div class="directorist-listing-details__text">

				<p><?php echo wp_kses_post( $listing->get_contents() ); ?></p>
				
			</div>

		</div>
		
	</div>

</div>