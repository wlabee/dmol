<?php

class model_dm_user extends components_model {



	public function getTableName() {
		return 'dm_user';
	}

	public function getPkField() {
		return 'user_id';
	}

}

?>