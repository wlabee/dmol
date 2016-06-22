<?php

class model_nf_common_failedip extends components_model {



	public function getTableName() {
		return 'nf_common_failedip';
	}

	public function getPkField() {
		return 'ip';
	}

}

?>