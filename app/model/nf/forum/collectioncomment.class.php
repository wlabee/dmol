<?php

class model_nf_forum_collectioncomment extends components_model {



	public function getTableName() {
		return 'nf_forum_collectioncomment';
	}

	public function getPkField() {
		return 'cid';
	}

}

?>