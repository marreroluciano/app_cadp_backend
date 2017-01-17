<?php
  $attributes = array('class' => 'form-horizontal', 'id'=>'form');  
  echo form_open('sign_in/sign_in', $attributes);
?>
<div class="row">
  <div class="col-xs-4">

  <div class="form-group form-group-sm">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8"><h3>Ingrese sus datos</h3></div>
  </div>

  <div class="form-group form-group-sm">
    <label for="user_name" class="col-sm-4 control-label">Usuario</label>
    <div class="col-sm-8">
      <input type="user" class="form-control" id="user_name" placeholder="Nombre del Usuario" name="user_name" required value="" maxlength="20">
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label for="user_pass" class="col-sm-4 control-label">Contrase&ntilde;a</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="user_pass" placeholder="Contraseña del Usuario" name="user_pass" required value="" maxlength="15">
    </div>
  </div>  

  <div class="form-group form-group-sm">
    <label for="clave" class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
      <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Ingresar al Sistema" onclick="verify_sign_in()"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>
    </div>
  </div>

  </div>  
  
  <div class="col-xs-2"></div> 

  <div class="col-xs-6">
    <h3><?=SYSTEM_TITLE;?></h3>
    <span></span>
  </div>

</div>
<?=form_close(); ?>

<div id="alerts"> <?php if (isset($alert)) { echo $alert; }?> </div>