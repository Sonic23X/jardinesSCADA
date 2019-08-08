'use strict'

$(document).ready(() =>
{

  function checkTable()
  {
    $.ajax({
      url: 'http://localhost/jardines/Sensores/Check',
      type: 'GET',
      success: (response) =>
      {
        $('.table-resume').html(response);
      },
    });
  }

  function grafica()
  {
    $('#bar').html('');

    $.ajax({
      url: 'http://localhost/jardines/Cisternas/GetDataGeneral',
      type: 'GET',
      success: (response) =>
      {
        let barras = JSON.parse(response);

        Morris.Bar({
          element: 'bar',
          data: barras,
          xkey: 'title',
          ykeys: ['value'],
          labels: ['Porcentaje: '],
          hideHover: 'true',
          resize: true,
          barColors:  (row, series, type) =>
          {
            if (row.label == 'Pluvial') return '#254edd';
            else if (row.label == 'Basura') return '#65fe4c';
          },

        });
      },
    });
  }

  //Iniciamos el tiempo real
  setInterval(checkTable, 100);

  //iniciamos monitoreo de graficas
  grafica();
  setInterval(grafica, 1800000);

});
