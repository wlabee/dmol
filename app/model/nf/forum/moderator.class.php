<?php

class model_nf_forum_moderator extends components_model {



	public function getTableName() {
		return 'nf_forum_moderator';
	}

	public function getPkField() {
		return 'uid';
	}

}

?>