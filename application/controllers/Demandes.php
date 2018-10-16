<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demandes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Demandes_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'demandes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'demandes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'demandes/index.html';
            $config['first_url'] = base_url() . 'demandes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Demandes_model->total_rows($q);
        $demandes = $this->Demandes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'demandes_data' => $demandes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('demandes/demandes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Demandes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_users' => $row->id_users,
		'demande_no' => $row->demande_no,
		'suject' => $row->suject,
		'description' => $row->description,
		'cost' => $row->cost,
		'state' => $row->state,
		'create_date' => $row->create_date,
	    );
            $this->load->view('demandes/demandes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('demandes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('demandes/create_action'),
	    'id' => set_value('id'),
	    'id_users' => set_value('id_users'),
	    'demande_no' => set_value('demande_no'),
	    'suject' => set_value('suject'),
	    'description' => set_value('description'),
	    'cost' => set_value('cost'),
	    'state' => set_value('state'),
	    'create_date' => set_value('create_date'),
	);
        $this->load->view('demandes/demandes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_users' => $this->input->post('id_users',TRUE),
		'demande_no' => $this->input->post('demande_no',TRUE),
		'suject' => $this->input->post('suject',TRUE),
		'description' => $this->input->post('description',TRUE),
		'cost' => $this->input->post('cost',TRUE),
		'state' => $this->input->post('state',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->Demandes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('demandes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Demandes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('demandes/update_action'),
		'id' => set_value('id', $row->id),
		'id_users' => set_value('id_users', $row->id_users),
		'demande_no' => set_value('demande_no', $row->demande_no),
		'suject' => set_value('suject', $row->suject),
		'description' => set_value('description', $row->description),
		'cost' => set_value('cost', $row->cost),
		'state' => set_value('state', $row->state),
		'create_date' => set_value('create_date', $row->create_date),
	    );
            $this->load->view('demandes/demandes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('demandes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_users' => $this->input->post('id_users',TRUE),
		'demande_no' => $this->input->post('demande_no',TRUE),
		'suject' => $this->input->post('suject',TRUE),
		'description' => $this->input->post('description',TRUE),
		'cost' => $this->input->post('cost',TRUE),
		'state' => $this->input->post('state',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->Demandes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('demandes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Demandes_model->get_by_id($id);

        if ($row) {
            $this->Demandes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('demandes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('demandes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');
	$this->form_validation->set_rules('demande_no', 'demande no', 'trim|required');
	$this->form_validation->set_rules('suject', 'suject', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('cost', 'cost', 'trim|required');
	$this->form_validation->set_rules('state', 'state', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "demandes.xls";
        $judul = "demandes";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");
	xlsWriteLabel($tablehead, $kolomhead++, "Demande No");
	xlsWriteLabel($tablehead, $kolomhead++, "Suject");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "Cost");
	xlsWriteLabel($tablehead, $kolomhead++, "State");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");

	foreach ($this->Demandes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
	    xlsWriteLabel($tablebody, $kolombody++, $data->demande_no);
	    xlsWriteLabel($tablebody, $kolombody++, $data->suject);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cost);
	    xlsWriteLabel($tablebody, $kolombody++, $data->state);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Demandes.php */
/* Location: ./application/controllers/Demandes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-15 22:40:45 */
/* http://harviacode.com */