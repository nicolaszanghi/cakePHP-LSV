<div id="page-container" class="row-fluid">

    <div id="page-content" class="col-lg-12">

        <div class="users form">

            <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <h2><?php echo __('Add User'); ?></h2>
                <?php echo $this->Form->input('User.role', array('options' => unserialize(ROLES))); ?>
                <?php echo $this->Form->input('User.email'); ?>
                <?php echo $this->Form->input('User.password'); ?>
                <?php echo $this->Form->input('User.password_confirm', array('type' => 'password')); ?>
            </fieldset>
            <?php echo $this->Form->submit(__('Add')); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-->