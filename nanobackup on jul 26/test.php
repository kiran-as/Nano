<?php
include_once('../db/dbconfig.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
   			
		
		 
		 
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
?>
<!DOCTYPE html>

<html>
<head>

    <title>Pie and Donut Charts</title>

    <link class="include" rel="stylesheet" type="text/css" href="test/jquery.jqplot.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="test/excanvas.js"></script><![endif]-->
<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
   
</head>
<body>



  
<!-- Example scripts go here -->

<!--
<p>jqPlot bakes up the best pie and donut charts you've ever tasted!  Like bar and filled line plots, pie and donut slices highlight when you mouse over.</p>-->

<div id="chart1" class="jqplot-base-canvas"></div>

<pre class="code prettyprint brush: js"></pre>

<script class="code" type="text/javascript">
$(document).ready(function(){
 /* var data = [
    ['Heavy Industry', 35],['Retail', 9], ['Light Industry', 14], 
    ['Out of home', 16],['Commuting', 7], ['Orientation', 9]
  ];*/
  var data = [
    ['B.E Students', <?php echo $bestudents;?>],['mtechstudents', <?php echo $mtechstudents;?>], ['bediplomastudents', <?php echo $bediplomastudents;?>], 
    ['mtechdiplomastudents', <?php echo $mtechdiplomastudents;?>],['others', <?php echo $othersdegreestudents;?>]
  ];
  var plot1 = jQuery.jqplot ('chart1', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, placement: 'outside', 
            rendererOptions: {
                numberRows: 2
            }, 
            location:'s',
            marginTop: '-5px'
			
			 }
    }
  );
});
</script>


<!-- End example scripts -->

<!-- Don't touch this! 
  <script class="include" type="text/javascript" src="../jquery.jqplot.min.js"></script>
-->


  

<!-- End Don't touch this! -->

<!-- Additional plugins go here -->
    <script class="include" type="text/javascript" src="test/jquery.jqplot.js"></script>
    <script class="include" language="javascript" type="text/javascript" src="test/jqplot.pieRenderer.js"></script>
    <script class="include" language="javascript" type="text/javascript" src="test/jqplot.donutRenderer.js"></script>

<!-- End additional plugins -->

        </div>
       
  <!--  <script type="text/javascript" src="example.min.js"></script>-->

</body>


</html>
