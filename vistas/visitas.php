<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{


require 'header.php';

if ($_SESSION['visita']==1) {

 ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5"> Agregar Visita</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" id="">
                <form action="" name="formulario" id="formulario" method="POST">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Fecha</label>
                                <input class="form-control" type="date" name="fecha" id="fecha" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Visitante</label>
                                <input class="form-control" type="hidden" name="idvisita" id="idvisita">
                                <input class="form-control" type="text" name="visitante" id="visitante"
                                    autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Dni</label>
                                <input class="form-control" type="number" name="dni" id="dni" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Area a ingresar</label>
                                <select name="idarea" id="idarea" class="form-control selectpicker"
                                    data-Live-search="true" required></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Funcionario</label>
                                <select name="idfuncionario" id="idfuncionario" class="form-control selectpicker"
                                    data-Live-search="true" required></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Motivo</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Hora de ingreso</label>
                                <input class="form-control" type="time" name="hora_entrada" id="hora_entrada"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Hora de salida</label>
                                <input class="form-control" type="time" name="hora_salida" id="hora_salida" required />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i
                    class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </div>
    </div>
</div>



<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
<script src="scripts/visita.js"></script>
<?php 
}

ob_end_flush();
  ?>