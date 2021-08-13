let table;

const init = () => {
  mostrarform(false);
  listarAdmin();
  $("#formulario").on("submit", (e) => {
    guardaryeditar(e);
  });
  $.post("../ajax/articulo.php?op=selectCategoria", (r) => {
    $("#idcategoria").html(r);
    $("#idcategoria").selectpicker("refresh");
  });
  $("#imagenmuestra").hide();
  $("#main-body").css("padding", "0");
};

const limpiar = () => {
  $("#codigo").val("");
  $("#nombre").val("");
  $("#descripcion").val("");
  $("#stock").val("");
  $("#imagenmuestra").attr("src", "");
  $("#imagenactual").val("");
  $("#precio").val("");
  $("#print").hide();
  $("#main-body").css("padding", "0");
};

const mostrarform = (flag) => {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("btnagregar").hide();
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("btnagregar").show();
  }
};

const cancelarform = () => {
  limpiar();
  mostrarform(false);
};

const listarAticulos = async () => {
  console.log($("#list").html());
  if ($("#list").html() === '') {
    $("#list").html(
      '<div class="d-block" align=center>' +
      '<img src="../public/css/ajax-loader.gif" class="img-responsive" width="50%" height="auto" style="margin: auto;">' +
      '</div>');
  }
  let change = await listar();
  if (change) {
    $("#list").html('');
    $("#list").html(change.data);
  }
}

const listar = () => {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "../ajax/articulo.php?op=listar",
      contentType: false,
      processData: false,
      success: (data) => {
        console.log(data);
        data = JSON.parse(data);
        console.log(data);
        let articulos = "";
        for (let i = 0; i < data.length; ++i) {
          let tmp = data[i];
          if (tmp.search(valueName) !== -1) {
            articulos += data[i];
          }
        }
        resolve({
          data: articulos
        })
      },
    });
  })
};

const listarAdmin = () => {
  table = $("#tbllistado")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../ajax/articulo.php?op=listarAll",
        type: "get",
        dataType: "json",
        error: (e) => {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      iDisplayLength: 10,
      order: [[0, "desc"]],
    })
    .DataTable();
};

const guardaryeditar = (e) => {
  e.preventDefault();
  $("#btnGuardar").prop("disabled", true);
  let formData = new FormData($("#formulario")[0]);
  $.ajax({
    url: "../ajax/articulo.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: (datos) => {
      bootbox.alert(datos);
      mostrarform(false);
      table.ajax.reload();
    },
  });
  limpiar();
  $("#main-body").css("padding", "0");
};

const mostrar = (idarticulo) => {
  $.post(
    "../ajax/articulo.php?op=mostrar",
    { idarticulo: idarticulo },
    (data) => {
      data = JSON.parse(data);
      mostrarform(true);
      $("#idcategoria").val(data.idcategoria);
      $("#idcategoria").selectpicker("refresh");
      $("#codigo").val(data.codigo);
      $("#nombre").val(data.nombre);
      $("#stock").val(data.stock);
      $("#descripcion").val(data.descripcion);
      $("#imagenmuestra").show();
      $("#imagenmuestra").attr("src", "../img/articulos/" + data.imagen);
      $("#imagenmuestra").val(data.imagen);
      $("#idarticulo").val(data.idarticulo);
      $("#precio").val(data.precio);
      generarbarcode();
    }
  );
  $("#main-body").css("padding", "0");
};

const activar = (idarticulo) => {
  bootbox.confirm("¿Esta seguro de activar el articulo?", (result) => {
    if (result) {
      $.post(
        "../ajax/articulo.php?op=activar",
        { idarticulo: idarticulo },
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        }
      );
    }
  });
  $("#main-body").css("padding", "0");
};

const desactivar = (idarticulo) => {
  bootbox.confirm("¿Esta seguro de desactivar el articulo?", (result) => {
    if (result) {
      $.post(
        "../ajax/articulo.php?op=desactivar",
        { idarticulo: idarticulo },
        (e) => {
          bootbox.alert(e);
          table.ajax.reload();
        }
      );
    }
  });
  $("#main-body").css("padding", "0");
};

const generarbarcode = () => {
  let codigo = $("#codigo").val();
  JsBarcode("#barcode", codigo);
  $("#print").show();
};

const imprimir = () => {
  $("#print").printArea();
  $("#idarticulo").val("");
};

valueName !== "articulo" ? listarAticulos() : init();
