<?php
include('../application/conn.php');
if($_SESSION['idstudent']=='')
{
  echo "<script>alert('Your Session has expired, Please login again');</script>";
  echo "<script>parent.location='index.php'</script>";
  exit;
}
?>