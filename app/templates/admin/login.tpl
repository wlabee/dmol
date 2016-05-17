{%extends file="layout.tpl"%}
{%block top_style%}
    {%css path="admin" file="login"%}
    {%js path="admin" file="login"%}
{%/block%}
{%block body_class%}login{%/block%}
{%block body%}
    <div class="box row">
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 login-box">
            <form action="/login" method="post" class="login-form">
                <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" value="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="submit" value="Sign in">
                    <label class="text-danger"></label>
                </div>
            </form>
        </div>
    </div>
{%/block%}
