<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>
	<?= Form::input('file', $name, $options['value'], $options['attr']) ?>

	<?php include 'help_block.php' ?>

	<div class="image-form">
	<?php
		foreach($options['images'] as $image) {
			echo '<img src="' . asset($image['src_main']) . '" alt="image">'.
				'<a href="' . route('admin.product.remove-image', $image['id']) . '">DELETE</a>';
		}
	?>
	</div>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
