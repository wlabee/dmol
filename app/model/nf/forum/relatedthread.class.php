<?php

class model_nf_forum_relatedthread extends components_model {



	public function getTableName() {
		return 'nf_forum_relatedthread';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>