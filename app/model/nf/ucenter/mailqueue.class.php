<?php

class model_nf_ucenter_mailqueue extends components_model {



	public function getTableName() {
		return 'nf_ucenter_mailqueue';
	}

	public function getPkField() {
		return 'mailid';
	}

}

?>