<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshops extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Workshops_model'); // Cargar el modelo de workshops
        $this->load->model('Organizer_model'); // Cargar el modelo de organizadores
        $this->load->model('Workshops_detail_model'); // Cargar el modelo de detalles
    }

    // Función para mostrar la lista de workshops
    public function index() {
        $data['workshops'] = $this->Workshops_model->get_all_workshops(); // Obtener todos los workshops
        foreach ($data['workshops'] as &$workshop) {
            // Obtener el nombre del organizador
            $organizer = $this->Organizer_model->get_organizer_by_id($workshop['fk_id_org']);
            $workshop['first_name_org'] = $organizer['first_name_org'] ?? 'Unknown';
        }

        // Cargar las vistas
        $this->load->view('header');
        $this->load->view('Workshops/index', $data);
        $this->load->view('footer');
    }

    // Función para mostrar los detalles de un workshop
    public function details($id_work) {
        $data['workshop'] = $this->Workshops_detail_model->get_workshop_details($id_work);

        if ($data['workshop']) {
            $this->load->view('header');
            $this->load->view('workshop_details/index', $data);
            $this->load->view('footer');
        } else {
            show_404(); // Mostrar error si no se encuentra el workshop
        }
    }
}
