<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Employees extends MX_Controller {

	public function index(){
		$this->template->write_view('list');
	}
}
?>