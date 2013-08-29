<div id="top-menu" class="container">
    <div class="row pull-right">
        <ul>
            <li id="social-link">
                <?php echo $this->Html->image('twitter.png', array('url' => 'https://twitter.com/concoursgeneve')); ?>
                <?php echo $this->Html->image('facebook.png', array('url' => 'https://www.facebook.com/ConcoursdeGeneve')); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('registration'), 'http://www.concoursgeneve.ch/app', array('id' => 'registration-link')); ?>
                <?php //echo $this->Html->link(__('sign in'), 'http://www.concoursgeneve.ch/app', array('id' => 'sign-in-link')); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('tickets'), 'http://www.concoursgeneve.ch/tickets'); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('press'), 'http://www.concoursgeneve.ch/press'); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('newsletter'), 'http://www.concoursgeneve.ch/newsletter'); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('contact'), 'http://www.concoursgeneve.ch/contact'); ?>
            </li>
            <li>
                <?php echo $this->Form->create('Content', array('url' => array('action' => 'search'), 'type' => 'get', 'inputDefaults' => array('label' => false), 'class' => 'form'));
                    echo $this->Form->input('search_string', array('id' => 'search-input', 'placeholder' => __('Search')));
                echo $this->Form->end(); ?>
            </li>
            <li>
                <ul id="header-languages-menu">
                    <?php
                    $url = (in_array(substr($this->params->url, 0, 3), array_keys(Configure::read('Config.languages')))) ? substr($this->params->url, 4) : $this->params->url;
                    foreach (Configure::read('Config.languages') as $code => $language) { // show links for translated version
                        echo '<li>'.$this->Html->link(substr($code, 0, 2),  '/'.$code.'/'.$url).'</li>';
                    }?>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div id="header-menu" class="container">
    <div class="row">
        <?php if (!empty($menu_sections)): ?>
            <div class="col-lg-offset-2">
                <ul>
                    <?php foreach ($menu_sections as $menu_section) {
                        if ($menu_section['Section']['parent_id'] != null)
                            continue;
                        if (!empty($section['Section']['parent_id']))
                            $active[$section['Section']['parent_id']] = ' class="active"';
                        elseif (!empty($section['Section']['id']))
                            $active[$section['Section']['id']] = ' class="active"';
                        $menu_title = t($menu_section['Section'], 'menu_title');
                        $title = (!empty($menu_title)) ? $menu_title : t($menu_section['Section'], 'title');
                        echo '<li'.@$active[$menu_section['Section']['id']].'>'.$this->Html->link($title, '/sections/'.$menu_section['Section']['slug']).'</li>';
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

