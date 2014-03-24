
<div id="page-container" class="row">



	<div id="page-content" class="col-lg-12">

		<div class="sections form">

            <div class="row">
                <div class="col-lg-9">
                    <h2><?php echo __('Edit Section'); ?></h2>
                </div>
                <div class="col-lg-3"p>
                    <div class="actions pull-right">
                        <?php echo $this->Html->link('<i class="fa fa-info"></i> '.__('View'), array('action' => 'view',  $this->Form->value('Section.id')), array('class' => 'btn btn-info', 'escape' => false)); ?>
                        <?php if (!in_array($this->Form->value('Section.id'), unserialize(SPECIAL_SECTIONS)))
                            echo $this->Form->postLink('<i class="fa fa-times"></i> '.__('Delete'), array('action' => 'delete', $this->Form->value('Section.id')),  array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Section.id'))); ?>
                    </div><!-- .actions -->
                </div>
            </div>

			<?php echo $this->Form->create('Section', array('class' => 'form')); ?>
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
				<fieldset>
					<?php echo $this->Form->input('Section.id'); ?>
					<?php echo $this->Form->input('Section.active'); ?>
                    <?php echo $this->Form->input('Section.in_menu'); ?>
					<?php echo $this->Form->input('Section.parent_id', array('empty' => true)); ?>
					<?php echo $this->Form->input('Section.title_eng'); ?>
					<?php echo $this->Form->input('Section.title_fra'); ?>
                    <?php echo $this->Form->input('Section.menu_title_eng'); ?>
                    <?php echo $this->Form->input('Section.menu_title_fra'); ?>
					<?php echo $this->Form->input('Section.subtitle_eng'); ?>
					<?php echo $this->Form->input('Section.subtitle_fra'); ?>
					<?php echo $this->Form->input('Section.body_eng'); ?>
					<?php echo $this->Form->input('Section.body_fra'); ?>

                    <?php echo $this->Form->input('Section.image_header'); ?>
                    <div class="kcfinder-image-header" onclick="openKCFinder(this, 'SectionImageHeader')">
                        <?php if (!empty($this->request->data['Section']['image_header']))
                            echo $this->Html->image($this->request->data['Section']['image_header']);
                        else
                            echo '<div>'.__('Click here to choose an image').' 2200x257</div>'; ?>
                    </div>

				</fieldset>
				<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
			<?php echo $this->Form->end(); ?>

		</div>

	</div><!-- #page-content .col-lg-9 -->

</div><!-- #page-container .row-fluid -->
