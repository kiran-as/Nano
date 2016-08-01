<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  

   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
		  $_SESSION["r_company"];
		  $rid = $_SESSION['r_id'];
		  
		  if($_SESSION['r_id']=='')
		  {
		  	echo "<script>parent.location = 'recruiter_index1.php';</script>";	
		  }
		  	$selectjobposings = "Select * from rv_job_posting where r_id='$rid'";

	$resultc = mysql_query($selectjobposings);
	$s=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arrajobpostings[$s]["jp_job_title"]	= $row["jp_job_title"];
		  $arrajobpostings[$s]["jp_description"]	= $row["jp_description"];
		    $arrajobpostings[$s]["jp_id"]	= $row["jp_id"];
		      $arrajobpostings[$s]["jp_expdate"]	= $row["jp_expdate"];
		    $arrajobpostings[$s]["createddate"]	= date('d/m/Y',$row["jp_created_date"]);
		    $arrajobpostings[$s]["expdate"]	= date('d/m/Y',$row["jp_expdate"]);
		  $s++;
		}	  
		  
		 $curdate = mktime();
		/* print_R($curdate);
		 die(); */
		 
		 /////////////////////////////////////
		 
		 $queryfe = "SELECT * FROM rv_academic_projects where p_end='VLSI' and p_vlsitype=1 group by m_id"; 
	$resultc = mysql_query($queryfe);
	$fe=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arravlisfrontend[$fe]["m_id"]	= $row["m_id"];
		  $fe++;  
		}

	$querybe = "SELECT * FROM rv_academic_projects where p_end='VLSI' and p_vlsitype=2 group by m_id"; 
	$resultc = mysql_query($querybe);
	$be=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arravlisbackend[$be]["m_id"]	= $row["m_id"];
		  $be++;  
		}
		
	$queryembed = "SELECT * FROM rv_academic_projects where p_end='EMBEDED'  group by m_id"; 
	$resultc = mysql_query($queryembed);
	$em=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arravlisembeded[$em]["m_id"]	= $row["m_id"];
		  $em++;  
		}
		
			$queryothers = "SELECT * FROM rv_academic_projects where p_end='-1'  group by m_id"; 
	$resultc = mysql_query($queryothers);
	$others=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arravlisothers[$others]["m_id"]	= $row["m_id"];
		  $others++;  
		}
				
		
		 
		 
$querybestudents = "SELECT * FROM rv_educational_details where qua_id=2 and e_course in (53,25) group by m_id"; 
	$resultc = mysql_query($querybestudents);
	$bestudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$bestudents]["m_id"]	= $row["m_id"];
		  $bestudents++;  
		}
		
		$querymtechstudents = "SELECT * FROM rv_educational_details where qua_id=1 and e_course in (1) group by m_id"; 
	$resultc = mysql_query($querymtechstudents);
	$mtechstudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$mtechstudents]["m_id"]	= $row["m_id"];
		  $mtechstudents++;  
		}

				$querybediplomastudents = "SELECT * FROM rv_educational_details where qua_id in(2,21) and e_course in (53,25) group by m_id"; 
	$resultc = mysql_query($querybediplomastudents);
	$bediplomastudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$bediplomastudents]["m_id"]	= $row["m_id"];
		  $bediplomastudents++;  
		}
		
	$querymtechdiplomastudents = "SELECT * FROM rv_educational_details where qua_id in(1,21) and e_course in (1) group by m_id"; 
	$resultc = mysql_query($querymtechdiplomastudents);
	$mtechdiplomastudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$mtechdiplomastudents]["m_id"]	= $row["m_id"];
		  $mtechdiplomastudents++;  
		}

	$querybscstudens = "SELECT * FROM rv_educational_details where qua_id=2 and e_course in (16) group by m_id"; 
	$resultc = mysql_query($querybscstudens);
	$bscstudens=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$bscstudens]["m_id"]	= $row["m_id"];
		  $bscstudens++;  
		}
		
	$queryexceptmtechstudens = "SELECT * FROM rv_educational_details where qua_id=1 and e_course not in (1) group by m_id"; 
	$resultc = mysql_query($queryexceptmtechstudens);
	$exceptmtechstudens=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$exceptmtechstudens]["m_id"]	= $row["m_id"];
		  $exceptmtechstudens++;  
		}
	$othersdegreestudents= $bscstudens+$exceptmtechstudens;	

	
