<?php
/**
 * @author  wpWax
 * @since   6.6
 * @version 7.3.1
 */

use wpWax\OneListing\Directorist_Support;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="directorist-search-field">

	<?php if ( !empty($data['label'] ) && Directorist_Support::has_field_in_search_form( 'review', $searchform, 'advance' ) ): ?>

		<label><?php echo esc_html( $data['label'] ); ?></label>
		
	<?php endif; ?>

	<div class="directorist-select">

		<select name='search_by_rating' <?php echo ! empty( $data['required'] ) ? 'required="required"' : ''; ?> data-placeholder="<?php echo esc_attr( sprintf( _x( 'Select %s', 'Rating search select placeholder', 'onelisting' ), $data['label'] ) ); ?> " data-isSearch="true">
			
			<?php
				foreach ( $searchform->rating_field_data() as $option ) {
					printf( '<option value="%s" %s>%s</option>', esc_attr( $option['value'] ), esc_attr( $option['selected'] ), esc_html( $option['label'] ) );
				}
			?>

		</select>

	</div>

</div>