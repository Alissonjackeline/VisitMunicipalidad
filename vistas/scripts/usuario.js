var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  //mostramos los permisos
  $.post("../ajax/usuario.php?op=permisos&id=", function (r) {
    $("#permisos").html(r);
  });
}

//funcion limpiar
function limpiar() {
  $("#login").val("");
  $("#nombre").val("");
  $("#num_documento").val("");
  $("#telefono").val("");
  $("#email").val("");
  $("#clave").val("");
  $("#idusuario").val("");
}

//funcion mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

//cancelar form
function cancelarform() {
  limpiar();
  mostrarform(false);
}

//funcion listar
function listar() {
  tabla = $("#tbllistado")
    .dataTable({
      language: {
        lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No se encontraron resultados",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered: "(filtrado de un total de _MAX_ registros)",
        sSearch: "Buscar:",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        sProcessing: "Procesando...",
      },

      //para usar los botones

      responsive: "true",
      dom: "Bfrtip",
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="fas fa-file-excel"></i> ',
          titleAttr: "Exportar a Excel",
          className: "btn btn-success",
        },
        {
          extend: "pdfHtml5",
          text: '<i class="fas fa-file-pdf"></i> ',
          titleAttr: "Exportar a PDF",
          className: "btn btn-danger",
          orientation: "landscape",
          pageSize: "LEGAL",
        },
        {
          extend: "print",
          text: '<i class="fa fa-print"></i> ',
          titleAttr: "Imprimir",
          className: "btn btn-info",
        },
      ],
      ajax: {
        url: "../ajax/usuario.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
    })
    .DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e) {
  e.preventDefault(); //no se activara la accion predeterminada
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/usuario.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos);
      mostrarform(false);
      tabla.ajax.reload();
    },
  });

  limpiar();
}

function mostrar(idusuario) {
  $.post(
    "../ajax/usuario.php?op=mostrar",
    { idusuario: idusuario },
    function (data, status) {
      data = JSON.parse(data);
      mostrarform(true);

      $("#nombre").val(data.nombre);
      $("#num_documento").val(data.num_documento);
      $("#telefono").val(data.telefono);
      $("#email").val(data.email);
      $("#cargo").val(data.cargo);
      $("#cargo").selectpicker("refresh");
      $("#login").val(data.login);
      $("#clave").val(data.clave);
      $("#idusuario").val(data.idusuario);
    }
  );
  $.post("../ajax/usuario.php?op=permisos&id=" + idusuario, function (r) {
    $("#permisos").html(r);
  });
}

//funcion para desactivar
function desactivar(idusuario) {
  bootbox.confirm(
    "¿Esta seguro de desactivar este usuario?",
    function (result) {
      if (result) {
        $.post(
          "../ajax/usuario.php?op=desactivar",
          { idusuario: idusuario },
          function (e) {
            bootbox.alert(e);
            tabla.ajax.reload();
          }
        );
      }
    }
  );
}

function activar(idusuario) {
  bootbox.confirm("¿Esta seguro de activar este usuario?", function (result) {
    if (result) {
      $.post(
        "../ajax/usuario.php?op=activar",
        { idusuario: idusuario },
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

init();
