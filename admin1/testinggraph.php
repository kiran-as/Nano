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

		
    <link href="css/recruiter-styles.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
        <style type="text/css">
            body, html { font-family:helvetica,arial,sans-serif; font-size:90%; }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js"
        djConfig="parseOnLoad: true">
        </script>
       <script>
	dojo.require("dojox.charting.Chart2D");

	var charts = {}, backgroundImage, backgroundColor, color, lastThemeName = "";

	function update(name){
		// change the theme based on the select change.
		var select = dojo.byId("themeChooser"),
			usePageStyle = dojo.byId("pageStyleChooser").checked;

		var test = false;
		if(name){
			//	make sure it's in the list first.
			for(var i=0, l=select.options.length; i<l; i++){
				if(select.options[i].value == name){
					select.options[i].selected = true;
					test = true;
					break;
				}
			}
		}

		if(!test){
			name = select.options[select.selectedIndex].value;
		}

		dojo.require("dojox.charting.themes." + name);

		var theme = dojo.getObject('dojox.charting.themes.' + name);
		var chartStyle = theme.chart;

		// set the suggested page style
		if(usePageStyle && chartStyle.pageStyle){
			dojo.style(dojo.body(), chartStyle.pageStyle);
		}else{
			dojo.style(dojo.body(), {
				backgroundColor: backgroundColor,
				backgroundImage: backgroundImage,
				color: color
			});
		}
		// set the theme
		if(lastThemeName != name){
			lastThemeName = name;
			if(theme){
				for(var chartName in charts){
					charts[chartName].setTheme(theme).render();
				}
			}
		}
	}

	function init(){
		// retrieve initial values for fg/bg
		backgroundImage = dojo.style(dojo.body(), "backgroundImage");
		backgroundColor = dojo.style(dojo.body(), "backgroundColor");
		color = dojo.style(dojo.body(), "color");

		charts.bars = new dojox.charting.Chart2D("bars").
			addAxis("y", {fixLower: "minor", fixUpper: "minor", natural: true}).
			addAxis("x", {vertical: true, fixLower: "major", fixUpper: "major", includeZero: true}).
			addPlot("default", {type: "ClusteredBars", gap: 5}).
			addSeries("Series A", [0.53, 0.51]).
			addSeries("Series B", [0.84, 0.79]).
			addSeries("Series C", [0.68, 0.95]).
			addSeries("Series D", [0.77, 0.66]);

		charts.columns = new dojox.charting.Chart2D("columns").
			addAxis("x", {fixLower: "minor", fixUpper: "minor", natural: true}).
			addAxis("y", {vertical: true, fixLower: "major", fixUpper: "major", includeZero: true}).
			addPlot("default", {type: "ClusteredColumns", gap: 5}).
			addSeries("Series A", [0.53, 0.51]).
			addSeries("Series B", [0.84, 0.79]).
			addSeries("Series C", [0.68, 0.95]).
			addSeries("Series D", [0.77, 0.66]);

		charts.lines = new dojox.charting.Chart2D("lines").
			addAxis("x", {min: 0, max: 6, fixLower: "minor", fixUpper: "minor", natural: true}).
			addAxis("y", {vertical: true, fixLower: "major", fixUpper: "major", includeZero: true, max: 1}).
			addPlot("default", {type: "Default", lines: true, markers: true, tension: "X"}).
			addSeries("Series A", [{x: 0.5, y: 0.2}, {x: 1.5, y: 0.4}, {x: 2.0, y: 0.1}, {x: 5.0, y: 0.9}]).
			addSeries("Series B", [{x: 0.3, y: 0.6}, {x: 3.0, y: 0.5}, {x: 4.0, y: 0.9}, {x: 5.5, y: 0.7}]).
			addSeries("Series C", [{x: 0.8, y: 0.8}, {x: 3.4, y: 0.2}, {x: 5.3, y: 0.3}]).
			addSeries("Series D", [{x: 0.6, y: 0.9}, {x: 3.2, y: 0.8}, {x: 5.0, y: 0.1}]);

		charts.pieFan = new dojox.charting.Chart2D("pieFan").
			addPlot("default", {type: "Pie", radius: 60, labelOffset: -20, radGrad: dojox.gfx.renderer == "vml" ? "fan" : "native"}).
			addSeries("Series A", [0.35, 0.25, 0.42, 0.53, 0.69]);

		charts.bubbles = new dojox.charting.Chart2D("bubbles").
			addAxis("x", {min: 0, max: 6, fixLower: "minor", fixUpper: "minor", natural: true}).
			addAxis("y", {vertical: true, fixLower: "major", fixUpper: "major", includeZero: true}).
			addPlot("default", {type: "Bubble"}).
			addSeries("Series A", [{x: 0.5, y: 5.0, size: 1.4}, {x: 1.5, y: 1.5, size: 4.5}, {x: 2.0, y: 9.0, size: 1.5}, {x: 5.0, y: 0.3, size: 0.8}]).
			addSeries("Series B", [{x: 0.3, y: 8.0, size: 2.5}, {x: 4.0, y: 6.0, size: 2.1}, {x: 5.5, y: 2.0, size: 3.2}]).
			addSeries("Series C", [{x: 2.0, y: 5.5, size: 2.5}, {x: 3.5, y: 2.5, size: 3.5}, {x: 5.2, y: 7.0, size: 3.0}]).
			addSeries("Series D", [{x: 3.2, y: 8.0, size: 2.0}]);

		charts.area = new dojox.charting.Chart2D("area").
			addAxis("x", {fixLower: "major", fixUpper: "major"}).
			addAxis("y", {vertical: true, fixLower: "major", fixUpper: "major", min: 0}).
			addPlot("default", {type: "StackedAreas", tension: "X"}).
			addSeries("Series A", [-2, 1.1, 1.2, 1.3, 1.4, 1.5, -1.6]).
			addSeries("Series B", [1, 1.6, 1.3, 1.4, 1.1, 1.5, 1.1]).
			addSeries("Series C", [1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6]);

		charts.pieLin = new dojox.charting.Chart2D("pieLin").
			addPlot("default", {type: "Pie", radius: 60, labelOffset: -20, radGrad: "linear"}).
			addSeries("Series A", [0.35, 0.25, 0.42, 0.53, 0.69]);

		charts.candle = new dojox.charting.Chart2D("candle").
			addPlot("default", {type: "Candlesticks", gap: 1}).
			addAxis("x", {fixLower: "major", fixUpper: "major", includeZero: true}).
			addAxis("y", {vertical: true, fixLower: "major", fixUpper: "major", natural: true}).
			addSeries("Series A", [
					{ open: 20, close: 16, high: 22, low: 8 },
					{ open: 16, close: 22, high: 26, low: 6, mid: 18 },
					{ open: 22, close: 18, high: 22, low: 11, mid: 21 },
					{ open: 18, close: 29, high: 32, low: 14, mid: 27 },
					{ open: 29, close: 24, high: 29, low: 13, mid: 27 },
					{ open: 24, close: 8, high: 24, low: 5 },
					{ open: 8, close: 16, high: 22, low: 2 },
					{ open: 16, close: 12, high: 19, low: 7 },
					{ open: 12, close: 20, high: 22, low: 8 },
					{ open: 20, close: 16, high: 22, low: 8 },
					{ open: 16, close: 22, high: 26, low: 6, mid: 18 },
					{ open: 22, close: 18, high: 22, low: 11, mid: 21 },
					{ open: 18, close: 29, high: 32, low: 14, mid: 27 },
					{ open: 29, close: 24, high: 29, low: 13, mid: 27 },
					{ open: 24, close: 8, high: 24, low: 5 },
					{ open: 8, close: 16, high: 22, low: 2 },
					{ open: 16, close: 12, high: 19, low: 7 },
					{ open: 12, close: 20, high: 22, low: 8 },
					{ open: 20, close: 16, high: 22, low: 8 },
					{ open: 16, close: 22, high: 26, low: 6 },
					{ open: 22, close: 18, high: 22, low: 11 },
					{ open: 18, close: 29, high: 32, low: 14 },
					{ open: 29, close: 24, high: 29, low: 13 },
					{ open: 24, close: 8, high: 24, low: 5 },
					{ open: 8, close: 16, high: 22, low: 2 },
					{ open: 16, close: 12, high: 19, low: 7 },
					{ open: 12, close: 20, high: 22, low: 8 },
					{ open: 20, close: 16, high: 22, low: 8 }]);
		charts.ohlc = new dojox.charting.Chart2D("ohlc").
			addPlot("default", {type: "OHLC", gap: 1}).
			addAxis("x", {fixLower: "major", fixUpper: "major", includeZero: true}).
			addAxis("y", {vertical: true, fixLower: "major", fixUpper: "major", natural: true}).
			addSeries("Series A", [
					{ open: 20, close: 16, high: 22, low: 8 },
					{ open: 16, close: 22, high: 26, low: 6 },
					{ open: 22, close: 18, high: 22, low: 11 },
					{ open: 18, close: 29, high: 32, low: 14 },
					{ open: 29, close: 24, high: 29, low: 13 },
					{ open: 24, close: 8, high: 24, low: 5 },
					{ open: 8, close: 16, high: 22, low: 2 },
					{ open: 16, close: 12, high: 19, low: 7 },
					{ open: 12, close: 20, high: 22, low: 8 },
					{ open: 20, close: 16, high: 22, low: 8 },
					{ open: 16, close: 22, high: 26, low: 6 },
					{ open: 22, close: 18, high: 22, low: 11 },
					{ open: 18, close: 29, high: 32, low: 14 },
					{ open: 29, close: 24, high: 29, low: 13 },
					{ open: 24, close: 8, high: 24, low: 5 },
					{ open: 8, close: 16, high: 22, low: 2 },
					{ open: 16, close: 12, high: 19, low: 7 },
					{ open: 12, close: 20, high: 22, low: 8 },
					{ open: 20, close: 16, high: 22, low: 8 },
					{ open: 16, close: 22, high: 26, low: 6 },
					{ open: 22, close: 18, high: 22, low: 11 },
					{ open: 18, close: 29, high: 32, low: 14 },
					{ open: 29, close: 24, high: 29, low: 13 },
					{ open: 24, close: 8, high: 24, low: 5 },
					{ open: 8, close: 16, high: 22, low: 2 },
					{ open: 16, close: 12, high: 19, low: 7 },
					{ open: 12, close: 20, high: 22, low: 8 },
					{ open: 20, close: 16, high: 22, low: 8 }]);
		var name;
		if(window.location.search.indexOf("?")>-1){
			name = window.location.search.substring(1);
			dojo.create("span", {
				style: "display: inline-block; margin-left: 1em;",
				innerHTML: '<a href="theme_preview.html">Back to the Theme Previewer &raquo;&raquo;</a>'
			}, dojo.query("p.controls")[0]);
		}

		update(name);

		dojo.connect(dojo.byId("themeChooser"), "onchange", update);
		dojo.connect(dojo.byId("pageStyleChooser"), "onclick", update);
	}
	dojo.addOnLoad(init);
