<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->model('deploy');

		$data['tasksinfo']=$this->deploy->getTaskInformation();
		// $data['tasksuminfo']=$this->ecs_preInstall->getTaskSummaryInformation();
		
		// var_dump($data['tasksinfo']); die;
        $this->load->view('home',$data);

	}

	// controller for single site cluster 

	public function createsc()
	{

		$this->load->view('createsc');
	}


	// controller for multi site cluster 

	public function createmc()
	{

		$this->load->view('createmc');
	}

	// create singel cluster task

	public function createsc_task()
	{
			
		
			sleep(1);
			
			/*
					build:build,
					peernum:peernum,
					shnum:shnum,
					sf:sf,
					rf:rf,
					username:username,
					password:password,
					hosts:hosts
			 */
		
			$build=$this->input->post('build');
			$peernum=$this->input->post('peernum');
			$shnum=$this->input->post('shnum');
			$sf=$this->input->post('sf');
			$rf=$this->input->post('rf');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$hosts=$this->input->post('hosts');


			
			//create task inf into database
			$this->load->model("deploy");
		
			$this->deploy->createSingleCluster(
						     	$build,
								$peernum,
								$shnum,
								$sf,
								$rf,
								$username,
								$password,
								$hosts
								);
					
			
		

	}


	// create multi-site cluster task

	public function createmc_task()
	{
			
		
			sleep(1);
			
			/*
					build:build,
					sitenum:sitenum,
					site_sf:site_sf,
					site_rf:site_rf
					peernum:peernum,
					shnum:shnum,
					sf:sf,
					rf:rf,
					username:username,
					password:password,
					hosts:hosts
			 */
		
			$build=$this->input->post('build');
			$peernum=$this->input->post('peernum');
			$shnum=$this->input->post('shnum');
			$sf=$this->input->post('sf');
			$rf=$this->input->post('rf');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$hosts=$this->input->post('hosts');
			$sitenum=$this->input->post('sitenum');
			$site_sf=$this->input->post('site_sf');
			$site_rf=$this->input->post('site_rf');


			
			//create task inf into database
			$this->load->model("deploy");
		
			$this->deploy->createMultiSiteCluster(
						     	$build,
								$peernum,
								$shnum,
								$sf,
								$rf,
								$username,
								$password,
								$hosts,
								$sitenum,
								$site_sf,
								$site_rf
								);
					
			
		

	}

	# destroy environment


	function destroy()
	{
		
		$taskid=$this->input->post('taskid');

		$this->load->model("deploy");
		$this->deploy->destroy($taskid);

	}
}
