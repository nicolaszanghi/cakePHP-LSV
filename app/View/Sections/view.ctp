
<?php
$this->startIfEmpty('background_url');
if (!empty($section['Section']['image_header']))
    echo $section['Section']['image_header'];
$this->end();
$this->startIfEmpty('header_title');
echo t($section['Section'], 'title');
$this->end();
$this->startIfEmpty('header_subtitle');
echo t($section['Section'], 'subtitle');
$this->end();
?>

<div id="section-header" style="background-image: url('<?php echo SITE_URL.$this->fetch('background_url'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2">
                <h2><?php echo $this->fetch('header_title'); ?></h2>
                <h3 id="section-subtitle"><?php echo $this->fetch('header_subtitle'); ?></h3>
            </div>
        </div>
    </div>
    <?php $this->startIfEmpty('section_menu'); ?>
    <?php if (!empty($child_sections)): ?>
        <div id="section-menu">
            <div class="container">
                <div class="row">
                    <ul class="col-lg-10 col-lg-offset-2">
                        <?php foreach ($child_sections as $child) {
                            if ($child['Section']['parent_id'] != null)
                                $active[$section['Section']['parent_id']] = ' class="active"';
                            $active[$section['Section']['id']] = ' class="active"';
                            $menu_title_child = t($child['Section'], 'menu_title');
                            $title_child = (empty($menu_title_child)) ? t($child['Section'], 'title') : $menu_title_child;
                            echo '<li'.@$active[$child['Section']['id']].'>'.$this->Html->link($title_child, '/sections/'.$child['Section']['slug_'.Configure::read('Config.language')]).'</li>';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php $this->end(); ?>
    <?php echo $this->fetch('section_menu'); ?>
</div>
<div class="container">
    <div class="row">

        <div class="col-lg-2">
            <?php echo $this->element('left_sidebar'); ?>
        </div>

        <div class="page-content col-lg-8">

            <div class="page-body">
                <?php if (!empty($section))
                    echo t($section['Section'], 'body'); ?>
            </div>

            <?php if (!empty($section))
                echo $this->element('contents', array('accordion_id' => 'section')); ?>


            <?php
            /**
             * News/index extand this file, we display index.ctp content here
             */
            echo $this->fetch('content'); ?>


        </div><!-- #section-content .col-lg-9 -->

        <?php $this->startIfEmpty('right_sidebar');
        echo $this->element('right_sidebar');
        $this->end(); ?>

        <div class="col-lg-2">
            <?php echo $this->fetch('right_sidebar'); ?>
        </div>

    </div>
</div>



<?php
// TEST VIDEO
if ($section['Section']['id'] == 5 ) : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#section-header').css('background-color', 'inherit');
            $('#section-header').videoBG({
                mp4:'/site/test_video/soules.mp4',
                ogv:'/site/test_video/soules.ogv',
                webm:'/site/test_video/soules.webm',
                poster:'/site/test_video/soules.jpg',
                scale:true
            });
        });
    </script>
<?php endif; ?>

