<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Currencies extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Currencies_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('currencies/currencies_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Currencies_model->json();
    }

    public function read($id) 
    {
        $row = $this->Currencies_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'description' => $row->description,
		'amount' => $row->amount,
		'update_date' => $row->update_date,
	    );
            $this->load->view('currencies/currencies_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('currencies'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('currencies/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'description' => set_value('description'),
	    'amount' => set_value('amount'),
	    'update_date' => set_value('update_date'),
	);
        $this->load->view('currencies/currencies_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->Currencies_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('currencies'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Currencies_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('currencies/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'description' => set_value('description', $row->description),
		'amount' => set_value('amount', $row->amount),
		'update_date' => set_value('update_date', $row->update_date),
	    );
            $this->load->view('currencies/currencies_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('currencies'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->Currencies_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('currencies'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Currencies_model->get_by_id($id);

        if ($row) {
            $this->Currencies_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('currencies'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('currencies'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('update_date', 'update date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "currencies.xls";
        $judul = "currencies";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Date");

	foreach ($this->Currencies_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteLabel($tablebody, $kolombody++, $data->amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Currencies.php */
/* Location: ./application/controllers/Currencies.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-15 22:39:59 */
/* http://harviacode.com */