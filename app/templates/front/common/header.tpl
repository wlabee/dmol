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
                    <a href="/" class="banner-logo"><img data-src="holder.js/120x77" src="/assets/images/logo.png" alt="" /></a>
                    <ul class="flexy-menu orange">
                        <li class=" {%if $nav eq 'index' || $nav eq ''%}cap{%/if%}"><a href="/">首页</a></li>
                        <li class="dropdown {%if $nav eq 'ch-1' or $nav eq 'ch-2'%}cap{%/if%}">
                            <a href="/article/ch-1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">牛刀服务</a>
                            <ul id="menu2" class="dropdown-menu" aria-labelledby="drop1">
                                <li><a href="/article/ch-1">新品牌策划</a></li>
                                <li><a href="/article/ch-2">新商模策划</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {%if $nav eq 'ch-3' or $nav eq 'ch-4'%}cap{%/if%}">
                            <a href="/article/ch-3" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">精彩活动</a>
                            <ul id="menu3" class="dropdown-menu" aria-labelledby="drop1">
                                <li><a href="/article/ch-3">线上访谈</a></li>
                                <li><a href="/article/ch-4">圆桌解析会</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {%if $nav eq 'ch-5'  or $nav eq 'ch-6'%}cap{%/if%}">
                            <a href="/article/ch-5" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">成长社区</a>
                            <ul id="menu3" class="dropdown-menu" aria-labelledby="drop1">
                                <li><a href="/article/ch-5">牛刀干货</a></li>
                                <li><a href="/article/ch-6">案例解析</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {%if $nav eq 'about'%}cap{%/if%}">
                            <a href="/about" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">关于我们</a>
                            <ul id="menu1" class="dropdown-menu" aria-labelledby="drop1">
                                <li><a href="/about#abstract">牛刀会简介</a></li>
                                <li><a href="/about#mavin">专家介绍</a></li>
                                <li><a href="/about#contactus">联系我们</a></li>
                            </ul>
                        </li>
                    </ul>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
