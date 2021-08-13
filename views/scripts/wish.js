const wishList = () => {
  let idusuario = $("#idusuario").val();
  $.post(
    `../ajax/deseos.php?op=listarWish`,
    {idusuario: idusuario},
    (data) => {
      console.log(data);
      data = JSON.parse(data);
      $("#listWish").html(data);
    }
  );
};

wishList();