<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, __(strtolower($options['label'])), $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>

	<?= Form::input('file', $name, $options['value'], $options['attr']) ?>

	<?php include 'help_block.php' ?>
	<br>
	<?php if ($options['value']): ?>
		<?php if ($options['file_accept'] === 'image'): ?>
			<div class="image-form">
				<img src="<?php echo $options['value']; ?>" alt="image">
			</div>
		<?php elseif ($options['file_accept'] === 'video'): ?>
			<video height="150" controls>
				<source src="<?php echo $options['value']; ?>">
			</video>
		<?php elseif ($options['file_accept'] === 'audio'): ?>
			<audio controls>
				<source src="<?php echo $options['value']; ?>">
			</audio>
		<?php else: ?>
			<?php echo $options['value']; ?>
		<?php endif; ?>
		<br>
		<a download href="<?php echo $options['value']; ?>" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
		    <i class="la la-download"></i></span>
		</a>
	<?php endif; ?>

<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
