<?php

class m140527_113721_cleanup extends CDbMigration
{
	public $stuff = array(
		'et_ophnupreoperative_baseline_obs_assignment' => array(
			'name' => 'ophnupreoperative_baseline_obs_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnupreoperative_baseline'),
				'{table}_lku_fk' => array('ob_id','ophnupreoperative_baseline_obs'),
			),
			'fields' => array(
				'ophnupreoperative_baseline_obs_id' => 'ob_id',
			),
		),
		'et_ophnupreoperative_patientstatus_cancel_assignment' => array(
			'name' => 'ophnupreoperative_patientstatus_cancel_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnupreoperative_patientstatus'),
				'{table}_lku_fk' => array('cancel_id','ophnupreoperative_patientstatus_cancel'),
			),
			'fields' => array(
				'ophnupreoperative_patientstatus_cancel_id' => 'cancel_id',
			),
		),
		'et_ophnupreoperative_preoperative_dental_assignment' => array(
			'name' => 'ophnupreoperative_preoperative_dental_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnupreoperative_preoperative'),
				'{table}_lku_fk' => array('dental_id','ophnupreoperative_preoperative_dental'),
			),
			'fields' => array(
				'ophnupreoperative_preoperative_dental_id' => 'dental_id',
			),
		),
		'et_ophnupreoperative_preoperative_falls_assignment' => array(
			'name' => 'ophnupreoperative_preoperative_falls_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnupreoperative_preoperative'),
				'{table}_lku_fk' => array('fall_id','ophnupreoperative_preoperative_falls'),
			),
			'fields' => array(
				'ophnupreoperative_preoperative_falls_id' => 'fall_id',
			),
		),
		'et_ophnupreoperative_preoperative_hearing_aid_assignment' => array(
			'name' => 'ophnupreoperative_preoperative_hearing_aid_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnupreoperative_preoperative'),
				'{table}_lku_fk' => array('hearing_id','ophnupreoperative_preoperative_hearing_aid'),
			),
			'fields' => array(
				'ophnupreoperative_preoperative_hearing_aid_id' => 'hearing_id',
			),
		),
		'et_ophnupreoperative_preoperative_wristband_assignment' => array(
			'name' => 'ophnupreoperative_preoperative_wristband_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnupreoperative_preoperative'),
				'{table}_lku_fk' => array('wristband_id','ophnupreoperative_preoperative_wristband'),
			),
			'fields' => array(
				'ophnupreoperative_preoperative_wristband_id' => 'wristband_id',
			),
		),
	);

	public function up()
	{
		foreach ($this->stuff as $table => $params) {
			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$table,$key);
				} else {
					$key_name = 'et_'.$key;
				}

				$this->dropForeignKey($key_name,$table);
				$this->dropIndex($key_name,$table);
			}

			if (@$params['name']) {
				$target = @$params['name'];
			} else {
				$target = preg_replace('/^et_/','',$table);
			}

			$this->renameTable($table,$target);
			$this->renameTable($table.'_version',$target.'_version');

			if (!empty($params['fields'])) {
				foreach ($params['fields'] as $from => $to) {
					$this->renameColumn($target,$from,$to);
					$this->renameColumn($target.'_version',$from,$to);
				}
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$target,$key);
				} else {
					$key_name = $key;
				}

				if (isset($key_params[2])) {
					$key_name = $key_params[2];
				}

				if (isset($params['fields'][$key_params[0]])) {
					$field = $params['fields'][$key_params[0]];
				} else {
					$field = $key_params[0];
				}
				$this->createIndex($key_name,$target,$field);
				$this->addForeignKey($key_name,$target,$field,$key_params[1],'id');
			}
		}
	}

	public function down()
	{
		foreach (array_reverse($this->stuff) as $table => $params) {
			$target = $table;

			if (@$params['name']) {
				$table = $params['name'];
			} else {
				$table = preg_replace('/^et_/','',$table);
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$table,$key);
				} else {
					$key_name = $key;
				}
				if (isset($key_params[2])) {
					$key_name = $key_params[2];
				}
				$this->dropForeignKey($key_name,$table);
				$this->dropIndex($key_name,$table);
			}

			$this->renameTable($table,$target);
			$this->renameTable($table.'_version',$target.'_version');

			if (!empty($params['fields'])) {
				foreach ($params['fields'] as $to => $from) {
					$this->renameColumn($target,$from,$to);
					$this->renameColumn($target.'_version',$from,$to);
				}
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$target,$key);
				} else {
					$key_name = 'et_'.$key;
				}

				$field = $key_params[0];

				if (isset($params['fields'])) {
					foreach ($params['fields'] as $k => $v) {
						if ($v == $key_params[0]) {
							$field = $k;
						}
					}
				}

				$this->createIndex($key_name,$target,$field);
				$this->addForeignKey($key_name,$target,$field,$key_params[1],'id');
			} 
		}
	}
}