</script>
</head>
<body>
	<h1>Example Dojo Chart Types</h1>
	<p>Choose a theme from the list below, a theme will be loaded dynamically, and the charts will be rendered using it.</p>
	<p class="controls"><label for="themeChooser">Available themes:&nbsp;</label>
		<select id="themeChooser">
			<optgroup label="Gradients">
				<option value="Julie" selected="selected">Julie</option>
				<option value="ThreeD">ThreeD</option>
				<option value="Chris">Chris</option>
				<option value="Tom">Tom</option>
				<option value="PrimaryColors">PrimaryColors</option>
				<option value="Electric">Electric</option>
				<option value="Charged">Charged</option>
				<option value="Renkoo">Renkoo</option>
			</optgroup>
			<optgroup label="Classic">
				<option value="Adobebricks">Adobebricks</option>
				<option value="Algae">Algae</option>
				<option value="Bahamation">Bahamation</option>
				<option value="BlueDusk">BlueDusk</option>
				<option value="CubanShirts">CubanShirts</option>
				<option value="Desert">Desert</option>
				<option value="Distinctive">Distinctive</option>
				<option value="Dollar">Dollar</option>
				<option value="Grasshopper">Grasshopper</option>
				<option value="Grasslands">Grasslands</option>
				<option value="GreySkies">GreySkies</option>
				<option value="Harmony">Harmony</option>
				<option value="IndigoNation">IndigoNation</option>
				<option value="Ireland">Ireland</option>
				<option value="MiamiNice">MiamiNice</option>
				<option value="Midwest">Midwest</option>
				<option value="Minty">Minty</option>
				<option value="PurpleRain">PurpleRain</option>
				<option value="RoyalPurples">RoyalPurples</option>
				<option value="SageToLime">SageToLime</option>
				<option value="Shrooms">Shrooms</option>
				<option value="Tufte">Tufte</option>
				<option value="WatersEdge">WatersEdge</option>
				<option value="Wetland">Wetland</option>
			</optgroup>
			<optgroup label="PlotKit">
				<option value="PlotKit.blue">PlotKit.blue</option>
				<option value="PlotKit.cyan">PlotKit.cyan</option>
				<option value="PlotKit.green">PlotKit.green</option>
				<option value="PlotKit.orange">PlotKit.orange</option>
				<option value="PlotKit.purple">PlotKit.purple</option>
				<option value="PlotKit.red">PlotKit.red</option>
			</optgroup>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input id="pageStyleChooser" type="checkbox" checked="checked" value="">
		<label for="pageStyleChooser">&nbsp;use suggested page style</label>
	</p>
	<div id="chartContainer">
		<div class="chart" id="bars"></div>
		<div class="chart" id="lines"></div>
		<div class="chart" id="pieFan"></div>
		<div class="chart" id="bubbles"></div>
		<div class="chart" id="area"></div>
		<div class="chart" id="pieLin"></div>
		<div class="chart" id="columns"></div>
		<div class="chart" id="candle"></div>
		<div class="chart" id="ohlc"></div>
		<div class="chart" id="scatter"></div>
	</div>
</body>
</html>