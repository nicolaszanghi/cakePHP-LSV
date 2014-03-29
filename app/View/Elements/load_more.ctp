
<div id="load-more">
    <?php if (!empty($this->params->slug)) $this->Paginator->options['url'] = $this->params->slug;?>
    <?php echo $this->Paginator->next(__('Load more'), null, null, array('class' => 'disabled')); ?>
</div>


<?php  $this->Js->buffer("
    $('#content').infinitescroll({
        navSelector  : '#load-more',         // selector for the paged navigation (it will be hidden)
        nextSelector : '#load-more a:first', // selector for the NEXT link (to page 2)
        itemSelector : 'article.mission-post',    // selector for all items you'll retrieve
        loading: {
            finishedMsg: '',
            img : '".SITE_URL."/img/ajax-loader.gif',
            msgText: '',
        },
        debug: true
    });
    $('#load-more').hide();
"); ?>

