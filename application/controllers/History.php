<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sensores_model');
  }

  function Index()
  {
    //header
    $this->load->view('common/head');

    //icons
    $this->load->view('common/preloader');

    $titulo=array('valor' => "Historial de activación");
    $this->load->view('common/nav',$titulo);

    //menu del sistema
    $this->load->view('common/menu-side');

    //view de los sensores
    $this->load->view('sections/history');

    //view del mapa
    $this->load->view('modals/mapa');

    //pie de pagina
    $this->load->view('common/footer');
  }

  function GetHistory()
  {
    $post = $this->input->post();

    $informacion = $this->Sensores_model->GetHistory($post['data']);
    $html = "";

    if($informacion == null)
      $html = "<h4>Sin informacion</h4>";
    else
    {
      $html .= "<table class='table table-hover dashboard-task-infos'>";
      $html .= "<thead>";
      $html .= "<tr>";
      $html .= "<th style='text-align:center;'>Sensor</th>";
      $html .= "<th style='text-align:center;'>Activación</th>";
      $html .= "</tr>";
      $html .= "</thead>";
      $html .= "<tbody>";

      foreach ($informacion as $sensor)
      {
        foreach ($sensor as $fila => $dato)
        {
          if($fila == "id_dispositivo")
          {
            $html .= "<tr name='".(int)$dato."'>";
            if((int)$dato < 10)
              $html .= "<td style='text-align:center;'>S-00".(int)$dato."</td>";
            else
              $html .= "<td style='text-align:center;'>S-0".(int)$dato."</td>";
          }
          if($fila == "time")
          {
            $html .= "<td style='text-align:center;'>".$dato."</td>";
          }
        }
      }

      $html .= "</tr>";
      $html .= "</tbody>";
      $html .= "</table>";
    }

    $json = array('html' => $html);

    echo json_encode($json);
  }

  function GetRows()
  {
    $post = $this->input->post();

    $data = $this->Sensores_model->GetHistory($post['data']);

    $json = array('data' => $data);

    echo json_encode($json);
  }

  function SetMap()
  {
    $post = $this->input->post();

    $sensor = $post['data']['id_dispositivo'];
    $html = "";

    for ($i = 1; $i < 50; $i++)
    {
      switch ($i)
      {
        case 1:
          if($i != (int)$sensor)
            $html .= "<img id='z0' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z0' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 2:
          if($i != (int)$sensor)
            $html .= "<img id='z1' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z1' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 3:
          if($i != (int)$sensor)
            $html .= "<img id='z2' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z2' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 4:
          if($i != (int)$sensor)
            $html .= "<img id='z3' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z3' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 5:
          if($i != (int)$sensor)
            $html .= "<img id='z4' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z4' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 6:
          if($i != (int)$sensor)
            $html .= "<img id='z5' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z5' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 7:
          if($i != (int)$sensor)
            $html .= "<img id='z6' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z6' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 8:
          if($i != (int)$sensor)
            $html .= "<img id='z7' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z7' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 9:
          if($i != (int)$sensor)
            $html .= "<img id='z8' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z8' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 10:
          if($i != (int)$sensor)
            $html .= "<img id='z9' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z9' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 11:
          if($i != (int)$sensor)
            $html .= "<img id='z10' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z10' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 12:
          if($i != (int)$sensor)
            $html .= "<img id='z11' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z11' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 13:
          if($i != (int)$sensor)
            $html .= "<img id='z12' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z12' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 14:
          if($i != (int)$sensor)
            $html .= "<img id='z13' class='zonax2 off' src='".base_url()."resources/images/cuadro.png'>";
          else
            $html .= "<img id='z13' class='zonax2 on' src='".base_url()."resources/images/cuadro.png'>";
          break;
        case 15:
          if($i != (int)$sensor)
            $html .= "<img id='z14' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z14' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 16:
          if($i != (int)$sensor)
            $html .= "<img id='z15' class='zonax2 off' src='".base_url()."resources/images/cuadro.png'>";
          else
            $html .= "<img id='z15' class='zonax2 on' src='".base_url()."resources/images/cuadro.png'>";
          break;
        case 17:
          if($i != (int)$sensor)
            $html .= "<img id='z16' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z16' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 18:
          if($i != (int)$sensor)
            $html .= "<img id='z17' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z17' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 19:
          if($i != (int)$sensor)
            $html .= "<img id='z18' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z18' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 20:
          if($i != (int)$sensor)
            $html .= "<img id='z19' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z19' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 21:
          if($i != (int)$sensor)
            $html .= "<img id='z20' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z20' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 22:
          if($i != (int)$sensor)
            $html .= "<img id='z21' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z21' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 23:
          if($i != (int)$sensor)
            $html .= "<img id='z22' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z22' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 24:
          if($i != (int)$sensor)
            $html .= "<img id='z23' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z23' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 25:
          if($i != (int)$sensor)
            $html .= "<img id='z24' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z24' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 26:
          if($i != (int)$sensor)
            $html .= "<img id='z25' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z25' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 27:
          if($i != (int)$sensor)
            $html .= "<img id='z26' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z26' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 28:
          if($i != (int)$sensor)
            $html .= "<img id='z27' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z27' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 29:
          if($i != (int)$sensor)
            $html .= "<img id='z28' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z28' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 30:
          if($i != (int)$sensor)
            $html .= "<img id='z29' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z29' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 31:
          if($i != (int)$sensor)
            $html .= "<img id='z30' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z30' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 32:
          if($i != (int)$sensor)
            $html .= "<img id='z31' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z31' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 33:
          if($i != (int)$sensor)
            $html .= "<img id='z32' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z32' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 34:
          if($i != (int)$sensor)
            $html .= "<img id='z33' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z33' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 35:
          if($i != (int)$sensor)
            $html .= "<img id='z34' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z34' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 36:
          if($i != (int)$sensor)
            $html .= "<img id='z35' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z35' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 37:
          if($i != (int)$sensor)
            $html .= "<img id='z36' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z36' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 38:
          if($i != (int)$sensor)
            $html .= "<img id='z37' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z37' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 39:
          if($i != (int)$sensor)
            $html .= "<img id='z38' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z38' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 40:
          if($i != (int)$sensor)
            $html .= "<img id='z39' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z39' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 41:
          if($i != (int)$sensor)
            $html .= "<img id='z40' class='zonax2 off' src='".base_url()."resources/images/rec_1L.png'>";
          else
            $html .= "<img id='z40' class='zonax2 on' src='".base_url()."resources/images/rec_1L.png'>";
          break;
        case 42:
          if($i != (int)$sensor)
            $html .= "<img id='z41' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z41' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 43:
          if($i != (int)$sensor)
            $html .= "<img id='z42' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z42' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 44:
          if($i != (int)$sensor)
            $html .= "<img id='z43' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z43' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 45:
          if($i != (int)$sensor)
            $html .= "<img id='z44' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z44' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 46:
          if($i != (int)$sensor)
            $html .= "<img id='z45' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z45' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 47:
          if($i != (int)$sensor)
            $html .= "<img id='z46' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z46' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 48:
          if($i != (int)$sensor)
            $html .= "<img id='z47' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z47' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
        case 49:
          if($i != (int)$sensor)
            $html .= "<img id='z48' class='zonax2 off' src='".base_url()."resources/images/rec_1M.png'>";
          else
            $html .= "<img id='z48' class='zonax2 on' src='".base_url()."resources/images/rec_1M.png'>";
          break;
      }
    }

    $json = array('html' => $html);

    echo json_encode($json);
  }

}
