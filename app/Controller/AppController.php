<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


    public $helpers = array('Session', 'Html', 'Form' => array('className' => 'Tools.FormExt'), 'Tools.Common', 'Tools.Format', 'Tools.Datetime', 'Tools.Numeric');

    /**
     * AppController::constructClasses()
     *
     * @return void
     */
    public function constructClasses()
    {
        if (CakePlugin::loaded('DebugKit') && Configure::read('debug')) {
            $this->components[] = 'DebugKit.Toolbar';
        }

        parent::constructClasses();
    }



    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'user_info'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            )
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','lost_password','change_password_init','change_password');
    }

}