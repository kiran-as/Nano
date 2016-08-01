<?php 
 include_once('db/dbconfig.php');
   include_once('classes/dataBase.php');
   include_once('classes/checkInputFields.php');
   include_once('classes/checkingAuth.php');
   include_once('classes/inputFields.php');
     include_once('classes/messages.php');  
 require_once "jpgraph/maxChart.class.php";
   $input=new inputFields();	
    $ch=new checkInputFields();	
	$db=new dataBase();
   $db->connectDB(); 
		  $_SESSION["r_company"];
		  $rid = $_SESSION['r_id'];
		  $selectrecruiters = "Select * from rv_recruiters where r_id='$rid'";
	

	$resultrecruiters = mysql_query($selectrecruiters);
	$s=0;
	while ($row = mysql_fetch_assoc($resultrecruiters)) {
		  $arrarecruiter['r_user_name']	= $row["r_user_name"];
		 $activerecruiter =  $arrarecruiter["r_active"]	= $row["r_active"];
		}	  
		  
		  if($_SESSION['r_id']=='')
		  {
		  	echo "<script>parent.location = 'recruiter_index1.php';</script>";	
		  }
		  	$selectjobposings = "Select * from rv_job_posting where r_id='$rid' order by jp_id desc";
	

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
		  $cntrows = $s;
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

				$querybediplomastudentssubdetails ="SELECT * FROM  `rv_educational_details` WHERE  `qua_id`=21 GROUP BY m_id";
			$resultc = mysql_query($querybediplomastudentssubdetails);			
			$value=0;
			while ($row = mysql_fetch_assoc($resultc)) {
				$mid = $row["m_id"];
				 $value = $value.','.$mid;	 
				}
//print_r($value);
           $querydiplomastudents = "Select * from rv_educational_details where m_id in ($value) and qua_id=2 group by m_id";
		   	$resultcdiplomastudents = mysql_query($querydiplomastudents);
	$bediplomastudents=0;
	while ($row = mysql_fetch_assoc($resultcdiplomastudents)) {
		  $arraStudent["m_id"]	= $row["m_id"];
		  $bediplomastudents++;  
		}
		
		
	$querymtechdiplomastudents = "SELECT * FROM rv_educational_details where  m_id in ($value) and  qua_id =1 and e_course in (1) group by m_id"; 
	$resultc = mysql_query($querymtechdiplomastudents);
	$mtechdiplomastudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arraStudent["m_id"]	= $row["m_id"];
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
	<title>Dashboard</title>
    

		<!--end of bar graph-->
	 <link href="jpgraph/style.css" rel="stylesheet" type="text/css" />	
    <link href="css/recruiter-styles.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>

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
			//dojo.require("dojox.charting.themes.ThreeD");
			
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
                    font: "normal normal 10px Tahoma",
                    fontColor: "black",
                   
                    radius: 80
                }).addSeries("Series A", [{
                    y: <?php echo $fe;?>,
                   text: "FrontEnd",
                    stroke: "black",
                    tooltip: "<?php echo $fe;?>"
                },
                {
                    y:  <?php echo $be;?>,
                   text: "BackEnd",
                    stroke: "black",
                    tooltip: "<?php echo $be;?>"
                }
                ,
                {
                    y:  <?php echo $em;?>,
                    text: "Embedded",
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
                    chart: chartTwo1,
					font: "normal normal 3px Tahoma",
                    fontColor: "black",
                },
                "legendTwo1");
            }
               
