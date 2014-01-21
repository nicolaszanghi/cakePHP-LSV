<div id="page-container" class="row-fluid">

    <div id="page-content" class="col-lg-12">

        <div class="users form">

            <?php echo $this->Form->create('User', array('class' => 'form')); ?>
            <fieldset>
                <h2><?php echo __('Add User'); ?></h2>
                <?php echo $this->Form->input('User.role', array('options' => array('admin' => 'Admin', 'author' => 'Author'))); ?>
                <?php echo $this->Form->input('User.email'); ?>
                <?php echo $this->Form->input('User.password'); ?>
                <?php echo $this->Form->input('User.password_confirm', array('type' => 'password')); ?>
            </fieldset>
            <?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-->