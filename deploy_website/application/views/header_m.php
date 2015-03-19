<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>Deploy Splunk In Multiple Hosts</title>
   		<link rel="icon" href="<?php echo base_url();?>application/src/splunk.ico">
    	<!-- Bootstrap core CSS -->
    	
		<link href="<?php echo base_url();?>application/css/bootstrap.css" rel="stylesheet"> 
		
		<style type="text/css" title="currentStyle">
			@import "<?php echo base_url();?>application/css/datatable/demo_page.css";
			@import "<?php echo base_url();?>application/css/datatable/demo_table.css";
		</style>
		
		<link href="<?php echo base_url();?>application/css/datatable/DT_bootstrap.css" rel="stylesheet"> 
		<link href="<?php echo base_url();?>application/css/createTask.css" rel="stylesheet"> 
	   <!-- <script src="<?php echo base_url();?>application/js/jquery.min.js"></script> -->
	  
	  				
		<script src="<?php echo base_url();?>application/js/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url();?>application/js/jquery-ui.js"></script>

	   

				
		
		
	</head>

	
	<body>
		
		
	<div class="navbar-wrapper">
      
        <div class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0px;border-bottom-width: 0px;">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo str_replace("\\index.php", "", base_url());?>home">Splunk Deployment Tool</a>
            </div>
            
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo str_replace("\\index.php", "", base_url());?>home">Tasks</a></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Create Deploy Task<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo str_replace("\\index.php", "", base_url());?>home/createsc">Cluster</a></li>
                    <li><a href="<?php echo str_replace("\\index.php", "", base_url());?>home/createmc">MultiSite Cluster</a></li>
                    <li><a href="<?php echo str_replace("\\index.php", "", base_url());?>home/createshc">SHC</a></li>
                    <li><a href="<?php echo str_replace("\\index.php", "", base_url());?>home/createdst">Distribute Search</a></li>

                  </ul>
                </li>
        
				
				        
				<!--instruction-->
				
				  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Instruction<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://video..." target="_blank">Video</a></li>
                    <li><a href="http://confulence..." target="_blank">Wiki</a></li>
                    <!--<li class="divider"></li>
                    <li><a href="/blog/create">create item</a></li>
                    <li><a href="/blog/systemlog">System log</a></li>-->
                  </ul>
                 <!-- <li><a href="#about">About</a></li>
                  <li><a href="#contact">Contact</a></li>-->
                </li>
                
                
                 </ul>
                 
                 
            </div>
            
          </div>
        </div>

    </div>
    