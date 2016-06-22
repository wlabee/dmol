<?php

class model_nf_common_visit extends components_model {



	public function getTableName() {
		return 'nf_common_visit';
	}

	public function getPkField() {
		return 'ip';
	}

}

?>