function piechart() {
            	
                var dc = dojox.charting;
               var chartTwo = new dc.Chart2D("chartTwo");
                chartTwo.setTheme(dc.themes.ThreeD).addPlot("default", {
                    type: "Pie",
                    font: "normal normal 10px Tahoma",
                    fontColor: "black",
                   
                    radius: 80
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
                    tooltip: "BE+PG Diploma"
                }
                ,
                {
                    y:  <?php echo $mtechdiplomastudents;?>,
                    //text: "Absent",
                    stroke: "black",
                    tooltip: "M.TECH+PG Diploma"
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
    				dojo.require("dojox.charting.themes.ThreeD");

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
		<style>
		.dojoxLegendText
		{
		font-size:9px;
		}
		</style>
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
 // Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}

function fnactiverecruiter()
{
	var activerecruiter = <?php echo $activerecruiter;?>;
	if(activerecruiter==0)
	{
		document.getElementById('rows').style.display='none';
		document.getElementById('displaycontent').style.display='';
	}
	else
	{
		document.getElementById('rows').style.display='';
		document.getElementById('displaycontent').style.display='none';
	}
}


function deleterecruiter(idprog)
{
 var deletess = confirm("Do you really want to delete");
  if(deletess == true)
  {
        
	 window.location = "deletejobposting.php?jpid="+idprog;
   }
}
	</script>
	
	<style>


#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	padding: 20px;
	border: 20px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	/*--CSS3 Box Shadows--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Rounded Corners--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right;
	margin: -55px -55px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
}
</style>
	 <script language="javascript" type="text/javascript" src="js/lytebox.js"></script>
	<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
    </head>
    
    <body class="claro" onload="fnactiverecruiter()">
<div class="container">
<div class="dashboard"> 
<? include_once('recruiterheader.php');  ?>

<div id="row">
<div id ="graphcontainer" class="graphcontainer">
		<div class="graphinner" >

<div id="table">
<table width="100%" border="0" height="250">
<tr>
<td  align="center"; style="color: #0f5b9f;
  font-weight: bold;">Resumes with Education background</td>
<td   align="center"; style="color: #0f5b9f;
  font-weight: bold;">Resumes with Employability Factor</td>
<td   align="center"; style="color: #0f5b9f;
  font-weight: bold;">Resumes with Domain Background</td>
</tr>

<tr>
<td width="35%" valign="top"><img src="pieChart/pieChart.class.php"></td>
<td width="30%" valign="top" id="main" style="width:300px;" bgcolor="#FFFFFF">
<div>
		<table border="0" cellpadding="0" cellspacing="0">
		   <tr><td style="border-right:1px solid #EFEFEF;" valign="middle" align="right"><img src="images/numofstu.png" width="16" height="66"></td>
		       <td width="100%"><?php  
           
            $data['50-60'] =  $empfactor1;
            $data['60-70'] = $empfactor2;
             $data['70-80'] = $empfactor3;
            $data['80-90'] = $empfactor4;
             $data['90-100'] = $empfactor5;
            $data['100+'] = $empfactor6;
            $mc3 = new maxChart($data);
            $mc3->displayChart('',1,300,200,true);
         ?></td>
		       </tr>
		       <tr>
		      <td></td>
		       <td  align="center" style="border-top:1px solid #EFEFEF;"><a href="#?w=500" rel="popup_name" class="poplight" style="color:#114981;"><img src="images/employ.png" width="102" height="16"></a></td>
		       </tr>
		       <tr>
		       <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		       </tr>
		
		</table>
         
          
         </div>
         
     </td>
		<td width="35%" valign="top"><img src="courses/pieChart.class.php"></td>
</tr>
</table>

</div>
</div>
<div>

</div>
<div class="pullup"><a href="#" id="pullup"><img src="images/pullup.png" id="imgpullup"></a></div>
</div>


 <div class="pulldown" id="divabc"><div>Click here to view the graphs</div><img src="images/pullup.png"></div>
  </div>
  </div>
  <div></div>
    <div id="displaycontent" align="center" style="display:none;">
	<table width="100%" cellpadding="0" cellspacing="0" border="0" class="resuemviewtableborder">
	<tr><td class="resumeviewinfo" style="font-weight:bold;">"Your account has expired. Please contact the Admin to activate your account.
	<br>Email:<a href="mailto:info@nanochipsolutions.com">info@nanochipsolutions.com</a>"
	</td></tr></table>
	</div>
  <div id="rows" class="dashboard" style="display:none;">
<span class="pageheaders">Job Posting for " <?php echo $_SESSION["r_company"];?>" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span align="center"><a href="briefsteps.php" rel="lyteframe" rev="width:450px; height:300px; scrolling:no" align="center">5 easy steps to hire the best talent</a></span></span><br>
<span class="smalltext">Click on the "Job Title" to view assigned students resumes</span>
<div class="floatright"><a href="addjobposting.php" class="blueButton">Post New Job Opening</a></div>
<div><table width="100%"><tr><td></td></tr></table></div>
<div class="row">
<?php if($cntrows==0){?>
<table class="nojobpostings" cellpadding="2" cellspacing="2" border="0" width="100%"><tr><td><img src="images/icon_jobboard.jpg" align="absmiddle" width="190" height="103">You have not created any Job Postings, Please click on "Add New Job Opening" button to create one.</td></tr></table>
	 
	 
	  <?php } else {?>
<table width="100%" border="0"  cellpadding="3" cellspacing="1" class="gridbackground">

    <tr  class="gridheader">
      <td width="50%">Job Title</td>
      <td width="25%">Posted Date</td>
      <td width="25%">Expiry Date</td>
      <td nowrap="nowrap">Status</td>
	  <td nowrap="nowrap"></td>
    </tr>
	
    <?php for($s=0;$s<count($arrajobpostings);$s++){?>
	
	 <?php $jpid = $arrajobpostings[$s]['jp_id'];
	  
	  	
    $queryofjobpostingid = "SELECT *  FROM rv_jobpostedstudent WHERE jp_id=$jpid"; 
	$resultc = mysql_query($queryofjobpostingid);
	$countofjobstudents=0;
	while ($row = mysql_fetch_assoc($resultc)) {
		  $arrastudentforjobposting[$countofjobstudents]["m_id"]	= $row["m_id"];
		  $countofjobstudents++;  
		}
	  
	  ?>
	  
     <tr class="alternaterowcolor1">
	 
     <?php if(($curdate > $arrajobpostings[$s]['jp_expdate']) || ($countofjobstudents==0)){?>
      <td><?php echo $arrajobpostings[$s]['jp_job_title']?></td>
      <?php } else {?>
      <td> <a href="assignedstudents.php?idjobposting=<?php echo $arrajobpostings[$s]['jp_id']?>"><?php echo $arrajobpostings[$s]['jp_job_title']?></a></td>
      <?php }?>
	  
	  
      <td><?php echo $arrajobpostings[$s]['createddate']?></td>
      <td><?php echo $arrajobpostings[$s]['expdate']?></td>
      
     
	  <td nowrap="nowrap">
	    <?php if($countofjobstudents==0) {?>
	  <span class="label label-process">Processing</span>
	  
	  <?php } elseif($curdate > $arrajobpostings[$s]['jp_expdate']) {?>
	  <span class="label label-warning">Expired</span>
	  <?php } else if($countofjobstudents>0) {?>
	  <span class="label label-success">Active</span>
	   <?php }?>
	  </td>
      <td nowrap="nowrap"><a href="editjobposting.php?jpid=<?php echo $arrajobpostings[$s]['jp_id']?>"><img src="images/icon_edit.png"></a>
	  <a onclick="deleterecruiter(<?php echo $arrajobpostings[$s]['jp_id']?>)"><img src="images/icon_delete.png"></a></td>
    </tr>
    
    
    <?php }?>
   
  </table>
  <?php }?>
</div>
</div>

<div class="footer">Copyrights © 2012 Nanochipsolutions <br>
<a href="JavaScript:newPopup('http://nanochipsolutions.com/termsandconditions.php');">Terms and conditions</a> | <a href="feedback.php" rel="lyteframe" rev="width:450px; height:420px; scrolling:no">Feedback</a>
				
</div>

</div>
<div id="popup_name" class="popup_block">
<span style="font-size:18px; font-weight:bold;">Employability Factor</span>
 <p><strong>Employability Factor </strong> refers to a person's capability of gaining initial employment or finding new employment in the industry of his interests. It's a good reflection of what value the employer seeks in your skills that will make you productive to the company.</p><p>The Nanochip resume builder has been integrated with an intelligent calculator of Employability Factor that best reflects your chances of being selected by Semiconductor companies for interviews and eventually being absorbed by them. It is suggested that an employability factor above 70 points will give you a high probability of being absorbed into the VLSI and Embedded Industry. </p>
        
</div>
    </body>
<script>
$('a.poplight[href^=#]').click(function() {
    var popID = $(this).attr('rel'); //Get Popup Name
    var popURL = $(this).attr('href'); //Get Popup href to define size

    //Pull Query & Variables from href URL
    var query= popURL.split('?');
    var dim= query[1].split('&');
    var popWidth = dim[0].split('=')[1]; //Gets the first query string value

    //Fade in the Popup and add close button
    $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');

    //Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;

    //Apply Margin to Popup
    $('#' + popID).css({
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });

    //Fade in Background
    $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
    $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 

    return false;
});

//Close Popups and Fade Layer
$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
    $('#fade , .popup_block').fadeOut(function() {
        $('#fade, a.close').remove();  //fade them both out
    });
    return false;
});</script>
</html>