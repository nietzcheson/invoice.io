$(document).ready(function(){

  var registro = $('#registros_tiposRegistro');
  var form = registro.closest('form');

  registro.on('change', function(){
    alert('acá');
    var data = registro.serialize();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: data,
      beforeSend : function(){
        registro.attr('registros_categorias', true);
        $("#registros_categorias").fadeIn(500);
      },
      success: function(response){
        $("#registros_categorias").replaceWith($(response).find("#registros_categorias"));
      }
    });

  });

  $('.editar-registro').on('click', function(){

    var id = $(this).attr('id');
    console.log(id);

    $.ajax({
      url       : Routing.generate('registro_editar', { id: id }),
      dataType  : "json",
      success: function(response){
        $('.registro-form').html(response);
        //console.log(response);
      }
    });

    // $.ajax({
    //   url: Routing.generate('registro_editar', { id: id });
    //   dataType: "json",
    //   success: function(response){
    //     console.log(response);
    //   }
    // });


  });

});
