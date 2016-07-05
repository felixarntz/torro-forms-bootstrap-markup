<?php
/**
 * Template: element.php
 *
 * Available data: $form_id, $title, $action_url, $classes, $hidden_fields, $current_container, $navigation
 *
 * @package TFBS3
 * @subpackage Templates
 * @author Felix Arntz <felix-arntz@leaves-and-love.net>
 * @since 1.0.0
 */

$buttons_class = ' col-sm-12';
if ( torro()->extensions()->get_registered( 'torro_forms_bootstrap_markup' )->is_form_horizontal() ) {
	$buttons_class = ' col-sm-9 col-sm-offset-3';
}
?>
<form id="torro-form-<?php echo $form_id; ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" action="<?php echo esc_url( $action_url ); ?>" method="post" enctype="multipart/form-data" novalidate>
	<?php echo $hidden_fields; ?>

	<?php torro()->template( 'container', $current_container ); ?>

	<div class="row">
		<div class="buttons<?php echo $buttons_class; ?>" style="margin-bottom:20px;">
			<?php if ( $navigation['prev_button'] ) : ?>
				<input type="submit" name="<?php echo esc_attr( $navigation['prev_button']['name'] ); ?>" value="<?php echo esc_attr( $navigation['prev_button']['label'] ); ?>" class="btn btn-default">
			<?php endif; ?>

			<?php if ( $navigation['next_button'] ) : ?>
				<input type="submit" name="<?php echo esc_attr( $navigation['next_button']['name'] ); ?>" value="<?php echo esc_attr( $navigation['next_button']['label'] ); ?>" class="btn btn-default">
			<?php endif; ?>

			<?php if ( $navigation['submit_button'] ) : ?>
				<?php do_action( 'torro_form_send_button_before', $form_id ); ?>
				<input type="submit" name="<?php echo esc_attr( $navigation['submit_button']['name'] ); ?>" value="<?php echo esc_attr( $navigation['submit_button']['label'] ); ?>" class="btn btn-primary">
				<?php do_action( 'torro_form_send_button_after', $form_id ); ?>
			<?php endif; ?>
		</div>
	</div>
</form>
