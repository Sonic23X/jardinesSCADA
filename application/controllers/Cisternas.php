<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cisternas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sensores_model');
  }

  function Index()
  {
    //carga de cabezal
    $this->load->view('common/head');
    $this->load->view('common/preloader');

    //navbar
    $titulo=array('valor' => "Status de los contenedores");
    $this->load->view('common/nav',$titulo);
    $this->load->view('common/menu-side');

    //contenido de la pagina
    $this->load->view('sections/cisternas');

    //footer del sitio
    $this->load->view('common/footer');
  }

  function GetDataGeneral()
  {
    $basura = $this->Sensores_model->GetTrash();
    $agua = $this->Sensores_model->GetWater();

    $aa = array('title' => 'Pluvial', 'value' => $agua[0]->valor);
    $ab = array('title' => 'Basura', 'value' => $basura[0]->valor);

    echo json_encode(array($aa, $ab));
  }

  function GetDataTrash()
  {
    $basura = $this->Sensores_model->GetTrash();

    $json = array('title' => 'Basura', 'value' => $basura[0]->valor);

    echo json_encode($json);
  }

  function GetDataWater()
  {
    $agua = $this->Sensores_model->GetWater();

    $json = array('title' => 'Pluvial', 'value' => $agua[0]->valor);

    echo json_encode($json);
  }
}
