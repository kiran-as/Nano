<?
function write2file($string){
		$path="";
		$filename=$path."case.csv";
		$string.="\r\n";
		$fp=fopen("$filename","a+");
		fwrite($fp,$string);
		fclose($fp);
}
if($_POST['submit']){
	array_pop($_POST);
//$csv=",".",";
$csv=date("d-m-Y").",";

	foreach ($_POST as $key => $value) {
	$msg .= ucfirst ($key) ." : ". $value . "\n";
	 $csv .= "$value,";}
$csv .="Markdown Optimisation,";
    $csv=substr($csv,0,-1);
    write2file($csv);
$fileatt ='MarkdownOptimization-A Case Study.pdf'; // Path to the file 
$fileatt_type = 'application/pdf'; // File Type 
$fileatt_name = 'MarkdownOptimization-A Case Study.pdf';  // Filename that will be used for the file as the attachment 

$email_from = "nishan@apexdecisions.com"; // Who the email is from 
$email_subject = "MARKDOWN OPTIMIZATION - A CASE STUDY"; // The Subject of the email 
$email_message = "Hello " . $_POST['Name:']."
Please find the Markdown Optimisation File.


Thanks and Regards,

Customer Support
Apex-decisions.com Pvt. Ltd.
No. 112, 1st Cross, 1st Main,
MLA Layout, RT Nagar
Bangalore - 560032
India.
www.apexdecisions.com
(O) +91-80-2354 3342 Ext. 23
(Fax) +91-80-2354 3345
Growth amidst uncertainty.....Guaranteed
--------------------------------------------------------";


$email_to = $_POST['Email:']; // Who the email is to 
$headers = "From: ".$email_from; 
$headers .= "Cc: Man Bahadur<mbahadur@apexdecisions.com>\n";  
$headers .= "Bcc: manjula<manjulacb@apexdecisions.com>\n";  

$file = fopen($fileatt,'rb'); 
$data = fread($file,filesize($fileatt)); 
fclose($file); 

$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

$headers .= "\nMIME-Version: 1.0\n" . 
"Content-Type: multipart/mixed;\n" . 
" boundary=\"{$mime_boundary}\""; 

$email_message .= "This is a multi-part message in MIME format.\n\n" . 
"--{$mime_boundary}\n" . 
"Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . 
$email_message .= "\n\n"; 

$data = chunk_split(base64_encode($data)); 

$email_message .= "--{$mime_boundary}\n" . 
"Content-Type: {$fileatt_type};\n" . 
" name=\"{$fileatt_name}\"\n" . 
//"Content-Disposition: attachment;\n" . 
//" filename=\"{$fileatt_name}\"\n" . 
"Content-Transfer-Encoding: base64\n\n" . 
$data .= "\n\n" . 
"--{$mime_boundary}--\n"; 
$ok = @mail($email_to, $email_subject, $email_message, $headers); 
$err1="Thank you for submitting your details, you will shortly receive the article as an attachment<br>&nbsp;&nbsp; in your mail box.\n";

}

