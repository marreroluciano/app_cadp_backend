<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap/css/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>css/main.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>css/font-awesome.min.css" type="text/css"/>
  
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