<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Words extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		function randomStringLoad($length = 14) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
		$randomLoad = randomStringLoad();
		if($this->session->userdata('counter') == NULL){
			$this->session->set_userdata('counter', 1);
		}
		if($this->session->userdata('random') == ''){
			$this->session->set_userdata('random', $randomLoad);
		}
		$this->load->view('main');
	}
	public function process(){
		function randomString($length = 14) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
		if($this->session->userdata('counter')){
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter+1);
		}
		else{
			$this->session->set_userdata('counter', 1);
		}
		$random = randomString();
		$this->session->set_userdata('random', $random);
		redirect('/');
	}
}