<?php
App::uses('AppModel', 'Model');
/**
 * Institute Model
 *
 */
class Institute extends AppModel {

public $validate = array(

		'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'You must enter the name of any institute.'
            ),
            'unique' => array(
                'rule'    => 'isUnique',
                'message' => 'This username has already been taken.'
            ),
        ),
    );

public $actsAs = array('WhoDidIt');


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
