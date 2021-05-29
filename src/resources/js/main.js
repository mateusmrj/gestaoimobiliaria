$(document).ready(function () {
  var BRMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(BRMaskBehavior.apply({}, arguments), options);
      }
  };

  $('input[type=tel]').mask(BRMaskBehavior, spOptions);

  $('.valor').mask('#0.00', {reverse: true});

  /**
   * Passa os dados para o Modal, e atualiza o link para exclusão
   */
  $('#delete-modal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var id = button.data('customer');

    var modal = $(this);
    modal.find('.modal-title').text('Excluir ID ' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
  });

    /**
   * Passa os dados para o Modal, e atualiza o link para update
   */
     $('#pg-modal').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);
      var flag = button.data('customer');
      var id = button.data('identify');
      var contrato = button.data('contrato');
  
      var modal = $(this);

      if(flag == 1){
        modal.find('.modal-body').text('Deseja realmente marcar como PAGO?');
      }else{
        modal.find('.modal-body').text('Deseja realmente marcar como PENDENTE?');
      }
      
      modal.find('#confirm').attr('href', 'pagar.php?id=' + id+"&flag="+ flag+"&contrato="+ contrato);
    });

  /**
   * Pega dados dos Bairros
   */
  $('#cidade').change(function () {
    var selectedOption = $(this).val();
    var url = "/page/imoveis/getBairros.php";

    $('#bairro').children().remove();

    $.ajax({
      type: 'post',
      url: url,
      data: {
        cidade: selectedOption
      },
      success: function (texto) {

          $("#bairro").append(texto);
        
      },
      error: function (e) {
        console.log("ERROR : ", e);
      }
    });
  });

});