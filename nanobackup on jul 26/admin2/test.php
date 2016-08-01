<?php
include('../application/conn.php');
include('include/resumeType.php');
$studentSql = mysql_query("Select * from tbl_student");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['email'] = $row['email'];
    $studentArray[$i]['mobile'] = $row['mobile'];
    $studentArray[$i]['resumeid'] = $row['resumeid'];
    $studentArray[$i]['sslc_percentagetype'] = $row['sslc_percentagetype'];

    $studentArray[$i]['sslc_percentage'] = $row['sslc_percentage'];
  
    $studentArray[$i]['puc_percentage'] = $row['puc_percentage'] * 10;

    $studentArray[$i]['puc_percentagetype'] = $row['puc_percentagetype'];

    if($row['deg_percentagetype']!='Percentage')
    {
    $studentArray[$i]['deg_percentage'] = $row['deg_percentage'] * 10;

    }
    else
    {
    $studentArray[$i]['deg_percentage'] = $row['deg_percentage'];
    } 

    if($row['pg_percentagetype']!='Percentage')
    {
    $studentArray[$i]['pg_percentage'] = $row['pg_percentage'] * 10;

    }
    else
    {
    $studentArray[$i]['pg_percentage'] = $row['pg_percentage'];
    }

    $studentArray[$i]['deg_passoutyear'] = $row['deg_passoutyear'];
    $studentArray[$i]['puc_passoutyear'] = $row['puc_passoutyear'];
    $studentArray[$i]['sslc_passoutyear'] = $row['sslc_passoutyear'];


    $i++;
}

?>
	<link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable( {
		"order": [[ 3, "desc" ]]
	} );
} );

function filterGlobal () {
    $('#example').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}
 
function filterColumn ( i ) {
    $('#example').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    
    $('#example').dataTable();
 
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
 
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
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

  <body>
  <?php include('../include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  <table width="100%" border="1">
  <tr>
      <td width="25%">
          <table border="2" cellspacing="5" cellpadding="5">
            <tbody>
            <tr>
            <td>Minimum idstudent:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
         <tr>
            <td>SSLC CUTOFF:</td>
            <td><input type="text" id="sslcper" name="sslcper"></td>
        </tr>
            <tr id="filter_col4" data-column="4">
                <td>SSLC CutOff<input type="text" class="column_filter" id="col4_filter">
                </td>
              </tr>
               </tbody>
        </table>
      </td>
      <td width="25%">ra
     </td>
      <td width="25%">na
      </td>
      <td width="25%">ik
      </td>
  </tr>
  </table>
			
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th style='display:none'>ResumeId</th>
            <th style='display:none'>SSLC</th>
            <th style='display:none'>PUC</th>
            <th style='display:none'>BE</th>
            <th style='display:none'>ME</th>            
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
						<td style='display:none'><?php echo $studentArray[$i]['idstudent'];?></td>
            <td style='display:none'><?php echo $studentArray[$i]['sslc_percentage'];?></td>
            <td style='display:none'><?php echo $studentArray[$i]['puc_percentage'];?></td>
            <td style='display:none'><?php echo $studentArray[$i]['deg_percentage'];?></td>
            <td style='display:none'><?php echo $studentArray[$i]['pg_percentage'];?></td>


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

			