if($_POST['submit1']){
	array_pop($_POST);
//$csv=",".",";
$csv=date("d-m-Y").",";
	foreach ($_POST as $key => $value) {
	$msg .= ucfirst ($key) ." : ". $value . "\n";
	 $csv .= "$value,";}
$csv .="A-Dialogue Final 0830,";
    $csv=substr($csv,0,-1);
    write2file($csv);
$fileatt ='A-Dialogue Final 0830 .pdf'; // Path to the file 
$fileatt_type = 'application/pdf'; // File Type 
$fileatt_name = 'A-Dialogue Final 0830 .pdf';  // Filename that will be used for the file as the attachment 

$email_from = "nishan@apexdecisions.com"; // Who the email is from 
$email_subject = "APEX DIALOGUE (A-DIALOGUE) - WHITE PAPER"; // The Subject of the email 

$email_message = "Hello " . $_POST['Name'] . "
Please find the Markdown Optimisation File.


Thanks and Regards,

Customer Support
Apex-decisions.com Pvt. Ltd.
No. 112, 1st Cross, 1st Main,
MLA Layout, RT Nagar
Bangalore - 560032
India.
www.apexdecisions.com
(O) +91-80-2354 3342 Ext. 23
(Fax) +91-80-2354 3345
Growth amidst uncertainty.....Guaranteed
--------------------------------------------------------";

$email_to = $_POST['Email']; // Who the email is to 
$headers = "From: ".$email_from; 
$headers .= "Cc: Man Bahadur<mbahadur@apexdecisions.com>\n";  
$headers .= "Bcc: manjula<manjulacb@apexdecisions.com>\n";  

$file = fopen($fileatt,'rb'); 
$data = fread($file,filesize($fileatt)); 
fclose($file); 

$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

$headers .= "\nMIME-Version: 1.0\n" . 
"Content-Type: multipart/mixed;\n" . 
" boundary=\"{$mime_boundary}\""; 

$email_message .= "This is a multi-part message in MIME format.\n\n" . 
"--{$mime_boundary}\n" . 
"Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . 
$email_message .= "\n\n"; 

$data = chunk_split(base64_encode($data)); 

$email_message .= "--{$mime_boundary}\n" . 
"Content-Type: {$fileatt_type};\n" . 
" name=\"{$fileatt_name}\"\n" . 
//"Content-Disposition: attachment;\n" . 
//" filename=\"{$fileatt_name}\"\n" . 
"Content-Transfer-Encoding: base64\n\n" . 
$data .= "\n\n" . 
"--{$mime_boundary}--\n"; 
$mail = @mail($email_to, $email_subject, $email_message, $headers); 
$err="Thank you for submitting your details, you will shortly receive the article as an attachment<br>&nbsp;&nbsp; in your mail box.</br>";
}
?>


<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="keywords" CONTENTS="retail, marketing,revenue, increase revenue,retail solutions, services">
<META NAME="TITLE" CONTENT="Apex Decisions">
<META NAME="DESCRIPTION" CONTENT="Increase your revenue">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="English">
<META HTTP-EQUIV="VW96.OBJECT TYPE" CONTENT="RealWorld">
<META NAME="VISIT AFTER" CONTENT="30 Days">
<META NAME="RATING" CONTENT="Business">
<title>APEX DECISIONS : Case Studies</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script language="javascript">
    var mMenu = new Array();
    for (i = 1; i <= 20; i++) {
        mMenu[i] = new Image();
        mMenu[i].src = "images/nav" + i + ".gif";
    }

    function swap(n1, n2) {
        eval("document.m" + n1 + ".src=mMenu[" + n2 + "].src");
    }
    function showHideForm(formid) {
        var _form = document.getElementById(formid);
        _form.style.display = (_form.style.display != "block") ? "block" : "none";
        return false;
    }

    function MM_findObj(n, d) { //v4.01
        var p, i, x; if (!d) d = document; if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
            d = parent.frames[n.substring(p + 1)].document; n = n.substring(0, p);
        }
        if (!(x = d[n]) && d.all) x = d.all[n]; for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
        for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
        if (!x && d.getElementById) x = d.getElementById(n); return x;
    }

    function MM_validateForm() { //v4.0
        var i, p, q, nm, test, num, min, max, errors = '', args = MM_validateForm.arguments;
        for (i = 0; i < (args.length - 2); i += 3) {
            test = args[i + 2]; val = MM_findObj(args[i]);
            if (val) {
                nm = val.name; if ((val = val.value) != "") {
                    if (test.indexOf('isEmail') != -1) {
                        p = val.indexOf('@'); p = val.indexOf('.');
                        if (p < 1 || p == (val.length - 1)) errors += '- ' + nm + ' must contain an e-mail address.\n ex : name@domain.com.\n';
                    } else if (test != 'R') {
                        num = parseFloat(val);
                        if (isNaN(val)) errors += '- ' + nm + ' must contain a number.\n';
                        if (test.indexOf('inRange') != -1) {
                            p = test.indexOf(':');
                            min = test.substring(8, p); max = test.substring(p + 1);
                            if (num < min || max < num) errors += '- ' + nm + ' must contain a number between ' + min + ' and ' + max + '.\n';
                        }
                    }
                } else if (test.charAt(0) == 'R') errors += '- ' + nm + ' is required.\n';
            }
        } if (errors) alert('The following error(s) occurred:\n' + errors);

        document.MM_returnValue = (errors == '');

    }
