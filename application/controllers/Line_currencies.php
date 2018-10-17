<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Line_currencies extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Line_currencies_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'line_currencies/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'line_currencies/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'line_currencies/index.html';
            $config['first_url'] = base_url() . 'line_currencies/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Line_currencies_model->total_rows($q);
        $line_currencies = $this->Line_currencies_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'line_currencies_data' => $line_currencies,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       $section=$this->load->view('line_currencies/line_currencies_list', $data,true);
       $this->load->view('template/base',['section'=>$section]);
        
    }

    public function read($id) 
    {
        $row = $this->Line_currencies_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_currency' => $row->id_currency,
		'id_demande' => $row->id_demande,
		'amount' => $row->amount,
		'demande_type' => $row->demande_type,
		'create_date' => $row->create_date,
	    );
           $section=$this->load->view('line_currencies/line_currencies_read', $data,true);
           $this->load->view('template/base',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('line_currencies'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('line_currencies/create_action'),
	    'id' => set_value('id'),
	    'id_currency' => set_value('id_currency'),
	    'id_demande' => set_value('id_demande'),
	    'amount' => set_value('amount'),
	    'demande_type' => set_value('demande_type'),
	    'create_date' => set_value('create_date'),
	);
       $section=$this->load->view('line_currencies/line_currencies_form', $data,true);
       $this->load->view('template/base',['section'=>$section]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_currency' => $this->input->post('id_currency',TRUE),
		'id_demande' => $this->input->post('id_demande',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'demande_type' => $this->input->post('demande_type',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->Line_currencies_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('line_currencies'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Line_currencies_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('line_currencies/update_action'),
		'id' => set_value('id', $row->id),
		'id_currency' => set_value('id_currency', $row->id_currency),
		'id_demande' => set_value('id_demande', $row->id_demande),
		'amount' => set_value('amount', $row->amount),
		'demande_type' => set_value('demande_type', $row->demande_type),
		'create_date' => set_value('create_date', $row->create_date),
	    );
           $section=$this->load->view('line_currencies/line_currencies_form', $data,true);
           $this->load->view('template/base',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('line_currencies'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_currency' => $this->input->post('id_currency',TRUE),
		'id_demande' => $this->input->post('id_demande',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'demande_type' => $this->input->post('demande_type',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
	    );

            $this->Line_currencies_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('line_currencies'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Line_currencies_model->get_by_id($id);

        if ($row) {
            $this->Line_currencies_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('line_currencies'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('line_currencies'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_currency', 'id currency', 'trim|required');
	$this->form_validation->set_rules('id_demande', 'id demande', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('demande_type', 'demande type', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "line_currencies.xls";
        $judul = "line_currencies";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Currency");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Demande");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Demande Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");

	foreach ($this->Line_currencies_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_currency);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_demande);
	    xlsWriteLabel($tablebody, $kolombody++, $data->amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->demande_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Line_currencies.php */
/* Location: ./application/controllers/Line_currencies.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-15 22:40:45 */
/* http://harviacode.com */