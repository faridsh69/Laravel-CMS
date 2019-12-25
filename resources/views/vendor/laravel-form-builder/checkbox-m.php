<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showField): ?>
    <div class="m-checkbox-list">
        <label class="m-checkbox m-checkbox--solid m-checkbox--danger">
            <?= Form::checkbox($name, $options['value'], $options['checked'], $options['attr']) ?>
            <?= __(strtolower($options['label'])); ?>

            <span></span>
        </label>
    </div>  
    <?php include 'help_block.php' ?>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>