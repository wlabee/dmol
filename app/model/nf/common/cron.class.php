<?php

class model_nf_common_cron extends components_model {



	public function getTableName() {
		return 'nf_common_cron';
	}

	public function getPkField() {
		return 'cronid';
	}

}

?>