<?php

class model_nf_common_failedlogin extends components_model {



	public function getTableName() {
		return 'nf_common_failedlogin';
	}

	public function getPkField() {
		return 'ip';
	}

}

?>