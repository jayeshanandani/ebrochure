<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
	
		public function validateUnique($data, $fields = array(), $options = array()) {
		$id = (!empty($this->data[$this->alias][$this->primaryKey]) ? $this->data[$this->alias][$this->primaryKey] : 0);
		if (!$id && $this->id) {
			$id = $this->id;
		}

		foreach ($data as $key => $value) {
			$fieldName = $key;
			$fieldValue = $value;
			break;
		}

		$conditions = array(
			$this->alias . '.' . $fieldName => $fieldValue,
			$this->alias . '.id !=' => $id);

		// careful, if fields is not manually filled, the options will be the second param!!! big problem...
		$fields = (array)$fields;
		if (!array_key_exists('allowEmpty', $fields)) {
			foreach ($fields as $dependingField) {
				if (isset($this->data[$this->alias][$dependingField])) { // add ONLY if some content is transfered (check on that first!)
					$conditions[$this->alias . '.' . $dependingField] = $this->data[$this->alias][$dependingField];

				} elseif (isset($this->data['Validation'][$dependingField])) { // add ONLY if some content is transfered (check on that first!
					$conditions[$this->alias . '.' . $dependingField] = $this->data['Validation'][$dependingField];

				} elseif (!empty($id)) {
					// manual query! (only possible on edit)
					$res = $this->find('first', array('fields' => array($this->alias . '.' . $dependingField), 'conditions' => array($this->alias . '.id' => $id)));
					if (!empty($res)) {
						$conditions[$this->alias . '.' . $dependingField] = $res[$this->alias][$dependingField];
					}
				} else {
					if (!empty($options['requireDependentFields'])) {
						trigger_error('Required field ' . $dependingField . ' for validateUnique validation not present');
						return false;
					}
					return true;
				}
			}
		}

		$this->recursive = -1;
		if (count($conditions) > 2) {
			$this->recursive = 0;
		}
		$options = array('fields' => array($this->alias . '.' . $this->primaryKey), 'conditions' => $conditions);
		$res = $this->find('first', $options);
		return empty($res);
	}
}
