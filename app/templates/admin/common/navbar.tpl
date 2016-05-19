<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
    <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span
                class="hide-menu-text">隐藏菜单</span></button>
    <div class="navbar-inner">
        <div class="navbar-header">
            <a href="/" class="navbar-brand" style="font-size: 1em;">
                DMOL后台管理系统
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#main-navbar-collapse"><i
                        class="navbar-icon fa fa-bars"></i></button>
        </div>
        <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
            <div>
                <ul class="nav navbar-nav">
                    {%*<li><a href="/">网站首页</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>*%}
                    {%*<ul class="dropdown-menu">*%}
                    {%*<li><a href="#">First item</a></li>*%}
                    {%*<li><a href="#">Second item</a></li>*%}
                    {%*<li class="divider"></li>*%}
                    {%*<li><a href="#">Third item</a></li>*%}
                    {%*</ul>*%}
                    {%*</li>*%}
                </ul>
                {%include file="common/message.tpl"%}
            </div>
        </div>
    </div>
</div>
