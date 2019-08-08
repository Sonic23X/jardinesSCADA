'use strict'

$(document).ready(() => {

  function widgets()
  {

    $.ajax({
      url: 'http://localhost/jardines/Sensores/Tarjets',
      type: 'POST',
      success: (response) =>
      {
        var datos = JSON.parse(response);

        $('#cont-full').html(datos.full);
        $('#cont-estable').html(datos.stable);
        $('#cont-empty').html(datos.empty);
        $('#movement').html(datos.movimiento);
      }
    });

  }

  $.ajax({
    url: 'http://localhost/jardines/Sensores/Tarjets',
    type: 'POST',
    success: (response) =>
    {
      var datos = JSON.parse(response);

      $('#cont-full').html(datos.full);
      $('#cont-estable').html(datos.stable);
      $('#cont-empty').html(datos.empty);
      $('#movement').html(datos.movimiento);
    }
  });

  setInterval(widgets, 1000);

});
