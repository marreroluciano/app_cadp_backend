/* verifica que el usuario y contraseña no sean vacíos */
function verify_sign_in(){
  var user = $('#user_name').val().trim();
  var pass = $('#user_pass').val().trim();

  if ((user.length < 6) || (pass.length < 6)){
    alertify.error('<i class="fa fa-thumbs-down" aria-hidden="true"></i> El usuario y la contraseña deben contener al menos 6 caracteres.');
    return false;
  }

  $('#form').submit();
}

/* filtro de búsqueda */
function search(url, controller, method, length, result_id){
  if ( $('#text_to_search').val().trim().length >= length ) {
    var parameters = {
      "text_to_search": $('#text_to_search').val().trim()
    };
    $.ajax({
      data:  parameters,
      url:   url+'index.php/'+controller+'/'+method,
      type:  'post',    
      beforeSend: function () {
        $("#"+result_id).html('B&uacute;scando, espere por favor...');
        //$( "#"+modal_before_id ).trigger( "click" );
      },
      success:  function (response) {
        $("#"+result_id).html(response);
        //$( "#"+id_modal_success ).trigger( "click" );
      }
    });
  } else {
      alertify.error('<i class="fa fa-thumbs-down" aria-hidden="true"></i> La cadena a buscar debe contener al menos 3 caracteres.');
  }
}