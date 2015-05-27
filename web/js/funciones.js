$(document).ready(function(){

  $('#registros_tiposRegistro').on('change', function(){

    // $('#registros_categorias').removeClass('hide');
    // $('label[for="registros_categorias"]').removeClass('hide');

    contactosLeads($(this));
  });

  function contactosLeads(id)
  {

    var form = id.closest('form');
    var data = form.serialize();

    $.ajax({
      url  : form.attr('action'),
      type : form.attr('method'),
      data : data,
      success: function(html){
        alert('Adentro');
        $('#registros_categorias').replaceWith($(html).find('#registros_categorias'));
      }

    });
  }
});
