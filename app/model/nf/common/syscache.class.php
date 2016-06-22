<?php

class model_nf_common_syscache extends components_model {



	public function getTableName() {
		return 'nf_common_syscache';
	}

	public function getPkField() {
		return 'cname';
	}

}

?>