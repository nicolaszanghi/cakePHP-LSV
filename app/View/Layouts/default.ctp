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
		<title>
			<?php echo $cakeDescription ?>
			<?php //echo __($title_for_layout); ?>
		</title>
        <?php /*<meta name="robots" content="noindex,nofollow">*/ ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		    <?php
          echo $this->Html->meta('icon');
          echo $this->fetch('meta');

          $this->Html->css(array(
              'bootstrap.min',
              //'//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css',
              'core'
            ),
            null,
            array('inline' => false)
          ); // minify cant acces to themed css

          //@todo minify
          $this->Html->css(array(
            'jquery.fancybox',
            'jquery.datepick/smoothness.datepick',
            'jplayer/midnight.black/jplayer.midnight.black',
            'styles'
            ),
            null,
            array('inline' => false)
          );

          echo $this->fetch('css');
        ?>

        <?php // echo $this->element('jquery_safe_ready');

          $this->Html->script(array(
            '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
            '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js',
            'libs/bootstrap.min'
            ),
            array('block' => 'firstScripts')
          ); // minify cant acces to themed js

          //@todo minify
          $this->Html->script(array(
            'init',
            'jquery.videoBG',
            'jquery.scrollTo',
              //'jquery.history',
              //'jquery.infinitescroll',
            'analytics',
            'carousel',
            'fancybox/jquery.fancybox.js',
            'fancybox/helpers/jquery.fancybox-media.js',
            'jplayer/jquery.jplayer.min.js',
            'jquery.datepick/jquery.datepick',
            'jquery.datepick/jquery.datepick-fr-CH',
            'jquery.datepick/jquery.datepick-en-GB',
            'main'
            ),
            array('block' => 'firstScripts')
          );
        ?>
        <!--[if IE]>
            <?php echo $this->Html->css('ie'); ?>
        <![endif]-->
        <!--[if lte IE 9]>
            <?php echo $this->Html->css(array('old_ie.css')); ?>
            <?php echo $this->Html->script(array('html5shiv', 'respond')); ?>
        <![endif]-->
	</head>

	<body>

		<div id="main-container">

            <?php echo $this->element('header'); ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Session->flash('auth'); ?>
                        <?php echo $this->Session->flash(); ?>
                    </div>
                </div>
            </div>

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->element('footer'); ?>


        <?php if (Configure::read('debug') > 0): ?>
            <div class="container sql_dump">
                <div class="well">
                    <small>
                        <?php echo $this->element('sql_dump'); ?>
                    </small>
                </div>
            </div><!-- .container -->
        <?php endif; ?>

        </div><!-- #main-container -->

        <?php
            echo $this->fetch('firstScripts');
            echo $this->Js->buffer('window.language = "'.Configure::read('Config.language').'";');
            echo $this->fetch('script');
            echo $this->Js->writeBuffer();
        ?>
	</body>

</html>