<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo SITE_URL; ?>/admin"><?php echo SITE_TITLE; ?></a>
        <ul class="nav navbar-nav pull-right">
            <li><?php echo $this->Html->link(__('Logout'), '/logout'); ?></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __(Configure::read('Config.language')); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php
                    $url = (in_array(substr($this->request->params->url, 0, 3), array_keys(Configure::read('Config.languages')))) ? substr($this->request->params->url, 4) : $this->request->params->url;
                    foreach (Configure::read('Config.languages') as $code => $language) { // show links for translated version
                        echo '<li>'.$this->Html->link($language,  '/'.$code.'/'.$url).'</li>';
                    } ?>
                </ul>
            </li>
        </ul>
        <div class="collapse navbar-collapse navbar-ex5-collapse">
            <ul class="nav navbar-nav">
                <?php @$active[$this->request->params->controller] = ' class="active"'; ?>
                <li<?php echo @$active['sections']; ?>><?php echo $this->Html->link(__('Sections'), array('admin' => true, 'controller' => 'sections', 'action' => 'index')); ?> </li>
                <li<?php echo @$active['users']; ?>><?php echo $this->Html->link(__('Users'), array('admin' => true, 'controller' => 'users', 'action' => 'index')); ?> </li>
            </ul>
        </div>
    </div>
</nav>