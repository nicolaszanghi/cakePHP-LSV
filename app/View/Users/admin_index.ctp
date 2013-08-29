<div id="page-container" class="row">

    <div id="page-content" class="col-lg-12">

        <div class="users index">

            <h2><?php echo __('Users'); ?></h2>

            <div class="actions pull-right">
                <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New User'), array('action' => 'add'), array('class' => 'btn btn-success', 'escape' => false)); ?>
            </div><!-- .actions -->

            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('role'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php
                foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-xs btn-warning')); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <?php echo $this->element('pagination', array('model' => 'User')); ?>

        </div><!-- .index -->

    </div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->
