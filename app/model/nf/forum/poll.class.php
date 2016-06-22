<?php

class model_nf_forum_poll extends components_model {



	public function getTableName() {
		return 'nf_forum_poll';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>