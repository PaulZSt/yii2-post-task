$('form').on('beforeSubmit', function(){
    var data = $(this).serialize();
    $.ajax({
        url: '/post/create',
        type: 'POST',
        data: data,
        success: function(res){
            $('#form_type').html(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
});


$('select[name="form_type_select"]').on('change', function() {
    var data = $(this);
    $.ajax({
        url: '/post/create',
        type: 'POST',
        data: data,
        success: function(res){
            $('#form_type').html(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
});









