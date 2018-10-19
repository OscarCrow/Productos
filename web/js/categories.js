$('body').on('click', '.eliminar', function () {
    console.log('abrirmodal');
    var url = $(this).attr('url');
    $('#myModal').modal('show');
    $('#btnconfimar').attr('href', url);
});
