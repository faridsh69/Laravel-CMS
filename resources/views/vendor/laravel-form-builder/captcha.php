<?php echo NoCaptcha::renderJs(); ?>
<?php echo NoCaptcha::display(); ?>
<span class="help-block">
<?php if($errors->has('g-recaptcha-response')){echo $errors->first('g-recaptcha-response');} ?>
</span>
