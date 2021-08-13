<?php
ob_start();
require "header.php";
?>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Productos</h3>
            <div class="section-nav">
              <ul class="section-tab-nav tab-nav">
                <li class="active"><a href="index.php">Productos</a></li>
                <li><a href="bicicletas.php">Bicicletas</a></li>
                <li><a href="accesorios.php">Accessorios</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="listIndex"></div>
        </div>
      </div>
    </div>
  </div>
<?php
require "footer.php";
ob_end_flush();