</script>
    <style type="text/css">
        .Txt1
        {
            width: 128px;
        }
        .HRight
        {
            width: 569px;
        }
        .HCenter
        {
            width: 588px;
        }
        .style1
        {
            width: 229px;
        }
    </style>
</head>
<body topmargin="0" leftmargin="0" marginwidth=0 marginheight=0>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%">
      		<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td width="203" rowspan="2"><img src="images/logo.gif" width="203" height="120" border="0"></td>
    <td align="right"><img border="0" src="images/spacer.gif" width="1" height="98"></td>
    </tr>
    
    <tr>
    <td height="22" valign="bottom" bgcolor="#FFB200">
    <!-- Menu Starts here -->
    	<table border="0" cellpadding="0" cellspacing="0" width="592">
    	<tr bgcolor="#FFB200">
    	<td width="12"><img src="images/menustart.gif" width="12" height="22" border="0"></td>
      <td width="45" bgcolor="#FFB200"><a href="index.html" 		onmouseover="javascript:swap(1,11);" onmouseout="javascript:swap(1,1);"><img border="0" src="images/nav1.gif" width="45" height="22" name="m1"></a></td>
      <td width="63" bgcolor="#FFB200"><a href="company.htm" 		onmouseover="javascript:swap(2,12);" onmouseout="javascript:swap(2,2);"><img border="0" src="images/nav2.gif" width="63" height="22" name="m2"></a></td>
      <td width="50" bgcolor="#FFB200"><a href="clients.htm" 		onmouseover="javascript:swap(7,17);" onmouseout="javascript:swap(7,7);"><img border="0" src="images/nav7.gif" width="50" height="22" name="m7"></a></td>	
      <td width="64" bgcolor="#FFB200"><a href="solutions.htm"	onmouseover="javascript:swap(3,13);" onmouseout="javascript:swap(3,3);"><img border="0" src="images/nav3.gif" width="64" height="22" name="m3"></a></td>
      <td width="86" bgcolor="#FFB200"><a href="case.php" 		onmouseover="javascript:swap(8,18);" onmouseout="javascript:swap(8,8);"><img border="0" src="images/nav8.gif" width="86" height="22" name="m8"></a></td>
      <td width="42" bgcolor="#FFB200"><a href="news.htm" 		onmouseover="javascript:swap(6,16);" onmouseout="javascript:swap(6,6);"><img border="0" src="images/nav6.gif" width="42" height="22" name="m6"></a></td>
      <td width="56" bgcolor="#FFB200"><a href="careers.htm"		onmouseover="javascript:swap(5,15);" onmouseout="javascript:swap(5,5);"><img border="0" src="images/nav5.gif" width="56" height="22" name="m5"></a></td>
      </tr>
      </table>
    <!-- Menu Ends here -->
    </td>
    </tr>
    </table>

    </td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#666666"><img border="0" src="images/spacer.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#9DB7CA" class="Small"><img border="0" src="images/spacer.gif" width="203" height="15" align="absmiddle"></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#CEDBE4"><img border="0" src="images/spacer.gif" width="1" height="15"></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#C2CCE2"><img border="0" src="images/spacer.gif" width="1" height="1"></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%">
      <table border="0" cellpadding="0" cellspacing="0" width="780">
        <tr>
          <td width="180" bgcolor="#F2F6F8" valign="top" height="500" background="images/bg01.gif"><img border="0" src="images/contact.jpg" width="180" height="145"></td>
          <td width="600" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600">
              <tr>
                <td width="100%" colspan="3"><img border="0" src="images/hd_casestudies.gif" vspace="10" width="180" height="21"></td>
              </tr>
              <tr>
                <td width="40"><img border="0" src="images/spacer.gif" width="40" height="1"></td>
                <td width="520" bgcolor="#9DB7CA"><img border="0" src="images/spacer.gif" width="520" height="1"></td>
                <td width="40"><img border="0" src="images/spacer.gif" width="40" height="1"></td>
              </tr>
            </table>
            <h2><b>MARKDOWN OPTIMIZATION - A CASE STUDY</b></h2>
						<p class="content">
						Typical retailers carry thousands of style-colors at each store. When multiplied by the various sizes, the combination becomes even larger. Retailers, under pressure to move inventory while trying to maximize gross margins, have to struggle with the proliferation of these combinations. To make such a daunting task manageable, and to keep costs under control, retailers typically implement pricing, promotion and markdown decisions for a stylecolor uniformly for the whole chain or for groups of stores. Retailers have realized for a while that this jack-hammer approach may work for some stores but results in dilution of margin for some stores while it is too conservative for others leading to excess left over inventory.
					
