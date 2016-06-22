<?php

class model_nf_forum_newthread extends components_model {



	public function getTableName() {
		return 'nf_forum_newthread';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>