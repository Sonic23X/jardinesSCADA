  <section class="content-auto">
    <div class="container-fluid">
      <?php include('time.php') ?>
      <div class="row clearfix">
        <div id="mapcontent" class="col-xs-12 col-sm-12 col-md-7 col-lg-8 position-relative">
          <div class="card bg-dark mapimg">
            <img id="plano" class="imgplano" src="<?= base_url() ?>resources/images/plano_jardines_1xx.png">
            <div class="items"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
          <div class="card">
            <div class="header">
              <h2 style='text-align:center;'>
                Historial de sensores
                <i class="material-icons col-dark btn-play">play_circle_filled</i>
              </h2>
            </div>
            <div class="body">
              <div id="tablaSensores" class="table-responsive table-sensor"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>

  <!-- funcionamiento del historial -->
  <script type="text/javascript" src="<?= base_url() ?>resources/js/history.js">
  </script>

  <script type="text/javascript">
    $(document).ready(() =>
    {
      $('#plano').click(() => $('#mapa').modal());

      //responsibilidad
      let planoHeight = $('#plano').innerHeight();
      let tableH = planoHeight - 100;
      $('#tablaSensores').attr('style', 'height: ' + tableH + 'px');
    });
  </script>
