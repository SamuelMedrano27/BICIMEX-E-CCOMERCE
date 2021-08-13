<?php
require "headerUser.php";
?>
<div class="container emp-profile">
  <div class="row">
    <div class="col-md-4">
      <div class="profile-img">
        <img
          src="../img/usuarios/<?php echo $_SESSION['imagen'] ?>"
          alt="imagen del usuario"
          class="img-responsive"
        />
        <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']?>">
      </div>
    </div>
    <form action="">
      <div class="col-md-8">
        <div class="title-primary">
          <h5 style="color: black; font-size: 30px;">
            <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'] ?>
          </h5>
          <p class="proile-rating" style="color: black; font-size: 20px;">Posición: <span>Cliente</span>
          </p>
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>ID Venta</th>
                <th>Clave Transaccion</th>
                <th>Fecha y Hora</th>
                <th>Total Compra</th>
                <th>Condicion</th>
              </thead>
              <tbody></tbody>
              <tfoot>
                <th>ID Venta</th>
                <th>Clave Transaccion</th>
                <th>Fecha y Hora</th>
                <th>Total Compra</th>
                <th>Condicion</th>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="panel-body table-reponsive" style="height: 160px;" id="listadoRegistros">
  </div>
</div>
<?php
require "footerAdmin.php";
?>
<script type="text/javascript" src="./scripts/person.js"></script>
