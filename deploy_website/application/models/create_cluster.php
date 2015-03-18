<?php

/**
 * 
 */
class Create_cluster extends CI_Model {
	
	
	// function getECSNumInf(){
		
	// 	$q=$this->db->get('ecs_status');
	// 	if($q->num_rows()>0){
	// 		foreach ($q->result() as $row){
	// 			$data[]=$row;
	// 		}
	// 		return $data;
	// 	}
		
	// }

	


	//create cluster function
	function createClusterTask($hosts,
							   $isMultisite,
							   $siteNum,
							   $peerNum,
							   $sf,
							   $rf)
	{


		//write to task database
		$data = array(
								  'hosts'=>$hosts,
								  'isMultisite'=>$isMultisite,
								  'siteNum'=>$siteNum,
								  'peerNum'=>$peerNum,
								  'sf'=>$sf,
								  'rf'=>$rf,
								 
						     	 
						     	 
				);
				
		$this->db->insert('task', $data); 
		
	


	}
	
	



	//createnormalusertask from web frontend	
	function createNormalUserTask($productlistArray,
								  $config_id,
								  $server_ip,
								  $server_id,
								  $server_name,
								  $server_type,
								  $status,
								  $creater,
								  $taskcreatedatetime,
								  $taskaliveduration,
								  $lastupdate,
								  $serveralivetime,
								  $serveraliveduration,
								  $applyby,
								  $mailto,
								  $ecsmachineavailable,
								  $workeros,
						     	  $taskprocessflag,
						     	  $terminateflag,
						     	  $taskprocesslog
						     
								 )
	
	
	{
		
		
		
		
		
		//write to task database
		$data = array(
								  'config_id'=>$config_id,
								  'server_ip'=>$server_ip,
								  'server_id'=>$server_id,
								  'server_name'=>$server_name,
								  'server_type'=>$server_type,
								  'status'=>$status,
								  'creater'=>$creater,
								  'taskcreatedatetime'=>$taskcreatedatetime,
								  'taskaliveduration'=>$taskaliveduration,
								  'lastupdate'=>$lastupdate,
								  'serveralivetime'=>$serveralivetime,
								  'serveraliveduration'=>$serveraliveduration,
								  'applyby'=>$applyby,
								  'mailto'=>$mailto,
								  'ecsmachineavailable'=>$ecsmachineavailable,
								  'workeros'=>$workeros,
						     	  'taskprocessflag'=>$taskprocessflag,
						     	  'terminateflag'=>$terminateflag
						     	 
						     	 
				);
				
		$this->db->insert('task', $data); 
		
	
	

	
		//write to config_info database
	
		
		foreach($productlistArray as $productlist)
		{
			
			list($pdname, $pdbuildpath) = explode('|', $productlist);
		
		
			//determine product_id		
			switch ($pdname) {
				case 'ami':
					if (strpos($pdbuildpath, "RC_candinate")!==FALSE)
					{
						$product_id=6;	
					}
					else if (strpos($pdbuildpath,"Samarium")!==FALSE)
					{
						$product_id=1;	
					}
					break;
				
				case 'ama':
					if (strpos($pdbuildpath, "RC_candinate")!==FALSE)
					{
						$product_id=7;	
					}
					else if (strpos($pdbuildpath,"Samarium")!==FALSE)
					{
						$product_id=2;	
					}	
					break;
				
				case 'ami_solvers':
					if (strpos($pdbuildpath, "RC_candinate")!==FALSE)
					{
						$product_id=8;	
					}
					else if (strpos($pdbuildpath,"Samarium")!==FALSE)
					{
						$product_id=3;	
					}
					break;
					
				case 'algor':
					if (strpos($pdbuildpath, "2015.00")!==FALSE ||strpos($pdbuildpath, "2015.01")!==FALSE )
					{
						$product_id=10;	
					}
					else if (strpos($pdbuildpath,"2016")!==FALSE||strpos($pdbuildpath,"2015.10")!==FALSE)
					{
						$product_id=4;	
					}
					
					break;	
				case 'cfd':
					if (strpos($pdbuildpath, "Bowfin")!==FALSE )
					{
						$product_id=9;	
					}
					else if (strpos($pdbuildpath,"GreyWolf")!==FALSE)
					{
						$product_id=5;	
					}
					break;
				
				default:
					$product_id=1;	
					break;
			}
		
			$data=array(
			
				 'id'=>$config_id,
				 'product_id'=>$product_id,
				 'buildpath'=>$pdbuildpath,
				 'buildnum'=>""
				
			);
			
			$this->db->insert('config_info', $data); 
		
		};
		
		
	}
	
	
}



?>