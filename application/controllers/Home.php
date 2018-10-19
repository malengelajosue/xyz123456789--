<?php

class Home extends CI_Controller{
    public function index(){
        $section=$this->load->view('template/dashboard',[],true);
        $this->load->view('template/base',['section'=>$section]);
    }
}