<p class="HCenter" align="right"><a href="#" align="right"  style="margin-left: 0px;margin-right:-47px;" class="HBold" onclick="return showHideForm('hiddenlink');"><img border="0" src="images/bullet01.gif" align="absmiddle">Find 
										out more</a>

                                      

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</br></br>

<div style="text-align:Left;display:none;"  id="hiddenlink">
 <form name="myform" method="POST" action="<? echo $PHP_SELF;?>">

     <table border="0" cellpadding="0" cellspacing="0"  align="center">
              <?
                if($err1){
                	echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\"  width=\"550\"><p align=\"left\">&nbsp;&nbsp;&nbsp;$err1</p></td><td>&nbsp;</td></tr>";	
                     //echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td  bgcolor=\"#9DB7CA\"><img border=\"0\" src=\"images/spacer.gif\"></td></td><td>&nbsp;</td></tr>";
                  echo "<tr><td colspan=\"4\">&nbsp;</td></tr>";
                     echo "<tr><td colspan=\"4\"  bgcolor=\"#9DB7CA\"><img border=\"0\" src=\"images/spacer.gif\"></td></tr>";
                  echo"<script> showHideForm('hiddenlink');</script>";
                }
                else{
                ?>
                  <tr ><td colspan="5" align="center" >Please Enter Name and Email Address to receive the article in your mail box.</br></br></td></tr>
              
           
      
				<tr >
					<td >Name<font color="#CC3300">*</font>&nbsp;</td>
					<td ><input type="text" style="width:180px;" name="Name:"  size="30" MAXLENGTH="50" class="Txt1"></td>
                    <td >&nbsp;&nbsp;&nbsp</td>
                    <td  >Email Address<font color="#CC3300">*</font>&nbsp;</td>
					<td class="style1"  >
                        <input type="text" style="width:228px;" name="Email:"  size="30" 
                            MAXLENGTH="50" class="Txt1"></td>
				
					
				</tr>		

				<tr>
					<td height="10"><img border="0" src="images/spacer.gif" width="1" height="1"></td>
				</tr>
				
				<tr>
					<td colspan="5" align="right"><input name="submit"  type="submit" onClick="MM_validateForm('Name:','','R','Email:','','RisEmail');return document.MM_returnValue" value="Submit" style="width: 90px">
                    <input type="reset" value="Reset" name="B2" style="width: 90px;margin-left: 0px;margin-right:2px;"></td>
				</tr>
            
             <tr>
                  <td colspan="5"  bgcolor="#9DB7CA"><img border="0" src="images/spacer.gif" width="1" height="1"></td>
                </tr>
            
				<?
        	}
       	?>

              </table>
</center>
   </form>
</div>


 <h2><b>APEX DIALOGUE (A-DIALOGUE) - WHITE PAPER</b></h2>
						<p class="content">
						A customer’s ultimate purchase decision is an end result of a decision process which is heavily influenced by their needs and wants and the society around them. With the advent of the world-wide-web this process is very efficient and can be very sophisticated when compared to a shopping experience dependent on visiting one or more brick and mortar stores. The model of a salesperson significantly influencing a selection has radically transformed today to a social network and a plethora of   online product reviews and rating guides significantly influencing a buying decision.

