

<?php include 'header_m.php' ?>
		
 		<link rel="stylesheet" href="<?php echo base_url();?>application/css/webticker.css" type="text/css" media="screen"> 
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>application/js/datatable/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>application/js/datatable/jquery.dataTables.js"></script>
		 <script type="text/javascript" src="<?php echo base_url();?>application/js/jquery.webticker.js"></script>
	
	
	
		<!-- fancy box -->
	<script type="text/javascript" src="<?php echo base_url();?>application/js/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>application/js/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/jquery.fancybox.css" media="screen" />
	
	<style>
	
		#fancybox-inner {
		 	background: rgba(215, 236, 228, 0.51);
		} 
	</style>
		
	
	<!--messenger -->
	<script type="text/javascript" src="<?php echo base_url();?>application/js/messenger.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/messenger.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/css/messenger-theme-future.css" media="screen" />
			
			
					
<script type="text/javascript" charset="utf-8">
			/* Formating function for row details */
			function fnFormatDetails ( oTable, nTr )
			{
				var aData = oTable.fnGetData( nTr );
				var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
				sOut += '<tr><td>Build Installed Detail:</td><td>'+aData[4]+'</td></tr>';
				sOut += '<tr><td>Install Summary:</td><td>'+aData[5]+'</td></tr>';
				sOut += '<tr><td>Detail install Report:</td><td>'+aData[6]+'</td></tr>';
				//sOut += '<tr><td>Extra Info:</td><td>And any further details here (images etc)</td></tr>';
				sOut += '</table>';
				
				return sOut;
			}
			
			$(document).ready(function() {
				/*
				 * Insert a 'details' column to the table
				 */
				
			
				
				$("#webticker2").webTicker({duplicate:true, speed: 40, direction: 'left', rssfrequency:2, startEmpty:false, hoverpause:true});	
				
				var nCloneTh = document.createElement( 'th' );
				var nCloneTd = document.createElement( 'td' );
				nCloneTd.innerHTML = "<img src=<?php echo base_url();?>application/src/details_open.png>";
				nCloneTd.className = "center";
				
				$('#example thead tr').each( function () {
					this.insertBefore( nCloneTh, this.childNodes[0] );
				} );
				
				$('#example tbody tr').each( function () {
					this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
				} );
				
				/*
				 * Initialse DataTables, with no sorting on the 'details' column
				 */
				var oTable = $('#example').dataTable( {
					"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [ 0 ] }
					],
					"aaSorting": [[7, 'desc']]
				});
				
				/* Add event listener for opening and closing details
				 * Note that the indicator for showing which row is open is not controlled by DataTables,
				 * rather it is done here
				 */
				$('#example tbody td img').live('click', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "<?php echo base_url();?>application/src/details_open.png";
						oTable.fnClose( nTr );
					}
					else
					{
						/* Open this row */
						this.src = "<?php echo base_url();?>application/src/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
					}
				} );
	
				
				$('button[id^="task_"]').live('click',function() {
					
		   		
	   			
	   			//message
	   			
				Messenger.options = {
					    extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-center',
					    theme: 'future'
					    
					  }
			
			
			   	  var userid=<?php echo '"'.$usrid.'"';?>
			   	
				  if($(this).html()=="Apply"){
						//alert("here")
						//	$(this).html('release');$(this).html('release');
						
																
						Messenger().post({
						  message: 'Apply Machine, you will get the login detail via mail, please check your email...',
						  hideAfter: 2
						}); 
						
						
						var taskidhtml=$(this).attr('id');
						var usedbyidhtml="apply_"+$(this).attr('id').substring(5); 
						var createridhtml="creater_"+$(this).attr('id').substring(5); 
						var taskid=$(this).attr('id').substring(5); 
						$.fancybox.showLoading();
						$.ajax({
						type:"POST" ,
						cache: false ,
						//dataType :'json' ,
						data : {
								taskid:taskid
								} , 
						url : "<?php echo site_url('home/ApplyServer');?>",
						success:function(data){
							//alert("finished");
							//$('#example tr td.btn').text("release");
							//$(this).html('Release');
							
							$.fancybox(data, {
						         width: 800,
						         height: 300,
						         autoSize: false,
						         closeClick: false,
						         openEffect: 'none',
						         closeEffect: 'none',
						         beforeShow: function(){
									  $(".fancybox-inner").css("backgroundColor","rgba(215, 236, 228, 0.51)");
									 }
							});
							
						
							$.fancybox.hideLoading();
							
							if (data.indexOf("occupied")==-1)
							{								
								/*if ($('#'+createridhtml).html()=="Auto")
								{
									$('#'+taskidhtml).html('Release');	
									$('#'+usedbyidhtml).html(userid);	
								}else{
									$('#'+taskidhtml).html('KILL!');	
									$('#'+taskidhtml).removeClass( "btn btn-success" ).addClass( "btn btn-warning" );
									$('#'+usedbyidhtml).html(userid);	
								
								}*/
								$('#'+taskidhtml).html('KILL!');	
								$('#'+taskidhtml).removeClass( "btn btn-success" ).addClass( "btn btn-warning" );
								$('#'+usedbyidhtml).html(userid);	
							}
							
												
						}
				
	
						 });
				 }
				 
		
				 else{
				 	
				 																	
						Messenger().post({
						  message: 'Terminating the machine you are using...'
						  
						}); 
						//$(this).html('Apply');
						$('#'+taskidhtml).html('Terminating...');
						var taskidhtml=$(this).attr('id');
						var usedbyidhtml="apply_"+$(this).attr('id').substring(5); 
						var taskid=$(this).attr('id').substring(5); 
						$.ajax({
						type:"POST" ,
						cache: false ,
						dataType :'json' ,
						data : {
								taskid:taskid
								} , 
						url : "<?php echo site_url('home/TerminateServer');?>",
						complete:function(){
							
							$('#'+taskidhtml).parent().parent().remove();
							//$('#'+usedbyidhtml).html('N/A');
						}
					

						 });
				 }
					
			    //window.location.replace("<?php echo site_url('home');?>")	
				
				//window.location.reload(true);
		
					
					
				});
		
			});
		</script>
		
				
