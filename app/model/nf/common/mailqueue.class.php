<?php

class model_nf_common_mailqueue extends components_model {



	public function getTableName() {
		return 'nf_common_mailqueue';
	}

	public function getPkField() {
		return 'qid';
	}

}

?>