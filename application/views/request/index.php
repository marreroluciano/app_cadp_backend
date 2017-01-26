<div class="row">
<div class="col-xs-12">
  <h5><strong>LISTADO DE SOLICITUDES</strong></h5>
</div> 
</div>
<hr/>

<div class="row">
<div class="col-xs-12" id="pagination_top">
  <?=$pagination; ?>
</div>
</div>

<div class="row"> 
<div class="col-xs-12">

  <table class="table table-hover table table-condensed">
  <thead>
    <tr>
      <th><small>Fecha y hora</small></th>
      <th><small>Alumno</small></th>
      <th><small>Turno</small></th>
      <th><small>Tipo de solicitud</small></th>
      <th><small>Estado</small></th>      
      <th><small>Acci&oacute;n</small></th>
    </tr>
  </thead>
  <tbody id="result_list">
  <?php foreach ($requests as $key => $value) { ?>
    <tr>
      <?php $date = date_create($value->date); ?>
      <td><small><?=date_format($date, 'd/m/Y - h:i');?></small></td>
      <td><small><?=$value->surname_and_name;?></small></td>
      <td><small><?=$value->turn;?></small></td>
      <td><small><?=$value->type_request;?></small></td>
      <td><i class="<?=$value->request_state_class; ?>" aria-hidden="true" data-toggle="tooltip" title="<?=$value->state; ?>"></i></td>      
      <td><small>
        <a href="<?=base_url();?>request/view/<?=$value->id; ?>"><button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="M&aacute;s informaci&oacute;n"><i class="fa fa-info-circle" aria-hidden="true"></i></button></a>
      </small></td>
    </tr>  
  <?php } /* end del foreach */ ?> 
  </tbody>
  </table>

</div>
</div>

<div class="row">
<div class="col-xs-12" id="pagination_down">
  <?=$pagination; ?>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#start').attr('class', '');
    $('#administration').attr('class', '');
    $('#student').attr('class', '');
    $('#teacher').attr('class', '');
    $('#turn').attr('class', '');
    $('#menu').attr('class', 'active');
    $('#request').attr('class', 'active');
    $('#absent').attr('class', '');
    $('#evaluation').attr('class', '');    
    $('#user_teacher_menu').attr('class', '');
    $('#my_data').attr('class', '');
    $('#change_password').attr('class', '');
    $('#close_session').attr('class', '');
    $('#search').show('slow');
  });
</script>