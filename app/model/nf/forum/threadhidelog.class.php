<?php

class model_nf_forum_threadhidelog extends components_model {



	public function getTableName() {
		return 'nf_forum_threadhidelog';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>