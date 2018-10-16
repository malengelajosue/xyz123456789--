<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('users/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'empno' => $row->empno,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'login' => $row->login,
		'pass' => $row->pass,
		'id_type' => $row->id_type,
		'id_departement' => $row->id_departement,
		'mgr_empno' => $row->mgr_empno,
		'general_m' => $row->general_m,
	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'empno' => set_value('empno'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'login' => set_value('login'),
	    'pass' => set_value('pass'),
	    'id_type' => set_value('id_type'),
	    'id_departement' => set_value('id_departement'),
	    'mgr_empno' => set_value('mgr_empno'),
	    'general_m' => set_value('general_m'),
	);
        $this->load->view('users/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'empno' => $this->input->post('empno',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'login' => $this->input->post('login',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'id_type' => $this->input->post('id_type',TRUE),
		'id_departement' => $this->input->post('id_departement',TRUE),
		'mgr_empno' => $this->input->post('mgr_empno',TRUE),
		'general_m' => $this->input->post('general_m',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'empno' => set_value('empno', $row->empno),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'login' => set_value('login', $row->login),
		'pass' => set_value('pass', $row->pass),
		'id_type' => set_value('id_type', $row->id_type),
		'id_departement' => set_value('id_departement', $row->id_departement),
		'mgr_empno' => set_value('mgr_empno', $row->mgr_empno),
		'general_m' => set_value('general_m', $row->general_m),
	    );
            $this->load->view('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'empno' => $this->input->post('empno',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'login' => $this->input->post('login',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'id_type' => $this->input->post('id_type',TRUE),
		'id_departement' => $this->input->post('id_departement',TRUE),
		'mgr_empno' => $this->input->post('mgr_empno',TRUE),
		'general_m' => $this->input->post('general_m',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('empno', 'empno', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('login', 'login', 'trim|required');
	$this->form_validation->set_rules('pass', 'pass', 'trim|required');
	$this->form_validation->set_rules('id_type', 'id type', 'trim|required');
	$this->form_validation->set_rules('id_departement', 'id departement', 'trim|required');
	$this->form_validation->set_rules('mgr_empno', 'mgr empno', 'trim|required');
	$this->form_validation->set_rules('general_m', 'general m', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Empno");
	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Login");
	xlsWriteLabel($tablehead, $kolomhead++, "Pass");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Departement");
	xlsWriteLabel($tablehead, $kolomhead++, "Mgr Empno");
	xlsWriteLabel($tablehead, $kolomhead++, "General M");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->empno);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->login);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pass);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_departement);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mgr_empno);
	    xlsWriteNumber($tablebody, $kolombody++, $data->general_m);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-15 22:40:45 */
/* http://harviacode.com */