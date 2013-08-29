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
		<title>
			<?php echo $cakeDescription ?>
			<?php //echo __($title_for_layout); ?>
		</title>
        <?php /*<meta name="robots" content="noindex,nofollow">*/ ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

            echo $this->Html->css(array('bootstrap.min', 'bootstrap-responsive.min', 'core')); // minify cant acces to themed css
            echo $this->Html->css(array('jquery.fancybox', 'jquery.datepick/smoothness.datepick', 'jplayer/midnight.black/jplayer.midnight.black', 'styles'));
        //@todo minify

			echo $this->fetch('css');
        ?>

        <!--[if IE]>
            <?php echo $this->Html->css('ie'); ?>
        <![endif]-->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <?php

        echo $this->Html->script(array('libs/bootstrap.min',)); // minify cant acces to themed js

            echo $this->Html->script(array( 'jquery.videoBG',
                                             'jquery.scrollTo',
                                             'analytics',
                                            'carousel',
                                             'fancybox/jquery.fancybox.js',
                                             'fancybox/helpers/jquery.fancybox-media.js',
                                             'jplayer/jquery.jplayer.min.js',
                                             'jquery.datepick/jquery.datepick',
                                             'jquery.datepick/jquery.datepick-fr-CH',
                                             'jquery.datepick/jquery.datepick-en-GB',
                                            'main'));


			echo $this->fetch('script');
        ?>


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
            <div class="container">
                <div class="well">
                    <small>
                        <?php echo $this->element('sql_dump'); ?>
                    </small>
                </div>
            </div><!-- .container -->
        <?php endif; ?>

        </div><!-- #main-container -->

        <?php echo $this->Js->writeBuffer();?>
	</body>

</html>