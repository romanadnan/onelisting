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

$ptype           = $searchform->get_pricing_type();
$max_placeholder = ! empty( $data['price_range_max_placeholder'] ) ? $data['price_range_max_placeholder'] : '';
$min_placeholder = ! empty( $data['price_range_min_placeholder'] ) ? $data['price_range_min_placeholder'] : '';
$label           = isset( $data['label'] ) ? $data['label'] : __( 'Price', 'onelisting' );
?>

<?php if ( Directorist_Support::has_field_in_search_form( 'pricing', $searchform, 'advance' ) ): ?>

	<div class="directorist-search-field">

		<?php if ( ! empty( $data['label'] ) ): ?>
			<label><?php echo esc_html( $data['label'] ); ?></label>
		<?php endif;?>

		<div class="directorist-price-ranges">

			<?php if ( $ptype == 'both' || $ptype == 'price_unit' ): ?>

				<div class="directorist-price-ranges__item directorist-form-group"><input type="text" name="price[0]" class="directorist-form-element" placeholder="<?php echo esc_attr( $min_placeholder ); ?>" value="<?php echo esc_attr( $searchform->price_value( 'min' ) ); ?>"></div>
				<div class="directorist-price-ranges__item directorist-form-group"><input type="text" name="price[1]" class="directorist-form-element" placeholder="<?php echo esc_attr( $max_placeholder ); ?>" value="<?php echo esc_attr( $searchform->price_value( 'max' ) ); ?>"></div>

			<?php endif;?>
			
			<?php if ( $ptype == 'both' || $ptype == 'price_range' ): ?>

				<div class="directorist-price-ranges__item directorist-price-ranges__price-frequency">
					<label class="directorist-price-ranges__price-frequency--btn">
						<?php $searchform->the_price_range_input('bellow_economy');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 1) ); ?></span>
					</label>
					<label class="directorist-price-ranges__price-frequency--btn">
						<?php $searchform->the_price_range_input('economy');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 2) ); ?></span>
					</label>
					<label class="directorist-price-ranges__price-frequency--btn">
						<?php $searchform->the_price_range_input('moderate');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 3) ); ?></span>
					</label>
					<label class="directorist-price-ranges__price-frequency--btn">
						<?php $searchform->the_price_range_input('skimming');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 4) ); ?></span>
					</label>
				</div>

			<?php endif; ?>

		</div>

	</div>

<?php else: ?>

	<div class="directorist-search-field directorist-price-ranges-wrapper">

		<div class="theme-search-dropdown">

			<div class="theme-search-dropdown__label">
				<label><?php echo esc_html( ! empty( $data['label'] ) ? $data['label'] : __( 'Price', 'onelisting' ) ); ?></label>
			</div>

			<div class="directorist-price-ranges theme-search-dropdown-toggle">

				<?php if ( $ptype == 'both' || $ptype == 'price_unit' ): ?>

					<div class="directorist-price-ranges__item directorist-form-group"><input type="text" name="price[0]" class="directorist-form-element" placeholder="<?php echo esc_attr( $min_placeholder ); ?>" value="<?php echo esc_attr( $searchform->price_value( 'min' ) ); ?>"></div>
					<div class="directorist-price-ranges__item directorist-form-group"><input type="text" name="price[1]" class="directorist-form-element" placeholder="<?php echo esc_attr( $max_placeholder ); ?>" value="<?php echo esc_attr( $searchform->price_value( 'max' ) ); ?>"></div>

				<?php endif;?>

				<?php if ( $ptype == 'both' || $ptype == 'price_range' ): ?>

					<div class="directorist-price-ranges__item directorist-price-ranges__price-frequency">
						<label class="directorist-price-ranges__price-frequency--btn">
							<?php $searchform->the_price_range_input('bellow_economy');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 1) ); ?></span>
						</label>
						<label class="directorist-price-ranges__price-frequency--btn">
							<?php $searchform->the_price_range_input('economy');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 2) ); ?></span>
						</label>
						<label class="directorist-price-ranges__price-frequency--btn">
							<?php $searchform->the_price_range_input('moderate');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 3) ); ?></span>
						</label>
						<label class="directorist-price-ranges__price-frequency--btn">
							<?php $searchform->the_price_range_input('skimming');?><span class="directorist-pf-range"><?php echo esc_html( str_repeat($searchform->c_symbol, 4) ); ?></span>
						</label>
					</div>

				<?php endif; ?>

			</div>
			
		</div>

	</div>

<?php endif;?>