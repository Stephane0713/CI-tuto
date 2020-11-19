<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Page d\'Accueil';

		$this->load->view('common/header', $data);
		$this->load->view('site/index', $data);
		$this->load->view('common/footer', $data);
	}

	public function contact()
	{
		$this->load->helper("form");
		$this->load->library('form_validation');

		$data["title"] = "Contact";

		$this->load->view('common/header', $data);
		if ($this->form_validation->run()) {
			$this->load->library('email');
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to('stephaneD2205@gmail.com');
			$this->email->subject($this->input->post('title'));
			$this->email->message($this->input->post('message'));
			$this->email->send();
			$this->load->view('site/contact_result', $data);
		} else {
			$this->load->view('site/contact', $data);
		}
		$this->load->view('common/footer', $data);
	}
}
