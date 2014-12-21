<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

Router::connect('/', array('controller' => 'sections', 'action' => 'view', HOME_ID));

Router::connect('/admin', array('admin' => true, 'controller' => 'sections', 'action' => 'index'));

Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

Router::connect('/admin/:controller/:action/*',
    array('prefix' => 'admin', 'admin' => true)
);


/**
 * slug
 */
Router::connect(
    '/:controller/:slug/*',
    array('action' => 'view'),
    array('slug' => '(?!view|index)([a-zA-Z0-9_-]+)')
);



/**
 * languages
 */
$languages = array_keys(Configure::read('Config.languages'));
Router::connect('/:language/*',
    array(),
    array('language' => implode('|', $languages))
);

/*
Router::connect('/:language/admin/:controller/:action/*',
    array('prefix' => 'admin', 'admin' => true),
    array('language' => implode('|', $languages))
);

Router::connect('/:language/admin',
    array('controller' => 'sections', 'action' => 'index', 'prefix' => 'admin', 'admin' => true),
    array('language' => implode('|', $languages))
);

Router::connect('/:language/:controller/:slug/*',
    array('action' => 'view'),
    array('language' => implode('|', $languages),
        'slug' => '[a-zA-Z0-9_-]+')
);
Router::connect('/:language/:controller',
    array('action' => 'index'),
    array('language' => implode('|', $languages))
);
*/



Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';


