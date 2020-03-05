<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, __(strtolower($options['label'])), $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>
	<div class="input-group">
		<span class="input-group-btn">
			<button class="btn btn-danger laravel-<?php echo $options['file_accept'] ?>-manager" type="button" 
			data-preview="holder-<?php echo $name ?>" 
			data-input="<?php echo $options['real_name']; ?>">
				<i class="fa fa-picture-o"></i> Choose <?php echo $options['file_accept'] ?>				
			</button>
		</span>
		<?= Form::input('text', $name, $options['value'], $options['attr']) ?>
	</div>
	<?php include 'help_block.php' ?>
	<div class="image-form">
		<?php if ($options['value'] && $options['file_accept'] === 'image'): ?>
			<img src="<?php echo asset($options['value']); ?>" alt="image">
		<?php endif; ?>
		<div id="holder-<?php if($options['file_accept'] === 'image'){ echo $name; } ?>"></div>
	</div>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>