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

echo $this->Html->docType('html5');
?>
<html>

	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $cakeDescription.' '.__('Admin').' | '.$title_for_layout; ?></title>
        <meta name="robots" content="noindex,nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

        $this->Html->css(array('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css',
                               '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css',
                               'bootstrap-datetimepicker.min'),
                         null,
                         array('inline' => false));

        // @todo minify
        $this->Html->css(array('core',
                               'admin'),
                         null,
                         array('inline' => false));

			echo $this->fetch('css');
    ?>

    <?php //echo $this->element('jquery_safe_ready');

      $this->Html->script(array(
          '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
          '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'
        ),
        array('block' => 'firstScripts')
      );

      //@todo minify
  		$this->Html->script(array(
          'init',
          'libs/bootstrap.min',
          'libs/bootstrap-datetimepicker.min',
          'libs/bootstrap-datetimepicker.fr.js',
          'ckeditor/ckeditor',
          'ckeditor/adapters/jquery',
          'ckeditor_init',
          'admin'
        ),
        array('block' => 'firstScripts')
      );
		?>

    <!--[if lte IE 9]>
    <?php echo $this->Html->css(array('old_ie.css')); ?>
    <![endif]-->
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

        <?php
            echo $this->fetch('firstScripts');
            echo $this->Js->buffer('window.language = "'.Configure::read('Config.language').'";');
            echo $this->fetch('script');
            echo $this->Js->writeBuffer();
        ?>
	</body>

</html>