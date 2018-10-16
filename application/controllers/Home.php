<?php

class Home extends CI_Controller{
    public function index(){
        $section=$this->load->view('home/dashboard',[],true);
        $this->load->view('home/home',['section'=>$section]);
    }
}