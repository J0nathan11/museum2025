<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshops_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo Workshops_detail_model
        $this->load->model('Workshops_detail_model');
    }

    /**
     * Método para mostrar los detalles de un taller.
     * 
     * @param int $id_work ID del taller.
     */
    public function index($id_work) {
        // Obtener los detalles del taller desde el modelo
        $data['workshop'] = $this->Workshops_detail_model->get_workshop_details($id_work);

        // Verificar si los detalles están disponibles
        if ($data['workshop']) {
            // Si hay detalles, cargamos la vista de detalles
            $this->load->view('header'); // Encabezado (opcional)
            $this->load->view('workshop_details/index', $data); // Vista del taller
            
            $this->load->view('footer'); // Pie de página (opcional)
        } else {
            // Si no existen detalles, cargamos la vista de error 404
            $this->load->view('404');
        }
    }
}