$queryempfactor1 = "SELECT *  FROM rv_empfactor WHERE empfactor >=50 AND empfactor <=60 GROUP BY mid"; 
	$resultc = mysql_query($queryempfactor1);
	$empfactor1=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$empfactor1]["empfactor"]	= $row["empfactor"];
		  $empfactor1++;  
		}

		$queryempfactor2 = "SELECT *  FROM rv_empfactor WHERE empfactor >=61 AND empfactor <=70 GROUP BY mid"; 
	$resultc = mysql_query($queryempfactor2);
	$empfactor2=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$empfactor2]["empfactor"]	= $row["empfactor"];
		  $empfactor2++;  
		}

		$queryempfactor3 = "SELECT *  FROM rv_empfactor WHERE empfactor >=71 AND empfactor <=80 GROUP BY mid"; 
	$resultc = mysql_query($queryempfactor3);
	$empfactor3=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$empfactor3]["empfactor"]	= $row["empfactor"];
		  $empfactor3++;  
		}

		$queryempfactor4 = "SELECT *  FROM rv_empfactor WHERE empfactor >=81 AND empfactor <=90 GROUP BY mid"; 
	$resultc = mysql_query($queryempfactor4);
	$empfactor4=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$empfactor4]["empfactor"]	= $row["empfactor"];
		  $empfactor4++;  
		}

		$queryempfactor5 = "SELECT *  FROM rv_empfactor WHERE empfactor >=90 AND empfactor <=100 GROUP BY mid"; 
	$resultc = mysql_query($queryempfactor5);
	$empfactor5=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$empfactor5]["empfactor"]	= $row["empfactor"];
		  $empfactor5++;  
		}		
	
		$queryempfactor6 = "SELECT *  FROM rv_empfactor WHERE empfactor >=101"; 
	$resultc = mysql_query($queryempfactor5);
	$empfactor6=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent[$empfactor6]["empfactor"]	= $row["empfactor"];
		  $empfactor6++;  
		}		
  
$cs=1;
$ec=1;
$ee=1;
?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr">
    
    <head>
    
    		<style type="text/css">
body {
    margin: 0;
    padding: 2em;
    font-family: Lucida Sans,Lucida Grande,Arial !important;
    font-size: 13px !important;
    background: white;
    color: #333;
}

button {
	-webkit-transition: background-color 0.2s linear;
	border-radius:4px;
	-moz-border-radius: 4px 4px 4px 4px;
	-moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
	background-color: #E4F2FF;
	background-position: center top;
	background-repeat: repeat-x;
	border: 1px solid #769DC0;
	padding: 2px 8px 4px;
	font-size:1em;
}

button:hover {
	background-color: #AFD9FF;
	color: #000000;
}

h1 {
	font-size:1.5em;
}
.qhead	{
	display:inline-block;
	width:100px;
}

#formResultNode	{ padding:5px; background:#eee; border:1px solid #ccc; display:none; }


#availabilityNode { padding-left:20px; }
.demoAvailable	{ color:green; }
.demoTaken		{ color:red; }

