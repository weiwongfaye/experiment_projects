<?php

/**
 * 
 */
class Deploy extends CI_Model {
	
	


	//create cluster function
	function createSingleCluster(
								$build,
								$peernum,
								$shnum,
								$sf,
								$rf,
								$username,
								$password,
								$hosts
							)
	{


		//write to sctask table
		$data = array(
						  'deploytype'=>'single_cluster',
						  'build'=>$build,
						  'peernum'=>$peernum,
						  'shnum'=>$shnum,
						  'sf'=>$sf,
						  'rf'=>$rf,
						  'username'=>$username,
						  'password'=>$password,
						  'hosts'=>$hosts,
						  'createtime' => date("Y-m-d H:i:s"),
						  'finishtime' => 'N/A',
						  'status' => 'scheduled'
	 
				);
				

		$this->db->insert('sctask', $data); 
		

	}
	
	

	function getTaskInformation()
	{

	  $sql = "SELECT * from sctask ORDER BY id DESC";
		
	  $q=$this->db->query($sql);
		
		
	  if($q->num_rows()>0){
			foreach ($q->result() as $row){
				$data[]=$row;
			}
			return $data;
	  }
	}

	// destroy task and clean machine

	function destroy($id)
	{

		$sql="UPDATE sctask set status=\"destroy\" where id=".$this->db->escape($id);	
		$q=$this->db->query($sql);


	}



	//create multi site cluster

	function createMultiSiteCluster(
						     	$build,
								$peernum,
								$shnum,
								$sf,
								$rf,
								$username,
								$password,
								$hosts,
								$sitenum,
								$site_rf,
								$site_sf
								)
	{
		$data = array(
						  'deploytype'=>'multisite_cluster',
						  'build'=>$build,
						  'peernum'=>$peernum,
						  'shnum'=>$shnum,
						  'sf'=>$sf,
						  'rf'=>$rf,
						  'username'=>$username,
						  'password'=>$password,
						  'hosts'=>$hosts,
						  'createtime' => date("Y-m-d H:i:s"),
						  'finishtime' => 'N/A',
						  'status' => 'scheduled',
						  'sitenum' =>$sitenum,
						  'site_sf' =>$site_sf,
						  'site_rf' =>$site_rf,
	 
				);
				

		$this->db->insert('sctask', $data); 
		


	}



}



?>