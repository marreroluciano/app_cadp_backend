<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  

  <!-- JS -->
  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>js/functions.js"></script>
  <script src="<?php echo base_url()?>js/alertify.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>js/jquery.blueimp-gallery.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>css/alertify.min.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>css/semantic.min.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>css/default.min.css" type="text/css"/>  
  <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css" type="text/css"/>  
  <link rel="stylesheet" href="<?php echo base_url()?>css/main.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>css/font-awesome.min.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>css/blueimp-gallery.min.css" type="text/css"/>

  <script type="text/javascript">  
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      alertify.defaults.theme.input = "form-control";      
      alertify.defaults.glossary.ok = '<span class="glyphicon glyphicon-ok"></span> Aceptar';
      alertify.defaults.glossary.cancel = '<span class="glyphicon glyphicon-remove"></span> Cancelar';      
    });    
  </script>
  
  <title>CADP - Administraci&oacute;n</title>
</head>
<body>
  <div class="container">      
    <div class="row">
      <div class="col-xs-12">
        <div class="page-header well well-sm">
           <a href="" target="_blank" title=""><img src="<?php echo base_url()?>images/logo-header.png" class="img-responsive img-rounded" alt="Logo"></a>          
        </div>    
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
      <?php if (isset($user_menu)) { ?>  
      <?=$user_menu;?>
      <?php } ?>
      </div>
    </div>
    <?=$content;?>
  </div>  
  <hr/>
</body>
</html>