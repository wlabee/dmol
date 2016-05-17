$(window).load(function () {
    var form = $(".login-form");
    var denger = $(".text-danger");
    form.submit(function(e){
        denger.html('');
        denger.hide();
        e.preventDefault();
        e.stopPropagation();
        e.stopPropagation();
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
