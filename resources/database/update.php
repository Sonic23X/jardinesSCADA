<?php
    if($_POST)
    {
        ?>

        <html>
            <head>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            </head>
            <body>
                <p id="texto">Aqui va lo enviado</p>

                <script type="text/javascript">

                    let elemento = document.getElementById('texto');
                    let sensor = '<?= $_POST['cade'] ?>';

                    $.ajax({
                        url: 'http://192.168.1.191:3000/update',
                        type: 'POST',
                        data: 'cade=' + sensor,
                        success: function(response)
                        {
                            
                        }
                    });

                    elemento.innerHTML = '<?= $_POST['cade'] ?>';

                </script>
            </body>
        </html>

        <?php
    }
?>
