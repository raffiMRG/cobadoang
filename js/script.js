$(document).ready(function(){
    // event ketika keyword di tulis
    $('#keyword').on('keyup', function(){
        $('.loading2').show();
        // ajax menggunakan get
        $.get('js/ajax/data.php?keyword=' + $('#keyword').val(), function(data){
            $('#main').html(data);
            $('.loading2').hide();
        });
    });
});