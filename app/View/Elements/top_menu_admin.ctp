<div class="navbar navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><?php echo SITE_TITLE; ?></a>
            <ul class="nav navbar-nav pull-right">
                <li><?php echo $this->Html->link(__('Logout'), '/logout'); ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __(Configure::read('Config.language')); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                        $url = (in_array(substr($this->params->url, 0, 3), array_keys(Configure::read('Config.languages')))) ? substr($this->params->url, 4) : $this->params->url;
                        foreach (Configure::read('Config.languages') as $code => $language) { // show links for translated version
                            echo '<li>'.$this->Html->link($language,  '/'.$code.'/'.$url).'</li>';
                        } ?>
                    </ul>
                </li>
            </ul>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">

                <?php @$active[$this->params->controller] = ' class="active"';
                    $active_event = (in_array($this->params->controller, array('events', 'event_types'))) ? ' active' : ''; ?>

                <li<?php echo @$active['sections']; ?>><?php echo $this->Html->link(__('Sections'), array('admin' => true, 'controller' => 'sections', 'action' => 'index')); ?> </li>
                <?php /*<li><?php echo $this->Html->link(__('Contents'), array('admin' => true, 'controller' => 'contents', 'action' => 'index')); ?> </li> */ ?>
                <li<?php echo @$active['news']; ?>><?php echo $this->Html->link(__('News'), array('admin' => true, 'controller' => 'news', 'action' => 'index')); ?> </li>
                <li class="dropdown<?php echo $active_event; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Events'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li<?php echo @$active['events']; ?>><?php echo $this->Html->link(__('Events'), array('admin' => true, 'controller' => 'events', 'action' => 'index')); ?> </li>
                        <li<?php echo @$active['event_types']; ?>><?php echo $this->Html->link(__('Event Types'), array('admin' => true, 'controller' => 'event_types', 'action' => 'index')); ?> </li>
                    </ul>
                </li>
                <li<?php echo @$active['laureates']; ?>><?php echo $this->Html->link(__('Laureates'), array('admin' => true, 'controller' => 'laureates', 'action' => 'index')); ?> </li>
                <li<?php echo @$active['juries']; ?>><?php echo $this->Html->link(__('Juries'), array('admin' => true, 'controller' => 'juries', 'action' => 'index')); ?> </li>
                <li<?php echo @$active['users']; ?>><?php echo $this->Html->link(__('Users'), array('admin' => true, 'controller' => 'users', 'action' => 'index')); ?> </li>
            </ul>
        </div>
    </div>
</div>