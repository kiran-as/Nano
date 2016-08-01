<? include_once('../db/dbconfig.php');
   include_once('../classes/dataBase.php');
   include_once('../classes/checkInputFields.php');
   include_once('../classes/checkingAuth.php');
   include_once('../classes/inputFields.php');
   include_once('../classes/messages.php');  
   $check=new checkingAuth();
   $check->loginCheck();   
   $input=new inputFields();	
   $ch=new checkInputFields();	
   $db=new dataBase();
   $db->connectDB(); 
 ?>
	<script type="text/javascript" src="mootools.v1.11.js"></script>
	<script type="text/javascript" src="DatePicker.js"></script>

<script type="text/javascript">

// The following should be put in your external js file,
// with the rest of your ondomready actions.

window.addEvent('domready', function(){

	$$('input.DatePicker').each( function(el){
		new DatePicker(el);
	});

});


</script>



<style type="text/css">

/* ---- calendar and input styles ---- */

input.DatePicker{
	display: block;
	width: 150px;
	padding: 3px 3px 3px 24px;
	border: 1px solid #0070bf;
	font-size: 13px;
	background: #fff url(date.gif) no-repeat top left;
	cursor: pointer;
}
input:focus.DatePicker{
	background: #fffce9 url(datefocus.gif) no-repeat top left;
}
.dp_container{
	position: relative;
	padding: 0;
	z-index: 500;
}
.dp_cal{
	background-color: #fff;
	border: 1px solid #0070bf;
	position: absolute;
	width: 177px;
	top: 24px;
	left: 0;
	margin: 0px 0px 3px 0px;
}
.dp_cal table{
	width: 100%;
	border-collapse: collapse;
	border-spacing: 0;
}
.dp_cal select{
	margin: 2px 3px;
	font-size: 11px;
}
.dp_cal select option{
	padding: 1px 3px;
}
.dp_cal th,
.dp_cal td{
	width: 14.2857%;
	text-align: center;
	font-size: 11px;
	padding: 2px 0;
}
.dp_cal th{
	border: solid #aad4f2;
	border-width: 1px 0;
	color: #797774;
	background: #daf2e6;
	font-weight: bold;
}
.dp_cal td{
	cursor: pointer;
}
.dp_cal thead th{
	background: #d9eefc;
}
.dp_cal td.dp_roll{
	color: #000;
	background: #fff6bf;
}
/* must have this for the IE6 select box hiding */
.dp_hide{
	visibility: hidden;
}
.dp_empty{
	background: #eee;
}
.dp_today{
	background: #daf2e6;
}
.dp_selected{
	color: #fff;
	background: #328dcf;
}



/* ---- just to pretty up this page ---- */

