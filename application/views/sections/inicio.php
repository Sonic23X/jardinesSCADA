<section class="content">
  <div class="container-fluid">
    <?php include('widgets.php') ?>
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card">
          <div class="header">
            <div class="row clearfix mx-2">
              <div class="col-12 text-center">
                <h2>Capacidad actual de contenedores</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div id="bar" class="dashboard-flot-chart"></div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="card">
          <div class="header">
            <div class="row clearfix mx-2">
              <div class="col-12">
                <h2 class="text-center">Estado de los sensores de movimiento</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div class="table-responsive table-resume"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- resumen de los sensores de movimiento -->
<script type="text/javascript" src="<?= base_url() ?>resources/js/inicio.js"></script>
