$(window).load(function () {
    var form = $(".login-form");
    var denger = $(".text-danger");
    form.submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        denger.html('');
        denger.hide();
        if (!$("#user_name").val()) {
            denger.html('请填写用户名');
            denger.show();
            return false;
        }
        if (!$("#password").val()) {
            denger.html('请填写用密码');
            denger.show();
            return false;
        }
        $.ajax({
            url: '/login',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(rs) {
            if (rs.code < 0) {
                denger.html(rs.message);
                denger.show();
            } else {
                window.location.href = rs.data;
            }
        })
        .fail(function() {
            denger.html("网络错误");
            denger.show();
        })
        .always(function() {
            //console.log("complete");
        });
        return false;
    });
});
