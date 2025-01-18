<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshops extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Workshops_model');  // Cargar el modelo
        $this->load->model('Organizer_model');  // Cargar el modelo para los organizadores
    }

    // Función para mostrar la lista de workshops
    public function index() {
        $data['workshops'] = $this->Workshops_model->get_all_workshops();  // Obtener los talleres
        foreach ($data['workshops'] as &$workshop) {
            // Obtener el nombre del organizador si se requiere
            $organizer = $this->Organizer_model->get_organizer_by_id($workshop['fk_id_org']);
            $workshop['first_name_org'] = $organizer['first_name_org'];
        }

        // Cargar la vista con los datos
        $this->load->view('header');
        $this->load->view('Workshops/index', $data);  // Cargar la vista con los datos
        $this->load->view('footer');
    }
}
