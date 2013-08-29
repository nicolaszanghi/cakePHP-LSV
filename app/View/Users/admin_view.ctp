<div id="page-container" class="row">

    <div id="page-content" class="col-lg-12">

        <div class="users view">

            <div class="row">
                <div class="col-lg-9">
                    <h2><?php echo __('User'); ?></h2>
                </div>
                <div class="col-lg-3"p>
                    <div class="actions pull-right">
                        <?php echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i> '.__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-warning', 'escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i> '.__('Delete'), array('action' => 'delete', $user['User']['id']),  array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                    </div><!-- .actions -->
                </div>
            </div>

            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td><strong><?php echo __('Id'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['id']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Role'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['role']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Email'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['email']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Password'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['password']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Created'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['created']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Modified'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['modified']); ?>
                        &nbsp;
                    </td>
                </tr>
            </table>
            <!-- .table table-striped table-bordered -->

        </div>
        <!-- .view -->

    </div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-->