body{
	font-family: Tahoma, Geneva, sans-serif;
}
.yep{
	width: 450px;
	margin: 50px auto;
	text-align: center;
}
h1{
	margin: 20px 0;
	color: #60bf8f;
	font: normal 28px Georgia, serif;
}
h2{
	margin: 20px 0;
	color: #60bf8f;
	font: normal 22px Georgia, serif;
}
p{
	float: left;
	display: inline;
	width: 180px;
	margin: 20px;
	text-align: left;
}
label{
	color: #797774;
	display: block;
	font-size: 12px;
	font-weight: bold;
	margin: 8px 0 3px 0;
}
dl,dt,dd,ul,li{
	margin: 0;
	padding: 0;
	list-style: none;
}
ul{
	clear: both;
}
li{
	font-size: 10px;
}
li a{
	color: #004a7f;
	text-decoration: none;
}
li a:hover{
	color: #328dcf;
	border-bottom: 1px solid #328dcf;
}
dl{
	font-size: 12px;
	text-align: left;
}
dt, dd.default{
	font-family: monaco, "Bitstream Vera Sans Mono", "Courier New", courier, monospace;
	font-weight: bold;
}
dt{
	clear: left;
	float: left;
	width: 140px;
	padding: 5px;
	text-align: right;
}
dd{
	margin: 5px 0 30px 160px;
	padding: 5px;
}
.default{
	margin: 0 0 0 160px;
	background: #eee;
}
p.note{
	background: #ffd;
	border: 1px solid #dd6;
	display: block;
	float: none;
	font-size: 12px;
	line-height: 1.8;
	padding: 10px;
	width: auto;
}
code{
	background: #eee;
	border: 1px solid #ccc;
	padding: 0 5px;
}
</style>
<script>
	function work_Validation()
			{
							
			var txtForm=document.infoForm;
			var j=0;
			
			 for(var i=0;i<document.getElementsByName("txtType").length;i++)
                             {
	                           if(txtForm.txtType[i].checked)
	                             {

                             j++;		
	                         }
            }      
			//alert("fdgf");
				 if(txtForm.txtCompany.value=='')
					{
					alert(" Please enter company");
					txtForm.txtCompany.focus();
					return false;
					}
					if(txtForm.txtDesignation.value=='')
					{
					alert(" Please enter Designation");
					txtForm.txtDesignation.focus();
					return false;
					}
					if(txtForm.txtProject.value=='')
					{
					alert(" Please enter Project u have done");
					txtForm.txtProject.focus();
					return false;
					}
					if(txtForm.datepicker.value=='')
					{
					alert(" Please enter From date");
					txtForm.datepicker.focus();
					return false;
					}
					if(txtForm.datepicker1.value=='')
					{
					alert(" Please enter To  date");
					txtForm.datepicker1.focus();
					return false;
					}
					
				else if(j==0)
                             {
	                            alert("Please Select Experience Type"); 
	
	                               return false;
                                    }
									
			   else if(txtForm.selFrom.value=='0')
					{
					alert("Please Select 'From' year ");
					txtForm.selFrom.focus();
					return false;
					}
			   else if(txtForm.selTo.value=='0')
					{
					alert("Please Select 'To' year ");
					txtForm.selFrom.focus();
					return false;
					}
									
			}
</script>

<script type="text/javascript">
	function showOtherPlace(val){
	//alert("hai");
	if(val == "-2"){
		document.getElementById("OtherPlaces").style.display='block';
	} else {
		document.getElementById("OtherPlaces").style.display='none';
	/*	document.getElementById("txtTOTAL_PLACE").value=0;
		var total=document.frm1.txtTOTAL_PLACE.value;
			for(var i=0;i <= total;i++){
				document.getElementById('attach1_' + i).innerHTML ="";
			}
		*/
	}
}
	</script>
		
		
    <!--end code highlighter-->
    <SCRIPT language="javascript">
function add(id) {
 
    //Create an input type dynamically.
    var element = document.createElement("textarea");

    //Assign different attributes to the element.

    element.setAttribute("value", 'areaDescription');
    element.setAttribute("name", 'areaDescription[]');
	element.setAttribute("id", 'areaDescription');
 element.setAttribute("cols", '60');
    element.setAttribute("rows", '5');
    var foo = document.getElementById("mallifooBar"+id);
 
    //Append the element in page (in span).
    foo.appendChild(element);
 
}
</SCRIPT>
    <SCRIPT language="javascript">
function addNew() {
 
    //Create an input type dynamically.
    var element = document.createElement("textarea");

    //Assign different attributes to the element.

    element.setAttribute("value", 'areaDescription');
    element.setAttribute("name", 'areaDescription[]');
	element.setAttribute("id", 'areaDescription');
 element.setAttribute("cols", '60');
    element.setAttribute("rows", '5');
    var foo = document.getElementById("newDiv");
 
    //Append the element in page (in span).
    foo.appendChild(element);
 
}
</SCRIPT>
	
    
  
<table width="643"  > 
<tr>
  <td>&nbsp;</td>
