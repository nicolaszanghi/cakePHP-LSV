
<?php if (!$this->request->is('ajax')): ?>

    <div id="more-others"></div>

    <?php if (!empty($url)) {
        $this->Paginator->options(array(
            'url' => $url,
            'update' => '#more-others',
            'evalScripts' => true,
            'data'=>http_build_query($this->request->data),
            'method'=>'POST',
        ) );
    } else {
        $this->Paginator->options(array(
            'update' => '#more-others',
            'evalScripts' => true
        ));
    }
    ?>
    <div class="load_more">
        <?php  echo $this->Paginator->next(__('load more'), array(),
                        __('no more'),
                        array(
                            'escape' => false,
                            'class' => 'disabled',
                        ));
        //$this->Paginator->link(__('no load more'), array()),
        //@todo disable if no more
        ?>
    </div>

<?php endif ;?>
