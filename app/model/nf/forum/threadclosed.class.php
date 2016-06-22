<?php

class model_nf_forum_threadclosed extends components_model {



	public function getTableName() {
		return 'nf_forum_threadclosed';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>