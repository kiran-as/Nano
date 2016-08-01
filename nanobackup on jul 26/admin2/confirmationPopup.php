<?php
include('../application/conn.php');
$idrecruitement = $_GET['idrecruitement'];

?>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/main.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" class="init">
</script>
<script>
function validateButton()
{
  if( ($('#question_1:checked').val()=='Yes') && ($('#question_2:checked').val()=='Yes') && ($('#question_3:checked').val()=='Yes') )
  {
    alert('Now the Recruiter will be able to download the Excel and Resumes.');
    formData = 'idrecruitement=' + <?php echo $idrecruitement;?> + '&type=Approve&Status=UnApprove';
    $.ajax({
        url: "ajax/ajax_recruitementupdatesms.php",
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR)
        {
      parent.location = 'recruitementListSuperAdmin.php';

        },
        error: function (jqXHR, textStatus, errorThrown)
        {

        }
    });

  }
  else
  {
    alert('Some of the points has not been taken care, Please fulfill all the details');
  }
}
</script>
</head>

<body>
<div class="container mar-t30">
<input type='hidden' name='idrecruitement' id='idrecruitement' value='<?php echo $idrecruitement;?>'/>
    <div class="container mar-t10">
        <h3 class="brd-btm mar-b20">Review Confirmation</h3>
        <div class="row">
      <div class="form-horizontal col-sm-12">
        <div class="form-group">
          <label class="col-sm-6 control-label">Have you uploaded the latest edited excel of the resume summary.</label>
          <div class="col-sm-4">
              <label class="radio-inline">
            <input type="radio" name="question_1" id="question_1" value="Yes" > Yes
              </label>
              <label class="radio-inline">
            <input type="radio" name="question_1" id="question_1" value="No"> No
              </label>
          </div>
          </div> 

        <div class="form-group">
          <label class="col-sm-6 control-label">Have you reviewd all the tagged resumes</label>
          <div class="col-sm-4">
              <label class="radio-inline">
            <input type="radio" name="question_2" id="question_2" value="Yes" > Yes
              </label>
              <label class="radio-inline">
            <input type="radio" name="question_2" id="question_2" value="No" > No
              </label>
          </div>
          </div> 
          <div class="form-group">
          <label class="col-sm-6 control-label">Have you customised and added more resumes if applicable</label>
          <div class="col-sm-4">
              <label class="radio-inline">
            <input type="radio" name="question_3" id="question_3" value="Yes" > Yes
              </label>
              <label class="radio-inline">
            <input type="radio" name="question_3" id="question_3" value="No" > No
              </label>
          </div>
          </div> 
          <div class="clearfix brd-top">
        <button type="button" id="saveAndContinue" class="btn btn-primary pull-right" onclick='validateButton()'>Save & Continue</button>
          </div>
           </div>
           </div>
           </div>
</div>
</body>

