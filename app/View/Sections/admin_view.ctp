
<div id="page-container" class="row">

	<div id="page-content" class="col-lg-12">
		
		<div class="sections view">

            <div class="row">
                <div class="col-lg-9">
                    <h2><?php  echo __('Section'); ?></h2>
                </div>
                <div class="col-lg-3"p>
                    <div class="actions pull-right">
                        <?php echo $this->Html->link('<i class="glyphicon glyphicon-pencil"></i> '.__('Edit'), array('action' => 'edit', $section['Section']['id']), array('class' => 'btn btn-warning', 'escape' => false)); ?>
                        <?php if (!in_array($section['Section']['id'], unserialize(SPECIAL_SECTIONS)))
                            echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i> '.__('Delete'), array('action' => 'delete', $section['Section']['id']),  array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $section['Section']['id'])); ?>
                    </div><!-- .actions -->
                </div>
            </div>

			<table class="table table-striped table-bordered table-hover">
				<tr>
					<td><strong><?php echo __('Id'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['id']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Active'); ?></strong></td>
					<td>
						<?php echo __('Byesno'.h($section['Section']['active'])); ?>
						&nbsp;
					</td>
				</tr>
                <tr>
                    <td><strong><?php echo __('In Menu'); ?></strong></td>
                    <td>
                        <?php echo __('Byesno'.h($section['Section']['in_menu'])); ?>
                        &nbsp;
                    </td>
                </tr>
				<tr>
					<td><strong><?php echo __('Parent Section'); ?></strong></td>
					<td>
						<?php echo $this->Html->link($section['ParentSection']['title_eng'], array('controller' => 'sections', 'action' => 'view', $section['ParentSection']['id']), array('class' => '')); ?>
						&nbsp;
					</td>
				</tr>
                <tr>
                    <td><strong><?php echo __('Slug'); ?></strong></td>
                    <td>
                        <?php echo '/sections/'.h($section['Section']['slug']); ?>
                        &nbsp;
                    </td>
                </tr>
				<tr>
					<td><strong><?php echo __('Title Eng'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['title_eng']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Title Fra'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['title_fra']); ?>
						&nbsp;
					</td>
				</tr>
                <tr>
                    <td><strong><?php echo __('Menu Title Eng'); ?></strong></td>
                    <td>
                        <?php echo h($section['Section']['menu_title_eng']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Menu Title Fra'); ?></strong></td>
                    <td>
                        <?php echo h($section['Section']['menu_title_fra']); ?>
                        &nbsp;
                    </td>
                </tr>
				<tr>
					<td><strong><?php echo __('Subtitle Eng'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['subtitle_eng']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Subtitle Fra'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['subtitle_fra']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Body Eng'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['body_eng']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Body Fra'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['body_fra']); ?>
						&nbsp;
					</td>
				</tr>
                <tr>
                    <td><strong><?php echo __('Image Header'); ?></strong></td>
                    <td>
                        <?php if (!empty($laureate['Laureate']['image_header']))
                                echo $this->Html->image($laureate['Laureate']['image_header'], array('class' => 'image-header')); ?>
                        &nbsp;
                    </td>
                </tr>
				<tr>
					<td><strong><?php echo __('Order'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['order']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Created'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['created']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td><strong><?php echo __('Modified'); ?></strong></td>
					<td>
						<?php echo h($section['Section']['modified']); ?>
						&nbsp;
					</td>
				</tr>
			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

                <div class="row">
                    <div class="col-lg-9">
                        <h3><?php echo __('Child Sections'); ?></h3>
                    </div>
                    <div class="col-lg-3">
                        <div class="actions pull-right">
                            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Section'), array('controller' => 'sections', 'action' => 'add', $section['Section']['id']), array('class' => 'btn btn-success', 'escape' => false)); ?>
                        </div><!-- .actions -->
                    </div>
                </div>

                <?php if (!empty($section['ChildSection'])): ?>

                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Active'); ?></th>
                            <th><?php echo __('Title Eng'); ?></th>
                            <th><?php echo __('Title Fra'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($section['ChildSection'] as $child_section): ?>
                            <tr<?php if(!$child_section['active']) echo ' class="inactive"'; ?>>
                                <td><?php echo $child_section['id']; ?></td>
                                <td><?php echo __('Byesno'.$child_section['active']); ?></td>
                                <td><?php echo $child_section['title_eng']; ?></td>
                                <td><?php echo $child_section['title_fra']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('controller' => 'sections', 'action' => 'view', $child_section['id']), array('class' => 'btn btn-xs btn-info')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'sections', 'action' => 'edit', $child_section['id']), array('class' => 'btn btn-xs btn-warning')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sections', 'action' => 'delete', $child_section['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete %s?', t($child_section, 'title'))); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table><!-- .table table-striped table-bordered -->

                <?php endif; ?>


                <div class="row">
                    <div class="col-lg-9">
                        <h3><?php echo __('Contents'); ?></h3>
                    </div>
                    <div class="col-lg-3">
                        <div class="actions pull-right">
                            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Content'), array('controller' => 'contents', 'action' => 'add', 'sections', $section['Section']['id'], t($section['Section'], 'title')), array('class' => 'btn btn-success', 'escape' => false)); ?>
                        </div><!-- .actions -->
                    </div>
                </div>

				<?php if (!empty($section['Content'])): ?>
				
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Active'); ?></th>
                            <th><?php echo __('Title Eng'); ?></th>
                            <th><?php echo __('Title Fra'); ?></th>
                            <th><?php echo __('Type'); ?></th>
							<th><?php echo __('Order'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
                        <tbody id="sortable">
                            <?php
                                $i = 0;
                                foreach ($section['Content'] as $content): ?>
                                <tr id="Content_<?php echo $content['id']; ?>"<?php if(!$content['active']) echo ' class="inactive"'; ?>>
                                    <td><?php echo $content['id']; ?></td>
                                    <td><?php echo __('Byesno'.$content['active']); ?></td>
                                    <td><?php echo $content['title_eng']; ?></td>
                                    <td><?php echo $content['title_fra']; ?></td>
                                    <td><?php $content_types = unserialize(CONTENT_TYPES); echo $content_types[$content['type']]; ?></td>
                                    <td><?php echo $content['order']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'contents', 'action' => 'view', $content['id']), array('class' => 'btn btn-xs btn-info')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'contents', 'action' => 'edit', $content['id'], 'sections', $section['Section']['id'], t($section['Section'], 'title')), array('class' => 'btn btn-xs btn-warning')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contents', 'action' => 'delete', $content['id'], 'sections', $section['Section']['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete %s?', t($content, 'title'))); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
					</table><!-- .table table-striped table-bordered -->

                    <?php echo __('Move line to reorder');
                    $this->Js->get('#sortable');
                    $this->Js->sortable(array(
                        'complete' => '$.post("'.SITE_URL.'/admin/contents/reorder", $("#sortable").sortable("serialize"))',
                    ));
                    ?>

				<?php endif; ?>

				

			</div><!-- .related -->


        <?php
        /*
			<div class="related">

				<h3><?php echo __('Sub Sections'); ?></h3>

                <div class="actions">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Child Section'), array('controller' => 'sections', 'action' => 'add'), array('class' => 'btn btn-success', 'escape' => false)); ?>
                </div><!-- .actions -->

				<?php if (!empty($section['ChildSection'])): ?>
				
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<th><?php echo __('Id'); ?></th>
							<th><?php echo __('Active'); ?></th>
							<th><?php echo __('Title Eng'); ?></th>
							<th><?php echo __('Title Fra'); ?></th>
							<th><?php echo __('Order'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
						<?php
                            $i = 0;
                            foreach ($section['ChildSection'] as $childSection): ?>
							<tr>
								<td><?php echo $childSection['id']; ?></td>
								<td><?php echo $childSection['active']; ?></td>
								<td><?php echo $childSection['title_eng']; ?></td>
								<td><?php echo $childSection['title_fra']; ?></td>
                                <td><?php echo $childSection['order']; ?></td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('controller' => 'sections', 'action' => 'view', $childSection['id']), array('class' => 'btn btn-xs btn-info')); ?>
									<?php echo $this->Html->link(__('Edit'), array('controller' => 'sections', 'action' => 'edit', $childSection['id']), array('class' => 'btn btn-xs btn-warning')); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sections', 'action' => 'delete', $childSection['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $childSection['id'])); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				

			</div><!-- .related -->
        */ ?>

			
	</div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->
