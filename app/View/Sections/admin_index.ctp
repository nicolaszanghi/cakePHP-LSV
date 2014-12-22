
<div id="page-container" class="row">

    <div id="page-content" class="col-lg-12">

        <div class="sections index">

            <h2><?php echo __('Sections'); ?></h2>

            <div class="row">
                <?php echo $this->Form->create('Section', array('class' => 'form')); ?>
                <div class="col-lg-4 col-md-4">
                    <?php echo $this->Form->input('search_string', array('type' => 'search')); ?>
                </div>
                <?php echo $this->Form->end(); ?>

                <div class="col-lg-8 col-md-8">
                    <div class="actions pull-right">
                        <?php echo $this->Html->link('<i class="fa fa-plus"></i> '.__('New Section'), array('controller' => 'sections', 'action' => 'add'), array('class' => 'btn btn-success', 'escape' => false)); ?>
                    </div><!-- .actions -->
                </div>
            </div>

            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('active'); ?></th>
                    <th><?php echo $this->Paginator->sort('in_menu'); ?></th>
                    <th><?php echo $this->Paginator->sort('parent_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('slug_eng'); ?></th>
                    <th><?php echo $this->Paginator->sort('slug_fra'); ?></th>
                    <th><?php echo $this->Paginator->sort('menu_title_eng'); ?></th>
                    <th><?php echo $this->Paginator->sort('menu_title_fra'); ?></th>
                    <th><?php echo $this->Paginator->sort('order'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <tbody id="sortable">
                <?php
                foreach ($sections as $section): ?>
                    <tr id="Section_<?php echo $section['Section']['id']; ?>"<?php if(!$section['Section']['active']) echo ' class="inactive"'; ?>>
                        <td><?php echo h($section['Section']['id']); ?>&nbsp;</td>
                        <td><?php echo __('Byesno'.h($section['Section']['active'])); ?>&nbsp;</td>
                        <td><?php echo __('Byesno'.h($section['Section']['in_menu'])); ?>&nbsp;</td>
                        <td>
                            <?php
                            if (!empty($section['ParentSection']['id'])) {
                                $menu_title_parent = t($section['ParentSection'], 'menu_title');
                                $title_parent = (empty($menu_title_parent)) ? t($section['ParentSection'], 'title') : $menu_title_parent;
                                echo $this->Html->link($title_parent, array('controller' => 'sections', 'action' => 'view', $section['ParentSection']['id']));
                            }
                            ?>
                        </td>
                        <td><?php echo h($section['Section']['slug_eng']); ?>&nbsp;</td>
                        <td><?php echo h($section['Section']['slug_fra']); ?>&nbsp;</td>
                        <td><?php echo (empty($section['Section']['menu_title_eng'])) ? $section['Section']['title_eng'] : $section['Section']['menu_title_eng']; ?>&nbsp;</td>
                        <td><?php echo (empty($section['Section']['menu_title_fra'])) ? $section['Section']['title_fra'] : $section['Section']['menu_title_fra']; ?>&nbsp;</td>
                        <td><?php echo h($section['Section']['order']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php // echo $this->Html->link(__('View'), array('action' => 'view', $section['Section']['id']), array('class' => 'btn btn-xs btn-info')); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $section['Section']['id']), array('class' => 'btn btn-xs btn-warning')); ?>
                            <?php if (!in_array($section['Section']['id'], unserialize(SPECIAL_SECTIONS)))
                                echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $section['Section']['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $section['Section']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?php // echo $this->element('pagination'); ?>

            <?php echo __('Move line to reorder');
            $this->Js->get('#sortable');
            $this->Js->sortable(array(
                'complete' => '$.post("'.SITE_URL.'/admin/sections/reorder", $("#sortable").sortable("serialize"))',
            ));
            ?>
        </div><!-- .index -->

    </div><!-- #page-content .col-lg-9 -->

</div><!-- #page-container .row-fluid -->
