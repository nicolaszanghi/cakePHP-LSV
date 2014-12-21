<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div id="page-container" class="row">

	<div id="page-content" class="col-lg-12">

		<div class="<?php echo $pluralVar; ?> index">

			<div class="row">
				<div class="col-lg-9">
					<h2><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></h2>
				</div>
				<div class="col-lg-3">
                    <div class="actions pull-right">
						<?php echo "\t\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-plus\"></i> '.__('New " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-sm btn-success', 'escape' => false)); ?>"; ?>
                    </div><!-- .actions -->
                </div>
            </div>


			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
				<tr>
<?php
                    foreach ($fields as $field):
						echo "\t\t\t\t\t<th><?php echo \$this->Paginator->sort('{$field}'); ?></th>\n";
					endforeach;
                        echo "\t\t\t\t\t<th class=\"actions\"><?php echo __('Actions'); ?></th>\n"; ?>
				</tr>
				<?php
				echo "<?php
				foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
				echo "\t\t\t\t\t<tr>\n";
					foreach ($fields as $field) {
						$isKey = false;
						if (!empty($associations['belongsTo'])) {
							foreach ($associations['belongsTo'] as $alias => $details) {
								if ($field === $details['foreignKey']) {
									$isKey = true;
									echo "\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t\t\t</td>\n";
									break;
								}
							}
						}
						if ($isKey !== true) {
							echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
						}
					}

					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-xs btn-info')); ?>\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-xs btn-warning')); ?>\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
					echo "\t\t\t\t\t\t</td>\n";
				echo "\t\t\t\t\t</tr>\n";

				echo "\t\t\t\t<?php endforeach; ?>\n";
				?>
			</table>

            <?php echo "<?php echo \$this->element('pagination'); ?>"; ?>

		</div><!-- .index -->
	
	</div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->
