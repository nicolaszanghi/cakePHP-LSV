<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $content_limit = 10;
    public $year_limit = 16;

    public $theme = 'Cakestrap';

    public $components = array(
        'Cookie',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'flash' => array('element' => 'flash/error', 'key' => 'auth', 'params' => array()),
            'loginRedirect' => '/admin',
            'logoutRedirect' => '/',
            'loginAction' => array('admin' => false, 'controller' => 'users', 'action' => 'login'),
            'authorize' => array('Controller'),
        ),
        'RequestHandler',
    );

    public $helpers = array(
        'Form' =>  array('className' => 'Cakestrap'),
        'Minify.Minify'
    );

    public function beforeFilter() {

        $this->Auth->allow('index', 'view', 'display');

        $this->_setLanguage();

        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
        } else {
            //get menu for front office
            $this->loadModel('Section');
            $this->set('menu_sections', $this->Section->find('all', array('conditions' => array('Section.active' => true, 'Section.in_menu' => true),
                                                                          'recursive' => -1)));
        }

        if ($this->request->is('ajax'))
            $this->layout = 'ajax';
    }

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return parent::isAuthorized($user);
    }

    protected function _setLanguage() {
        //if the cookie was previously set, and Config.language has not been set
        //write the Config.language with the value from the Cookie
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        }
        //if the user clicked the language URL
        else if (isset($this->params['language']) &&
                 ($this->params['language'] !=  $this->Session->read('Config.language'))
        ) {
            //then update the value in Session and the one in Cookie
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
        if (!in_array($this->Session->read('Config.language'), array_keys(Configure::read('Config.languages'))))
            $this->Session->write('Config.language', DEFAULT_LANGUAGE);

        Configure::write('Config.language', $this->Session->read('Config.language'));
    }

    /**
     * get sectoin and child_section (title, and sub menu) used in news/index, events/index
     * @param $id
     * @throws NotFoundException
     */
    public function getSectionAndChildSection($id = null) {

        if ($this->Section->exists($id)) {
            if ($this->name != 'Section')
                $this->loadModel('Section');
            $this->Section->unbindModel(array('hasMany' => array('Content')));

            $section = $this->Section->find('first', array('conditions' => array('Section.' . $this->Section->primaryKey => $id, 'Section.active' => true),
                                                           'recurisve' => -1));

            $id_for_child = (empty($section['Section']['parent_id'])) ? $section['Section']['id'] : $section['Section']['parent_id'];
            $child_sections = $this->Section->find('all', array('conditions' => array('Section.parent_id' => $id_for_child, 'Section.active' => true, 'Section.in_menu' => true),
                                                                'recursive' => -1));

            // get contents
            $this->getManualPaginationContents($id);
        }

        $this->set(compact('section', 'child_sections', 'contents'));
    }


    /**
     * get manual pagination because cakephp doesnt allow 2 pagination in same action, and we need it in News, calendar,  to load content of section and content/news/event
     * called in getSectionAndChildSection and in Content/index (ajax)
     * @param $section_id
     */
    public function getManualPaginationContents($content_section_id) {

        $conditions = array('Content.active' => true);
        if (!empty($content_section_id))
            $conditions['Content.section_id'] = $content_section_id;

        $content_page = (!empty($this->request->params['named']['content_page'])) ? $this->request->params['named']['content_page'] : 0;

        $this->loadModel('Content');
        $contents = $this->Content->find('all', array('conditions' => $conditions,
                                                      'order' => 'Content.order',
                                                      'offset' => $content_page,
                                                      'limit' => $this->content_limit));

        $content_page = $content_page+$this->content_limit;

        $count_all_contents = $this->Content->find('count', array('conditions' => $conditions));

        $this->set(compact('contents', 'content_section_id', 'content_page', 'count_all_contents'));
    }

}
