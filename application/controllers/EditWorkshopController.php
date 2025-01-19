<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditWorkshopController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('WorkshopModel');
        $this->load->library('session'); // Esto es opcional, solo si necesitas manejar sesiones en otras partes.
        $this->load->helper('url'); // Cargar helper de URL para redirecciones
    }

    // Método para mostrar el formulario de edición
    public function edit($id_work) {
        // Obtener detalles del taller
        $workshop = $this->WorkshopModel->get_workshop_by_id($id_work);
        if (!$workshop) {
            // Si el taller no existe, redirigir al listado
            redirect('WorkshopController');
        }

        // Obtener los organizadores
        $organizers = $this->WorkshopModel->get_all_organizers();

        // Pasar los datos a la vista
        $data['workshop'] = $workshop;
        $data['organizers'] = $organizers;

        // Cargar el header, vista de edición y footer
        $this->load->view('header'); // Cargar el header
        $this->load->view('edit_workshop/index', $data); // Vista de edición
        $this->load->view('footer'); // Cargar el footer
    }

    // Método para actualizar el taller
    public function update($id_work) {
        // Obtener los datos del formulario
        $data = [
            'topic_work' => $this->input->post('topic_work'),
            'date_work' => $this->input->post('date_work'),
            'time_work' => $this->input->post('time_work'),
            'status_work' => $this->input->post('status_work'),
            'fk_id_org' => $this->input->post('fk_id_org'),
            'description_detail' => $this->input->post('description_detail')
        ];

        // Llamar al modelo para actualizar el taller
        $update_result = $this->WorkshopModel->update_workshop($id_work, $data);

        // Redirigir o mostrar un mensaje según el resultado
        if ($update_result) {
            $this->session->set_flashdata('success', 'Workshop updated successfully!');
            redirect('list_workshops');
        } else {
            $this->session->set_flashdata('error', 'There was an error updating the workshop.');
            redirect('list_workshops');
        }
    }
}
