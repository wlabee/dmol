<?php

class model_nf_ucenter_failedlogins extends components_model {



	public function getTableName() {
		return 'nf_ucenter_failedlogins';
	}

	public function getPkField() {
		return 'ip';
	}

}

?>