<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <!-- <div <?= $options['wrapperAttrs'] ?> > -->
        <div class="m-form__group form-group row">
    <?php endif; ?>
<?php endif; ?>

<?php if ($showField): ?>
    <?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
        <?= Form::customLabel($name, __(strtolower($options['label'])), 'class="col-1 col-form-label"') ?>
    <?php endif; ?>
    
    <div class="col-1">
        <span class="m-switch m-switch--outline m-switch--icon m-switch--success m-switch--sm">
            <label>
                <?= Form::checkbox($name, $options['value'], $options['checked'], $options['attr']) ?>
                <span></span>
            </label>
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