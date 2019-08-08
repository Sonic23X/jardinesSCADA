<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensores extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Sensores_model');
  }

  function index()
  {
    //header
    $this->load->view('common/head');

    //icons
    $this->load->view('common/preloader');

    $titulo=array('valor' => "Sensores de movimiento");
    $this->load->view('common/nav',$titulo);

    //menu del sistema
    $this->load->view('common/menu-side');

    //view de los sensores
    $this->load->view('sections/sensores');

    //view del mapa
    $this->load->view('modals/mapa');

    //pie de pagina
    $this->load->view('common/footer');
  }

  function Check()
  {
    $sensores = $this->Sensores_model->GetMovimiento();
    $html = "";

    $html .= "<table class='table table-hover dashboard-task-infos'>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th style='text-align:center;'>Clave</th>";
    $html .= "<th style='text-align:center;'>Ubicación</th>";
    $html .= "<th style='text-align:center;'>Funcionamiento</th>";
    $html .= "<th style='text-align:center;'>Status</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";

    foreach ($sensores as $sensor)
    {
      foreach ($sensor as $fila => $dato)
      {
        if($fila == "id_dispositivo")
        {
          $html .= "<tr>";
          if((int)$dato < 10)
            $html .= "<td style='text-align:center;'>S-00".(int)$dato."</td>";
          else
            $html .= "<td style='text-align:center;'>S-0".(int)$dato."</td>";
          $html .= "<td style='text-align:center;'>Pendiente</td>";
        }
        if($fila == "status")
        {
          if($dato == 1)
          {
            $html .= "<td><i class='material-icons bg-green'>check_box</i> Correcto</td>";
          }
          else
          {
            $html .= "<td><i class='material-icons col-red'>cancel</i> Sin señal</td>";
          }

        }
        if($fila == "valor")
        {
          if($dato == 0)
          {
            $html .= "<td style='text-align:center;'><i class='material-icons col-red'>portable_wifi_off</i>Sin movimiento</td>";
          }
          else
          {
            $html .= "<td style='text-align:center;'><i class='material-icons col-green'>wifi_tethering</i>Movimiento detectado</td>";
          }
        }
      }
    }

    $html .= "</tr>";
    $html .= "</tbody>";
    $html .= "</table>";

    echo $html;

  }

  function Table()
  {
    $sensores = $this->Sensores_model->GetMovimiento();
    $html = "";

    $html .= "<table class='table table-hover dashboard-task-infos'>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th style='text-align:center;'>Clave</th>";
    $html .= "<th style='text-align:center;'>Ubicación</th>";
    $html .= "<th style='text-align:center;'>Status</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";

    foreach ($sensores as $sensor)
    {
      foreach ($sensor as $fila => $dato)
      {
        if($fila == "id_dispositivo")
        {
          $html .= "<tr>";
          if((int)$dato < 10)
            $html .= "<td style='text-align:center;'>S-00".(int)$dato."</td>";
          else
            $html .= "<td style='text-align:center;'>S-0".(int)$dato."</td>";
          $html .= "<td style='text-align:center;'>Pendiente</td>";
        }
        if($fila == "valor")
        {
          if($dato == 0)
          {
            $html .= "<td style='text-align:center;'><i class='material-icons col-red'>portable_wifi_off</i>Sin movimiento</td>";
          }
          else
          {
            $html .= "<td style='text-align:center;'><i class='material-icons col-green'>wifi_tethering</i>Movimiento detectado</td>";
          }
        }
      }
    }

    $html .= "</tr>";
    $html .= "</tbody>";
    $html .= "</table>";

    echo $html;
  }

  function Maps()
  {
    $sensores = $this->Sensores_model->GetMovimiento();
    $html = "";

    foreach ($sensores as $sensor)
    {
        foreach ($sensor as $fila => $dato)
        {
          if($fila == "valor")
          {
            switch ((int)$sensor->id_dispositivo)
            {
              case 1:
                if($dato == '0')
                  $html .= "<img id='z0' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z0' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 2:
                if($dato == 0)
                  $html .= "<img id='z1' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z1' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 3:
                if($dato == 0)
                  $html .= "<img id='z2' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z2' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 4:
                if($dato == 0)
                  $html .= "<img id='z3' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z3' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 5:
                if($dato == 0)
                  $html .= "<img id='z4' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z4' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 6:
                if($dato == 0)
                  $html .= "<img id='z5' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z5' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 7:
                if($dato == 0)
                  $html .= "<img id='z6' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z6' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 8:
                if($dato == 0)
                  $html .= "<img id='z7' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z7' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 9:
                if($dato == 0)
                  $html .= "<img id='z8' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z8' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 10:
                if($dato == 0)
                  $html .= "<img id='z9' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z9' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 11:
                if($dato == 0)
                  $html .= "<img id='z10' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z10' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 12:
                if($dato == 0)
                  $html .= "<img id='z11' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z11' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 13:
                if($dato == 0)
                  $html .= "<img id='z12' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z12' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 14:
                if($dato == 0)
                  $html .= "<img id='z13' class='zonax2 off' src='".base_url()."resources/images/cuadro.png'>";
                else
                  $html .= "<img id='z13' class='zonax2 on' src='".base_url()."resources/images/cuadro.png'>";
                break;
              case 15:
                if($dato == 0)
                  $html .= "<img id='z14' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z14' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 16:
                if($dato == 0)
                  $html .= "<img id='z15' class='zonax2 off' src='".base_url()."resources/images/cuadro.png'>";
                else
                  $html .= "<img id='z15' class='zonax2 on' src='".base_url()."resources/images/cuadro.png'>";
                break;
              case 17:
                if($dato == 0)
                  $html .= "<img id='z16' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z16' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 18:
                if($dato == 0)
                  $html .= "<img id='z17' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z17' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 19:
                if($dato == 0)
                  $html .= "<img id='z18' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z18' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 20:
                if($dato == 0)
                  $html .= "<img id='z19' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z19' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 21:
                if($dato == 0)
                  $html .= "<img id='z20' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z20' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 22:
                if($dato == 0)
                  $html .= "<img id='z21' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z21' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 23:
                if($dato == 0)
                  $html .= "<img id='z22' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z22' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 24:
                if($dato == 0)
                  $html .= "<img id='z23' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z23' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 25:
                if($dato == 0)
                  $html .= "<img id='z24' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z24' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 26:
                if($dato == 0)
                  $html .= "<img id='z25' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z25' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 27:
                if($dato == 0)
                  $html .= "<img id='z26' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z26' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 28:
                if($dato == 0)
                  $html .= "<img id='z27' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z27' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 29:
                if($dato == 0)
                  $html .= "<img id='z28' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z28' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 30:
                if($dato == 0)
                  $html .= "<img id='z29' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z29' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 31:
                if($dato == 0)
                  $html .= "<img id='z30' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z30' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 32:
                if($dato == 0)
                  $html .= "<img id='z31' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z31' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 33:
                if($dato == 0)
                  $html .= "<img id='z32' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z32' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 34:
                if($dato == 0)
                  $html .= "<img id='z33' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z33' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 35:
                if($dato == 0)
                  $html .= "<img id='z34' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z34' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 36:
                if($dato == 0)
                  $html .= "<img id='z35' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z35' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 37:
                if($dato == 0)
                  $html .= "<img id='z36' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z36' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 38:
                if($dato == 0)
                  $html .= "<img id='z37' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z37' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 39:
                if($dato == 0)
                  $html .= "<img id='z38' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z38' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 40:
                if($dato == 0)
                  $html .= "<img id='z39' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z39' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 41:
                if($dato == 0)
                  $html .= "<img id='z40' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
                else
                  $html .= "<img id='z40' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
                break;
              case 42:
                if($dato == 0)
                  $html .= "<img id='z41' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z41' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 43:
                if($dato == 0)
                  $html .= "<img id='z42' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z42' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 44:
                if($dato == 0)
                  $html .= "<img id='z43' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z43' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 45:
                if($dato == 0)
                  $html .= "<img id='z44' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z44' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 46:
                if($dato == 0)
                  $html .= "<img id='z45' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z45' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 47:
                if($dato == 0)
                  $html .= "<img id='z46' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z46' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 48:
                if($dato == 0)
                  $html .= "<img id='z47' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z47' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
              case 49:
                if($dato == 0)
                  $html .= "<img id='z48' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
                else
                  $html .= "<img id='z48' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
                break;
            }
          }

        }
    }
    echo $html;
  }

  function Tarjets()
  {
    //numero de sensores de movimiento activos
    $movimiento = $this->Sensores_model->GetCountMovimiento()->numero;

    //status de sensores de basura
    $basura = $this->Sensores_model->GetTrash();

    //status de sensores de basura
    $agua = $this->Sensores_model->GetWater();

    $cont_fully = 0;
    $cont_stable = 0;
    $cont_empty = 0;

    foreach ($basura as $contenedor)
    {
      foreach ($contenedor as $valores => $dato)
      {
        if($valores == "valor")
        {
          if($dato == 0 || $dato < 5)
            $cont_empty++;
          else if($dato >= 5 && $dato <=85)
            $cont_stable++;
          else if($dato > 85)
            $cont_fully++;
        }
      }
    }

    foreach ($agua as $contenedor)
    {
      foreach ($contenedor as $valores => $dato)
      {
        if($valores == "valor")
        {
          if($dato == 0 || $dato < 5)
            $cont_empty++;
          else if($dato >= 5 && $dato <=85)
            $cont_stable++;
          else if($dato > 85)
            $cont_fully++;
        }
      }
    }

    $array = array('movimiento' => $movimiento, 'full' => $cont_fully, 'stable' => $cont_stable, 'empty' => $cont_empty);

    echo json_encode($array);

  }

}
