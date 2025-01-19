<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('OrganizerAuth_model');  // Cargar el modelo
        $this->load->library('session');  // Cargar la librería de sesión
    }

    // Página de login
    public function index() {
        // Verificar si hay un mensaje de error en session
        $data['error'] = $this->session->flashdata('error'); 

        // Cargar las vistas
        $this->load->view('header');  // Cargar el encabezado
        $this->load->view('login_form/index', $data);  // Cargar la vista del formulario de login
        $this->load->view('footer');  // Cargar el pie de página
    }

    // Validar las credenciales del login
    public function validate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Llamar al modelo para validar las credenciales
        $organizer = $this->OrganizerAuth_model->validate_credentials($username, $password);
    
        if ($organizer) {
            // Si las credenciales son correctas, redirigir a la página de talleres
            $this->session->set_userdata('organizer_id', $organizer['id_org']);  // Guardar el ID del organizer en la sesión
            redirect('list_workshops');  // Redirigir a la página de talleres (asegúrate de que esta ruta sea correcta)
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect('logincontroller');  // Redirigir al login
        }
    }
}
