<?php

class admin_module_submenu {
    protected $_link = array();
    public $name = '';
    public $icon = '';
    public $href = '#';
    public $isExpand = true;
    public $isActive = false;

    public function __construct($name = '', $icon = '', $href = '#') {
        $this->name = $name;
        $this->href = $href;
        $this->icon = $icon;
    }

    public function add(admin_module_link $link) {
        array_push($this->_link, $link);
    }

    public function getElmHtml() {
        return '<a href="' . $this->href . '"><i class="menu-icon fa ' . $this->icon . '"></i><span class="mm-text">' . $this->name . '</span></a>';
    }

    public function getHtml($user_id = 0) {
        $html = $shtml = '';
        foreach ($this->_link as $submenu) {
            if ($submenu instanceof admin_module_link) {
                $subhtml = $submenu->getElmHtml($user_id);
                if ($subhtml) {
                    $shtml .= $subhtml;
                }
                if ($submenu->isActive) {
                    $this->isActive = true;
                }
            }
        }
        if ($shtml) {
            $class = '';
            if ($this->isActive) {
                $class = " open active";
            }
            $html .= '<li class="mm-dropdown' . $class . '">' . "\n";
            $html .= $this->getElmHtml();
            $html .= '<ul>' . $shtml . "</ul>";
            $html .= "</li>\n";
        } else {
            $class = '';
            if ($this->isActive) {
                $class = " active";
            }
            $html .= "<li class=\"{$class}\">\n";
            $html .= $this->getElmHtml();
            $html .= "</li>\n";
        }
        return $html;
    }
}

?>