<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models', '/next/path/to/models'),
 *     'Model/Behavior'            => array('/path/to/behaviors', '/next/path/to/behaviors'),
 *     'Model/Datasource'          => array('/path/to/datasources', '/next/path/to/datasources'),
 *     'Model/Datasource/Database' => array('/path/to/databases', '/next/path/to/database'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions', '/next/path/to/sessions'),
 *     'Controller'                => array('/path/to/controllers', '/next/path/to/controllers'),
 *     'Controller/Component'      => array('/path/to/components', '/next/path/to/components'),
 *     'Controller/Component/Auth' => array('/path/to/auths', '/next/path/to/auths'),
 *     'Controller/Component/Acl'  => array('/path/to/acls', '/next/path/to/acls'),
 *     'View'                      => array('/path/to/views', '/next/path/to/views'),
 *     'View/Helper'               => array('/path/to/helpers', '/next/path/to/helpers'),
 *     'Console'                   => array('/path/to/consoles', '/next/path/to/consoles'),
 *     'Console/Command'           => array('/path/to/commands', '/next/path/to/commands'),
 *     'Console/Command/Task'      => array('/path/to/tasks', '/next/path/to/tasks'),
 *     'Lib'                       => array('/path/to/libs', '/next/path/to/libs'),
 *     'Locale'                    => array('/path/to/locales', '/next/path/to/locales'),
 *     'Vendor'                    => array('/path/to/vendors', '/next/path/to/vendors'),
 *     'Plugin'                    => array('/path/to/plugins', '/next/path/to/plugins'),
 * ));
 *
 */

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter . By Default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));


CakePlugin::load(array('Minify' => array('routes' => true)));


/**
 * languages
 */
define('DEFAULT_LANGUAGE', 'eng').

Configure::write('Config.languages', array(
    'eng' => 'English',
    'fra' => 'Français',
));

Configure::write('App.encoding', 'utf-8');

/**
 * constants
 */
define('SITE_TITLE', "Site Title");
define('SITE_URL', "http://localhost:8888/gitHubContribution/cakePHP-LSV"); // @todo change


define('DATE_FORMAT', 'd.m.Y');
define('DATETIME_FORMAT', 'd.m.Y H:i');
define('DATE_SELECT_FORMAT', 'DMY');
define('TIME_SELECT_FORMAT', '24');

define('HOME_ID', 1);
define('CONTACT_ID', 2);

define('CONTENT_TYPES', serialize(array('normal' => __('Normal'), 'video' => __('Video'), 'photos' => __('Photos'))));

define('SPECIAL_SECTIONS', serialize(array(1,2)));

/**
 * countries for forms options
 */
