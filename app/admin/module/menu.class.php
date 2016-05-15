<?php

class admin_module_menu {
    protected $_submenu = array();
    public $_userid = 0;

    public function __construct($user_id = 0) {
        $this->_userid = $user_id;
    }

    public function add(admin_module_submenu $meun) {
        array_push($this->_submenu, $meun);
    }

    public function getHtml() {
        $html = '<ul class="navigation">';
        foreach ($this->_submenu as $submenu) {
            if ($submenu instanceof admin_module_submenu) {
                $html .= $submenu->getHtml($this->_userid);
            }
        }
        $html .= '</ul>';
        return $html;
    }
}

?>