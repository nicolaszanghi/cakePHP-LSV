<div id="page-container" class="row">

    <div id="page-content" class="col-lg-12">

        <div class="users form">

            <div class="row">
                <div class="col-lg-9">
                    <h2><?php echo __('Edit User'); ?></h2>
                </div>
                <div class="col-lg-3"p>
                    <div class="actions pull-right">
                        <?php echo $this->Html->link('<i class="glyphicon glyphicon-info-sign"></i> '.__('View'), array('action' => 'view',  $this->Form->value('User.id')), array('class' => 'btn btn-info', 'escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i> '.__('Delete'), array('action' => 'delete', $this->Form->value('User.id')),  array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?>
                    </div><!-- .actions -->
                </div>
            </div>

            <?php echo $this->Form->create('User', array('class' => 'form')); ?>
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
                <fieldset>
                    <?php echo $this->Form->input('id', array('class' => 'span12')); ?>
                    <?php echo $this->Form->input('User.role', array('options' => array('admin' => 'Admin', 'author' => 'Author'))); ?>
                    <?php echo $this->Form->input('User.email'); ?>
                    <?php echo $this->Form->input('User.password', array('value' => '', 'placeholder' => '')); ?>
                    <?php echo $this->Form->input('User.password_confirm', array('type' => 'password')); ?>

                </fieldset>
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div>
    <!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
