
<div id="page-container" class="row">

	<div id="sidebar" class="col-lg-3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('List Sections'), array('action' => 'index')); ?></li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .col-lg-3 -->
	
	<div id="page-content" class="col-lg-9">

		<div class="sections form">
		
			<?php echo $this->Form->create('Section', array('class' => 'form')); ?>
				<fieldset>
					<h2><?php echo __('Add Section'); ?></h2>
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
                    <div class="kcfinder-image-header" onclick="openKCFinder(this, 'SectionImageHeader')"><div><?php echo __('Click here to choose an image').' 2200x257px'; ?></div></div>

				</fieldset>
				<?php echo $this->Form->submit(__('Add'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
			<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .col-lg-9 -->

</div><!-- #page-container .row-fluid -->
