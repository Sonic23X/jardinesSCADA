'use strict'

//requires
var express = require('express');
var bodyParser = require('body-parser');
var qs = require('querystring');
var http = require('http');
var mysql = require('mysql');
var chalk = require('chalk');

//creamos la app
var app = express();

//crear pool de conexiones
var pool = mysql.createPool({
    connectionLimit: 50,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'jardines',
  });

//tratamiento de la información al llegar
app.use(bodyParser.urlencoded({ extended: false }));

app.post('/movimiento', function (req, res)
{

    //ejemplo de cadena recibida '@P0000XX-100001#'
    //datos que llegan

    let data = req.body['data'];

    //validamos que la cadena sea un array
    if (Array.isArray(data))
    {
      for (let i = 0; i < data.length; i++)
      {
        activacion(data[i]);
      }
    } else
    {
      try
      {
        //dividimos la cadena de sensores
        let buff = data.split('#');

        //procesamos
        for (var i = 0; i < buff.length - 1; i++)
        {
          activacion(buff[i]);
        }
      } catch (error)
      {
        console.log(chalk.yellow(`Valor recibido: ${data}; error -> ${error}`));
      }
    }

    res.send();
  });

app.post('/php', function (req, res)
{
    var body = '';

    req.on('data', (data) =>
    {
        body += data;
      });

    req.on('end', () =>
    {
        var POST = qs.parse(body);

        console.log(body); // 'name=ben&foo=bar'

        res.setHeader('Content-Type', 'application/json;charset=utf-8');
        res.statusCode = 200;
        res.end(JSON.stringify(POST)); //your response
      });

    res.send();
  });

//funcion que inicia el sensor
function activacion(cadena)
{

  //separamos la cadena del sensor
  let datos = cadena.split('-');

  //diferenciamos el sensor y el datos
  let sensor = sensorId(datos[0]);
  let estado = statusSensor(datos[1]);

  //insertamos en la bdd
  pool.getConnection(function (err, connection)
  {
    if (err) throw err;
    var sql = `UPDATE sensors SET valor='1' WHERE id_dispositivo='${sensor}'`;
    connection.query(sql, function (err, result)
    {
      connection.release();
      if (err) throw err;
      if (result.affectedRows == 1)
      {
        console.log(chalk.green('activacion realizado, sensor:' + sensor));
        historial(sensor);
        apagado(sensor);
      }
    });
  });
}

//hilo de espera
function sleep(ms)
{
  return new Promise(resolve => setTimeout(resolve, ms));
}

//funcion que desactiva el sensor a los 5 segundos
async function apagado(dispositivo)
{
  await sleep(5000);
  pool.getConnection(function (err, connection)
  {
    if (err) throw err;
    var sql = `UPDATE sensors SET valor='0' WHERE id_dispositivo='${dispositivo}'`;
    connection.query(sql, function (err, result)
    {
      connection.release();
      if (err) throw err;
      if (result.affectedRows == 1)
        console.log(chalk.red('apagado realizado, sensor:' + dispositivo));

    });
  });
}

//funcion que genera un registro en la tabla history
async function historial(sensor)
{
  pool.getConnection(function (err, connection)
  {
    if (err) throw err;
    var sql = `INSERT INTO history (id_dispositivo, date, time) VALUES(
      '${sensor}a', CURDATE(), DATE_FORMAT(NOW(), "%H:%i:%S" ))`;
    connection.query(sql, function (err, result)
    {
      connection.release();
      if (err) throw err;
    });
  });
}

//regresamos el id del sensor
function sensorId(cadena)
{
  let sensor = '';

  for (var i = 0; i < cadena.length; i++)
  {
    if (!isNaN(cadena[i]))
      sensor += cadena[i];
  }

  return sensor;
}

//regresamos el status
function statusSensor(cadena)
{
  let status = '';

  for (var i = 0; i < cadena.length; i++)
  {
    if (!isNaN(cadena[i]))
      status += cadena[i];
  }

  if (status[status.length] == '#')
    return status[status.length - 1];
  else
    return status[status.length];
}

//empezamos el servidor
var server = app.listen(3000, () =>
{
    console.log('Servidor iniciado');
  });
