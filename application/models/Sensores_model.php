<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensores_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  function GetMovimiento()
  {
    $consulta = "SELECT * FROM sensors WHERE tipo_sensor = '1' LIMIT 48";

    $resultado = $this->db->query($consulta);

    if($resultado != null)
      return $resultado->result();
    else
      return null;
  }

  function GetCountMovimiento()
  {
    $consulta = "SELECT COUNT(id_dispositivo) as numero FROM sensors WHERE tipo_sensor = '1' and valor = '1' LIMIT 18";

    $resultado = $this->db->query($consulta);

    if($resultado != null)
      return $resultado->row();
    else
      return null;
  }

  function GetTrash()
  {
    $consulta = "SELECT valor FROM sensors WHERE tipo_sensor = '2' LIMIT 1";

    $resultado = $this->db->query($consulta);

    if($resultado != null)
      return $resultado->result();
    else
      return null;
  }

  function GetWater()
  {
    $consulta = "SELECT valor FROM sensors WHERE tipo_sensor = '3' LIMIT 1";

    $resultado = $this->db->query($consulta);

    if($resultado != null)
      return $resultado->result();
    else
      return null;
  }

  function GetHistory($fecha = null)
  {
    if($fecha != null)
    {

      $consulta = "";
      if($fecha['sensor'] == 0)
      {
        $consulta = "SELECT id_dispositivo, time FROM history WHERE date='"
          .$fecha['dia']."' AND HOUR(time) BETWEEN ".$fecha['inicio']." and ".$fecha['fin'];
      } else
      {
        //validar sensor
        $sensor = "";
        if($fecha['sensor'] < 10)
          $sensor = '00000' . $fecha['sensor'];
        else
          $sensor = '0000' . $fecha['sensor'];

        $consulta = "SELECT id_dispositivo, time FROM history WHERE date='"
          .$fecha['dia']."' AND id_dispositivo='".$sensor. "' and"
          ." HOUR(time) BETWEEN ".$fecha['inicio']." and ".$fecha['fin'];
      }

      $resultado = $this->db->query($consulta);

      if($resultado != null)
        return $resultado->result();
    }
    return null;
  }

}
