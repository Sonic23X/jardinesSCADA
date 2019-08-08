<!-- Top Bar -->
<nav class="navbar navbar-expand-lg bg-white">
  <div class="container-fluid d-flex justify-content-between">
    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-1">
      <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url()?>resources/images/logo.png" alt="Mutatio" width="50" height="43" />
      </a>
    </div>
    <div id="titulonav" class="col-md-9 col-lg-10">
      <h3 class="text-dark text-uppercase text-center"><?php echo $valor; ?></h3>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-1 col-lg-1 d-flex justify-content-between">
      <a style="display: none;" href="" data-toggle="modal" data-backdrop="static"
          data-keyboard="false" data-target="#alerta"><i class="fas fa-exclamation"></i></a>
      <a style="display: none;" href="javascript:void(0);" class="navbar-toggle collapsed"
          data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
      <a style="display: none;" href="javascript:void(0);" class="bars"></a>
      <a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
         aria-controls="collapseExample" onClick="showmenu(overlay)">
        <i class="material-icons text-dark float-right">menu</i>
      </a>
    </div>
  </div>
</nav>
<!-- #Top Bar -->
