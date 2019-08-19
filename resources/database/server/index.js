'use strict'

var qs = require('querystring');
var http = require('http');
var mysql = require('mysql');
var chalk = require('chalk');

var pool = mysql.createPool({
    connectionLimit: 50,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'jardines',
  });

var servidor = http.createServer((req, res) =>
{
  //Handle POST Request
  if (req.method == 'POST')
  {
    var cadena = '';
    req.on('data', (data) =>
    {
      cadena += data;
    });

    req.on('end', () =>
    {
      var POST = qs.parse(cadena);
      res.setHeader('Content-Type', 'application/json;charset=utf-8');
      res.statusCode = 200;
      if (Array.isArray(cadena))
      {
        for (let i = 0; i < cadena.length; i++)
        {
          activacion(cadena[i]);
        }
      } else
      {
        try
        {
          //dividimos la cadena de sensores
          let buff = cadena.split('#');

          //procesamos
          for (var i = 0; i < buff.length - 1; i++)
          {
            activacion(buff[i]);
          }
        } catch (error)
        {
          console.log(chalk.yellow(`Valor recibido: ${cadena}; error -> ${error}`));
        }
      }

      res.end();
    });
  }

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
        let fecha = new Date();
        let hora = fecha.getHours();
        let min = fecha.getMinutes();
        let seg = fecha.getSeconds();
        console.log(chalk.green('activacion realizado, sensor -> ' + sensor
          + ' hora: ' + hora + ':' + min + ':' + seg));
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

servidor.listen(3000, (e, r) =>
{
  console.log('listening');
});