#tweetsHolder		{  }
#tweetsHolder ul	{ list-style-type:none; margin:0; padding:0; }
#tweetsHolder ul li	{ background:#cbe4ff; padding:5px; border-radius:5px; margin-bottom:5px; }
        </style>
		<!--end of bar graph-->
		
    <link href="css/recruiter-styles.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
        <style type="text/css">
            body, html { font-family:helvetica,arial,sans-serif; font-size:90%; }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js"
        djConfig="parseOnLoad: true">
        </script>
        <script type="text/javascript">
        var cntrlchart;
            dojo.require("dojox.charting.Chart2D");
            dojo.require("dojox.charting.plot2d.Pie");
            dojo.require("dojox.charting.action2d.Highlight");
            dojo.require("dojox.charting.action2d.MoveSlice");
            dojo.require("dojox.charting.action2d.Tooltip");
            dojo.require("dojox.charting.themes.ThreeD");
            dojo.require("dojox.charting.widget.Legend");    

            
    var emp = <?php echo $empfactor1;?>;
       
			
			// Require the basic 2d chart resource: Chart2D
			dojo.require("dojox.charting.Chart2D");
		       dojo.require("dojox.charting.action2d.Tooltip");
			
			// Require the highlighter
			dojo.require("dojox.charting.action2d.Highlight");

			// Require the theme of our choosing
			//"Claro", new in Dojo 1.6, will be used
			dojo.require("dojox.charting.themes.ThreeD");
			
			// Define the data
			var chartData = [<?php echo $empfactor1;?>,<?php echo $empfactor2;?>,<?php echo $empfactor3;?>,<?php echo $empfactor4;?>,<?php echo $empfactor5;?>,<?php echo $empfactor6;?>];
			// When the DOM is ready and resources are loaded...
			//var chartData = [0,10,25];
        //////////////////////////////////////////////////////////////////
           
function piechart1() {
            	
                var dc = dojox.charting;
               var chartTwo1 = new dc.Chart2D("chartTwo1");
                chartTwo1.setTheme(dc.themes.ThreeD).addPlot("default", {
                    type: "Pie",
                    font: "normal normal 11pt Tahoma",
                    fontColor: "black",
                   
                    radius: 100
                }).addSeries("Series A", [{
                    y: <?php echo $fe;?>,
                   text: "Front End",
                    stroke: "black",
                    tooltip: "<?php echo $fe;?>"
                },
                {
                    y:  <?php echo $be;?>,
                   text: "Back End",
                    stroke: "black",
                    tooltip: "<?php echo $be;?>"
                }
                ,
                {
                    y:  <?php echo $em;?>,
                    text: "Embeded",
                    stroke: "black",
                    tooltip: "<?php echo $em;?>"
                }
                ,
                {
                    y:  <?php echo $others;?>,
                    text: "Others",
                    stroke: "black",
                    tooltip: "<?php echo $others;?>"
                }]);
                var anim_a = new dc.action2d.MoveSlice(chartTwo1, "default");
                var anim_b = new dc.action2d.Highlight(chartTwo1, "default");
                var anim_c = new dc.action2d.Tooltip(chartTwo1, "default");
                chartTwo1.render();
                var legendTwo1 = new dojox.charting.widget.Legend({
                    chart: chartTwo1
                },
                "legendTwo1");
            }
               
