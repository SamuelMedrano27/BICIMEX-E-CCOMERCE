<script src="//www.paypalobjects.com/api/checkout.js"></script>
<?php

require_once "../api/Carrito.php";
require_once "../config/global.php";
require_once "../models/Venta.php";
require_once "../models/Detalle_Venta.php";
require_once "../models/Car.php";

require "header.php";

$car = new Car();
$venta = new Venta();
$detalleVenta = new Detalle_Venta();

$rspta = $venta->getRecentId();
$reg = $rspta->fetch_object();

$data = [
  "idventa" => $reg->idventa,
  "fecha_hora" => $reg->fecha_hora,
  "idusuario" => $reg->idusuario,
  "clavetransaccion" => $reg->clavetransaccion,
  "total_compra" => $reg->total_compra
];

$SID = $data['clavetransaccion'];
$idVenta = $data['idventa'];
$total_compra = $data['total_compra'];
$dv = $detalleVenta->listarIdVenta($idVenta);
while ($tmp = $dv->fetch_object()) {
  $rspta = $car->insertar($data['idusuario'], $tmp->idarticulo, $tmp->cantidad, 'pendiente');
}
?>
<div class="container">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="jumbotron text-center">
            <h1 class="display-4">¡ Paso Final !</h1>
            <hr class="my-4">
            <p class="lead"> Estas a punto de pagar la cantidad de:</p>
            <h4 id="total-pago"
                style="font-size: 28px; color: #000"><?php echo "S/. " . $total_compra . " o $ " . number_format($total_compra * 0.27, 2); ?></h4>
            <div id="paypal-button-container"></div>
            <p>
              Los productos llegaran a su destino dependiendo de los datos ingresados.
              <br/>
              <strong>(Para aclaraciones: bicimex20@gmail.com)</strong>
            </p>
          </div>
        </div>
      </div>
  </section>
</div>
<?php
require "footer.php";
?>
<script type="text/javascript">
  paypal.Button.render({

    env: 'sandbox',  // sandbox | production
    locale: 'es_PA',

    style: {
      size: 'medium',
      color: 'gold',
      shape: 'pill',
      label: 'pay',
      layout: 'horizontal',
      tagline: false,
      height: 50
    },

    client: {
      sandbox: 'Af-kCO0Z2xarPwT_mLY2r562VimqOvhpErOcc7gSlUSg6AdeRjVfFcyoyRvXtz1fo51nJNTOw3Lyllo2',
      production: 'AX5gbwH0J2_DO5rojSVIOU6LXZVCjiOv-TOcJCdPFM-AwoitZEcN2PW7P1BzgealWIOs2d-WTVVKj_t-'
    },

    payment: function (data, actions) {
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: {
                total: <?php echo str_replace(",", "", number_format($total_compra * 0.27, 2)); ?>,
                currency: 'USD'
              },
              description: "Compra de productos a BICIMEX por: <?php echo number_format($total_compra * 0.27, 2);?>",
              custom: "<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta, COD, KEY); ?>"
            }
          ]
        }
      })
    },

    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
        setTimeout(() => {
          window.location = 'verificador.php?paymentToken=' + data.paymentToken + "&paymentID=" + data.paymentID;
        }, 1000);
      })
    }
  }, '#paypal-button-container');
</script>
<?php
ob_end_flush();