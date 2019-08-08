<section class="content">
    <div class="container-fluid">
        <?php include('widgets.php') ?>
        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix mx-2">
                          <div class="col-10">
                            <h2>Datos de los residentes</h2>
                          </div>
                          <div class="col-2">
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#newHab"><i class="material-icons">person_add</i> Agregar residente</button>
                          </div>
                        </div>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Residente(s)</th>
                                            <th>Correo electrónico</th>
                                            <th>Dirección</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Familia Hernández</td>
                                            <td>rodralbs52@gmail.com</td>
                                            <td>#47 sec.2 mz.A</td>
                                        </tr>
                                        <tr>
                                            <td>Lucía Moreno</td>
                                            <td>luciom52@gmail.com</td>
                                            <td>#144 sec.22 mz.B</td>
                                        </tr>
                                        <tr>
                                            <td>Laura Vazquez</td>
                                            <td>rodralbs52@gmail.com</td>
                                            <td>#17 sec.13 mz.C</td>
                                        </tr>
                                        <tr>
                                            <td>Familia Hernández</td>
                                            <td>rodralbs52@gmail.com</td>
                                            <td>#47 sec.2 mz.A</td>
                                        </tr>
                                        <tr>
                                            <td>Lucía Moreno</td>
                                            <td>luciom52@gmail.com</td>
                                            <td>#144 sec.22 mz.B</td>
                                        </tr>
                                        <tr>
                                            <td>Laura Vazquez</td>
                                            <td>rodralbs52@gmail.com</td>
                                            <td>#17 sec.13 mz.C</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
        $("#btncol ").on("click", function(){
            $(".hidecol").toggle();
            $('.tabcon td:nth-child(2)').toggle();
            });
</script>
<script type="text/javascript" src="<?= base_url() ?>resources/js/table_life.js"></script>
