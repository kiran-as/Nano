<?php
include('../application/conn.php');
include('include/resumeType.php');
error_reporting(-1);

$studentSql = mysql_query("Select * from tbl_bugs");
$i=0;
while($row = mysql_fetch_assoc($studentSql))
{
  $studentArray[$i]['idbug'] = $row['idbug'];
    $studentArray[$i]['name'] = $row['name'];
    $studentArray[$i]['email'] = $row['email'];
        $studentArray[$i]['phone'] = $row['phone'];

    $studentArray[$i]['bug_type'] = $row['bug_type'];

    $studentArray[$i]['created_date'] = $row['created_date'];

    $studentArray[$i]['created_date'] = $row['created_date'];
  $studentArray[$i]['image'] = $row['image'];
    $studentArray[$i]['message'] = $row['message'];
     $studentArray[$i]['status'] = $row['status'];
    $i++;
}



?>
    <link rel="stylesheet" type="text/css" href="tablegrid/css/jquery.dataTables.css">

    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="tablegrid/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {


    $('#example').dataTable({
       "order": [[ 3, "desc" ]],
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
<div class="main-nav-wrapper">
       <nav class="container">
           <ul class="main-nav clearfix">
               <li class="<?php echo $studentDetails;?>"><a href="index.php">Bug Reporting Tool</a></li>
               <li class="<?php echo $studentDetails;?>"><a href="list.php">Bug Reporting List</a></li>
               
           </ul>
       </nav>
    </div>    <div class="container mar-t30">
        <div class="clearfix brd-btm pad-b20" style="display:none">
        <a href="addCompanyProject.php" class="btn btn-primary pull-right" >+ ADD PROJECT</a>                     
    </div>    
  
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Product</th>
                      <th width="30%">Message</th>
                      <th>Created date</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th> View</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                      <?php for($i=0;$i<count($studentArray);$i++){ 
                        $idbug = $studentArray[$i]['idbug'];?>
                        <td><?php echo $studentArray[$i]['name'];?></td>
            <td><?php echo $studentArray[$i]['phone'];?></td>

                        <td><?php echo $studentArray[$i]['email'];?></td>
                        <td><?php echo $studentArray[$i]['bug_type'];?></td>
                        <td><?php echo $studentArray[$i]['message'];?></td>
                        
                        <td><?php echo $studentArray[$i]['created_date'];?></td>                                                                        
                        <td><?php echo $studentArray[$i]['status'];?></td> 
                        <td><a href="edit.php?id=<?php echo $idbug;?>">edit</a></td>
                        <td><a href="view.php?id=<?php echo $idbug;?>">View</a></td>                                                                        
                        

                    </tr>
                    <?php }?>
                    
                </tbody>
            </table>

          
</div>
</form>
</body>

            