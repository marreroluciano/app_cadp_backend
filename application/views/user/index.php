<div class="row">
<div class="col-lg-12"><h3 class="page-header"> <?=$teacher[0]->surname_and_name; ?> <small>(<?=$teacher[0]->detail;?>)</small> </h3></div>
</div>

<div class="row">

<div class="col-lg-3 col-md-6">
  <div class="panel panel-yellow">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3"><i class="fa fa-graduation-cap fa-5x"></i></div>
        <div class="col-xs-9 text-right">
          <div class="huge"><small></small></div>
          <div>Alumnos</div>
        </div>
      </div>
    </div>   

      <a href="<?=base_url();?>student/" data-toggle="tooltip" title="Listado de alumnos">
      <div class="panel-footer">
        <span class="pull-left">Listado de alumnos</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
      </div>
      </a>
   
  </div>
  </div>

  <div class="col-lg-3 col-md-6">
  <div class="panel panel-green-water">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3"><i class="fa fa-users fa-5x"></i></div>
        <div class="col-xs-9 text-right">
          <div class="huge"></div>
          <div>Docentes</div>
        </div>
      </div>
    </div>
    
    <a href="" data-toggle="tooltip" title="Listado de docentes">
    <div class="panel-footer">
      <span class="pull-left">Listado de docentes</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
    </a>
    
  </div>
  </div>

  <div class="col-lg-3 col-md-6">
  <div class="panel panel-red">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3"><i class="fa fa-clock-o fa-5x"></i></div>
        <div class="col-xs-9 text-right">
          <div class="huge"></div>
          <div>Turnos</div>
        </div>
      </div>
    </div>
    
    <a href="" data-toggle="tooltip" title="Listado de turnos">
    <div class="panel-footer">
      <span class="pull-left">Listado de turnos</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
    </a>
    
  </div>
  </div>

  <div class="col-lg-3 col-md-6">
  <div class="panel panel-green-water">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3"><i class="fa fa-inbox fa-5x"></i></div>
        <div class="col-xs-9 text-right">
          <div class="huge"></div>
          <div>Solicitudes</div>
        </div>
      </div>
    </div>    
    <a href="<?=base_url();?>request/" data-toggle="tooltip" title="Solicitudes">
    <div class="panel-footer">
      <span class="pull-left">Solicitudes</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
    </a>    
  </div>
  </div>

  <div class="col-lg-3 col-md-6">
  <div class="panel panel-red">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3"><i class="fa fa-calendar-times-o fa-5x"></i></div>
        <div class="col-xs-9 text-right">
          <div class="huge"></div>
          <div>Inasistencias</div>
        </div>
      </div>
    </div>    
    <a href="" data-toggle="tooltip" title="Inasistencias">
    <div class="panel-footer">
      <span class="pull-left">Inasistencias</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
    </a>    
  </div>
  </div>

  <div class="col-lg-3 col-md-6">
  <div class="panel panel-green">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-3"><i class="fa fa-pencil-square-o fa-5x"></i></div>
        <div class="col-xs-9 text-right">
          <div class="huge"></div>
          <div>Evaluaciones</div>
        </div>
      </div>
    </div>
    
    <a href="" data-toggle="tooltip" title="Mis evaluaciones">
    <div class="panel-footer">
      <span class="pull-left">Evaluaciones</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
    </a>
    
  </div>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#start').attr('class', 'active');
    $('#administration').attr('class', '');
    $('#student').attr('class', '');
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