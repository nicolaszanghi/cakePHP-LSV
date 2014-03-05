
<div id="page-container" class="row">


	<div id="page-content" class="col-lg-12">
		
		<div class="contents view">

            <div class="row">
                <div class="col-lg-9">
                    <h2><?php  echo __('Content'); ?></h2>
                </div>
                <div class="col-lg-3"p>
                    <div class="actions pull-right">
                        <?php echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i> '.__('Edit'), array('action' => 'edit', $content['Content']['id']), array('class' => 'btn btn-warning', 'escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i> '.__('Delete'), array('action' => 'delete', $content['Content']['id']),  array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?>
                    </div><!-- .actions -->
                </div>
            </div>

			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['id']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Section'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($content['Section']['title_eng'], array('controller' => 'sections', 'action' => 'view', $content['Section']['id']), array('class' => '')); ?>
						&nbsp;
					</td>
				</tr>
                <tr>
                    <td><strong><?php echo __('Active'); ?></strong></td>
                    <td>
                        <?php echo __('Byesno'.h($content['Content']['active'])); ?>
                        &nbsp;
                    </td>
                </tr>
				<tr>
					<td><strong><?php echo __('Title Eng'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['title_eng']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Title Fra'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['title_fra']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Body Eng'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['body_eng']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Body Fra'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['body_fra']); ?>
						&nbsp;
					</td>
				</tr>
                <tr>
                    <td><strong><?php echo __('Media'); ?></strong></td>
                    <td>
                        <?php echo h($content['Content']['media']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Caption Eng'); ?></strong></td>
                    <td>
                        <?php echo h($content['Content']['caption_eng']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Caption Fra'); ?></strong></td>
                    <td>
                        <?php echo h($content['Content']['caption_fra']); ?>
                        &nbsp;
                    </td>
                </tr>
				<tr>
					<td><strong><?php echo __('Order'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['order']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Created'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['created']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Modified'); ?></strong></td>
					<td>
						<?php echo h($content['Content']['modified']); ?>
						&nbsp;
					</td>
				</tr>
			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->


	</div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->