function piechart() {
            	
                var dc = dojox.charting;
               var chartTwo = new dc.Chart2D("chartTwo");
                chartTwo.setTheme(dc.themes.ThreeD).addPlot("default", {
                    type: "Pie",
                    font: "normal normal 11pt Tahoma",
                    fontColor: "black",
                   
                    radius: 100
                }).addSeries("Series A", [{
                    y: <?php echo $bestudents;?>,
                   // text: "Total No of Student",
                    stroke: "black",
                    tooltip: "BE Students"
                },
                {
                    y:  <?php echo $mtechstudents;?>,
                    //text: "Absent",
                    stroke: "black",
                    tooltip: "MTECH Students"
                }
                ,
                {
                    y:  <?php echo $bediplomastudents;?>,
                    //text: "Absent",
                    stroke: "black",
                    tooltip: "BE+Dip Students"
                }
                ,
                {
                    y:  <?php echo $mtechdiplomastudents;?>,
                    //text: "Absent",
                    stroke: "black",
                    tooltip: "M.TECH+Dip Students"
                }
                ,
                {
                    y:  <?php echo $othersdegreestudents;?>,
                    //text: "Absent",
                    stroke: "black",
                    tooltip: "Others"
                }]);
                var anim_a = new dc.action2d.MoveSlice(chartTwo, "default");
                var anim_b = new dc.action2d.Highlight(chartTwo, "default");
                var anim_c = new dc.action2d.Tooltip(chartTwo, "default");
                chartTwo.render();
                var legendTwo = new dojox.charting.widget.Legend({
                    chart: chartTwo
                },
                "legendTwo");
            }
            /////////////////////////////////////////////////////
            
            makeCharts = function() {
              
            
               // var chart1 = new dojox.charting.Chart2D("simplechart");
              
                	piechart();
                	
                  	piechart1();


                  	var chart = new dojox.charting.Chart2D("chartNode");

    				// Set the theme
    				chart.setTheme(dojox.charting.themes.ThreeD);

    				// Add the only/default plot 
    				chart.addPlot("default", {
    					type: "Columns",
    					markers: true,
    					gap:5
    				});
    				
    				// Add axes
    				chart.addAxis("x", {
                        labels: [{value: 1, text:"50-60"}, {value: 2, text:"60-70" },{value: 3, text:"70-80"}, {value: 4, text:"80-90"}, {value: 5, text:"90-100"}, {value:6, text:"100+"}]
                        });
    				chart.addAxis("y", { vertical: true, fixLower: "major", fixUpper: "major" });

    				// Add the series of data
    				chart.addSeries("Monthly Sales",chartData);
    				
    				// Highlight!
    				new dojox.charting.action2d.Highlight(chart,"default");

    				// Render the chart!
    				chart.render();

    				
             
            };
            dojo.addOnLoad(makeCharts);

        </script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dijit/themes/claro/claro.css"/>
        <script type="text/javascript">
 
		// When the DOM is ready, initialize the scripts.
		jQuery(function( $ ){
 
			// Get a reference to the container.
			var container = $( "#graphcontainer" );
 
 
			// Bind the link to toggle the slide.
			$( "#pullup" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
 
					// Toggle the slide based on its current
					// visibility.
					if (container.is( ":visible" )){
 
						// Hide - slide up.
						container.slideUp(3000);
						$("#divabc").show();
						
 
					} else {
 
						// Show - slide down.
						
 container.slideDown(3000 );
					}
				}
			);
 	$( "#divabc" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
 
					// Toggle the slide based on its current
					// visibility.
					
 
						// Hide - slide up.
											
						container.slideDown(3000 );
						$("#divabc").hide();
						
 
					
				}
			);
		});
 
	</script>
    </head>
    
    <body class=" claro ">
<div class="container">
<div class="dashboard"> 
<div id="table">
<div id="row" class="header">
<div id="globalfirstcell"><a href="index.php"><img src="images/logonanao.jpg"></a></div>
<div class="floatright"> Welcome <?php echo $_SESSION["r_user_name"];?> | <a href="recruiter_logout.php">Logout</a> 
<br><br>
<a href="dashboard.php">Dashboard</a> | <a href="recruiteredit.php">Edit Profile</a>
</div>
</div>
</div>

<div id="row">
<div id ="graphcontainer" class="graphcontainer">
		<div class="graphinner">

<div id="table">
<table width="100%" border="0" height="200">
<tr>
<td style="color: #0f5b9f;
  font-weight: bold;">Resumes with Education background</td>
<td>Resumes with Employability Factor</td>
<td>Resumes with Domain Background</td>
</tr>

