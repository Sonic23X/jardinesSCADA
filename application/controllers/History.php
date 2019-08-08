<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
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

}
