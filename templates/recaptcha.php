<div class="torro-recaptcha">
	<div id="<?php echo $id; ?>" class="recaptcha-placeholder" data-form-id="<?php echo $form_id; ?>" data-type="<?php echo $type; ?>" data-size="<?php echo $size; ?>" data-theme="<?php echo $theme; ?>" style="margin-bottom:20px;"></div>
	<?php if ( ! empty( $error ) ) : ?>
		<div class="error-messages alert alert-danger" role="alert">
			<span><?php echo $error; ?></span>
		</div>
	<?php endif; ?>
</div>
