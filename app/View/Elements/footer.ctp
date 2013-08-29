<div id="footer">
    <div id="footer-top">
        <div class="container">
            <div class="row">

                <ul id="footer-menu" class="col-lg-6 col-lg-offset-2">

                    <?php foreach ($menu_sections as $menu_section) {
                        if ($menu_section['Section']['parent_id'] != null)
                            continue;
                        $menu_title = t($menu_section['Section'], 'menu_title');
                        $title = (!empty($menu_title)) ? $menu_title : t($menu_section['Section'], 'title');
                        echo '<li>'.$this->Html->link($title, array('controller' => 'sections', 'action' => 'view', $menu_section['Section']['slug']));

                        /* echo '<ul>';
                          foreach ($menu_sections as $menu_section_child) {
                            if ($menu_section_child['Section']['parent_id'] == $menu_section['Section']['id']) {
                                $menu_title_child = t($menu_section_child['Section'], 'menu_title');
                                $title_child = (!empty($menu_title_child)) ? $menu_title_child : t($menu_section_child['Section'], 'title');
                                echo '<li>'.$this->Html->link($title_child, array('controller' => 'sections', 'action' => 'view', $menu_section_child['Section']['slug']));
                            }
                        } echo '</ul>'; */
                        echo '</li>';
                    }
                    ?>
                </ul>

                <div class="col-lg-2">
                    <div class="pull-right" id="footer-logo">
                        logo
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-2">
                <?php echo $this->Html->link(__('contact'), array('controller' => 'sections', 'action' => 'view', CONTACT_ID), array('id' => 'contact-link')); ?>
                <address>
                    address
                </address>
                <ul id="footer-contact">
                    <li>
                        <script type="text/javascript">
                            <!--
                            document.write('<a href="mai' + 'lto' + ':em' + 'ail' + '">em' + 'a' + 'il' + '</a>');
                            // -->
                        </script>
                    </li>
                    <li>
                        <a href="tel:+000000">T +41 00 000 00 00</a>
                    </li>
                    <li>
                        F +41 00 000 00 00
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="pull-right">
                    <?php echo $this->element('newsletter_form'); ?>
                </div>
            </div>
        </div>

    </div>

</div><!-- #footer -->
