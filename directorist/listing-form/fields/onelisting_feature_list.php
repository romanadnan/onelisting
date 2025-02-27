<?php
/**
 * @author  wpWax
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$max = !empty( $data['max'] ) ? 'max='. esc_attr( $data['max'] ) : '';
$data['max'] = isset( $data['max'] ) ? $data['max'] : '';
?>

<div class="directorist-form-group directorist-custom-field-textarea">

	<?php $listing_form->field_label_template( $data );?>

	<textarea <?php echo esc_attr( $max ); ?> name="<?php echo esc_attr( $data['field_key'] ); ?>" id="<?php echo esc_attr( $data['field_key'] ); ?>" class="directorist-form-element" rows="<?php echo (int) $data['rows']; ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" <?php $listing_form->required( $data ); ?> maxlength=<?php echo esc_attr($data['max']); ?>><?php echo wp_kses_post( $data['value'] ); ?></textarea>

	<?php $listing_form->field_description_template( $data );?>

</div>