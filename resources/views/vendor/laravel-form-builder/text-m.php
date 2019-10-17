<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>

	<div class="m-input-icon m-input-icon--left m-input-icon--right" style="height: 37px">
		<?= Form::input(isset($options['attr']['type']) ? $options['attr']['type'] : 'text', $name, $options['value'], $options['attr']) ?>
		<span class="m-input-icon__icon m-input-icon__icon--left">
			<span>
				<i class="la <?= $options['left_icon'] ?> "></i>
			</span>
		</span>
		<span class="m-input-icon__icon m-input-icon__icon--right">
			<span>
				<i class="la <?= $options['right_icon'] ?>"></i>
			</span>
		</span>
	</div>

    <?php include 'help_block.php' ?>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
