<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, __(strtolower($options['label'])), $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>

	<?= Form::input('file', $name, '', $options['attr']) ?>

	<?php include 'help_block.php' ?>
	<?php foreach (json_decode($options['files_src']) as $src): ?>
		<div class="show-file">
			<?php if ($options['file_accept'] === 'image'): ?>
				<img src="<?php echo $src; ?>" alt="image">
			<?php elseif ($options['file_accept'] === 'video'): ?>
				<video controls>
					<source src="<?php echo $src; ?>">
				</video>
			<?php elseif ($options['file_accept'] === 'audio'): ?>
				<audio controls>
					<source src="<?php echo $src; ?>">
				</audio>
			<?php else: ?>
				<?php echo $src; ?>
			<?php endif; ?>
			<div class="file-tools mt-2">
				<a href="javascript:void(0)" class="btn btn-outline-danger m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" onclick="removeFile('<?php echo $src; ?>')"><span>
				    <i class="la la-trash"></i></span>
				</a>
				<a download href="<?php echo $src; ?>" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
				    <i class="la la-download"></i></span>
				</a>
				<a target="blank" href="<?php echo $src; ?>" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
				    <i class="la la-eye"></i></span>
				</a>
			</div>
		</div>
	<?php endforeach; ?>

<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
