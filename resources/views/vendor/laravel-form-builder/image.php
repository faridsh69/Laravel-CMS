<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>
	<div class="input-group">
		<span class="input-group-btn">
			<button class="lfm btn btn-brand" type="button" id="lfm" data-preview="holder" data-input="<?php echo $options['real_name']; ?>">
				<i class="fa fa-picture-o"></i> Choose Image
			</button>
		</span>
		<?= Form::input('text', $name, $options['value'], $options['attr']) ?>
	</div>

	<img style="margin-top:10px;width: 150px" src="<?php echo $options['value']; ?>" alt="image">
	<div id="holder" style="margin-top:10px;height:1px; width: 1px"></div>
		
    <?php include 'help_block.php' ?>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>