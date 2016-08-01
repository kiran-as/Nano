<?php
include_once('../db/dbconfig.php');
include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
     include_once('../classes/messages.php');  
	include_once('../classes/recruiter.class.php');  
   			
		
		 
	
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
    ['VLSI Front End', <?php echo $fe;?>],['VLSI Back End', <?php echo $be;?>], ['Embedded Systems', <?php echo $em;?>], 
    ['Others', <?php echo $others;?>]
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
