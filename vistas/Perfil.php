<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{


require 'header.php';

if ($_SESSION['perfil']==1) {

 ?>
<!--inicio de contenido-->
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header mt-5">
            <div class="row">
                <div class="col">
                    <h3 class="page-title"><i class="fas fa-user-edit"></i> Perfil</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header text-white">
                                    <i class="fas fa-id-card"></i> Información Personal
                                </div>
                                <div class="card-body">
                                    <div class="row ">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3 text-primary">
                                            Usuario
                                        </p>
                                        <p class="col-sm-9">
                                            <?= $_SESSION['login'];?> </p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3 text-primary">
                                            Nombres
                                        </p>
                                        <p class="col-sm-9"><?= $_SESSION['nombre'];?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3 text-primary">
                                            Dni
                                        </p>
                                        <p class="col-sm-9"><?= $_SESSION['num_documento'];?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3 text-primary">
                                            Telofono
                                        </p>
                                        <p class="col-sm-9"><?= $_SESSION['telefono'];?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3 text-primary">
                                            Email
                                        </p>
                                        <p class="col-sm-9">j<?= $_SESSION['email'];?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3 text-primary">
                                            Cargo
                                        </p>
                                        <p class="col-sm-9"><?= $_SESSION['cargo'];?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header text-white">
                                    <i class="fas fa-edit"></i> Editar Contraseña
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            <form action="" method="post" name="" id="">
                                                <div class=" form-group">
                                                    <label>Contraseña Actual</label>
                                                    <input type="password" name="actual" id="actual"
                                                        placeholder="Clave Actual" required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nueva Contraseña</label>
                                                    <input type="password" name="nueva" id="nueva"
                                                        placeholder="Nueva Clave" required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirmar Contraseña</label>
                                                    <input type="password" name="confirmar" id="confirmar"
                                                        placeholder="Confirmar clave" required class="form-control">
                                                </div>
                                                <div class="alertChangePass" style="display:none;">
                                                </div>
                                                <button class="btn btn-primary btnChangePass" type="submit">Cambiar
                                                    Contraseña <i class="fas fa-key"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="scripts/login.js"></script>
<?php 
}

ob_end_flush();
  ?>