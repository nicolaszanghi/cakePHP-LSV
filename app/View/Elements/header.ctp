<header id="top-menu" class="container">
    <div class="row pull-right">
        <ul>
            <li id="social-link">
                <?php echo $this->Html->image('twitter.png', array('url' => 'https://twitter.com/my_page')); ?>
                <?php echo $this->Html->image('facebook.png', array('url' => 'https://www.facebook.com/my_page')); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('newsletter'), SITE_URL.'/newsletter'); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('contact'), array('controller' => 'sections', 'action' => 'view', CONTACT_ID), array('id' => 'contact-link')); ?>
            </li>
            <li>
                <?php echo $this->Form->create('Content', array('url' => array('action' => 'search'), 'type' => 'get', 'class' => 'form'));
                echo $this->Form->input('search_string', array('id' => 'search-input', 'placeholder' => __('Search')));
                echo $this->Form->end(); ?>
            </li>
            <li>
                <ul id="languages-menu" class="pull-right">
                    <?php
                    $language_active[Configure::read('Config.language')] = ' class="active"';
                    foreach (Configure::read('Config.languages') as $code => $language) { // show links for translated version
                        if (!empty($section))
                            $url = 'sections/'.$section['Section']['slug_'.$code];
                        else
                            $url = (in_array(substr($this->params->url, 0, 3), array_keys(Configure::read('Config.languages')))) ? substr($this->params->url, 4) : $this->params->url;
                        if (!empty($this->params['prefix']))
                            $url = $this->params['prefix'].'/'.$url;
                        echo '<li'.@$language_active[$code].'>'.$this->Html->link(substr($code, 0, 2),  '/'.$code.'/'.$url).'</li>';
                    }?>
                </ul>
            </li>
        </ul>
    </div>
</header>
<header id="header-menu" class="container">
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
                        echo '<li'.@$active[$menu_section['Section']['id']].'>'.$this->Html->link($title, '/sections/'.$menu_section['Section']['slug_'.Configure::read('Config.language')]).'</li>';
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</header>

