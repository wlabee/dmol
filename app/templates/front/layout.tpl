<!DOCTYPE html>
<html>
<head>
    {%block name="head"%}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{%$title%}</title>
        <meta name="description"
              content="{%$description%}"/>
        <meta name="keywords" content="{%$keywords%}"/>
        {%block name="meta"%}{%/block%}
        {%css path="front" file="bootstrap,layout"%}
        {%js type="plugin" file="jquery.min.js"%}
        {%js path="front" file="global"%}
        {%block head_style%}{%/block%}
    {%/block%}
</head>
<body class="{%block body_class%}{%/block%}">
{%block name="body"%}
    <div class="container-fluid">
        <div class="header">
            <div class="container">
                <div class="header-left">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </form>
                </div>
                <div class="header-right">
                    <ul>
                        <li><a href="#" class="facebook"> </a></li>
                        <li><a href="#" class="p"> </a></li>
                        <li><a href="#" class="twitter"> </a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="banner">
    		<div class="container">
    			<div class="banner-navigation">
    				<div class="banner-nav">
    						<ul class="flexy-menu orange nav1">
    							<li class="hvr-sweep-to-bottom cap right"><a href="index.html">Home</a></li>
    							<li class="hvr-sweep-to-bottom right"><a href="about.html">About Us</a></li>
    							<li class="hvr-sweep-to-bottom right"><a href="#">Services</a>
    								<ul>
    									<li><a href="#">Service1</a></li>
    									<li><a href="#">Service2</a>
    										<ul>
    											<li><a href="#">Service4</a></li>
    											<li><a href="#">Service5</a></li>
    											<li><a href="#">Service6</a></li>
    										</ul>
    									</li>
    									<li><a href="#">Service3</a></li>
    								</ul>
    							</li>
    							<li class="hvr-sweep-to-bottom right"><a href="#news" class="scroll">News</a></li>
    							<li class="hvr-sweep-to-bottom right"><a href="gallery.html">Gallery</a></li>
    							<li class="hvr-sweep-to-bottom right"><a href="blog.html">Blog</a></li>
    							<li class="hvr-sweep-to-bottom right"><a href="contact.html">Contact Us</a></li>
    						</ul>
    					<div class="clearfix"> </div>
    				</div>
    			</div>
    			<div class="logo">
    				<a href="index.html"><img src="images/logo.png" alt=" " /></a>
    			</div>
    			<div class="banner-info">
    				<h1>Welcome To Diving Club</h1>
    				<p>comprehensive swimming information</p>
    			</div>
    		</div>
    	</div>
        <div class="clearfix"></div>
        <div class="container main-content">
            {%block name="content"%}{%/block%}
        </div>
        <div class="footer container-fluid">
            <div class="contact container">
            &copy;luoqongbo 2016
            </div>
        </div>
    </div>
{%/block%}
{%js path="front" file="bootstrap,flexy-menu"%}
{%block body_js%}{%/block%}
</body>
</html>
