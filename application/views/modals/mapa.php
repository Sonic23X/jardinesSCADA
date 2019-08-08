<div class="modal fade" id="mapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
      <div id="mapcontainer" class="card bg-dark">
           <img class="imgmodal" src="<?= base_url() ?>resources/images/plano_jardines_1xx.png" alt="">
           <div class="items">

           </div>
      </div>
  </div>
</div>
<script type="text/javascript">


      $(document).ready(function(){
            $("#plano").click(function(){
                  var screen_w = screen.width;
                  var screen_h = screen.height;
                  var div_w;
                  var div_h;
                  var margin;
                  var margin_t;
                  if(screen_w > screen_h){
                        if (screen_h*1.5 < screen_w) {
                              div_w=screen_h*1.5+"px";
                              div_h=screen_h;
                        }
                        else{
                              div_w="100%";
                              div_h=screen_w/1.5;
                        }
                  }
                  else{
                        div_w="100%";
                        div_h=screen_w/1.5;
                  }
                  margin = screen_h - div_h;
                  margin_t =margin/2;
                  $("#mapcontainer").attr("style", "width: " + div_w + "; height: " + div_h +"px; margin-top: "+ margin_t +"px;");
            });
      });



</script>
