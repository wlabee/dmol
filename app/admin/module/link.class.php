<?php

class admin_module_link {

    public $icon = "";
    public $href = "";
    public $name = "";
    public $isActive = false;

    public function __construct($name = '', $icon = '', $href = '') {
        $this->name = $name;
        $this->href = $href;
        $this->icon = $icon;
    }

    public function getElmHtml($user_id = 0) {
        if ($user_id) {
        }
        //当前页面
        $realUrl = SlightPHP::$page . '/' . SlightPHP::$entry;
        $urls = parse_url($this->href);
        if (!$urls['scheme']) {
            $curUrls = trim(strtolower($urls['path']), '/');
            if ($realUrl == $curUrls) {
                $this->isActive = true;
            }
        }
        $class = '';
        if ($this->isActive) {
            $class = "active";
        }
        return '<li class="' . $class . '"><a href="' . $this->href . '"><i class="menu-icon fa ' . $this->icon . '"></i><span class="mm-text">' . $this->name . '</span></a></li>' . "\n";
    }
}

?>