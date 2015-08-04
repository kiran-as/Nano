<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);
$idRecruitment = $_GET['idrecruitement'];
$studentSql = mysql_query("Select a.*,b.*
                          from tbl_student as a,
                          tbl_recruitementresumes as b
                          where a.idstudent = b.idstudent and
                          b.idrecruitement='$idRecruitment'");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['idstudent'] = $row['idstudent'];
    $studentArray[$i]['studentname'] = $row['firstname'].' - '.$row['lastname'];
        $studentArray[$i]['idstudent'] = $row['idstudent'];

    $studentArray[$i]['email'] = $row['email'];

    $studentArray[$i]['mobile'] = $row['mobile'];

    $studentArray[$i]['resumeid'] = $row['resumeid'];

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
    <script type='text/javascript'>
    function fnselectreason(id)
    {
      
      var chckname = ($('#'+id+'-reasonarraycheckbox').is(":checked"));
      if(chckname==true)
      {
         $('#'+id+'-reasonarray').hide();
          $('#'+id+'-reasonarray').val('0');
      }
      else
      {
          $('#'+id+'-reasonarray').show();
          $('#'+id+'-reasonarray').val('');
      }
    }
 
    function fnvalidateresume()
    {
       var i=0;
       var cnt = '<?php echo count($studentArray);?>';
       flag = true;
       for(i=0;i<cnt;i++)
       {
          if($('#'+i+'-reasonarray').val()=='')
            {
               $('#'+i+'-reasonarray').focus();
               flag = false;
               break;
            }
       }
       return flag;
    }

    </script>
  </head>

  <body>
  <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  
			<table id="example" class="table table-striped" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ResumeId</th>
						<?php for($resumetype=0;$resumetype<count($resumeTypesArray);$resumetype++){?>
              <th><?php echo $resumeTypesArray[$resumetype]['resumetypename'];?></th>
            <?php }?>
            <th>View Resume</th>
            <th>Download Resume</th>
            <th>Call For Inteview</th>
					</tr>
				</thead>

				<tbody>
				<?php for($i=0;$i<count($studentArray);$i++){
					$idstudent = $studentArray[$i]['idstudent'];?>
					<tr>
						<td><?php echo $studentArray[$i]['idstudent'];?></td>
					 <?php
                         $resumeKeyWordsSql = mysql_query("Select * from tbl_studentresumekeywords where idstudent='$idstudent' order by idresumetype asc");
                         while($row = mysql_fetch_assoc($resumeKeyWordsSql))
                         { ?>

                         <td><?php echo $row['noofkeywords'];?></td>
                         <?php } ?>
            <td><a href='viewResumeById.php?idstudent=<?php echo $idstudent;?>' target='_blank'>View Resume</a></td>
            <td><a href='downloadResumeById.php?idstudent=<?php echo $idstudent;?>' target='_blank'>Download Resume</a></td>
            <td><input type='checkbox' class='studentforinterview' name='studentName[]' id="<?php echo $i.'-reasonarraycheckbox';?>" checked="checked" onchange="fnselectreason('<?php echo $i;?>')">
            <input type='text' placeholder="Please specify the Reason" class="form-control" name='reasonarray[]' value='' style='display:none' id="<?php echo $i.'-reasonarray';?>"></td>

					</tr>
					<?php }?>

				</tbody>
			</table>
      <table width="100%" style="display:none;">
       <tr>
         <td><label>Please type the matter to be sent to the shortlisted candidates</label><br/><textarea class="form-control mar-b15" rows="3" name="corecompetancy[]"></textarea></td>
       </tr>
         <tr><td><br/><input type='submit' name='Submit' value='Submit' onclick="return fnvalidateresume();"></td></tr>
      </table>
</div>
</body>

			