
<?php
$this->extend('/Sections/view/');

$this->assign('header_title', __('Search'));
$this->assign('header_subtitle', sprintf(__('%s results'), count($results)));

//debug($results);

if (!empty($results)): ?>

    <div class="accordion" id="accordion-content">
        <?php foreach ($results as $result): ?>
            <div class="content-container accordion-group">
                <div class="content-header row accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-content" href="#collapse<?php echo $result['id']; ?>">
                        <h3 class="col-lg-11"><?php echo t($result, 'title'); ?></h3>
                        <div class="col-lg-1 pull-right content-open"></div>
                    </a>
                </div>
                <div id="collapse<?php echo $result['id']; ?>" class="content-body accordion-body collapse">
                    <?php echo t($result, 'body'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
