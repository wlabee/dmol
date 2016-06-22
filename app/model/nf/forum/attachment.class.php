<?php

class model_nf_forum_attachment extends components_model {



	public function getTableName() {
		return 'nf_forum_attachment';
	}

	public function getPkField() {
		return 'aid';
	}

}

?>