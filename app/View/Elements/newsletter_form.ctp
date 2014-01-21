<?php echo $this->Form->create(null, array('url' => '', 'name' => 'signup', 'accept-charset' => 'utf-8', 'class' => 'form')); ?>
    <fieldset>
        <legend><?php echo __('newsletter'); ?></legend>
        <?php echo $this->Form->input(__('E-mail'), array('name' => 'Email', 'placeholder' => __('E-mail'), 'size' => 30)); ?>
        <input type="hidden" name="d[2]" value="<?php echo substr(Configure::read('Config.language'), 0, -1); ?>" />
        <input type="hidden" name="pommo_signup" value="true" />
        <?php echo $this->Form->submit(__('Subscribe'), array('class' => 'btn btn-default btn-xs')); ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
