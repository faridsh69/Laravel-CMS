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
		<?php endif; ?>
		<br>
		<a download href="<?php echo $options['value']; ?>" class="btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"><span>
		    <i class="la la-download"></i></span>
		</a>
		<a href="javascript:void(0)" class="btn btn-outline-danger m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" onclick="emptyImageInput('<?php echo $name ?>')"><span>
		    <i class="la la-trash"></i></span>
		</a>
	<?php endif; ?>
	<div class="image-form">
		<div id="holder-<?php if($options['file_accept'] === 'image'){ echo $name; } ?>"></div>
	</div>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>