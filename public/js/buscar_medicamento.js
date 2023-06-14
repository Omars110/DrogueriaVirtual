$(document).ready(function () {
    var dato = $("keyUpBuscar").val();
    console.log(dato);
$("botonBuscar").click(function (e) { 
    e.preventDefault();
    console.log(dato);
        $.ajax({
        type: "GET",
        url: "{{asset('/producto/filtrar')}}",
        data: dato,
        dataType: "json",
        success: function (response) {
            
        }
    });
  });
});