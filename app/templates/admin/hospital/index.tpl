{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="test">

    <div class="page-header">
        <h1><span class="text-light-gray">Form components / </span>Layouts</h1>
    </div>
    <!-- / .page-header -->

    <div class="row">
        <div class="col-sm-12">

            <!-- 5. $INLINE_FORM ===============================================================================

                            Inline form
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Inline form</span>
                </div>
                <div class="panel-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="px"> <span class="lbl">Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
            <!-- /5. $INLINE_FORM -->

        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">

            <!-- 6. $HORIZONTAL_FORM ===========================================================================

                            Horizontal form
            -->
            <form action="" class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Horizontal form</span>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Name:</label>

                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Email:</label>

                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /6. $HORIZONTAL_FORM -->

            <!-- 7. $NO_LABEL_FORM =============================================================================

                            No label form
            -->
            <form action="" class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">No label form</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" placeholder="Name" class="form-control form-group-margin">
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" placeholder="Email" class="form-control form-group-margin">
                        </div>
                        <div class="col-md-4">
                            <input type="url" name="website" placeholder="Website"
                                   class="form-control form-group-margin">
                        </div>
                    </div>
                    <!-- row -->
                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Send message</button>
                </div>
            </form>
            <!-- /7. $NO_LABEL_FORM -->

        </div>
        <div class="col-sm-6">

            <!-- 8. $BORDERED_FORM =============================================================================

                            Bordered form
            -->
            <form action="" class="panel form-horizontal form-bordered">
                <div class="panel-heading">
                    <span class="panel-title">Bordered form</span>
                </div>
                <div class="panel-body no-padding-hr">
                    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                        <div class="row">
                            <label class="col-sm-4 control-label">Name:</label>

                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group no-margin-hr no-margin-b panel-padding-h">
                        <div class="row">
                            <label class="col-sm-4 control-label">Email:</label>

                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /8. $BORDERED_FORM -->

            <!-- 9. $BLOCK_STYLED_FORM =============================================================================

                            Block styled form
            -->
            <form action="" class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Block styled form</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control">
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Website</label>
                                <input type="url" name="website" class="form-control">
                            </div>
                        </div>
                        <!-- col-sm-6 -->
                    </div>
                    <!-- row -->
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>
            <!-- /9. $BLOCK_STYLED_FORM -->

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <!-- 10. $FORM_EXAMPLE =============================================================================

                            Form example
            -->
            <form class="panel form-horizontal">
                <div class="panel-heading">
                    <span class="panel-title">Form example</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputEmail2" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail2" placeholder="Email">
                        </div>
                    </div>
                    <!-- / .form-group -->
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>
                    <!-- / .form-group -->
                    <div class="form-group">
                        <label for="asdasdas" class="col-sm-2 control-label">Text</label>

                        <div class="col-sm-10">
                            <textarea class="form-control"></textarea>

                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>
                    <!-- / .form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Text</label>

                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                           class="px" checked="">
                                    <span class="lbl">Option one is this and that—be sure to include why it's great</span>
                                </label>
                            </div>
                            <!-- / .radio -->
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"
                                           class="px">
                                    <span class="lbl">Option two can be something else and selecting it will deselect option one</span>
                                </label>
                            </div>
                            <!-- / .radio -->
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2-2" value="option2"
                                           class="px">
                                    <span class="lbl">Option three</span>
                                </label>
                            </div>
                            <!-- / .radio -->
                        </div>
                        <!-- / .col-sm-10 -->
                    </div>
                    <!-- / .form-group -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="px"> <span class="lbl">Remember me</span>
                                </label>
                            </div>
                            <!-- / .checkbox -->
                        </div>
                    </div>
                    <!-- / .form-group -->
                    <div class="form-group" style="margin-bottom: 0;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                    <!-- / .form-group -->
                </div>
            </form>
            <!-- /10. $FORM_EXAMPLE -->

        </div>
    </div>
    </div>
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
        });
    </script>
{%/block%}
