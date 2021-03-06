
<div id="page-container" class="row">

	<div id="page-content" class="col-lg-12">

		<div class="contents form">
		
			<?php echo $this->Form->create('Content', array('url' => array($redirect_controller, $redirect_id, $redirect_name))); ?>
				<fieldset>
					<h2><?php printf(__('Add Content to %s %s'), __(Inflector::humanize($redirect_controller)), $redirect_name); ?></h2>
					<?php echo $this->Form->input('Content.section_id', array('type' => 'hidden')); ?>
                    <?php echo $this->Form->input('Content.active'); ?>

                    <?php echo $this->Form->input('Content.type', array('options' => unserialize(CONTENT_TYPES)));
                    $this->Js->get('#ContentType')->event('change', "if (this.value == 'normal') {
                                                                        $('#ContentBodyEngDiv').show();
                                                                        $('#ContentBodyFraDiv').show();
                                                                        $('#ContentMediaDiv').hide();
                                                                        $('#PhotosMedia').hide();
                                                                        $('#VideoMedia').hide();
                                                                        $('#ContentCaptionEngDiv').hide();
                                                                        $('#ContentCaptionFraDiv').hide();
                                                                    } else if (this.value == 'photos') {
                                                                        $('#ContentBodyEngDiv').hide();
                                                                        $('#ContentBodyFraDiv').hide();
                                                                        $('#ContentMediaDiv').show();
                                                                        $('#PhotosMedia').css('display', 'inline-block');
                                                                        $('#VideoMedia').hide();
                                                                        $('#ContentCaptionEngDiv').show();
                                                                        $('#ContentCaptionFraDiv').show();
                                                                    } else if (this.value == 'video') {
                                                                        $('#ContentBodyEngDiv').show();
                                                                        $('#ContentBodyFraDiv').show();
                                                                        $('#ContentMediaDiv').show();
                                                                        $('#PhotosMedia').hide();
                                                                        $('#VideoMedia').show();
                                                                        $('#ContentCaptionEngDiv').hide();
                                                                        $('#ContentCaptionFraDiv').hide();
                                                                    }
                        "); ?>


					<?php echo $this->Form->input('Content.title_eng'); ?>
					<?php echo $this->Form->input('Content.title_fra'); ?>
                    <?php echo $this->Form->input('Content.body_eng', array('div' => array('id' => 'ContentBodyEngDiv'))); ?>
                    <?php echo $this->Form->input('Content.body_fra', array('div' => array('id' => 'ContentBodyFraDiv'))); ?>

                    <?php echo $this->Form->input('Content.media', array('class' => 'mceNoEditor', 'div' => array('id' => 'ContentMediaDiv', 'class' => 'display_none'))); ?>
                    <?php echo $this->Html->link('<i class="fa fa-upload"></i> '.__('Select Photos'), array(), array('id' => 'PhotosMedia', 'class' => 'btn btn-success display_none', 'escape' => false));
                               $this->Js->get('#PhotosMedia')->event('click', 'openKCFinderMultipleFiles("#ContentMedia");'); ?>
                    <div id="VideoMedia" class="display_none"><?php echo __('Paste your video embed code in Media'); ?></div>

                    <?php echo $this->Form->input('Content.caption_eng', array('class' => 'mceNoEditor', 'div' => array('id' => 'ContentCaptionEngDiv', 'class' => 'display_none'))); ?>
                    <?php echo $this->Form->input('Content.caption_fra', array('class' => 'mceNoEditor', 'div' => array('id' => 'ContentCaptionFraDiv', 'class' => 'display_none'))); ?>

                    <?php echo $this->Html->link('<i class="fa fa-upload"></i> '.__('Select Photos'), array(), array('id' => 'photosBodyFra', 'class' => 'btn btn-success display_none', 'escape' => false));
                               $this->Js->get('#photosBodyFra')->event('click', 'openKCFinderMultipleFiles("#ContentBodyFra");'); ?>
				</fieldset>
				<?php echo $this->Form->submit(__('Add')); ?>
			<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->

<?php if (!empty($this->request->data['Content']))
    if ($this->request->data['Content']['type'] == 'photos')
        echo $this->Js->buffer("
            $('#ContentBodyEngDiv').hide();
            $('#ContentBodyFraDiv').hide();
            $('#ContentMediaDiv').show();
            $('#PhotosMedia').css('display', 'inline-block');
            $('#VideoMedia').hide();
            $('#ContentCaptionEngDiv').show();
            $('#ContentCaptionFraDiv').show();
        ");
    elseif ($this->request->data['Content']['type'] == 'video')
        echo $this->Js->buffer("
            $('#ContentBodyEngDiv').show();
            $('#ContentBodyFraDiv').show();
            $('#ContentMediaDiv').show();
            $('#PhotosMedia').hide();
            $('#VideoMedia').show();
            $('#ContentCaptionEngDiv').hide();
            $('#ContentCaptionFraDiv').hide();
        ");
?>
