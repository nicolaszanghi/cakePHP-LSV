
<?php $id = 'carousel-'.rand(0, 1000).md5($medias[0]); ?>

<div id="<?php echo $id; ?>" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach($medias as $k => $media):?>
            <li data-target="#<?php echo $id; ?>" data-slide-to="<?php echo $k; ?>"<?php if ($k==0) echo ' class="active"'; ?>></li>
        <?php endforeach; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php foreach($medias as $k => $media):?>
            <div class="item<?php if ($k == 0) echo ' active'; ?>">
                <?php echo $this->Html->image(SITE_URL.$media); ?>
                <div class="carousel-caption">
                    <?php echo $captions[$k]; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#<?php echo $id; ?>" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#<?php echo $id; ?>" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>

<script type="text/javascript">
    $('#<?php echo $id; ?>').carousel();
</script>