(function () {
  let contador = 0,
    button = document.getElementById("submitB");
  console.log(contador);
  button.addEventListener('click',
    function () {
      contador++;
    })
  const pedidoBuyStack = () => {
    let codigo_postal = $("#codigo_postal").val();
    let direccion = $("#direccion").val();
    let apellidos = $("#apellidos").val();
    let telefono = $("#telefono").val();
    let nombre = $("#nombre").val();
    let ciudad = $("#ciudad").val();
    let pais = $("#pais").val();
    let email = $("#email").val();
    let clave = $("#clave").val();
    let SID = $("#SID").val();
    if (clave) {
      $.post(
        "../ajax/usuario.php?op=guardaryeditar",
        {
          codigo_postal: codigo_postal,
          imagen: "default.jpg",
          apellidos: apellidos,
          direccion: direccion,
          telefono: telefono,
          cargo: "cliente",
          ciudad: ciudad,
          nombre: nombre,
          login: nombre,
          email: email,
          clave: clave,
          pais: pais,
        },
        (data) => {
          console.log(data);
          bootbox.alert(data);
        }
      );
      $.post(
        "../ajax/usuario.php?op=verificar",
        {clavea: clave, logina: nombre},
        (data) => {
          console.log(data);
          bootbox.alert(data);
        }
      );
    }
    $.post(
      "../ajax/venta.php?op=newVenta",
      {clavetransaccion: SID, condicion: "pendiente"},
      (data) => {
        data = JSON.parse(data);
        data
          ? bootbox.alert("Se pudo crear su pedido")
          : bootbox.alert("No se pudo crear su pedido");
      }
    );
  };

  $("#frmAcceso").on("submit", (e) => {
    e.preventDefault();
    if (contador < 2) {
      pedidoBuyStack();
    }
    setTimeout(() => {
      $(location).attr("href", "pago.php");
    }, 1000);
  });
})();
