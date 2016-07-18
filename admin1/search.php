<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);

if($_POST)
{
   
   $query = '';
  for($i=0;$i<count($_POST['searchparam']);$i++)
  {
     $parameter = $_POST['searchparam'][$i];
     $idsearchval = $_POST['idsearchval'][$i];
     $searchparamoption = $_POST['searchparamoption'][$i];
     $query.=$parameter.$idsearchval.' '.$searchparamoption.' ';
  }
  $studetnsql = "Select * from tbl_student where $query";
  echo $studetnsql;
 // echo $query;
  print_R($_POST);
  exit;
}

?>
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	
$('.next').click(function () {
     $(function() {
     	alert('asdf');
            $('[data-toggle="tooltip"]').tooltip()
        })  //and in next click which gets for next tr
   });

$('.pagination').click(function () {
		alert('asdf');
     $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })  //and in next click which gets for next tr
   });
	


	$('#example').dataTable({
		"order": [[ 3, "desc" ]],
        "bAutoWidth": true,
        "sPaginationType": "full_numbers",
        "bLengthChange": false,
        "aaSorting": [[1,"desc"]],
        "bLengthChange": false,
                "fnDrawCallback": function() {
                	 $('[data-toggle="tooltip"]').tooltip()
}
    } );


} );

	</script>
<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<script>
function fnAddSearchCriteria()
{

                $.ajax({
                url : "ajax/ajax_addsearch.php",
                type: "POST",
                data : '',
                success: function(data, textStatus, jqXHR)
                {
                   //document.getElementById('ajaxsearch').innerHTML= data;
                    $('#ajaxsearch').append(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
              
                }
            });
}

function fnajax()
{
     $.ajax({
                url : "ajax/ajax_addsearch.php",
                type: "POST",
                data : '',
                success: function(data, textStatus, jqXHR)
                {
                   //document.getElementById('ajaxsearch').innerHTML= data;
                    $('#ajaxsearch').append(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
              
                }
            });
}
</script>
  <body>
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  <form action="" method="POST">
  <table>
        <tr>
             <td>
                <select name='searchparam[]' id='searchparam[]'>
            <option value='sslc_percentage > '>SSLC</option>
        <option value='puc_percentage > '>PUC</option>
        <option value='deg_percentage >'>DEG</option>                 
            </select>
             <input type='text' name="idsearchval[]" id="idsearchval[]">
            </td>
            <td  id="ajaxsearch"></td>
            </tr>
           <tr>
     <td>
         <input type="Button" id="Add" name="Add" value="ADD" onclick="fnAddSearchCriteria()">
         <input type="Submit" id="Search" name="Search" value="Search">
         </td>
   </tr>

   </table>
   </form>
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>ResumeId</th>
						 <?php for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){?>
                        <th><?php echo $resumeTypesArray[$resumetype]['resumetypename'];?></th>
 <?php }?>
            <th>View Resume</th>
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){
					$idstudent = $studentArray[$i]['idstudent'];?>
					<tr>
						<td><input type='checkbox' name='studentName[]'><?php echo $studentArray[$i]['studentname'];?></td>
						<td><?php echo $studentArray[$i]['email'];?></td>
						<td><?php echo $studentArray[$i]['mobile'];?></td>
						<td><?php echo $studentArray[$i]['resumeid'];?></td>
						 <?php
                         $resumeKeyWordsSql = mysql_query("Select * from tbl_studentresumekeywords where idstudent='$idstudent' order by idresumetype asc");
                         while($row = mysql_fetch_assoc($resumeKeyWordsSql))
                         { ?>

                         <td>
                           <div class="primary-box" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $row['keywords'];?>">
                         <?php echo $row['noofkeywords'];?>
                         </div>
                         </td>
                         <?php } ?>
            <td><a href='viewResume.php?idstudent=<?php echo $idstudent;?>' target='_blank'>View Resume</a></td>
					</tr>
					<?php }?>
					
				</tbody>
			</table>
</div>
</body>

			