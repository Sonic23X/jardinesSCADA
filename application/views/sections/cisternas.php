<section class="content">
  <div class="container-fluid">
    <?php include('widgets.php') ?>
    <div clas<div class="row clearfix">
      <!--sisterna pluvial A-->
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-11 text-center">
                <h2>Capacidad actual de cisterna pluvial</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div id="water" class="dashboard-flot-chart"></div>
          </div>
        </div>
      </div>

      <!--Contenedor Residual-->
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-12 text-center">
                <h2>Capacidad actual de contenedor Residual</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div id="trash" class="dashboard-flot-chart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src="<?= base_url() ?>resources/js/containers.js"></script>
