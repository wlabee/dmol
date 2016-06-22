<?php

class model_nf_security_eviluser extends components_model {



	public function getTableName() {
		return 'nf_security_eviluser';
	}

	public function getPkField() {
		return 'uid';
	}

}

?>