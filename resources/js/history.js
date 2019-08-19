'use strict'

var json;

$(document).ready(() =>
{

  //retiramos el z-index
  $('.imgplano').css('z-index', '0');

  let servidor = 'http://localhost/jardines/';

  function sleep(ms)
  {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  function checkHistory()
  {

    json =
    {
      dia: '2019-08-11',
      inicio: 13,
      fin: 15,
      sensor: null,
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

  $('#timeStart').timepicker(
  {
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '00',
    maxTime: '11:00pm',
    defaultTime: '00',
    startTime: '10:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true,
    change: (time) =>
    {
      let reloj = $('#timeStart').val();

    },
  });

  $('.btn-play').click((event) =>
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

  checkHistory();


});
