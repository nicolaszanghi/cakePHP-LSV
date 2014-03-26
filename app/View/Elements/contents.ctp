
<div class="panel-group" id="accordion-<?php echo $accordion_id; ?>-content">
    <?php foreach ($contents as $content):
        if (empty($content['Content'])) $content = array('Content' => $content); ?>
        <div class="content-container panel panel-default">
            <div class="content-header row panel-heading">
                <div class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-<?php echo $accordion_id; ?>-content" href="#collapse<?php echo $content['Content']['id']; ?>">
                        <h3 class="col-lg-11">
                            <?php echo t($content['Content'], 'title'); ?>
                        </h3>
                        <div class="col-lg-1 pull-right content-open"></div>
                    </a>
                </div>
            </div>
            <div id="collapse<?php echo $content['Content']['id']; ?>" class="content-body panel-collapse collapse">
                <div class="content-body panel-body">
                    <?php echo t($content['Content'], 'body'); ?>
                    <?php if ($content['Content']['type'] == 'photos' && !empty($content['Content']['media']))
                        echo $this->element('photos_gallery', array('medias' => explode("\n", trim($content['Content']['media'])), 'captions' => explode("\n", trim(t($content['Content'], 'caption')))));
                    else if ($content['Content']['type'] == 'video')
                        echo '<div class="video">'.$content['Content']['media'].'</div>'; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if ($count_all_contents > count($contents)*$content_page): ?>
    <div id="more-contents-<?php echo $content['Content']['id']; ?>">
        <span class="load_more">
            <?php echo $this->Js->link(__('load more'), array('controller' => 'contents', 'action' => 'index', $content_section_id, 'content_page' => $content_page), array('update' => '#more-contents-'.$content['Content']['id'])); ?>
        </span>
    </div>
<?php endif ;?>

<?php if ($this->request->is('ajax')) echo $this->Js->writeBuffer(); ?>
