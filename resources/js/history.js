'use strict'

var json;

$(document).ready(() =>
{

  //retiramos el z-index
  $('.imgplano').css('z-index', '0');

  let servidor = 'http://localhost/jardines/';

  //funciones
  function sleep(ms)
  {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  async function setMap(registros)
  {
    //imprimir en pantalla
    for (var i = 0; i < registros.length; i++)
    {
      $.ajax({
        url: servidor + 'History/SetMap',
        type: 'POST',
        dataType: 'json',
        data: { data: registros[i] },
        success: (response) =>
        {
          $('.items').html(response.html);
        },
      });
      console.log(i);
      await sleep(2000);
    }

    $('.items').html('');

    //retiramos el z-index
    $('.imgplano').css('z-index', '0');
  }

  //creando el datepicker y los timepickers
  $('#fecha').datepicker({
      format: 'yyyy-mm-dd',
      autoHide: true,
      startDate: '2019-08-11',
    });

  $('#timeStart').timepicker(
  {
    timeFormat: 'HH:mm',
    interval: 60,
    minTime: '00:00',
    maxTime: '23:00',
    defaultTime: '00:00',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true,
  });

  $('#timeEnd').timepicker(
  {
    timeFormat: 'HH:mm',
    interval: 60,
    minTime: '00:00',
    maxTime: '23:00',
    defaultTime: '00:00',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true,
  });

  //eventos
  $('.btn-play').click(event =>
  {
    //colocamos el z-index
    $('.imgplano').css('z-index', '2');

    let numRegistros;
    let registros;

    $.ajax({
      url: servidor + 'History/GetRows',
      type: 'POST',
      dataType: 'json',
      data: { data: json },
      success: (resp) =>
      {
        registros = resp.data;
        setMap(registros);
      },
    });

  });

  $('#searchHistory').click(event =>
  {
    let inicio = $('#timeStart').val();
    inicio = inicio.split(':')[0];

    let fin = $('#timeEnd').val();
    fin = fin.split(':')[0];

    let fecha = $('#fecha').val();

    let sensor = parseInt($('#sensor').val());

    if (fecha != '')
    {

      json =
      {
        dia: fecha,
        inicio: parseInt(inicio),
        fin: parseInt(fin) - 1,
        sensor: sensor,
      };

      $.ajax({
        url: servidor + 'History/GetHistory',
        type: 'POST',
        dataType: 'json',
        data: { data: json },
        success: (response) =>
        {
          $('#tablaSensores').html(response.html);
        },
      });

    } else
    {
      alert('Seleccione una fecha');
    }

  });

});
