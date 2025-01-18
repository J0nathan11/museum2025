<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_workshop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo para la validación de la cédula y el registro
        $this->load->model('Register_workshop_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // Muestra el formulario de registro
    public function index($id_work) {
        // Obtener el tema del taller desde el modelo
        $data['topic_work'] = $this->Register_workshop_model->get_workshop_topic($id_work);
        $data['id_work'] = $id_work;

        // Verificar si hay un mensaje de error en session
        $data['error'] = $this->session->flashdata('error'); 

        // Cargar la vista con el formulario
        $this->load->view('header');
        $this->load->view('register_workshop/index', $data);
        $this->load->view('footer');
    }

    // Procesa la inscripción
    public function register($id_work) {
        if ($this->input->method() === 'post') {
            // Recoger datos del formulario
            $id_card_cli = $this->input->post('id_card_cli');
            $this->form_validation->set_rules('id_card_cli', 'ID Card', 'required|numeric|min_length[8]|max_length[10]');

            if ($this->form_validation->run() === FALSE) {
                // Validación fallida, mostrar mensaje de error
                $this->session->set_flashdata('error', validation_errors()); 
                redirect('register_workshop/index/' . $id_work);
            }

            // Verificar si el cliente existe
            $client = $this->Register_workshop_model->check_client_exists($id_card_cli);
            if ($client) {
                // Si el cliente existe, registrar la inscripción
                $this->Register_workshop_model->register_client_for_workshop($client['id_cli'], $id_work);
                $this->session->set_flashdata('success', 'Registro completado con éxito.');
                redirect('workshops');
            } else {
                // Si el cliente no existe
                $this->session->set_flashdata('error', 'La cédula no está registrada.');
                redirect('register_workshop/index/' . $id_work);
            }
        }
    }
}
