<?php
class Clients extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Cargar el modelo Cliente
        $this->load->model('Client');
    }

    // Función para renderizar el formulario
    public function index() {
        $this->load->view('header');
        $this->load->view('Clients/index');
        $this->load->view('footer');
    }

    // Función para guardar datos en la base de datos
    public function guardar() {
        // Recibir los datos del formulario
        $datos = array(
            'id_card_cli'     => $this->input->post('id_card_cli'),
            'first_name_cli'  => $this->input->post('first_name_cli'),
            'last_name_cli'   => $this->input->post('last_name_cli'),
            'phone_cli'       => $this->input->post('phone_cli'),
            'email_cli'       => $this->input->post('email_cli')
        );

        // Insertar los datos usando el modelo
        $this->Client->insertar($datos);

        // Redirigir al index
        redirect('Clients/index');
    }
}
?>
