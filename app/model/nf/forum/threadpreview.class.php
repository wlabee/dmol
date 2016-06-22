<?php

class model_nf_forum_threadpreview extends components_model {



	public function getTableName() {
		return 'nf_forum_threadpreview';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>