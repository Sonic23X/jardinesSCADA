'use strict'

$(document).ready(() =>
{

  function checkTable()
  {
    $.ajax({
      url: 'http://localhost/jardines/Sensores/Table',
      type: 'POST',
      success: (response) =>
      {
        $('.table-sensor').html(response);
      }
    });
  }

  function checkMap()
  {
    $.ajax({
      url: 'http://localhost/jardines/Sensores/Maps',
      type: 'POST',
      success: (response) =>
      {
        $('.items').html(response);
      }
    });
  }

  //cargar los datos al momento de abrir la pagina
  $.ajax({
    url: 'http://localhost/jardines/Sensores/Table',
    type: 'POST',
    success: (response) =>
    {
      $('.table-sensor').html(response);
    }
  });

  $.ajax({
    url: 'http://localhost/jardines/Sensores/Maps',
    type: 'POST',
    success: (response) =>
    {
      $('.items').html(response);
    }
  });

  //hilos para ejecutar la funciones cada cierto tiempo #tiempo en milisegundos 1 s -> 1000 mls
  setInterval(checkTable, 2000);
  setInterval(checkMap, 2000);

﻿});
