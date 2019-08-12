'use strict'

let servidor = 'http://192.168.0.102/jardines/';

$(document).ready(() =>
{

  function checkTable()
  {
    $.ajax({
      url: servidor + 'Sensores/Table',
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
      url: servidor + 'Sensores/Maps',
      type: 'POST',
      success: (response) =>
      {
        $('.items').html(response);
      }
    });
  }

  //cargar los datos al momento de abrir la pagina
  $.ajax({
    url: servidor + 'Sensores/Table',
    type: 'POST',
    success: (response) =>
    {
      $('.table-sensor').html(response);
    }
  });

  $.ajax({
    url: servidor + 'Sensores/Maps',
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
