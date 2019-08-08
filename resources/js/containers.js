'use strict'

$(document).ready(() =>
{
  function basura()
  {
    $('#trash').html('');

    $.ajax({
      url: 'http://localhost/jardines/Cisternas/GetDataTrash',
      type: 'GET',
      success: (response) =>
      {
        console.log(response);

        let barras = JSON.parse(response);

        Morris.Bar({
          element: 'trash',
          data: [
            barras,
          ],
          xkey: 'title',
          ykeys: ['value'],
          labels: ['Porcentaje: '],
          hideHover: 'true',
          resize: true,
          barColors:  ['#65fe4c'],
        });
      },
    });

  }

  function agua()
  {
    $('#water').html('');

    $.ajax({
      url: 'http://localhost/jardines/Cisternas/GetDataWater',
      type: 'GET',
      success: (response) =>
      {
        console.log(response);

        let barras = JSON.parse(response);

        Morris.Bar({
          element: 'water',
          data: [
            barras,
          ],
          xkey: 'title',
          ykeys: ['value'],
          labels: ['Porcentaje: '],
          hideHover: 'true',
          resize: true,
          barColors:  ['#254edd'],
        });
      },
    });

  }

  //llamando a los metodos
  basura();
  agua();

  //creando los hilos
  setInterval(basura, 100000);
  setInterval(agua, 100000);

});
