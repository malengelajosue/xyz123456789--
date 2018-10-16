<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $user;
    private $employee;
    private $departement;

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
        
        $this->load->model('Departements_model');
        $this->user = new Users_model();
      
        $this->departement = new Departements_model();
    }

    public function index() {
        $this->load->view('login/login', []);
    }

    public function authentication() {

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $this->user = $this->user->get_by_login($username);
        if ($this->user != null) {
            if ($this->user->pass == $password) {
                
             
                $this->departement = $this->departement->get_by_id($this->user->idDepartement);
            
                $this->session->set_userdata('user', $this->user);
              
                $this->session->set_userdata('departement', $this->departement);
                redirect(base_url('home'));
            } else {
             
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function logout() {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('employee');
        $this->session->unset_userdata('departement');
        redirect(base_url());
    }

}