Configure::write('languages',array('af'=>__('Afganistan'),'al'=>__('Albania'),'dz'=>__('Algeria'),'as'=>__('American Samoa'),'ad'=>__('Andorra'),'ao'=>__('Angola'),'ai'=>__('Anguilla'),'aq'=>__('Antarctica'),'ag'=>__('Antigua and Barbuda'),'ar'=>__('Argentina'),'am'=>__('Armenia'),'aw'=>__('Aruba'),'au'=>__('Australia'),'at'=>__('Austria'),'az'=>__('Azerbaijan'),'bs'=>__('Bahamas'),'bh'=>__('Bahrain'),'bd'=>__('Bangladesh'),'bb'=>__('Barbados'),'by'=>__('Belarus'),'be'=>__('Belgium'),'bz'=>__('Belize'),'bj'=>__('Benin'),'bm'=>__('Bermuda'),'bt'=>__('Bhutan'),'bo'=>__('Bolivia'),'ba'=>__('Bosnia and Herzegowina'),'bw'=>__('Botswana'),'bv'=>__('Bouvet Island'),'br'=>__('Brazil'),'io'=>__('British Indian Ocean Territory'),'bn'=>__('Brunei Darussalam'),'bg'=>__('Bulgaria'),'bf'=>__('Burkina Faso'),'bi'=>__('Burundi'),'kh'=>__('Cambodia'),'cm'=>__('Cameroon'),'ca'=>__('Canada'),'cv'=>__('Cape Verde'),'ky'=>__('Cayman Islands'),'cf'=>__('Central African Republic'),'td'=>__('Chad'),'cl'=>__('Chile'),'cn'=>__('China'),'cx'=>__('Christmas Island'),'cc'=>__('Cocos Keeling Islands'),'co'=>__('Colombia'),'km'=>__('Comoros'),'cg'=>__('Congo'),'cd'=>__('Congo,c Republic of the'),'ck'=>__('Cook Islands'),'cr'=>__('Costa Rica'),'ci'=>__('Cote d\'Ivoire'),'hr'=>__('Croatia Hrvatska'),'cu'=>__('Cuba'),'cy'=>__('Cyprus'),'cz'=>__('Czech Republic'),'dk'=>__('Denmark'),'dj'=>__('Djibouti'),'dm'=>__('Dominica'),'do'=>__('Dominican Republic'),'tp'=>__('East Timor'),'ec'=>__('Ecuador'),'eg'=>__('Egypt'),'sv'=>__('El Salvador'),'gq'=>__('Equatorial Guinea'),'er'=>__('Eritrea'),'ee'=>__('Estonia'),'et'=>__('Ethiopia'),'fk'=>__('Falkland Islands Malvinas'),'fo'=>__('Faroe Islands'),'fj'=>__('Fiji'),'fi'=>__('Finland'),'fr'=>__('France'),'fx'=>__('France,tan'),'gf'=>__('French Guiana'),'pf'=>__('French Polynesia'),'tf'=>__('French Southern Territories'),'ga'=>__('Gabon'),'gm'=>__('Gambia'),'ge'=>__('Georgia'),'de'=>__('Germany'),'gh'=>__('Ghana'),'gi'=>__('Gibraltar'),'gr'=>__('Greece'),'gl'=>__('Greenland'),'gd'=>__('Grenada'),'gp'=>__('Guadeloupe'),'gu'=>__('Guam'),'gt'=>__('Guatemala'),'gn'=>__('Guinea'),'gw'=>__('Guinea-Bissau'),'gy'=>__('Guyana'),'ht'=>__('Haiti'),'hm'=>__('Heard and Mc Donald Islands'),'va'=>__('Holy See (Vatican City State)'),'hn'=>__('Honduras'),'hk'=>__('Hong Kong'),'hu'=>__('Hungary'),'is'=>__('Iceland'),'in'=>__('India'),'id'=>__('Indonesia'),'ir'=>__('Iran,epublic of'),'iq'=>__('Iraq'),'ie'=>__('Ireland'),'il'=>__('Israel'),'it'=>__('Italy'),'hm'=>__('Jamaica'),'jp'=>__('Japan'),'jo'=>__('Jordan'),'kz'=>__('Kazakhstan'),'ke'=>__('Kenya'),'ki'=>__('Kiribati'),'kp'=>__('Korea,c People\'s Republic of'),'kr'=>__('Korea,of'),'kw'=>__('Kuwait'),'kg'=>__('Kyrgyzstan'),'la'=>__('Lao People\'s Democratic Republic'),'lv'=>__('Latvia'),'lb'=>__('Lebanon'),'ls'=>__('Lesotho'),'lr'=>__('Liberia'),'ly'=>__('Libyan Arab Jamahiriya'),'li'=>__('Liechtenstein'),'lt'=>__('Lithuania'),'lu'=>__('Luxembourg'),'mo'=>__('Macau'),'mk'=>__('Macedonia,r Yugoslav Republic of'),'mg'=>__('Madagascar'),'mw'=>__('Malawi'),'my'=>__('Malaysia'),'mv'=>__('Maldives'),'ml'=>__('Mali'),'mt'=>__('Malta'),'mh'=>__('Marshall Islands'),'mq'=>__('Martinique'),'mr'=>__('Mauritania'),'mu'=>__('Mauritius'),'yt'=>__('Mayotte'),'mx'=>__('Mexico'),'fm'=>__('Micronesia, States of'),'md'=>__('Moldova,of'),'mc'=>__('Monaco'),'mn'=>__('Mongolia'),'ms'=>__('Montserrat'),'ma'=>__('Morocco'),'mz'=>__('Mozambique'),'mm'=>__('Myanmar'),'na'=>__('Namibia'),'nr'=>__('Nauru'),'np'=>__('Nepal'),'nl'=>__('Netherlands'),'an'=>__('Netherlands Antilles'),'nc'=>__('New Caledonia'),'nz'=>__('New Zealand'),'ni'=>__('Nicaragua'),'ne'=>__('Niger'),'ng'=>__('Nigeria'),'nu'=>__('Niue'),'nf'=>__('Norfolk Island'),'mp'=>__('Northern Mariana Islands'),'no'=>__('Norway'),'om'=>__('Oman'),'pk'=>__('Pakistan'),'pw'=>__('Palau'),'pa'=>__('Panama'),'pg'=>__('Papua New Guinea'),'py'=>__('Paraguay'),'pe'=>__('Peru'),'ph'=>__('Philippines'),'pn'=>__('Pitcairn'),'pl'=>__('Poland'),'pt'=>__('Portugal'),'pr'=>__('Puerto Rico'),'qa'=>__('Qatar'),'re'=>__('Reunion'),'ro'=>__('Romania'),'ru'=>__('Russian Federation'),'rw'=>__('Rwanda'),'kn'=>__('Saint Kitts and Nevis'),'lc'=>__('Saint LUCIA'),'vc'=>__('Saint Vincent and the Grenadines'),'ws'=>__('Samoa'),'sm'=>__('San Marino'),'st'=>__('Sao Tome and Principe'),'sa'=>__('Saudi Arabia'),'sn'=>__('Senegal'),'sc'=>__('Seychelles'),'sl'=>__('Sierra Leone'),'sg'=>__('Singapore'),'sk'=>__('Slovakia (Slovak Republic)'),'si'=>__('Slovenia'),'sb'=>__('Solomon Islands'),'so'=>__('Somalia'),'za'=>__('South Africa'),'gs'=>__('South Georgia and the South Sandwich Islands'),'es'=>__('Spain'),'lk'=>__('Sri Lanka'),'sh'=>__('St. Helena'),'pm'=>__('St. Pierre and Miquelon'),'sd'=>__('Sudan'),'sr'=>__('Suriname'),'sj'=>__('Svalbard and Jan Mayen Islands'),'sz'=>__('Swaziland'),'se'=>__('Sweden'),'ch'=>__('Switzerland'),'sy'=>__('Syrian Arab Republic'),'tw'=>__('Taiwan,of China'),'tj'=>__('Tajikistan'),'tz'=>__('Tanzania,public of'),'th'=>__('Thailand'),'tg'=>__('Togo'),'tk'=>__('Tokelau'),'to'=>__('Tonga'),'tt'=>__('Trinidad and Tobago'),'tn'=>__('Tunisia'),'tr'=>__('Turkey'),'tm'=>__('Turkmenistan'),'tc'=>__('Turks and Caicos Islands'),'tv'=>__('Tuvalu'),'ug'=>__('Uganda'),'ua'=>__('Ukraine'),'ae'=>__('United Arab Emirates'),'gb'=>__('United Kingdom'),'us'=>__('United States'),'um'=>__('United States Minor Outlying Islands'),'uy'=>__('Uruguay'),'uz'=>__('Uzbekistan'),'vu'=>__('Vanuatu'),'ve'=>__('Venezuela'),'vn'=>__('Viet Nam'),'vg'=>__('Virgin Islands (British)'),'vi'=>__('Virgin Islands (U.S.)'),'wf'=>__('Wallis and Futuna Islands'),'eh'=>__('Western Sahara'),'ye'=>__('Yemen'),'yu'=>__('Yugoslavia'),'zm'=>__('Zambia'),'zw'=>__('Zimbabwe')));



/**
 * get translated field
 */
function t($datas, $fieldName) {
    return $datas[$fieldName.'_'.Configure::read('Config.language')];
}