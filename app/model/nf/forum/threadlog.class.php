<?php

class model_nf_forum_threadlog extends components_model {



	public function getTableName() {
		return 'nf_forum_threadlog';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>