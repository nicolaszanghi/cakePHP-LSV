<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {


    /**
     * save slug
     * @param $data
     * @param string $slug_field
     * @param null $field
     * @return bool
     */
    public function saveSlug($data,  $field = null) {
        $languages = Configure::read('Config.languages');
        $pattern = '/[^_]*$/';
        foreach ($languages as $language => $n) {
            $slug = $this->stringToSlug($data[$this->alias][$field.'_'.$language]);
            $this->recursive = -1;
            while ($this->find('count', array('conditions' => array('slug_'.$language => $slug, 'id !=' => $data[$this->alias]['id']))) > 0) {
                // get last word and check if is a number
                preg_match($pattern, $slug, $results);
                if (is_numeric($results[0])) {
                    $results[0]++;
                    $slug = preg_replace($pattern, '', $slug);
                    $slug .= $results[0];
                }else
                    $slug .= '_1';
            }
            $return = $this->savefield('slug_'.$language, $slug);
        }
        return $return;
    }

    /**
     * generate slug from string
     * @param $str
     * @return string
     */
    public function stringToSlug($str) {
        // turn into slug
        $str = Inflector::slug($str);
        // to lowercase
        $str = strtolower($str);
        return $str;
    }


}