<tr>
<td><div id="chartTwo" style="width: 350px; height: 250px;"></div><div id="legendTwo" align="center">
        </div></td>
		
		<td><div id="chartNode" style="width:300px;height:250px;"></div></td>
		<td><div id="chartTwo1" style="width: 350px; height: 250px;"></div> <div id="legendTwo1" align="center">
        </div></td>
</tr>
</table>

<!---
<div id="row">




<div id="globalfirstcell">

  <table border="0">
         <tr>
          
           <td>
           <div>Resumes with Education background</div>
                <div id="chartTwo" style="width: 350px; height: 250px;"></div><div id="legendTwo" align="center">
        </div></td></tr></table></div>
		<div valign="top">asdf
<table border="1"><tr><td><div id="chartNode" style="width:300px;height:250px;"></div></td></tr></table></div>
<div id="globalthirdcell"><table border="0"><tr>   <td><div>Resumes with Domain Background</div><div id="chartTwo1" style="width: 350px; height: 250px;"></div> <div id="legendTwo1" align="center">
        </div></td></tr></table></div>
 </div>
 
 --->
</div>
</div>
<div>
<table border="0" height="50">
<tr>
<td>&nbsp;
</td>
</tr>
</table>
</div>
<div class="pullup"><a href="#" id="pullup"><img src="images/pullup.png" id="imgpullup"></a></div>
</div>


 <div class="pulldown" id="divabc"><div>Click here to view the graphs</div><img src="images/pullup.png"></div>
  </div>
  </div>
  <div><table width="500"  height="50"><tr><td>&nbsp;</td></tr></table></div>
  <div id="row" class="dashboard">
<span class="pageheaders">Job Posting for " <?php echo $_SESSION["r_company"];?> "</span><br>
<span class="smalltext">Click on the "Job Title" to view assigned students resumes</span>
<div class="floatright"><a href="addjobposting.php" class="blueButton">Add</a></div>
<div><table width="100%"><tr><td>&nbsp;</td></tr></table></div>
<div class="row">
<table width="100%" border="0"  cellpadding="3" cellspacing="3" class="gridbackground">
    <tr  class="gridheader">
      <td width="50%">Job Title</td>
      <td width="25%">Posted Date</td>
      <td width="25%">Expiry Date</td>
      <td nowrap="nowrap">Status</td>
	  <td nowrap="nowrap"></td>
    </tr>
    <?php for($s=0;$s<count($arrajobpostings);$s++){?>
     <tr class="alternaterowcolor1">
     <?php if($curdate > $arrajobpostings[$s]['jp_expdate']){?>
      <td><?php echo $arrajobpostings[$s]['jp_job_title']?></td>
      <?php } else {?>
      <td> <a href="assignedstudents.php?idjobposting=<?php echo $arrajobpostings[$s]['jp_id']?>"><?php echo $arrajobpostings[$s]['jp_job_title']?></a></td>
      <?php }?>
      <td><?php echo $arrajobpostings[$s]['createddate']?></td>
      <td><?php echo $arrajobpostings[$s]['expdate']?></td>
      
      
	  <td nowrap="nowrap">
	    <?php if($arrajobpostings[$s]['jp_expdate']=='') {?>
	  <span class="label label-process">Processing</span>
	  
	  <?php } elseif($curdate > $arrajobpostings[$s]['jp_expdate']) {?>
	  <span class="label label-warning">Expired</span>
	  <?php } else if($curdate < $arrajobpostings[$s]['jp_expdate']) {?>
	  <span class="label label-success">Active</span>
	   <?php }?>
	  </td>
      <td nowrap="nowrap"><a href="editjobposting.php?jpid=<?php echo $arrajobpostings[$s]['jp_id']?>"><img src="images/icon_edit.png"></a><a href="deletejobposting.php?jpid=<?php echo $arrajobpostings[$s]['jp_id']?>"><img src="images/icon_delete.png"></a></td>
    </tr>
    
    
    <?php }?>
   
  </table>
</div>
</div>
    </body>

</html>