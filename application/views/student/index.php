<div class="row">
<div class="col-xs-12">
  <h5><strong>LISTADO DE ALUMNOS DEL CURSO</strong></h5>
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
      <th><small>DNI</small></th>
      <th><small>Legajo</small></th>      
      <th><small>Alumno</small></th>
      <th><small>Turno</small></th>
      <th><small>Promoci&oacute;n</small></th>
      <th><small>Inasistencias</small></th>
      <th><small>Acci&oacute;n</small></th>      
    </tr>
  </thead>
  <tbody id="result_list">
  <?php foreach ($students as $key => $value) { ?>
    <tr>
      <td><small><?=$value->dni;?></small></td>
      <td><small><?=$value->file_number;?></small></td>
      <td><small><?=$value->surname_and_name;?></small></td>
      <td><small><?=$value->turn;?></small></td>
      <td><small><?=($value->promotion)?"SI":"NO";?></small></td>
      <td><small><?=$value->attendance;?></small></td>
      <td><small>
        <a href="<?=base_url();?>student/view/<?=$value->id; ?>"><button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="M&aacute;s informaci&oacute;n"><i class="fa fa-info-circle" aria-hidden="true"></i></button></a>
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
    $('#search').show('slow');
  });
</script>