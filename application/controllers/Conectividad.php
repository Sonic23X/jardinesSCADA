<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conectividad extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    //cabezal
    $this->load->view('common/head');

    //navbar
    $this->load->view('common/preloader');
    $titulo=array('valor' => "Conectividad Red Wifi");
    $this->load->view('common/nav',$titulo);
    $this->load->view('common/menu-side');

    //seccion del funcion
    $this->load->view('sections/conectividad');

    //footer
    $this->load->view('common/footer');
  }

}
