<div class="row">
<div class="col-xs-12">
  <h5><strong><?=$student[0]->surname_and_name;?></strong></h5>
</div> 
</div>
<hr/>

<div class="row">
<div class="col-xs-12">
  
  <ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab"><i class="fa fa-graduation-cap" aria-hidden="true"></i> General</a></li>
    <li><a href="#requests" data-toggle="tab"><i class="fa fa-inbox" aria-hidden="true"></i> Solicitudes</a></li>
    <li><a href="#absents" data-toggle="tab"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Inasistencias</a></li>
    <li><a href="#evaluations" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Evaluaciones</a></li>
  </ul>
  <div class="tab-content"> <!--Contenedor de paneles -->
  
    <div class="tab-pane active" id="general">     
      <div class="row">
        <div class="col-xs-6">
          <ul class="list-group">
            <li class="list-group-item"><small><strong>DNI:</strong> <?=$student[0]->dni;?></small></li>
            <li class="list-group-item"><small><strong>Legajo:</strong> <?=$student[0]->file_number;?></small></li>
            <li class="list-group-item"><small><strong>Alumno:</strong> <?=$student[0]->surname_and_name;?></small></li>
          </ul>
        </div>
        <div class="col-xs-6">
          <ul class="list-group">
            <li class="list-group-item"><small><strong>Turno:</strong> <?=$student[0]->turn;?></small></li>
            <li class="list-group-item"><small><strong>Promoci&oacute;n:</strong> <?=($student[0]->promotion)?"SI":"NO";?></small></li>
            <li class="list-group-item"><small><strong>Inasistencias:</strong> <?=$student[0]->attendance;?></small></li>
          </ul>  
        </div>
      </div>  
    </div>

    <div class="tab-pane" id="requests">
      <div class="row"> 
        <div class="col-xs-12">
          <table class="table table-hover table table-condensed">
            <thead>
              <tr>
                <th><small>Fecha</small></th>
                <th><small>Solicitud</small></th>
                <th><small>Estado</small></th>                
              </tr>
            </thead>
            <tbody>
            <?php foreach ($student_requests as $key => $value) { ?>
              <tr>
                <?php $date = date_create($value->date); ?>
                <td><small><?=date_format($date, 'd/m/Y - h:i');?></small></td>
                <td><small><?=$value->type_request_detail;?></small></td>
                <td><i class="<?=$value->request_class; ?>" aria-hidden="true" data-toggle="tooltip" title="<?=$value->request_state_detail; ?>"></i></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="tab-pane" id="absents">
      <div class="row"> 
        <div class="col-xs-12">
          <table class="table table-hover table table-condensed">
            <thead>
              <tr>
                <th><small>Fecha</small></th>
                <th><small>Docente</small></th>
                <th><small>Estado</small></th>                
              </tr>
            </thead>
            <tbody>
            <?php foreach ($student_absents as $key => $value) { ?>
              <tr>
                <?php $date = date_create($value->date); ?>
                <td><small><?=date_format($date, 'd/m/Y');?></small></td>
                <td><small><?=$value->surname_and_name;?></small></td>
                <td><small><?=$value->type_attendance;?></small></td>                
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div> 
      </div>   
    </div>

    <div class="tab-pane" id="evaluations">
      <div class="row"> 
        <div class="col-xs-12">
          <table class="table table-hover table table-condensed">
            <thead>
              <tr>
                <th><small>Fecha y hora</small></th>
                <th><small>Instancia</small></th>
                <th><small>Estado</small></th>                
              </tr>
            </thead>
            <tbody>
            <?php foreach ($student_evaluations as $key => $value) { ?>
              <tr>
                <?php $date_hour = date_create($value->date_hour); ?>
                <td><small><?=date_format($date_hour, 'd/m/Y - h:i');?></small></td>
                <td><small><?=$value->evaluation_instance;?></small></td>
                <td><small><?=$value->mark;?></small></td>                
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>  
      </div>  
    </div>

  </div>  <!-- cierre del contenedor de paneles -->

</div>
</div>

<div class="row">
  <div class="col-xs-12">
    <a href="<?=base_url()?>student" type="button" class="btn btn-success" data-toggle="tooltip" title="Volver al listado"><i class="fa fa-hand-o-left" aria-hidden="true"></i> Volver al listado </a>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#start').attr('class', '');
    $('#administration').attr('class', 'active');
    $('#student').attr('class', 'active');
    $('#teacher').attr('class', '');
    $('#turn').attr('class', '');
    $('#menu').attr('class', '');
    $('#request').attr('class', '');
    $('#absent').attr('class', '');
    $('#evaluation').attr('class', '');    
    $('#user_teacher_menu').attr('class', '');
    $('#my_data').attr('class', '');
    $('#change_password').attr('class', '');
    $('#close_session').attr('class', '');
    $('#search').hide('slow');
  });
</script>