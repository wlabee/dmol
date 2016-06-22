<?php

class model_nf_common_cache extends components_model {



	public function getTableName() {
		return 'nf_common_cache';
	}

	public function getPkField() {
		return 'cachekey';
	}

}

?>