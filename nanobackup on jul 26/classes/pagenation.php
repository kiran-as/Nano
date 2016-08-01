<?
	function pagenation($totalrows,$limit,$pn,$page)
					{
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page?png=$pageprev\" class='link' >Prev</a> "); 
							}
						
							$numofpages = $totalrows / $limit; 
							
							for($i = 1; $i <= $numofpages; $i++){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page?png=$i\" class='link'>$i</a> ");
								}
							}
						
						
							if(($totalrows % $limit) != 0){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page?png=$i\" class='link'>$i</a> ");
								}
							}
						
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("<a href=\"$page?png=$pagenext\" class='link'>Next</a>"); 
							}

					}		
					
		function reportspagenation($totalrows,$limit,$pn,$page)
					{
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page&png=$pageprev\" class='link' >Prev</a> "); 
							}
						
							$numofpages = $totalrows / $limit; 
							
							for($i = 1; $i <= $numofpages; $i++){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page&png=$i\" class='link'>$i</a> ");
								}
							}
						
						
							if(($totalrows % $limit) != 0){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("<a href=\"$page&png=$i\" class='link'>$i</a> ");
								}
							}
						
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("<a href=\"$page&png=$pagenext\" class='link'>Next</a>"); 
							}

					}		
					
									
					
					
					
	
		function searchPagenation($totalrows,$limit,$pn,$page)
					{
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page&png=$pageprev\"  ><img src='images/arrow_left.jpg'  border='0' /></a>&nbsp;&nbsp;"); 
							}
						
							$numofpages = $totalrows / $limit; 
							
							for($i = 1; $i <= $numofpages; $i++){
								if($i == $pn){
									echo("&nbsp;&nbsp;&nbsp;".$i."&nbsp;&nbsp;");
								}else{
									echo("&nbsp;&nbsp;<a href=\"$page&png=$i\" class='pagelink' >$i</a>&nbsp;&nbsp; ");
								}
							}
						
						
							if(($totalrows % $limit) != 0){
								if($i == $pn){
									echo($i." ");
								}else{
									echo("&nbsp;&nbsp;<a href=\"$page&png=$i\" class='pagelink'>$i</a>&nbsp;&nbsp; ");
								}
							}
						
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("&nbsp;<a href=\"$page&png=$pagenext\" class='link'><img src='images/arrow_right.jpg'  border='0' '/></a>"); 
							}
					
					}				
				
			function articlePagenation($totalrows,$limit,$pn,$page)
					{
					
					
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page&png=$pageprev\" class='link' >Prev</a> | "); 
							}
						
							$numofpages = $totalrows / $limit; 
							
									
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("<a href=\"$page&png=$pagenext\" class='link'>Next</a>"); 
							}
					
					}	
					
				function testimonal_pagenation($totalrows,$limit,$pn,$page)
					{
					
					
							if($pn != 1){ 
								$pageprev = $pn-1;
								
								echo("<a href=\"$page?png=$pageprev\" class='link' >Prev</a> | "); 
							}
						
							$numofpages = $totalrows / $limit; 
							
									
							if(($totalrows - ($limit * $pn)) > 0){
								$pagenext = $pn+1;
								 
								echo("<a href=\"$page?png=$pagenext\" class='link'>Next</a>"); 
							}
					
					}		
					
				
								
?>