<?php

class model_nf_forum_activity extends components_model {



	public function getTableName() {
		return 'nf_forum_activity';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>