</tr>
<tr><td>
<?=$input->formStart('infoForm','','onSubmit="return work_Validation();"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="adddiv_work" style="display:none;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
  </tr>
    <tr>
    <td class="">&nbsp;</td>
    <td><table width="71%"> 
  
  <tr>
     <td height="25" colspan="2"><span class="heading1" >Add Work Experience Details </span> <? //=messaging($_REQUEST[msg])?> </td>
</tr> 
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

    
	
   
	
	
<tr>

   <td align="left"><span class="text">Company:</span></td>
    <td  height="24" colspan="2">
	<?=$input->textBox('txtCompany',$edit->we_company,'text','style=width:200px;','');?><span class="error"> *</span></td>
</tr>
 
<tr>
 <td align="left"><span class="text">Designation:</span></td>
    <td  height="24" colspan="2">
	<?=$input->textBox('txtDesignation',$edit->we_designation,'text','style=width:200px;','');?><span class="error"> *</span></td>
    </tr>
		<p>

		<label for="birthday">default calendar</label>
		<input id="birthday" name="birthday" type="text" class="DatePicker" tabindex="1"  />
	</p>

	<p>
		<label for="new_day">calendar with all options</label>
		<input id="new_day" name="new_day" type="text" class="DatePicker" />
	</p>
	
	
	
	  <tr>
                  <td align="left" valign="top" class="demo" > From Date: </td>
                  <td align="left" valign="top">
				 <input type="text" name="txtDate" id="txtDate" readonly="txtDate" class="text_box" />
						  <img src="images/Small-21.png" onclick="displayCalendar(document.myform.txtDate,'yyyy/mm/dd',this)"/>				  </td>
                </tr>
					  <tr>
                  <td align="left" valign="top" class="demo" > To Date: </td>
                  <td align="left" valign="top"><input type="text" name="txtDate" id="txtDate" readonly="txtDate" class="text_box" />
						  <img src="images/Small-21.png" onclick="displayCalendar(document.myform.txtDate,'yyyy/mm/dd',this)"/></td>
                </tr>
				
				
	<tr>
    <td align="left"><span class="text">Experience Type:</span></td>
    <td  height="24" colspan="2">
    
	<input type="radio" name="txtType"  <?=$edit->we_type=='VLSI'?'checked':''?> value="VLSI" onclick="showOtherPlace(this.value)"/><label>VLSI</label>
	<?php /*?><?=$input->radio('txtType','VLSI','text','');?><?php */?>
  
	<input type="radio" name="txtType"  <?=$edit->we_type=='Embedded'?'checked':''?>  value="Embedded" onclick="showOtherPlace(this.value)"/><label>Embedded</label>
<?php /*?>	<?=$input->radio('txtType','Embedded','text','');?><?php */?>
    <input type="radio" name="txtType" value="-2"  <?=$edit->we_type=='-2'?'checked':''?>  onclick="showOtherPlace(this.value)" /> <label>Other</label>
	<?php /*?> <?=$input->radio('txtType','-2','text','');?><span class="error">*</span><?php */?>
	<span class="error"> *</span></td>
</tr>
 <tr>
          <td></td>
          <td>
	  
<div id="OtherPlaces" style="display:none;"> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$edit->we_other?>" /></div></td>
        </tr>

<tr>
          <td></td>
          <td><input type='button' value='Add Project' id='addButton' onclick="addNew()";></td>
        </tr>
<tr>
 <tr>
          <td colspan="2"><span id="newDiv"></span> </td>
        </tr>
<tr>   
    <td  height="19" width="127">&nbsp;</td>
    
    <td  height="19" width="489">
  <?=$input->submitButton('workInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="button" name="SaveAddNext" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" />
  
 
  </td>
   </tr>
</table></td>
    <td class="">&nbsp;</td>
  </tr>
   <tr><td colspan="3"><hr /></td></tr>
</table>
 </div>
<?=$input->formEnd()?> 
 </td></tr>
 <tr><td><div id="id_display">
   <div align="right"><a href="#" onclick="document.getElementById('adddiv_work').style.display='block';document.getElementById('id_display').style.display='none';" class="morelinkbtm">Add New</a></div></td></tr>
 <tr><td>
 <?     $all_work_query = "SELECT * FROM $work_experience_table where m_id='".$_SESSION[m_id]."'"; 
 
  $all_works_experince=$db->getResults($all_work_query);
    $m=1;  
    foreach($all_works_experince as $works){?> 
    <?=$input->formStart('infoForm','','onSubmit="return work_Validation();"');?>
    <input type="hidden" name="we_id" value="<?=$works->we_id;?>" />
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
    <td class="">&nbsp;</td>
  </tr>
    <tr>
    <td class="">&nbsp;</td>
    <td><table width="100%"> 
  
 
<tr>
     <td>&nbsp;</td>
     <td colspan="2" ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td colspan="2" ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

    
	
   
	
	
<tr>

   <td align="left"><span class="text">Company:</span></td>
    <td  height="24" colspan="3">
	<?=$input->textBox('txtCompany',$works->we_company,'text','style=width:200px;','');?><span class="error"> *</span></td>
</tr>
 
<tr>
 <td align="left"><span class="text">Designation:</span></td>
    <td  height="24" colspan="3">
	<?=$input->textBox('txtDesignation',$works->we_designation,'text','style=width:200px;','');?><span class="error"> *</span></td>
    </tr>
	
	  <tr>
                  <td align="left" valign="top" class="demo" > From Date: </td>
                  <td width="315" align="left" valign="top">
                  <input type="text" name="birthday" id="birthday" readonly="txtDate" class="DatePicker" style="width:150px; height:13px;"  value="<?php echo $works->From_date ?>"/>
			    </td><td width="149">&nbsp;</td>
	  </tr>
					  <tr>
                  <td align="left" valign="top" class="demo" > To Date: </td>
                  <td align="left" valign="top"><input type="text" name="new_day" id="new_day" readonly="txtDate"  style="width:150px; height:13px;" class="DatePicker"  value="<?php echo $works->To_date ?>"/>
						</td>
                  <td align="left" valign="top"><input type='button' value='Add Project' id='addButton' onclick="add(<?=$m?>)";></td>
					  </tr>
	<tr>
    <td align="left"><span class="text">Experience Type:</span></td>
    <td  height="24" colspan="3">
    
	<input type="radio" name="txtType"  <?=$works->we_type=='VLSI'?'checked':''?> value="VLSI" onclick="showOtherPlace(this.value)" /><label>VLSI</label>
	<?php /*?><?=$input->radio('txtType','VLSI','text','');?><?php */?>
  
	<input type="radio" name="txtType"  <?=$works->we_type=='Embedded'?'checked':''?>  value="Embedded" onclick="showOtherPlace(this.value)" /><label>Embedded</label>
<?php /*?>	<?=$input->radio('txtType','Embedded','text','');?><?php */?>
    <input type="radio" name="txtType" value="-2"  <?=$works->we_type=='-2'?'checked':''?>  onclick="showOtherPlace(this.value)" /> <label>Other</label>
	<?php /*?> <?=$input->radio('txtType','-2','text','');?><span class="error">*</span><?php */?>
	<span class="error"> *</span></td>
</tr>
 <tr>
          <td></td>
          <td colspan="2">
	  
<div id="OtherPlaces" <? 
if($_POST[txtType] == -2 || $works->we_type=='-2') echo 'style="display:block;"'; 

else

echo 'style="display:none;"';  ?>
> Add other Experience &nbsp;
              <input type="text" name="txtExp" id="txtExp" value="<?=$works->we_other?>" /></div></td>
        </tr>


 <tr>
   <td  height="19" colspan="3"><? $select_wp_result=$db->getResults("select * from $work_projects_table where we_id='".$works->we_id."'");
  
  if(count($select_wp_result)>0){ 
  foreach($select_wp_result as $wp_result){
   ?>
   <textarea name="areaDescription[]" cols="60"  rows="5"><?=stripslashes($wp_result->wp_description);?></textarea>
   <a href="" onclick="document.location.href='job_seeker_menu.php?menu=work_proj_delete&wp_id=<?=$wp_result->wp_id;?>'" class="morelinkbtm">Delete</a>
   <? }}?>

   
   <span id="mallifooBar<?=$m?>">&nbsp;</span></td>
   </tr>
 <tr>
    
    <td  height="19" width="127">&nbsp;</td>
    
    <td colspan="2"><input type="submit" name="updateWork" value="Save" class="button" />&nbsp;&nbsp;
	<input type="button" onclick="document.location.href='job_seeker_menu.php?menu=workDel&we_id=<?=$works->we_id;?>'" value="Delete" class="button" /></td>
   </tr>
</table></td>
    <td class="">&nbsp;</td>
  </tr>
 <tr><td colspan="3"><hr /></td></tr>
</table>
<?=$input->formEnd()?> 
  <? $m++; }?>   
      
 
 
 </td></tr>
<td><tr><div id="wep_div"> </div> </td></tr>
 </table>	
<?php /*?> <tr><td>
 <?=$input->formStart('wepForm','','onSubmit="return wep_Validation();"');?>
<input type="hidden" name="hdNext" id="hdNext" value="" />
<div id="addwork_exp_proj" style="display:none;">
<table width="643">
<tr><td  colspan="2">Add Work Experience</td></tr>	  
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

<tr>
    <td width="159" height="1"  class="text" align="left">Title :</td>
    <td  height="" width="472"><?=$input->textBox('txtTitle','','text','style=width:320px;','');?><span class="error">*</span></td>
</tr>          
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Description:</td>
    <td  height="23" colspan="2">
<textarea rows="4" cols="48" name="Qualification"></textarea><span class="error">*</span>
</td> 
</tr>
 
 
<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472"><?=$input->submitButton('wepInsert','Save','button');?>&nbsp;&nbsp;&nbsp;<input type="button" name="SaveAddNext" value="Save and Add Next" class="button" onclick="document.getElementById('hdNext').value=1;" style="width:200px" /></td></tr>

	
</table>
 </div>
<?=$input->formEnd()?>
 </td></tr>
 <tr><td><div id="wp_display"><a href="#" onclick="document.getElementById('addwork_exp_proj').style.display='block';document.getElementById('wp_display').style.display='none';" class="morelinkbtm">Add New Project</a></td></tr>
 <tr><td>
 <?   $query_proj = "SELECT * FROM $proj_work_experience_table where m_id='".$_SESSION[m_id]."' order by wep_id desc"; 
      $projects_result=$db->getResults($query_proj);
      
      
    foreach($projects_result as $projects){?> 
    <?=$input->formStart('infoForm','','onSubmit="return ache_Validation();"');?>
    <input type="hidden" name="cc_id" value="<?=$projects->cc_id;?>" />
   <table width="643">
<tr>
     <td>&nbsp;</td>
     <td ><div align="center"><span class="error">&nbsp;</span></div></td>
</tr>

<tr>
     <td>&nbsp;</td>
     <td ><div align="right"><span class="error">* Indicates Required field</span></div></td>
</tr>

<tr>
    <td width="159" height="1"  class="text" align="left">Title :</td>
    <td  height="" width="472"><?=$input->textBox('txtTitle',$projects->wep_title,'text','style=width:320px;','');?><span class="error">*</span></td>

</tr>          
 <tr>
    <td width="159" height="1"  class="text" align="left" valign="top">Description:</td>
    <td  height="23" colspan="2">
<textarea rows="4" cols="48" name="Qualification"><?=stripslashes($projects->wep_description);?></textarea><span class="error">*</span></td> 
</tr>
 
   

<tr>
    
    <td  height="19" width="159">&nbsp;</td>
    
    <td  height="19" width="472">
  <input type="submit" name="wepCore" value="Save" class="button" />&nbsp;&nbsp;<input type="button" onclick="document.location.href='job_seeker_menu.php?menu=core&wep_id=<?=$projects->wep_id;?>'" value="Delete" class="button" />
    <!--<input  style="color: rgb(8, 96, 168); font-weight: bold; font-family: calibri;" type="submit" name="RegSubmit"  value="Register"/>--></td>
  </tr>
  </table></div>
<?=$input->formEnd()?> 
 </td></tr> <? }?> <?php */?>

  <? //$input->formEnd()?>
