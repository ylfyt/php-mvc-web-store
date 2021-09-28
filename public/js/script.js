$(function(){

    $('#add-button').on('click', function(){
        $('#modalTitle').html('Add Data');
        $('.modal-footer button[type=submit]').html('Insert data');
        $('.modal-footer button[type=submit]').attr('name', 'insert');
        $('.modal-body form').attr('action', 'http://localhost/mvc_web_store/mahasiswa/insert')

        $('#name').val('');
        $('#nim').val('');
        $('#email').val('');
    });


    $('.edit-button').on('click', function(){
        $('#modalTitle').html('Edit Data');
        $('.modal-footer button[type=submit]').html('Edit data');
        $('.modal-footer button[type=submit]').attr('name', 'edit');
        $('.modal-body form').attr('action', 'http://localhost/mvc_web_store/mahasiswa/edit');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/mvc_web_store/mahasiswa/get',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#name').val(data.name);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });
    
    });
});