
<div id="page-container" class="row">

	<div id="page-content" class="col-lg-12">

        <div class="row">
            <div class="col-lg-9">
                <h2><?php printf(__('Edit Content of %s %s'), __(Inflector::humanize($redirect_controller)), $redirect_name); ?></h2>
            </div>
            <div class="col-lg-3"p>
                <div class="actions pull-right">
                    <br />
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-info-sign"></i> '.__('View'), array('action' => 'view',  $this->Form->value('Content.id')), array('class' => 'btn btn-info', 'escape' => false)); ?>
                    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i> '.__('Delete'), array('action' => 'delete', $this->Form->value('Content.id')),  array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Content.id'))); ?>
                </div><!-- .actions -->
            </div>
        </div>

		<div class="contents form">
		
            <?php echo $this->Form->create('Content', array('url' => array($this->Form->value('Content.id'), $redirect_controller, $redirect_id, $redirect_name), 'inputDefaults' => array('label' => false), 'class' => 'form')); ?>
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
				<fieldset>
					<?php echo $this->Cakestrap->input('Content.id'); ?>
                    <?php echo $this->Cakestrap->input('Content.section_id', array('type' => 'hidden')); ?>
                    <?php echo $this->Cakestrap->input('Content.laureate_id', array('type' => 'hidden')); ?>
                    <?php echo $this->Cakestrap->input('Content.jury_id', array('type' => 'hidden')); ?>
                    <?php echo $this->Cakestrap->input('Content.active'); ?>

                    <?php echo $this->Cakestrap->input('Content.type', array('options' => unserialize(CONTENT_TYPES)));
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


                    <?php echo $this->Cakestrap->input('Content.title_eng'); ?>
                    <?php echo $this->Cakestrap->input('Content.title_fra'); ?>
                    <?php echo $this->Cakestrap->input('Content.body_eng', array('div' => array('id' => 'ContentBodyEngDiv'))); ?>
                    <?php echo $this->Cakestrap->input('Content.body_fra', array('div' => array('id' => 'ContentBodyFraDiv'))); ?>

                    <?php echo $this->Cakestrap->input('Content.media', array('class' => 'mceNoEditor', 'div' => array('id' => 'ContentMediaDiv', 'class' => 'display_none'))); ?>
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-info-sign"></i> '.__('Select Photos'), array(), array('id' => 'PhotosMedia', 'class' => 'btn btn-success display_none', 'escape' => false));
                    $this->Js->get('#PhotosMedia')->event('click', 'openKCFinderMultipleFiles("#ContentMedia");'); ?>
                    <?php //@todo change glyph with upload ?>
                    <div id="VideoMedia" class="display_none"><?php echo __('Paste your video embed code in Media'); ?></div>


                    <?php echo $this->Cakestrap->input('Content.caption_eng', array('class' => 'mceNoEditor', 'div' => array('id' => 'ContentCaptionEngDiv', 'class' => 'display_none'))); ?>
                    <?php echo $this->Cakestrap->input('Content.caption_fra', array('class' => 'mceNoEditor', 'div' => array('id' => 'ContentCaptionFraDiv', 'class' => 'display_none'))); ?>


				</fieldset>
				<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success', 'div' => array('class' => 'form-group'))); ?>
			<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->

<script type="text/javascript">
    $(document).ready(function() {
        <?php if ($this->request->data['Content']['type'] == 'photos'): ?>
            $('#ContentBodyEngDiv').hide();
            $('#ContentBodyFraDiv').hide();
            $('#ContentMediaDiv').show();
            $('#PhotosMedia').css('display', 'inline-block');
            $('#VideoMedia').hide();
            $('#ContentCaptionEngDiv').show();
            $('#ContentCaptionFraDiv').show();
        <?php elseif ($this->request->data['Content']['type'] == 'video'): ?>
            $('#ContentBodyEngDiv').show();
            $('#ContentBodyFraDiv').show();
            $('#ContentMediaDiv').show();
            $('#PhotosMedia').hide();
            $('#VideoMedia').show();
            $('#ContentCaptionEngDiv').hide();
            $('#ContentCaptionFraDiv').hide();
        <?php endif; ?>
    });
</script>
