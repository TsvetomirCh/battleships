function fire(row, col) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: '/play',
        cache: false,
        dataType: 'json',
        data: {
            _token: CSRF_TOKEN,
            row: row,
            col: col
        },
        success: function (data) {
            if(data.hit == true) {
                $('#'+row+col).removeClass("btn-info").addClass("btn-success").addClass('disabled').attr('disabled', true);
            } else {
                $('#'+row+col).removeClass("btn-info").addClass("btn-danger").addClass('disabled').attr('disabled', true);
            }
            $('#msg').text(data.message);
        }
    });
}