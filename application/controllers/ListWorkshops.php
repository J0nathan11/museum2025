<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListWorkshops extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Workshops_model');  // Cargar el modelo de workshops
        $this->load->library('session');  // Cargar la librería de sesión
    }

    // Función para mostrar la lista de talleres
    public function index() {
        // Verificar si el organizer está logueado
        if (!$this->session->userdata('organizer_id')) {
            redirect('logincontroller');  // Si no está logueado, redirigir al login
        }

        // Obtener los talleres desde el modelo
        $data['workshops'] = $this->Workshops_model->get_all_workshops();

        // Cargar las vistas con el encabezado, contenido principal y pie de página
        $this->load->view('header');  // Cargar el encabezado
        $this->load->view('list_workshops/index', $data);  // Cargar la vista principal
        $this->load->view('footer');  // Cargar el pie de página
    }
}
