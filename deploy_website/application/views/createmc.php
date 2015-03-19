

<?php include 'header_m.php' ?>


<!-- javascript part 

	
	<!-- fancy box -->
	<script type="text/javascript" src="<?php echo base_url();?>application/js/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>application/js/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/jquery.fancybox.css" media="screen" />
	
	
	<!--messenger -->
	<script type="text/javascript" src="<?php echo base_url();?>application/js/messenger.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/messenger.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/messenger-theme-future.css" media="screen" />
		
<style>
	#fancybox-content {
	 	background-color: #E6E6E6;
	} 

</style>


	<script type="text/javascript">
		$(document).ready(function() {
 		
		
		
			//submit data
	   		$('#submit').click(function(e){
	   			

	   			e.preventDefault();
	   			
	   			//message
   				Messenger.options = {
				    extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-center',
				    theme: 'future'
				  }
	   			
	   			
				

			
	   			
				
				// $('#submit').attr("disabled", true);
				var build=$('#build').val();
				var peernum=$('#peernum').val();
				var shnum=$('#shnum').val();
				
				
				var sf=$('#sf').val();
				var rf=$('#rf').val();

				var username=$('#username').val();

				var password=$('#password').val();

				var hosts=$('#hosts').val();
				var sitenum=$('#sitenum').val();
				var site_rf=$('#site_rf').val();
				var site_sf=$('#site_sf').val();


	   			if(hosts=="")
	   			{
		   			
   					Messenger.options = {
				    	extraClasses: 'messenger-fixed messenger-on-top messenger-on-center',
				    	theme: 'future'
				 	 }
		   			
		   			Messenger().post({
				 		 message: 'please provide hosts',
				 		 type: 'error',
   						 showCloseButton: true
				  
					});
		   			
	   				return;
	   			};


				Messenger().post({
				  message: 'Sending your request to our services...',
				  
				}); 
				
	   			
				//$.fancybox.showLoading();
				
				// alert(build+peernum+shnum+sf+rf+username+password+hosts);
				
		
				$.ajax({
					type:"POST" ,
					cache: false ,
					dataType :'json' ,
					data : {
							build:build,
							sitenum:sitenum,
							peernum:peernum,
							shnum:shnum,
							sitenum:sitenum,
							site_rf:site_rf,
							site_sf:site_sf,
							sf:sf,
							rf:rf,
							username:username,
							password:password,
							hosts:hosts,
							} , 
					url : "<?php echo site_url('home/createmc_task');?>",
					complete : function(){
						
			
						
				
				
						/*Messenger().post
						    message: 'There was an explosion while processing your request.'
						    type: 'error'
						    showCloseButton: true
						    hideAfter: 10 */
					
				
											
			
				    	//window.location.replace("<?php echo site_url('home/createNormal');?>")
				    	// window.location.reload(true);
					//	$.fancybox.hideLoading()	
					
					}
				});
			});
		
		
		


			
		});
		
</script>




-->





<!-- html body part -->
	<div class="container" style="background:white;width:89.5%">
		<!-- <h3 style="margin-top: 30px;">Cluster settings</h3> -->
		<h3><span class="label label-warning">Multi-Cluster settings</span></h3>
		  <!-- <p>Configurations of cluster that you need to deploy</p> -->
		 	<br />
			<form class="form-horizontal" role="form">
			  <div class="form-group">
			    <label class="col-sm-2 control-label ">Build</label>
			    <div class="col-sm-10" style ="width:50%">
			      <input class="form-control" id="build" type="text" value="http://10.66.4.29:8091/build.tgz">
			    </div>
			  </div>


			 <div class="form-group">
			    <label class="col-sm-2 control-label">Site Num</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="sitenum" type="text" value="3">
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="col-sm-2 control-label">Peer Num In Site</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="peernum" type="text" value="3">
			    </div>
			  </div>

  			  <div class="form-group">
			    <label class="col-sm-2 control-label">Search Head Num In Site</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="shnum" type="text" value = "1" >
			    </div>
			  </div>


			  <div class="form-group">
			    <label class="col-sm-2 control-label">Search factor</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="sf" type="text" value="2">
			    </div>
			  </div>

			  
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Replication factor</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="rf" type="text" value="3">
			    </div>
			  </div>

	  		<div class="form-group">
			    <label class="col-sm-2 control-label">Site_Search_factor</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="site_sf" type="text" value="origin:1,total:3">
			    </div>
			  </div>

			  
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Site_Replication_factor</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="site_rf" type="text" value="origin:2,total:4">
			    </div>
			  </div>
			 

			  <hr/>
			  <!-- <h3>Hosts to deploy Splunk</h3> -->
			  <h3><span class="label label-warning" >Hosts to deploy</span></h3>

  				<!-- <p>Hosts information for deploy splunk cluster</p> -->
			 	<br />
  	
  				<div class="form-group">
			    <label class="col-sm-2 control-label">Hosts Username</label>
				    <div class="col-sm-10" style ="width:30%">
				      <input class="form-control" id="username" type="text" value="root">
				    </div>
			  	</div>


  			  <div class="form-group">
			    <label class="col-sm-2 control-label">Hosts Password</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="password" type="text" value="password">
			    </div>
			  </div>

			  <div class="form-group">
			     <label class="col-sm-2 control-label" for="Hosts">Hosts:</label>
			    <div class="col-sm-10" style ="width:50%">
			      <textarea class="form-control" rows="10" id="hosts"></textarea>
			 	</div>
			 
			  </div>
		

			   <button id="submit" type="button" class="btn btn-info btn-lg" style="
				    width: 134px;
				    margin-left: 20%;
				">Submit Job</button>

			</form>
			<hr/>
			
 				
	</div>
	


<?php include 'footer_m.php' ?>