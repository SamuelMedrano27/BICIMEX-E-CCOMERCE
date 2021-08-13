let tablePerson;
const personList = () => {
  let idusuario = $("#idusuario").val();
  tablePerson = $("#tbllistado")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: `../ajax/venta.php?op=listarPerson&id=${idusuario}`,
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
}

personList();