<p class="HCenter"  align="right"><a href="#" align="right"  style="margin-left: 0px;margin-right:-47px;"  class="HBold" onclick="return showHideForm('hiddenForm');"><img border="0" src="images/bullet01.gif"  align="absmiddle">Find 
										out more</a>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<br /><br />	
                
      
<div style="text-align:Left;display:none;" id="hiddenForm">



 <form name="form" method="POST" action="<? echo $PHP_SELF;?>">

      <table border="0" cellpadding="0" cellspacing="0" width="570" align="center">
              <?
                if($err){
                echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td align=\"center\"  width=\"550\"><p align=\"left\">&nbsp;&nbsp;&nbsp;$err</p></td><td>&nbsp;</td></tr>";	
                 echo "<tr><td colspan=\"4\">&nbsp;</td></tr>";
                 echo"<script> showHideForm('hiddenForm');</script>";
                }
                else{
                ?>
                <tr ><td colspan="5" align="center">Please Enter Name and Email Address to receive the article in your mail box.</br></br></td></tr>
				<tr >
					<td>Name<font color="#CC3300">*</font>&nbsp;</td>
					<td><input type="text" style="width:180px;" name="Name"  size="30" MAXLENGTH="50" class="Txt1"></td>
                    <td>&nbsp;&nbsp;&nbsp</td>
                    <td  >Email Address<font color="#CC3300">*</font>&nbsp;</td>
					<td><input type="text" style="width:228px;" name="Email"  size="30" MAXLENGTH="50" 
                            class="Txt1"></td>
				</tr>
                              			  
					<tr>
					<td height="10"><img border="0" src="images/spacer.gif" width="1" height="1"></td>
				</tr>
				<tr>
					<td colspan="5" align="right"><input name="submit1" type="submit"  
                            onClick="MM_validateForm('Name','','R','Email','','RisEmail');return document.MM_returnValue"  
                            value="Submit" style="width: 90px">
                    <input type="reset" value="Reset"  name="B2" style="width: 90px; margin-left: 0px;margin-right:5px;"></td>
				</tr>
				<?
        	}
       	?>

              </table>
</center>
   </form>
</div>
             
        

						
          </td>
        </tr>
        
        <tr>
          <td width="180" bgcolor="#F2F6F8" valign="top" background="images/bg01.gif">&nbsp;</td>
          <td width="600" valign="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td>
              <table border="0" cellpadding="0" cellspacing="0" 
                      style="height: 0px; width: 565px;" >
    
                <tr align="right" style="margin-right:-10px;">          
                <td align="right"   bgcolor="#9DB7CA"><img border="0" src="images/spacer.gif" width="1" height="1"></td>
                </tr>
            </table>
            </td>
            
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>
                </tr>           
              <tr><td  colspan="3">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td align="left" colspan="2">Disclaimer(<font color="#CC3300">*</font>)&nbsp; The e-mail addresses you provided to download this article will not be used for<br >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;any other purpose without your consent.</br></td></tr>
 

              <tr>
                <td width="40"></td>
                <td width="520" height="25">
                  <p class="HRight" align="right"><a href="#top" class="Top">&lt;&lt;Top</a></td>
                <td width="40"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="100%"><img border="0" src="images/spacer.gif" width="1" height="5"></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#9DB7CA"><img border="0" src="images/spacer.gif" width="1" height="5"></td>
  </tr>
  <tr>
    <td width="100%">
    	<table cellpadding="0" cellspacing="0" width="100%" border="0">
    	<td width="50%" align="left"> 
      <p class="copyright">Copyright 2004, Apex Decisions Inc.
      <td>
      <td width="50%" align="right"> 
      <p class="copyright"><b><a href="contact.htm">Contact us</a> | <a href="sitemap.htm">Sitemap</a></b>
      <script type="text/javascript" language="javascript">          i = 11008</script>
			<script type="text/javascript" language="javascript"
			src="http://t3.trackalyzer.com/trackalyze.js"></script>
      
      <td>
      </table>
      </td>
  </tr>
</table>


</body>

</html>




































