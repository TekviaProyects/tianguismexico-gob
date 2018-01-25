var notifications ={

actualizar : function($objet){

    $.ajax({
      data : $objet,
      url : 'ajax.php?c=notifications&f=actualizar',
      type : 'post',
      dataType : 'json'
    }).done(function(resp) {
        console.log('==========> resp list_requests', resp);
    }).fail(function(resp) {
      console.log('==========> fail !!! list_requests', resp);
      swal({
        title : 'Error',
        text : 'Error al cargar las solicitudes',
        timer : 5000,
        showConfirmButton : true,
        type : 'error'
      });
    });

}


};
