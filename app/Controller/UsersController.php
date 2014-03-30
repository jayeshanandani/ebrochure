<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */

    public $components = array('Paginator', 'Session');
    public $name = 'Users';
    public $helpers = array('Html', 'Form');
    public $permissions = array('logout' => '*', 'dash' => array('user'),
                                'delete' => array('admin'), 'add' => array('admin'));

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array(
            'conditions' => array(
                'User.' . $this->User->primaryKey => $id
            )
        );
        $this->set('user', $this->User->find('first', $options));
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Auth->user('isActive') == 0) {
                    $this->Session->setFlash('User not active.');
                    $this->Auth->logout();
                    $this->redirect(array('action' => 'login'));
                } else {
                    return $this->redirect('/user_info');
                }
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
        unset($this->request->data['User']['username']);
        unset($this->request->data['User']['password']);
    }

    /**
     * add method
     *
     * @return void
     */

    public function add() {
        $this->User->Behaviors->load('Tools.Passwordable', array());
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data, true, array(
                'role_id',
                'creator_id',
                'modifier_id',
                'username',
                'pwd',
                'pwd_repeat',
                'firstname',
                'middlename',
                'lastname',
                'email',
                'filename',
                'contact',
                'securityque',
                'securityans'
            ))) {
                $this->Session->setFlash('The user has been saved.');
                return $this->redirect(array('action' => 'user_info'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        }
    }

    public function dash() {

        $this->set('user', $this->User->find('all', array(
            'conditions' => array(
                'User.username' => $this->Session->read('User.username')
            )
        )));
    }


    public function user_info() {
        $this->User->recursive = 0;
        $this->paginate        = array(
            'conditions' => array(
                'User.creator_id' => $this->Auth->user('id')
            )
        );
        $this->set('users', $this->paginate());
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['User']['id'] = $id;
        if ($this->request->is(array('post','put'))) {
            if ($this->User->save($this->request->data, 'true', array(
                'id',
                'modifier_id',
                'username',
                'pwd',
                'pwd_repeat',
                'firstname',
                'middlename',
                'lastname',
                'email',
                'filename',
                'contact',
                'securityque',
                'securityans'
            ))) {
                $this->Session->setFlash('The task has been saved.');
                return $this->redirect(array(
                    'action' => 'user_info'
                ));
            } else {
                $this->Session->setFlash('The task could not be saved. Please, try again.');
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'User.' . $this->User->primaryKey => $id
                )
            );
            $this->request->data = $this->User->find('first', $options);
        }

    }

    /**
     * AccountController::logout()
     *
     * @return void
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * UserController::lost_password()
     *
     * @param string $key
     * @return void
     */
    public function lost_password() {
        if (!empty($this->request->data['Form']['key'])) {

            $key = $this->request->data['Form']['key'];
            $this->redirect(array(
                'action' => 'change_password_init',
                $key
            ));
        }
        if (!empty($this->request->data['User']['email'])) {
            unset($this->User->validate['email']['isUnique']);
            $this->User->set($this->request->data);

            // Validate basic email scheme and captcha input.
            if ($this->User->validates(array('fieldList' => array('email')))) {
                $res = $this->User->find('first', array(
                    'fields' => array(
                        'username',
                        'id',
                        'email'
                    ),
                    'conditions' => array(
                        'email' => $this->request->data['User']['email']
                    )
                ));
            }

            // Valid user found to this email address
            if (!empty($res)) {
                $uid         = $res['User']['id'];
                $this->Token = ClassRegistry::init('Tools.Token');
                $code        = $this->Token->newKey('activate', null, $uid);
                if (Configure::read('debug') > 0) {
                    $debugMessage = 'DEBUG MODE: Show activation key - ' . h($res['User']['username']) . ' | ' . $code;
                    $this->Session->setFlash($debugMessage, 'info');
                }
                // Send email
                $Email = new CakeEmail('gmail');
                $Email->to($res['User']['email'], $res['User']['username']);
                $Email->from('jayeshanandani@gmail.com');
                $Email->subject(Configure::read('Config.pageName') . ' - ' . __('Password request'));
                $Email->template('lost_password');
                $Email->viewVars(compact('code'));
                if ($Email->send()) {
                    $this->Session->setFlash('An email with instructions has been send to \'%s\'.', $Email);
                    $this->Session->setFlash('In a third step you will then be able to change your password.');
                } else {
                    $this->Session->setFlash('Confirmation Email could not be sent. Please consult an admin.');
                }
                return $this->redirect(array(
                    'action' => 'lost_password'
                ));
            } else {
                $this->Session->setFlash('Not a valid account');
            }
        }
    }

    public function activate_account($keyToCheck = null) {
        $this->Token = ClassRegistry::init('Tools.Token');
        $token       = $this->Token->useKey('activate', $keyToCheck);

        if (!empty($token) && $token['Token']['used'] > 0) {
            // warning flash message: already activated
        } elseif (!empty($token)) {
            // continue with activation, set activate flag of this user from 0 to 1 for example
            $this->User->id = $key['Token']['user_id'];
            $this->User->saveField('active', 1);
            // success flash message, auto-login and redirect to his profile page etc
        } else {
            // error flash message: invalid key
        }
    }

    public function change_password_init($keyToCheck = null) {
        $this->Token = ClassRegistry::init('Tools.Token');
        $token       = $this->Token->useKey('activate', $keyToCheck);
        $uid         = $token['Token']['user_id'];
        debug($token);

        if (!empty($token) && $token['Token']['used'] > 0) {
            // warning flash message: already used
        } elseif (!empty($token)) {
            // continue, write to session and redirect
            $this->Session->write('Auth.Tmp.id', $uid);
            $this->redirect(array(
                'action' => 'change_password'
            ));
        } else {
            // error flash message: invalid key
        }
    }
    /**
     * AccountController::change_password()
     *
     * @return void
     */
    public function change_password() {
        $uid = $this->Session->read('Auth.Tmp.id');
        echo $this->Session->read('Auth.Tmp.id');
        if (empty($uid)) {
            $this->Session->setFlash('You have to find your account first and click on the link in the email you receive afterwards');
            $this->redirect(array(
                'action' => 'lost_password'
            ));
        }

        if ($this->request->query('abort')) {
            if (!empty($uid)) {
                $this->Session->delete('Auth.Tmp');
            }
            $this->redirect(array(
                'action' => 'login'
            ));
        }

        $this->User->Behaviors->load('Tools.Passwordable', array());
        if ($this->request->is('post')) {
            $this->request->data['User']['id'] = $uid;
            if ($this->User->save($this->request->data, true, array(
                'id',
                'pwd',
                'pwd_repeat'
            ))) {
                debug($this->request->data);
                $this->Session->setFlash('Password saved successfully.You can login now.');
                $this->Session->delete('Auth.Tmp');
                $username = $this->User->field('username', array(
                    'id' => $uid
                ));
                $this->redirect(array(
                    'action' => 'login',
                    '?' => array(
                        'username' => $username
                    )
                ));
            }
            $this->Session->setFlash('Error');

            // Pwd should not be passed to the view again for security reasons.
            unset($this->request->data['User']['pwd']);
            unset($this->request->data['User']['pwd_repeat']);

        }
    }

    public function deactivate($id = null) {
        if ($this->request->is(array('post','put'))) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            $this->request->data['User']['id']       = $id;
            $this->request->data['User']['isActive'] = 0;
            if ($this->User->save($this->request->data, true, array('id','isActive'))) {
                $this->Session->setFlash('User has been deactivated.');
            } else {
                $this->Session->setFlash('User could not be deactivated. Please, try again.');
            }
            return $this->redirect(array(
                'action' => 'user_info'
            ));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post','put'))) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            $this->request->data['User']['id']       = $id;
            $this->request->data['User']['isActive'] = 1;
            if ($this->User->save($this->request->data, true, array(
                'id',
                'isActive'
            ))) {
                $this->Session->setFlash('User has been activated.');
            } else {
                $this->Session->setFlash('User could not be activated. Please, try again.');
            }
            return $this->redirect(array(
                'action' => 'user_info'
            ));
        }
    }
}
