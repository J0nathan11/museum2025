<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_registrations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo para verificar la cédula y consultar las inscripciones
        $this->load->model('Client_model');  // Asegúrate de que el nombre del modelo sea correcto
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // Mostrar el formulario de validación de cédula
    public function index() {
        // Verificar si hay un mensaje de error en session
        $data['error'] = $this->session->flashdata('error'); 

        // Cargar la vista con el formulario
        $this->load->view('header');  // Cargar el header
        $this->load->view('check_registrations/index', $data);  // Cargar la vista del formulario
        $this->load->view('footer');  // Cargar el footer
    }

    // Validar la cédula y redirigir a las inscripciones
    public function validate_id_card() {
        $id_card_cli = $this->input->post('id_card_cli');
        $this->form_validation->set_rules('id_card_cli', 'ID Card', 'required|numeric|min_length[8]|max_length[10]');

        if ($this->form_validation->run() === FALSE) {
            // Si la validación falla, mostrar un mensaje de error
            $this->session->set_flashdata('error', validation_errors());
            redirect('check_registrations/index');
        } else {
            // Verificar si la cédula existe
            $client = $this->Client_model->check_client_exists($id_card_cli);
            if ($client) {
                // Si el cliente existe, mostrar sus inscripciones
                redirect('check_registrations/inscriptions/' . $client['id_cli']);
            } else {
                // Si el cliente no existe
                $this->session->set_flashdata('error', 'La cédula no está registrada.');
                redirect('check_registrations/index');
            }
        }
    }

    // Mostrar las inscripciones del cliente
    public function inscriptions($id_cli) {
        // Obtener las inscripciones del cliente desde el modelo
        $data['inscriptions'] = $this->Client_model->get_client_inscriptions($id_cli);
        
        // Cargar la vista con las inscripciones
        $this->load->view('header');
        $this->load->view('check_registrations/inscriptions', $data);
        $this->load->view('footer');
    }
}
?>
