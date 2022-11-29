<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{


require 'header.php';

if ($_SESSION['oficinas']==1) {

 ?>
<!--inicio de contenido-->
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">
                            <i class="fas fa-street-view"></i> Area
                        </h4>
                        <a class="btn btn-primary float-right veiwbutton" onclick="mostrarform(true)" id="btnagregar"><i
                                class="fas fa-plus-circle"></i>
                            Agregar area</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Contenido1-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" id="listadoregistros">
                            <table id="tbllistado" class="table table table-hover">
                                <thead>
                                    <th>Area</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </thead>
                            </table>
                        </div>
                        <!-- formulario de edit y agregar -->
                        <div class="row" id="formularioregistros">
                            <div class="col-sm-12">
                                <form action="" name="formulario" id="formulario" method="POST">
                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Nombre del area</label>
                                                <input class="form-control" type="hidden" name="idarea" id="idarea">
                                                <input class="form-control" type="text" name="nomarea" id="nomarea"
                                                    autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm""><i
                                                class=" fas fa-save "></i> Guardar</button>
                                        <button class=" btn btn-danger btn-sm"" onclick="cancelarform()"
                                            type="button"><i class="fas fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
    <script src="scripts/area.js"></script>
    <?php 
}

ob_end_flush();
  ?>