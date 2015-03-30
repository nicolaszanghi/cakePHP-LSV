
<div id="load-more">
    <?php
    if (!empty($this->request->params->slug)) $this->Paginator->options['url']['slug'] = $this->request->params->slug;
    if (!empty($this->request->params->query))
        foreach ($this->request->params->query as $k => $v)
            $this->Paginator->options['url'][$k] = $v;
    echo $this->Paginator->next(__('Load more'), null, null, array('class' => 'disabled')); ?>
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
    }, function() {
        $('#content').trigger('infinitescroll_content_loaded');
        $(window).trigger('scroll');
    });
    $('#load-more').hide();
"); ?>

