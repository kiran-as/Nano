<?php
include('../application/conn.php');
$studentSql = mysql_query("SELECT COUNT( a.idstudent ) as count , b.department as state
FROM tbl_student as a, tbl_department as b
where a.deg_department=b.iddepartment
GROUP BY a.deg_department
");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
    $studentArray[$i]['count'] = $row['count'];
    $studentArray[$i]['state'] = $row['state'];
    $i++;
}

?>
    <link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {


    $('#example').dataTable({
       "order": [[ 1, "desc" ]],
                "fnDrawCallback": function() {
                    $('[data-toggle="tooltip"]').tooltip()

  $('.simple-ajax-popup-align-top').magnificPopup({
          type: 'ajax',
          alignTop: true,
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

        $('.simple-ajax-popup').magnificPopup({
          type: 'ajax'
        });

$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $('.image-popup-fit-width').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: false
    }
  });

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });
            },
      "oLanguage": { "sSearch": "<p class='help-block'>Search for one pattern in the database (only one keyword)</p>" } 
    } );

$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
    
  });

  $('.image-popup-fit-width').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: false
    }
  });

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });


} );

    </script>

<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="../css/magnific-popup.css"> 

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->

<!-- Magnific Popup core JS file -->
<script src="../js/jquery.magnific-popup.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body >
  <form action='' method="POST">
  <?php include('include/header.php');?>
    <?php include('include/nav.php');?>
    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>State</th>
                        
                    </tr>
                </thead>

                <tbody>
                <?php for($i=0;$i<count($studentArray);$i++){ ?>

                        <td><?php echo $studentArray[$i]['count'];?></td>
<td><?php echo $studentArray[$i]['state'];?></td>

                    </tr>
                    <?php }?>
                    
                </tbody>
            </table>
</div>
</form>
</body>

            
