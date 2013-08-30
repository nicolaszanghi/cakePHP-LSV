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
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = SITE_TITLE;
?>
<!DOCTYPE HTML>
<html>

	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $cakeDescription.' '.__('Admin').' | '.$title_for_layout; ?></title>
        <meta name="robots" content="noindex,nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

        // @todo change minify
			echo $this->Html->css(array('bootstrap.min',
			                            'bootstrap-responsive.min',
                                        'bootstrap-glyphicons',
                                        'bootstrap-datetimepicker.min',
			                              'core',
                                          'admin'));

			echo $this->fetch('css');
        ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <?php
			echo $this->Html->script(array('init',
                                           'libs/bootstrap.min',
                                           'libs/bootstrap-datetimepicker.min',
                                           'libs/bootstrap-datetimepicker.fr.js',
                                           'ckeditor/ckeditor',
                                           'ckeditor/adapters/jquery',
                                           'ckeditor_init',
                                           'admin'));
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div id="header" class="container">
                <div class="row">
                    <?php echo $this->element('top_menu_admin'); ?>
                </div>
			</div><!-- #header .container -->
			
			<div id="content" class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Session->flash('auth'); ?>
                        <?php echo $this->Session->flash(); ?>
                    </div>
                </div>

				<?php echo $this->fetch('content'); ?>
			</div><!-- #header .container -->
			
			<div id="footer" class="container">
				<?php //Silence is golden ?>
			</div><!-- #footer .container -->
			
		</div><!-- #main-container -->

        <?php if (Configure::read('debug') > 0): ?>
            <div class="container sql_dump">
                <div class="row">
                    <div class="well">
                        <small>
                            <?php echo $this->element('sql_dump'); ?>
                        </small>
                    </div>
                </div>
            </div><!-- .container -->
        <?php endif; ?>

        <?php echo $this->Js->writeBuffer();?>
	</body>

</html>