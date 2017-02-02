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
      <td id="state_class_<?=$value->id;?>"><i class="<?=$value->request_state_class; ?>" aria-hidden="true" data-toggle="tooltip" title="<?=$value->state; ?>"></i></td>      
      <td><small>        
        <button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="M&aacute;s informaci&oacute;n" onclick="view('<?=base_url();?>', 'request', 'view', <?=$value->id;?>, 'view', 'modal_view')"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
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


<div id="blueimp-gallery" class="blueimp-gallery">
<div class="slides"></div>
  <div class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
      </div>
    </div>
  </div>
</div>


<!-- Modal para la vista de una solicitud -->
<a data-toggle="modal" href="#running_operation" id="modal_view" style="display: none"></a>
<div class="modal fade" id="running_operation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close_modal_running_operation">&times;</button>
        <h5 class="modal-title"><strong>Datos de la solicitud</strong></h5>
      </div>
      <div class="modal-body" id="view">        
        
      </div>        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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



