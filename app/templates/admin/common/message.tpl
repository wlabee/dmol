<div class="right clearfix">
    <ul class="nav navbar-nav pull-right right-navbar-nav">
        {%*<li>*%}
        {%*<form class="navbar-form pull-left">*%}
        {%*<input type="text" class="form-control" placeholder="Search">*%}
        {%*</form>*%}
        {%*</li>*%}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                <span>你好，{%$global.username%}</span>
            </a>
            <ul class="dropdown-menu">
                {%*<li><a href="/auser/setting"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;个人设置</a></li>*%}
                {%*<li class="divider"></li>*%}
                <li><a href="/login/logout"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;注销</a></li>
            </ul>
        </li>
    </ul>
</div>
