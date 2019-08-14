'use strict'

$(document).ready(() =>
{

  let servidor = 'http://localhost/jardines/';

  function widgets()
  {
    $.ajax({
      url: servidor + 'Sensores/Tarjets',
      type: 'GET',
      success: (response) =>
      {
        var datos = JSON.parse(response);

        $('#cont-full').html(datos.full);
        $('#cont-estable').html(datos.stable);
        $('#cont-empty').html(datos.empty);
        $('#movement').html(datos.movimiento);
      },
    });

  }

  $.ajax({
    url: servidor + 'Sensores/Tarjets',
    type: 'GET',
    success: (response) =>
    {
      var datos = JSON.parse(response);

      $('#cont-full').html(datos.full);
      $('#cont-estable').html(datos.stable);
      $('#cont-empty').html(datos.empty);
      $('#movement').html(datos.movimiento);
    },
  });

  setInterval(widgets, 1000);

});
