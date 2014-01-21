
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <fieldset>
                <h2><?php echo __('Please enter your username and password'); ?></h2>
                <?php echo $this->Form->create('User');
                echo $this->Form->input('User.email');
                echo $this->Form->input('User.password');
                echo $this->Form->submit(__('Login'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
            </fieldset>
        </div>
    </div>
</div>
