<!-- <?php if ($options['wrapper'] !== false): ?>
<div <?= $options['wrapperAttrs'] ?> >
<?php endif; ?>

<?= Form::button($options['label'], $options['attr']) ?>
<?php include 'help_block.php' ?>

<?php if ($options['wrapper'] !== false): ?>
</div>
<?php endif; ?>
 -->
<div class="m-portlet__foot m-portlet__foot--fit">
	<div class="m-form__actions m-form__actions">
		<div class="row">
			<div class="col-lg-9 ml-lg-auto">
				<button type="submit" class="btn btn-primary">
					<?= $options['label'] ?>
				</button>
				<button type="reset" class="btn btn-secondary">
					Cancel
				</button>
			</div>
		</div>
	</div>
</div>