
<html lang="en">
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
	<head>
		<meta charset="utf-8">
		<title>Demo: Columns - Monthly Sales with Highlights</title>
		<link rel="stylesheet" href="style.css" media="screen">
		
		<!-- load dojo and provide config via data attribute -->
		<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.6.0/dojo/dojo.xd.js" 
				data-dojo-config="isDebug: true,parseOnLoad: true">
		</script>
		<script>
			
			// Require the basic 2d chart resource: Chart2D
			dojo.require("dojox.charting.Chart2D");
		       dojo.require("dojox.charting.action2d.Tooltip");
			
			// Require the highlighter
			dojo.require("dojox.charting.action2d.Highlight");

			// Require the theme of our choosing
			//"Claro", new in Dojo 1.6, will be used
			dojo.require("dojox.charting.themes.MiamiNice");
			
			// Define the data
			var chartData = [50,100,200];
			
			// When the DOM is ready and resources are loaded...
			dojo.ready(function() {
				
				// Create the chart within it's "holding" node
				var chart = new dojox.charting.Chart2D("chartNode");

				// Set the theme
				chart.setTheme(dojox.charting.themes.MiamiNice);

				// Add the only/default plot 
				chart.addPlot("default", {
					type: "Columns",
					markers: true,
					gap:1
				});
				
				// Add axes
				chart.addAxis("x");
				chart.addAxis("y", { vertical: true, fixLower: "major", fixUpper: "major" });

				// Add the series of data
				chart.addSeries("Monthly Sales",chartData);
				
				// Highlight!
				new dojox.charting.action2d.Highlight(chart,"default");

				// Render the chart!
				chart.render();
				
			});
			
		</script>
	</head>
	<body>
		<h1>Demo: Columns - Monthly Sales with Highlights</h1>
		
		<div id="chartNode" style="width:300px;height:400px;"></div>
	</body>
</html>