<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddWorkshopController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AddWorkshop_model'); // Cargar el modelo
        $this->load->library('session'); // Cargar la librería de sesión
        $this->load->helper('url'); // Cargar helper de URL para redirecciones
    }

    // Mostrar el formulario para añadir un nuevo taller
    public function index() {
        $data['organizers'] = $this->AddWorkshop_model->get_organizers(); // Obtener lista de organizadores
        $this->load->view('header'); // Opcional: si usas un header global
        $this->load->view('add_workshop/index', $data); // Vista del formulario
        $this->load->view('footer'); // Opcional: si usas un footer global
    }

    // Guardar el nuevo taller en la base de datos
    public function save() {
        if ($this->input->method() === 'post') {
            $workshopData = [
                'topic_work' => $this->input->post('topic_work'),
                'date_work' => $this->input->post('date_work'),
                'time_work' => $this->input->post('time_work'),
                'status_work' => $this->input->post('status_work'),
                'fk_id_org' => $this->input->post('fk_id_org')
            ];

            $description = $this->input->post('description_detail');

            if ($this->AddWorkshop_model->add_workshop($workshopData, $description)) {
                $this->session->set_flashdata('success', 'Workshop successfully added.');
                redirect('ListWorkshops'); // Cambia al nombre del controlador que muestra los talleres
            } else {
                $this->session->set_flashdata('error', 'Error adding workshop.');
                redirect('AddWorkshopController');
            }
        } else {
            redirect('AddWorkshopController');
        }
    }
}
