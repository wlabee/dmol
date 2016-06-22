<?php

class model_nf_forum_thread extends components_model {



	public function getTableName() {
		return 'nf_forum_thread';
	}

	public function getPkField() {
		return 'tid';
	}

}

?>