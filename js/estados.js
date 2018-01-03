$(function(){
$('#cliente').autocomplete({
                    source: function(request, response) {
                        $.getJSON("php/back/buscarmunicipio.php", { term:request.term }, response);
                },
                minLength: 1,
                select: function(event, ui){
                    event.preventDefault();
                    $(this).val(ui.item.nombre);
                    $('#correo').val(ui.item.correo);
                    $('#telefono').val(ui.item.telefono);
                }
                });
});
