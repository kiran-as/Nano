<?php
include('application/conn.php');
if($_POST)
{

    $email = $_POST['email'];
    $password = $_POST['password'];
    $studentSql = mysql_query("Select * from tbl_student where email='$email' and  password='$password'");
    while($row = mysql_fetch_assoc($studentSql))
    {
        $idstudent = $row['idstudent'];
        $studentName = $row['firstname'].' - '.$row['lastname'];
    }
    $_SESSION['idstudent'] = $idstudent;
    $_SESSION['studentName'] = $studentName;
    if($idstudent=='0')
    {
        echo "<script>Please enter valid username and password</script>";
        exit;
    }
    else
    {
        echo "<script>parent.location='profileInformation.php'</script>";
        exit;
    }
}

?>
<form action="" method="POST">
<table>
 <tr>
     <td><input type="text" name="email" id="email" value=""></td>
     <td><input type="text" name="password" id="password" value=""></td>
 </tr>
 <tr>
     <td>
         <input type="submit" name="login" id="login" value="Login">
     </td>
 </tr>
</table>
</form>