<!-- <div class="header">
    <div class="container">
        <div class="header-left">
            <a href="/"><img data-src="holder.js/120x50" src="" alt="" /></a>
        </div>
        <div class="header-right">
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default do-search" aria-label="Left Align">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div> -->
<div class="banner">
    <div class="container">
        <div class="banner-navigation">
            <div class="banner-nav">
                    <a href="/" class="banner-logo"><img data-src="holder.js/120x77" src="" alt="" /></a>
                    <ul class="flexy-menu orange">
                        <li class=" {%if $nav eq 'index' || $nav eq ''%}cap{%/if%}"><a href="/">首页</a></li>
                        <li class=" {%if $nav eq 'cyhl'%}cap{%/if%}"><a href="/cyhl">产业互联网+</a></li>
                        <li class=" {%if $nav eq 'syhl'%}cap{%/if%}"><a href="/syhl">商业互联网+</a></li>
                        <li class=" {%if $nav eq 'jchd'%}cap{%/if%}"><a href="/jchd">精彩活动</a></li>
                        <li class=" {%if $nav eq 'bbs'%}cap{%/if%}"><a href="/bbs" target="_blank">成长社区</a></li>
                        <li class="dropdown {%if $nav eq 'about'%}cap{%/if%}">
                            <a href="/about" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">关于我们</a>
                            <ul id="menu1" class="dropdown-menu" aria-labelledby="drop1">
                                <li><a href="#">Service1</a></li>
                                <li><a href="#">Service2</a></li>
                                <li><a href="#">Service3</a></li>
                            </ul>
                        </li>
                    </ul>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
