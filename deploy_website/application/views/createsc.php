

<?php include 'header_m.php' ?>

	<div class="container" style="background:white;width:89.5%">

		<h2>Cluster Settings</h2>
		  <p>Configurations of cluster that you need to deploy</p>
		 	<br />
			<form class="form-horizontal" role="form">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Build</label>
			    <div class="col-sm-10" style ="width:50%">
			      <input class="form-control" id="focusedInput" type="text" value="Select build to deploy">
			    </div>
			  </div>


			  <div class="form-group">
			    <label class="col-sm-2 control-label">Peer Num In Site</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="focusedInput" type="text" value=3>
			    </div>
			  </div>

  			  <div class="form-group">
			    <label class="col-sm-2 control-label">Search Head Num In Site</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="focusedInput" type="text" value = 1 >
			    </div>
			  </div>


			  <div class="form-group">
			    <label class="col-sm-2 control-label">Search factor</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="focusedInput" type="text" value=2>
			    </div>
			  </div>

			  
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Replication factor</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="focusedInput" type="text" value=3>
			    </div>
			  </div>

			 

			  <hr/>
			  <h2>Hosts to Deploy Splunk</h2>
  				<p>Hosts information for deploy splunk cluster</p>
			 	<br />
  	
  				<div class="form-group">
			    <label class="col-sm-2 control-label">Hosts Username</label>
				    <div class="col-sm-10" style ="width:30%">
				      <input class="form-control" id="focusedInput" type="text" value="root">
				    </div>
			  	</div>


  			  <div class="form-group">
			    <label class="col-sm-2 control-label">Hosts Password</label>
			    <div class="col-sm-10" style ="width:30%">
			      <input class="form-control" id="focusedInput" type="text" value="sp1unk">
			    </div>
			  </div>

			  <div class="form-group">
			     <label class="col-sm-2 control-label" for="Hosts">Hosts:</label>
			    <div class="col-sm-10" style ="width:50%">
			      <textarea class="form-control" rows="10" id="hosts"></textarea>
			 	</div>
			 	<div class="col-sm-2>
			 		<input type="Submit" class="col-sm-2btn .btn-danger" value="Submit Button">
			 	</div>
			  </div>
		


			</form>
			<hr/>
			
 				
	</div>
	


<?php include 'footer_m.php' ?>