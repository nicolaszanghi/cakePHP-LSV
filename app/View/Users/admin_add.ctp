<div id="page-container" class="row-fluid">

    <div id="page-content" class="col-lg-12">

        <div class="users form">

            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form')); ?>
            <fieldset>
                <h2><?php echo __('Add User'); ?></h2>
                <?php echo $this->Cakestrap->input('User.role', array('options' => array('admin' => 'Admin', 'author' => 'Author'))); ?>
                <?php echo $this->Cakestrap->input('User.email'); ?>
                <?php echo $this->Cakestrap->input('User.password'); ?>
                <?php echo $this->Cakestrap->input('User.password_confirm', array('type' => 'password')); ?>
            </fieldset>
            <?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-->