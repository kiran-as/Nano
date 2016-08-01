<!DOCTYPE html>
<html>
<head>
  <link href="prograss_bar/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="prograss_bar/jquery.min.js"></script>
  <script src="prograss_bar/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#progressbar").progressbar({ value: 50 });
  });
  </script>
</head>
<body style="font-size:62.5%;">
  
<div id="progressbar" style="width:100px;"></div>

</body>
</html>
