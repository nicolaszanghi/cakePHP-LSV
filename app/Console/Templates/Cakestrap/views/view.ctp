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
		
		<div class="<?php echo $pluralVar; ?> view">

			<div class="row">
				<div class="col-lg-9">
					<h2><?php echo "<?php  echo __('{$singularHumanName}'); ?>"; ?></h2>
				</div>
				<div class="col-lg-3">
					<div class="actions pull-right">
						<?php
                            echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-pencil\"></i> '.__('Edit " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>\n";
                            echo "\t\t\t\t\t\t\t<?php echo \$this->Form->postLink('<i class=\"fa fa-times\"></i> '.__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-sm btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
						?>
					</div>
				</div>
			</div>


			<table class="table table-striped table-bordered">
<?php
				foreach ($fields as $field) {
					$isKey = false;
					if (!empty($associations['belongsTo'])) {
						foreach ($associations['belongsTo'] as $alias => $details) {
							if ($field === $details['foreignKey']) {
								$isKey = true;
								echo "\t\t\t\t<tr>\n";
								echo "\t\t\t\t\t<td><strong><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></strong></td>\n";
								echo "\t\t\t\t\t<td>\n\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => '')); ?>\n\t\t\t\t\t\t&nbsp;\n\t\t\t\t\t</td>\n";
								echo "\t\t\t\t</tr>\n";
								break;
							}
						}
					}
					if ($isKey !== true) {
						echo "\t\t\t\t<tr>\n";
						echo "\t\t\t\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>\n";
						echo "\t\t\t\t\t<td>\n\t\t\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t\t\t\t&nbsp;\n\t\t\t\t\t</td>\n";
						echo "\t\t\t\t</tr>\n";
					}
				}
				?>
			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

		<?php
		if (!empty($associations['hasOne'])) :
			foreach ($associations['hasOne'] as $alias => $details): ?>
				<div class="related">
					<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
					<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
						<table class="table table-striped table-bordered">
<?php
							foreach ($details['fields'] as $field) {
								echo "\t\t\t\t<tr>\n";
								echo "\t\t\t\t\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>\n";
								echo "\t\t\t\t\t\t<td><strong><?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</strong></td>\n";
								echo "\t\t\t\t</tr>\n";
							}
							?>
						</table><!-- .table table-striped table-bordered -->
					<?php echo "<?php endif; ?>\n"; ?>
                            <div class="actions">
                                <?php echo "<li><?php echo \$this->Html->link(__('<i class=\"icon-pencil icon-white\"></i> Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => 'btn btn-sm btn-warning', 'escape' => false)); ?>\n"; ?>
                            </div><!-- .actions -->
				</div><!-- .related -->
			        <?php
			endforeach;
		endif;

		if (empty($associations['hasMany'])) {
			$associations['hasMany'] = array();
		}
		if (empty($associations['hasAndBelongsToMany'])) {
			$associations['hasAndBelongsToMany'] = array();
		}
		$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
		$i = 0;
		foreach ($relations as $alias => $details):
			$otherSingularVar = Inflector::variable($alias);
			$otherPluralHumanName = Inflector::humanize($details['controller']);
			?>
			
			<div class="related">

				<h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
				
				<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
				
					<table class="table table-striped table-bordered">
						<tr>
<?php
								foreach ($details['fields'] as $field) {
									echo "\t\t\t\t\t\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
								}
							?>
							<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
						</tr>
<?php
						echo "\t\t\t\t\t\t<?php
                            \$i = 0;
                            foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
								echo "\t\t\t\t\t\t\t<tr>\n";
									foreach ($details['fields'] as $field) {
										echo "\t\t\t\t\t\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
									}

									echo "\t\t\t\t\t\t\t\t<td class=\"actions\">\n";
									echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-xs btn-info')); ?>\n";
									echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-xs btn-warning')); ?>\n";
									echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
									echo "\t\t\t\t\t\t\t\t</td>\n";
								echo "\t\t\t\t\t\t\t</tr>\n";

						echo "\t\t\t\t\t\t<?php endforeach; ?>\n";
						?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php echo "<?php endif; ?>\n\n"; ?>
				
				<div class="actions">
					<?php echo "<?php echo \$this->Html->link('<i class=\"fa fa-plus\"></i> '.__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-sm btn-success', 'escape' => false)); ?>\n"; ?>
				</div><!-- .actions -->
				
			</div><!-- .related -->

		<?php endforeach; ?>
	
	</div><!-- #page-content .col-lg-12 -->

</div><!-- #page-container .row-fluid -->
