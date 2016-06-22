<?php

class model_nf_forum_post extends components_model {



	public function getTableName() {
		return 'nf_forum_post';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>