<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkshopController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('WorkshopModel');
        $this->load->library('session');
    }

    public function index() {
        // Obtener todos los talleres
        $workshops = $this->WorkshopModel->get_all_workshops();

        // Cargar vista con los talleres
        $data['workshops'] = $workshops;
        $this->load->view('list_workshop/index', $data);  // Ruta ajustada aquí
    }
}
