var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  //cargamos los items al select area
  $.post("../ajax/visita.php?op=selectArea", function (r) {
    $("#idarea").html(r);
    $("#idarea").selectpicker("refresh");
  });
}

//funcion limpiar
function limpiar() {
  $("#fecha").val("");
  $("#visitante").val("");
  $("#dni").val("");
  $("#motivo").val("");
  $("#hora_entrada").val();
  $("#hora_salida").val();
  $("#idarea").selectpicker("refresh");
  $("#idfuncionario").selectpicker("refresh");
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
      dom: "Bfrtilp",
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
        },
        {
          extend: "print",
          text: '<i class="fa fa-print"></i> ',
          titleAttr: "Imprimir",
          className: "btn btn-info",
        },
      ],
      ajax: {
        url: "../ajax/visita.php?op=listar",
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
    url: "../ajax/visita.php?op=guardaryeditar",
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

function mostrar(idvisita) {
  $.post(
    "../ajax/visita.php?op=mostrar",
    { idvisita: idvisita },
    function (data, status) {
      data = JSON.parse(data);
      mostrarform(true);
      $("#fecha").val(data.fecha);
      $("#visitante").val(data.visitante);
      $("#dni").val(data.dni);
      $("#motivo").val(data.motivo);
      $("#hora_entrada").val(data.hora_entrada);
      $("#hora_salida").val(data.hora_salida);
      $("#idarea").val(data.idarea);
      $("#idarea").selectpicker("refresh");
      $("#idfuncionario").val(data.idfuncionario);
      $("#idfuncionario").selectpickera("refresh");
    }
  );
}

init();
