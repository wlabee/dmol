<?php

class model_nf_common_mailcron extends components_model {



	public function getTableName() {
		return 'nf_common_mailcron';
	}

	public function getPkField() {
		return 'cid';
	}

}

?>