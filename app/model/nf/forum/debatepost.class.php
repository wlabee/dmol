<?php

class model_nf_forum_debatepost extends components_model {



	public function getTableName() {
		return 'nf_forum_debatepost';
	}

	public function getPkField() {
		return 'pid';
	}

}

?>