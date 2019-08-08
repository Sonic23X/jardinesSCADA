<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  function Index()
  {
    // Cabezal
    $this->load->view('common/head');

    //navbar
    $this->load->view('common/preloader');
    $titulo=array('valor' => "Vista General");
    $this->load->view('common/nav',$titulo);

    //elementos del menu
    $this->load->view('common/menu-side');

    //section
    $this->load->view('sections/inicio');

    //footer de la pagina
    $this->load->view('common/footer');
  }

}
