<?php

class model_nf_forum_statlog extends components_model {



	public function getTableName() {
		return 'nf_forum_statlog';
	}

	public function getPkField() {
		return 'logdate';
	}

}

?>