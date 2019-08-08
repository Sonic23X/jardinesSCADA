<section class="content">
    <div class="container-fluid">
        <?php include('widgets.php') ?>
        <div class="row clearfix">
                <iframe id="wifi" name="wifi" frameborder="0" width="100%" height="1050" scrolling="no" 
                 src="http://192.168.1.1/ui/1.0.99.183697/dynamic/login.html">
                    
                </iframe>
        </div>
	</div>
</section>
<script>
        $("#btncol ").on("click", function(){
        	var btn = document.getElementById('btncol');
            $(".hidecol").toggle();
            $('.tabcon td:nth-child(2)').toggle();
            if (btncol.innerHTML == 'Ocultar MAC') 
		      btncol.innerHTML = 'Mostrar MAC';
		  	else btncol.innerHTML = 'Ocultar MAC';
            });
</script>
<script type="text/javascript" src="<?= base_url() ?>resources/js/table_life.js"></script>