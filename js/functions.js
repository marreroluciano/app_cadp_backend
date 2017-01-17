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