<?php 
if (strlen(session_id())<1) 
  session_start();

  ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Sistema de control de visitas MDEA</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Assets/img/escudo_el_alto.png" />
    <!---->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="../Assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../Assets/css/feathericon.min.css" />
    <link rel="stylesheet" href="../Assets/css/style2.css" />
    <link rel="stylesheet" href="../Assets/css/main.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="../datatables/Buttons-2.3.3/css/buttons.bootstrap4.min.css" />
</head>

<body>
    <div class="main-wrapper">
        <!--Inicio de header-->
        <div class="header">
            <div class="header-left">
                <a href="../vistas/escritorio.php" class="logo">
                    <img src="../Assets/img/escudo_el_alto.png" alt="logo" width="50" height="70" />
                    <span class="logoclass">VisitMuni</span>
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="../Assets/img/escudo_el_alto.png" alt="Logo" width="30" height="30" />
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../Assets/img/vigilante.png" width="31"
                                alt="" /></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="user-text">
                                <h6><?php echo $_SESSION['login']; ?></h6>
                                <p class="text-muted mb-0"><?php echo $_SESSION['nombre']; ?></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="../ajax/usuario.php?op=salir">Cerrar sesion <i
                                class="fas fa-sign-out-alt"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!--Fin de header-->

        <!--Inicio de sidebar-->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <?php
                        if($_SESSION['escritorio']==1) {
                            echo ' <li class="nav-item">
                            <a href="../vistas/escritorio.php"><i class="fas fa-fw fa-table"></i>
                                <span>Inicio</span></a>
                            </li>';
                        }
                        ?>
                        <li class="list-divider"></li>

                        <?php
                        if($_SESSION['visita']==1) {
                            echo '<li>
                            <a href="../vistas/visitas.php"><i class="fa fa-eye"></i><span> Agregar Visita
                                </span>
                            </a>
                        </li>';
                        }
                        ?>

                        <?php
                        if($_SESSION['oficinas']==1) {
                            echo '<li class="submenu">
                            <a href="#"><i class="nav-icon fas fa-landmark"></i>
                                <span> Oficinas </span> <span class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none">
                                <li>
                                    <a href="../vistas/area.php"><i class="fas fa-street-view"></i> Àreas</a>
                                </li>
                                <li>
                                    <a href="../vistas/funcionario.php"><i class="fas fa-user-tag"></i>Funcionarios</a>
                                </li>
                            </ul>
                        </li>';
                        }
                        ?>

                        <?php 
                        if ($_SESSION['accesos']==1) {
                        echo '<li class="submenu">
                            <a href="#"><i class="fas fa-folder"></i>
                                <span> Accesos </span> <span class="menu-arrow"></span></a>
                            <ul class="submenu_class" style="display: none">
                                <li>
                                    <a href="../vistas/Usuario.php"><i class="fas fa-user-friends"></i> Usuarios</a>
                                </li>
                                <li>
                                    <a href="../vistas/permiso.php"><i class="fas fa-universal-access"></i>Permisos</a>
                                </li>
                            </ul>
                        </li>';
                        }
                        ?>

                        <?php 
                        if ($_SESSION['perfil']==1) {
                        echo '<li>
                            <a href="../vistas/Perfil.php"><i class="fas fa-user-edit"></i>
                                <span>Perfil</span></a>
                        </li>';
                         }
                         ?>

                    </ul>
                </div>
            </div>
        </div>
        <!--fin de sidebar-->