<body >	
	

	
		<div class="container">
			<div id="dt_example">
			<div id="dt_content" style="margin-left: 20px;margin-right: 20px;margin-top: 5px;border-bottom-width: 5px;">
			<!-- <h1 style="font-weight: bold;  font-family:"Trebuchet MS", sans-serif;">ECS Machines Pool</h1> -->
			
			<!-- <ul id="webticker2" style="color: black";>	
			<li>
				<?php echo "Server status in Current ECS Domain : ".$ecsnuminf[0]->Running."(Running) ".$ecsnuminf[0]->Pause."(Paused) ".$ecsnuminf[0]->Available."(NotUsed)" ;?>
			</li>
			<li>
			   <?php
			   		
					if ($ecsapistatus==3)
					{
						echo "ECS API status is having problem";
					}
					else
					{
			    		echo "ECS status is good";
					}
			    ?>
			</li>
			<li>
				<?php
				
		
				   echo "Task status Information Overall: ".$tasksuminfo[0]." (tasks is Ready for use); ".$tasksuminfo[1]." (tasks is waiting for process); ".$tasksuminfo[2]." (tasks is Server Ready); ".$tasksuminfo[3]." (tasks is Installing product); ";
				
				
				?>
				
				
			</li>
	
		
			</ul> -->


			<h1 style="font-weight: bold;">Tasks List </h1>
			<div id="demo" style="margin-bottom: 20px">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" style="margin-bottom: 8px">
	<thead>
		<tr>
			<th>Deployment Type</th>
			<th>Master</th>
			<th>Settings</th>
			<th style="display: none">Buildinstalldetail</th>
			<th style="display: none">InstallSummary</th>
			<th style="display: none">InstallDetail</th>
			<th style="display: none">id</th>
			<th>Build</th>
			<th>Status</th>
			<!--<th>KeepDuration</th>-->
			<th>Details</th>
			<th>Status</th>
			
		</tr>
	</thead>
	<tbody>
		
		<?php 
		
		  if (count($tasksinfo)>0)
		  {
			foreach ($tasksinfo as $singleTask) {
				
			//display all
			
			if ($singleTask->terminateflag==0){
					
				 //table row color
				 if($singleTask->status=="Ready For Use"){
				 	 echo '<tr class="gradeA">';
				 }elseif(stripos(strtolower($singleTask->status), "out")){
				 	echo '<tr class="gradeX">';
				 	
				 }else{
				 	echo '<tr class="gradeC">';
				 }
				
				 echo '<td>'.$singleTask->workeros.'</td>';
				 echo '<td>'.$singleTask->server_type.'</td>';
				 
				 $buildtoinstall="";
				 $buildtoinstallDetail="";
				 $buildinfo=$singleTask->buildinfo;
				 $buildarray=explode("[forsplit]", $buildinfo);
				 
				 $installSummary=$singleTask->final_status;
				 $installDetailReport=$singleTask->message;
				 
				 if (is_null($installSummary)){$installSummary="N/A";}
				 if (is_null($installDetailReport)){$installDetailReport="N/A";}
				 
				 
				 foreach ($buildarray as $build) {
					 $singlebuildinf=explode("|", $build);
					 $buildtoinstall=$buildtoinstall.$singlebuildinf[0].'-'.$singlebuildinf[1]."<br/>";
					 $buildtoinstallDetail=$buildtoinstallDetail.$singlebuildinf[0].'-'.$singlebuildinf[2]."<br/>";
				 }
				 
				 echo '<td>'.$buildtoinstall.'</td>';
				 echo '<td style="display:none">'.$buildtoinstallDetail.'</td>';
				 echo '<td style="display:none">'.$installSummary.'</td>';
				 echo '<td style="display:none">'.$installDetailReport.'</td>';
			     echo '<td style="display:none">'.$singleTask->id.'</td>';
				 echo '<td>'.date('Y-m-d H:i:s',$singleTask->taskcreatedatetime-8*60*60).'</td>';
				 
				 if($singleTask->serveralivetime!=="")
				 {
				 	echo '<td>'.date('Y-m-d H:i:s',$singleTask->serveralivetime-8*60*60).'</td>';
				 }else{
				 	echo '<td>N/A</td>';
				 }
				 				//(double)(sprintf("%.2f", floatval((($row->value)/$baselinevalue)))s 
				 //echo '<td>'.$singleTask->serveraliveduration.'days</td>';
				 if($singleTask->serveralivetime!==""){
				 	if ($singleTask->serveraliveduration*24*60*60-(time()-$singleTask->serveralivetime)>0)
					{
				 		echo '<td>'.((double)(sprintf("%.2f",($singleTask->serveraliveduration*24*60*60-(time()-$singleTask->serveralivetime))/3600/24))).' days</td>';
					}
					else{
						 echo '<td> 0 days</td>';
					}
				 }else{
				 	 echo '<td>'.$singleTask->serveraliveduration.' days</td>';
				 }
				 echo '<td>'.$singleTask->status.'</td>';
				 echo '<td id="creater_'.$singleTask->id.'" >'.$singleTask->creater.'</td>';
				 
				 		 
				 if($singleTask->applyby!=="")
				 {
				 	echo '<td id="apply_'.$singleTask->id.'" >'.$singleTask->applyby.'</td>';
				 }else{
				 	echo '<td id="apply_'.$singleTask->id.'" >N/A</td>';
				 }
			
			
				
				 if($singleTask->status=="Ready For Use" && ($usrid==$singleTask->creater||$singleTask->creater=="Auto") &&$singleTask->applyby==="" &&$singleTask->terminateflag==0)
				 {
					 echo "<td><button class=\"btn btn-success\" id=\"task_".$singleTask->id."\" type=\"submit\">Apply</button></td>";
				 }
				 elseif($singleTask->status=="Ready For Use" && $singleTask->creater=="Auto" &&$singleTask->applyby==$usrid &&$singleTask->terminateflag==0)
				 {
				 	echo "<td><button class=\"btn btn-warning\" id=\"task_".$singleTask->id."\" type=\"submit\">KILL!</button></td>";
					
				 }
				 elseif($singleTask->status=="Ready For Use" && $usrid==$singleTask->creater &&$singleTask->applyby==$usrid &&$singleTask->terminateflag==0)
				 {
				 	echo "<td><button class=\"btn btn-warning\" id=\"task_".$singleTask->id."\" type=\"submit\">KILL!</button></td>";
				 }
		 		 elseif($singleTask->status=="Ready For Use" && $singleTask->applyby!=""  &&$singleTask->applyby!=$usrid &&$singleTask->terminateflag==0)
				 {
				 	echo "<td><button class=\"btn btn-warning\" disabled=\"disabled\"  id=\"task_".$singleTask->id."\" type=\"submit\">KILL!</button></td>";
				 }
				 elseif($singleTask->status=="Ready For Use" &&$singleTask->applyby!=$usrid &&$singleTask->applyby!="" &&$singleTask->terminateflag==0)
				 {
				 	echo "<td><button class=\"btn btn-warning\" disabled=\"disabled\"  id=\"task_".$singleTask->id."\" type=\"submit\">KILL!</button></td>";
					
				 }else
			 	 {
			 		 echo "<td><button class=\"btn btn-success\" disabled=\"disabled\" id=\"task_".$singleTask->id."\" type=\"submit\">Apply</button></td>";
			 	 }	 
				 echo '</tr>';
			 }
			 
			}
		  }
		?>
		<!--<tr class="gradeX">
			<td>Win7 64bit</td>
			<td>8Cores/16GB</td>
			<td>ama-12051,ami_solver-12051,ami-12349</td>
			<td>Install Fail</td>
			<td>xxxx</td>
			<td>N</td>
			<td><button class="btn btn-success" disabled="disabled" type="submit">Apply</button></td>
		</tr>
		<tr class="gradeC">
			<td>Win8 64bit</td>
			<td>4Cores/16GB</td>
			<td>xxxx</td>
			<td>Installing</td>
			<td>xx</td>
			<td>N</td>
			<td><button class="btn btn-success" type="submit">Apply</button></td>
		</tr>
		<tr class="gradeA">
			<td>Win7 64bit</td>
			<td>8Cores/16GB</td>
			<td>xxxx</td>
			<td>Install Pass</td>
			<td>xxxxx</td>
			<td>Y</td>
			<td><button class="btn btn-success" type="submit">Apply</button></td>
		</tr>-->
		
		
	</tbody>
</table>
	</div>
			
	
	<br />
		</div>
	</div>


    </div><!-- /.container -->

		
	  

<?php include 'footer_m.php' ?>
	