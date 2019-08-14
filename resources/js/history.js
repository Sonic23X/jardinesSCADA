'use strict'

var json;

$(document).ready(() =>
{

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
  }

  $('.btn-play').click((event) =>
  {
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
