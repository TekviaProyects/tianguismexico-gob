$(document).ready(function () {
$("#btnSubir").click(function (event) {
event.preventDefault();
swal({
  title: '',
  imageUrl: 'resources/images/spiner.gif',
  text: 'Cargando información',
  showConfirmButton: false
})
var form = $('#formulario')[0];
var data = new FormData(form);
data.append("CustomField", "This is some extra data, testing");
$.ajax({
  type: "POST",
  enctype: 'multipart/form-data',
  url: "php/back/subir.php",
  data: data,
  processData: false,
  contentType: false,
  cache: false,
  timeout: 600000,
  success: function (data) {
    console.log(data);
    swal({
      title: 'Registro exitoso',
    })
  },
  error: function (e) {
  }
});
});
});
