<?php

class service_admin extends components_service {

    /**
     * @return components_model
     */
    function getModel() {
        return new model_ssm_admin($this->id);
    }
}

?>