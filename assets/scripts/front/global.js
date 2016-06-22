$(function () {
    $("#content-wrapper").on("click", ".dialog", function (event) {
        event.preventDefault();
        event.stopPropagation();
        var cntEmt = $("#content-wrapper");
        var id = $(this).data("dialog_id");
        if (typeof(id) == "undefined" || id == '') {
            //创建
            id = "dialog_" + (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
            var html = '';
            html += '<div id="' + id + '" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">';
            html += '    <div class="modal-dialog">';
            html += '        <div class="modal-content">';
            html += '            <div class="modal-header">';
            html += '                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
            html += '                <h4 class="modal-title" id="myModalLabel">系统提示</h4>';
            html += '            </div>';
            html += '            <div class="modal-body">';
            html += '            加载中...';
            html += '            </div>';
            html += '            <div class="modal-footer">';
            html += '                <button type="button" class="btn cancel"  data-dismiss="modal">取消</button>';
            html += '                <button type="button" class="btn btn-primary primary">提交</button>';
            html += '            </div>';
            html += '        </div>';
            html += '    </div>';
            html += '</div>';
            cntEmt.append(html);
            $(this).data("dialog_id", id);
        }
        //
        var dialog = $("#" + id);
        var modal_body = dialog.find(".modal-body");
        var url = '';
        if ($(this).is('a')) {
            url = $(this).attr("href");
        } else {
            url = $(this).data("url");
        }
        var txt = $(this).data("txt");
        var ask = $(this).data("ask");
        var callback = $(this).data("callback");
        if (typeof(ask) != "undefined") {
            if (ask == '') {
                ask = "是否确定" + $(this).text();
            }
            modal_body.text(ask);
            dialog.off("click", ".primary").on("click", ".primary", function (e) {
                e.preventDefault();
                e.stopPropagation();
                var form = modal_body.find("form");
                $.get(url, function (rs) {
                    if ($.isFunction(window[callback])) {
                        window[callback](rs,dialog);
                    } else {
                        dialog.modal("hide");
                        if (rs.message != null && rs.message.length > 0) {
                            alert(rs.message);
                        }
                        if (rs.code == 0) {
                            if (rs.data != null && rs.data.length > 0 && rs.data != 'self') {
                                window.location.href = rs.data;
                            } else {
                                window.location.reload();
                            }
                        }
                    }
                }, "json");
            });
        } else if (typeof(url) != "undefined" && url != '') {
            modal_body.load(url,function(rs){
                $(".datepicker").datepicker({
                    todayBtn: "linked",
                    forceParse: true,
                    autoclose: true,
                    todayHighlight: true
                });
            });
            dialog.off("click", ".primary").on("click", ".primary", function (e) {
                e.preventDefault();
                e.stopPropagation();
                var form = modal_body.find("form");
                form.find(".has-error").removeClass("has-error");
                $.post(
                    form.attr("action"),
                    form.serialize(),
                    function (rs) {
                        if (rs.code < 0) {
                            if (rs.data != null && rs.data.length > 0) {
                                form.find("[name='" + rs.data + "']").parents(".form-group").addClass("has-error");
                            }
                            if (rs.message != null && rs.message.length > 0) {
                                alert(rs.message);
                            }
                        } else if (rs.code == 0) {
                            if (rs.data != null && rs.data.length > 0) {
                                if (typeof(rs.data) != "undefined" && rs.data == 'self') {
                                    window.location.reload();
                                } else {
                                    window.location.href = rs.data;
                                }
                            }
                            dialog.modal("hide");
                        }
                        //console.log(rs);
                    }, "json");
            });
        } else if (typeof(txt) != "undefined" && txt != '') {
            modal_body.html(txt);
            dialog.find(".primary").html("确定").attr("data-dismiss","modal");
            dialog.find(".cancel").remove();
        }
        dialog.modal("show");
    });
    $(".datepicker").datepicker({
        todayBtn: "linked",
        forceParse: true,
        autoclose: true,
        todayHighlight: true
    });
});
function loading() {
    $("#sys-loading").modal('show');
}
function loaded() {
    $("#sys-loading").modal('hide');
}
