// JavaScript Document
// confirmation for edit
			    function toedit(){
							var ok;
							ok = window.confirm('Do you really want to Edit ?');
							if(ok){
								return true;
							}else{
								return false;
							}
							}
			
			
				// confirmation for delete
				function toDelete(){
							var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							}
							else{
								return false;
							}
							
							
							}
							
							
				function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}			
							
							
function RegisterValidation()
			{

var txtForm=document.txtForm1;	
var j=0;
 
                           for(var i=0;i<document.getElementsByName("txtGender").length;i++)
                             {
	                           if(txtForm.txtGender[i].checked)
	                             {

                             j++;		
	                         }

	
                                }
 
 
 

				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
			//	var phoneExp  =/^([0-9]{10})/;
				var officephoneExp =/^([0-9])/;
				var state = /[^a-zA-Z' ']/g
			
	          
			if(txtForm.txtFirstName.value=='')
					{
					alert(" Please Enter First Name");
					txtForm.txtFirstName.focus();
					return false;
					}
					 else if(txtForm.txtLastName.value=='')
					{
					alert(" Please Enter Last Name");
					txtForm.txtLastName.focus();
					return false;
					}
					else if(txtForm.txtEmail.value=='')
					{
					alert(" Please Enter Email Address");
					txtForm.txtEmail.focus();
					return false;
					}
					else if(txtForm.txtEmail.value.search(emailExp) == -1)
					{
					alert("Please Enter Valid Email Address");
					txtForm.txtEmail.focus();
					return false;
					}
					else if(txtForm.txtEmailConfirm.value=='')
					{
					alert(" Please Enter Confirm Email Address");
					txtForm.txtEmailConfirm.focus();
					return false;
					}
					else if(txtForm.txtEmailConfirm.value.search(emailExp) == -1)
					{
					alert("Please Enter Valid  Confirm Email Address");
					txtForm.txtEmailConfirm.focus();
					return false;
					}
					else if(txtForm.txtEmail.value !=  txtForm.txtEmailConfirm.value)

                     {

                        alert("Email Address And Confirm Email Address Not Matched!");

                         txtForm.txtEmail.focus();

                        return false;
                     }

					
	               
					
								
					else if(txtForm.txtPassword.value=='')
					{
					alert("Please Enter Password");
					txtForm.txtPassword.focus();
					return false;
					
					}
					
					else if(txtForm.txtPassword.value.length < 3)
					{
					alert("Password Must Contain At Least Three Characters");
					txtForm.txtPassword.focus();
					return false;
					
					}
					
					else if(txtForm.txtConfirmPassword.value=='')
					{
					alert("Please Enter Confirm Password");
					txtForm.txtConfirmPassword.focus();
					return false;
					
					}
					

                        else if(txtForm.txtPassword.value !=  txtForm.txtConfirmPassword.value)

                               {
                           alert("Password And Confirm Password Not Matched!");

                         txtForm.txtPassword.focus();

                             return false;
                               }
							   
					 else if(txtForm.txtDay.value=='')
					 {
                  alert(" Please  Select Day For Date Of Birth");
		         txtForm.txtDay.focus();
				  return false;
                     }
					  else if (txtForm.txtMonth.value=='Month')
					 {
                  alert(" Please  Select Month For Date Of Birth");
		         txtForm.txtMonth.focus();
				  return false;
                     }
					  else if (txtForm.txtYear.value=='')
					 {
                  alert(" Please  Select Year For Date Of Birth");
		         txtForm.txtYear.focus();
				  return false;
                     }
					 
			        	
								else if(j==0)
                             {
	                            alert("Please Select Gender"); 
	
	                               return false;
                                    }
 
 
				/*	  else if (txtForm.txtAddress.value=='')
					 {
                  alert(" Please Enter Address For Communication");
		         txtForm.txtAddress.focus();
				  return false;
                     }	*/ 
					else if (txtForm.txtCity.value =='')
					 {
						  alert(" Please Enter City ");
		        		 txtForm.txtCity.focus();
				  return false;
					 }
                 else if (isalpha(txtForm.txtCity.value)==false)
							{
							alert("Please Enter City With Alphabets");	
							txtForm.txtCity.focus();
							return false;
							}
                    else if (txtForm.txtPinCode.value=='')
					 {
                  alert(" Please Enter Pin Code");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 
					  else if (txtForm.txtPinCode.value.search(officephoneExp) == -1)
					 {
                  alert(" Please Enter Pin Code With Numerics ");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 	 else if (txtForm.selState.value=='' && txtForm.txtState.value=='')
					 {
                  alert(" Please Enter State ");
		         txtForm.selState.focus();
				  return false;
                     }
					 
					  else if (txtForm.selCountry.value=='')
					 {
                  alert(" Please Enter Country ");
		         txtForm.selCountry.focus();
				  return false;
                     }
 
					 
					       else if (txtForm.txtPhoneNumber.value=='')
					 {
                  alert(" Please Enter Mobile Number ");
		         txtForm.txtPhoneNumber.focus();
				  return false;
                     }
					 
					 
					 else if(txtForm.txtPhoneNumber.value.search(officephoneExp) == -1)
					{
					alert("Please Enter  Mobile Number With Numerics");
					txtForm.txtPhoneNumber.focus();
					return false;
					}   else if (txtForm.vercode.value=='')
					 {
                  alert(" Please Enter verification code ");
		         txtForm.vercode.focus();
				  return false;
                     }
					
				/*	 else if (txtForm.txtStdCode.value=='')
					 {
                  alert(" Please Enter Std Code ");
		         txtForm.txtStdCode.focus();
				  return false;
                     }
					 
					  else if(txtForm.txtStdCode.value.search(officephoneExp) == -1)
					{
					alert("Please Enter Std Code With Numerics");
					txtForm.txtStdCode.focus();
					return false;
					}
					
					  else if (txtForm.txtContactNo.value=='')
					 {
                  alert(" Please Enter Office Contact Number ");
		         txtForm.txtContactNo.focus();
				  return false;
                     }
					 
					  else if(txtForm.txtContactNo.value.search(officephoneExp) == -1)
					{
					alert("Please Enter Office Contact Number With Numerics");
					txtForm.txtContactNo.focus();
					return false;
					}*/
					
					   else if(document.getElementById('chkTerms').checked==false)
					{
					alert("Please agree to  Terms and Conditions");
					document.getElementById('chkTerms').focus();
					return false;
					} 
					
							   
            
				
				
					
}		




function loginValidations()
			{
				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
				
				//alert("sriahri");
			var txtForm=document.LoginForm;
	          
		 if(txtForm.txtEmailId.value=='')
					{
					alert("Please Enter Email");
					txtForm.txtEmailId.focus();
					return false;
					}
					else if(txtForm.txtEmailId.value.search(emailExp) == -1)
					{
					alert("Please Enter Valid Email Address");
					txtForm.txtEmailId.focus();
					return false;
					}
					else  if(txtForm.txtPassword.value=='')
					{
					alert("Please enter password");
					txtForm.txtPassword.focus();
					return false;
					}
					
					
			}
			
			
		function genralinfoValidation()
		{
			
			var txtForm=document.txtForm1;	
                    var j=0;
 
                           for(var i=0;i<document.getElementsByName("txtGender").length;i++)
                             {
	                           if(txtForm.txtGender[i].checked)
	                             {

                             j++;		
	                         }

	
                                }
 
 
 

				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
				var phoneExp  =/^([0-9]{10})/;
				var officephoneExp =/^([0-9])/;
			
			
				if(txtForm.txtFirstName.value=='')
					{
					alert(" Please enter first name");
					txtForm.txtFirstName.focus();
					return false;
					}
					 else if(txtForm.txtLastName.value=='')
					{
					alert(" Please enter last name");
					txtForm.txtLastName.focus();
					return false;
					}
					else if(txtForm.txtEmail.value=='')
					{
					alert(" Please enter email address");
					txtForm.txtEmail.focus();
					return false;
					}
					else if(txtForm.txtEmail.value.search(emailExp) == -1)
					{
					alert("Please enter valid email address");
					txtForm.txtEmail.focus();
					return false;
					}
					
					 else if(txtForm.txtDay.value=='')
					 {
                  alert(" Please  select day for date Of birth");
		         txtForm.txtDay.focus();
				  return false;
                     }
					  else if (txtForm.txtMonth.value=='')
					 {
                  alert(" Please  select month for date Of birth");
		         txtForm.txtMonth.focus();
				  return false;
                     }
					  else if (txtForm.txtYear.value=='')
					 {
                  alert(" please  select year for date Of birth");
		         txtForm.txtYear.focus();
				  return false;
                     }
					 
			        	
								else if(j==0)
                             {
	                            alert("Please select gender"); 
	
	                               return false;
                                    }
 
 
					  else if (txtForm.txtAddress.value=='')
					 {
                  alert(" Please enter address for communication");
		         txtForm.txtAddress.focus();
				  return false;
                     }
					  else if (txtForm.txtPinCode.value=='')
					 {
                  alert(" Please enter pin code");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 
					   else if (txtForm.txtPinCode.value=='')
					 {
                  alert(" Please enter pin code");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 
					  else if (txtForm.txtPinCode.value.search(officephoneExp) == -1)
					 {
                  alert(" Please enter pin code with numerical values ");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 
					
					
							   
                  else if (txtForm.txtPhoneNumber.value=='')
					 {
                  alert(" Please enter mobile number ");
		         txtForm.txtPhoneNumber.focus();
				  return false;
                     }
					 
					 
					 else if(txtForm.txtPhoneNumber.value.search(phoneExp) == -1)
					{
					alert("Please enter valid mobile number");
					txtForm.txtPhoneNumber.focus();
					return false;
					}
					
					 else if (txtForm.txtStdCode.value=='')
					 {
                  alert(" Please enter std code ");
		         txtForm.txtStdCode.focus();
				  return false;
                     }
					 
					  else if(txtForm.txtStdCode.value.search(officephoneExp) == -1)
					{
					alert("Please enter std code with numerics");
					txtForm.txtStdCode.focus();
					return false;
					}
					
					  else if (txtForm.txtContactNo.value=='')
					 {
                  alert(" Please enter office contact number ");
		         txtForm.txtContactNo.focus();
				  return false;
                     }
					 
					  else if(txtForm.txtContactNo.value.search(officephoneExp) == -1)
					{
					alert("Please enter office contact number with numerics");
					txtForm.txtContactNo.focus();
					return false;
					}
					
					
					 else if (txtForm.txtCountry.value=='')
					 {
                  alert(" Please enter country ");
		         txtForm.txtCountry.focus();
				  return false;
                     }
					 
					 else if (txtForm.txtState.value=='')
					 {
                  alert(" Please enter state ");
		         txtForm.txtState.focus();
				  return false;
                     }
					
					 else if (txtForm.txtCity.value=='')
					 {
                  alert(" Please enter city ");
		         txtForm.txtCity.focus();
				  return false;
                     }

		


		}
		
			
function edu_details_Validation()
			{
				
				
				var percentageExp  =/^([0-9]{2})/;
				
			var txtForm=document.infoForm;
			var j=0;
 
                           for(var i=0;i<document.getElementsByName("txtType").length;i++)
                             {
	                           if(txtForm.txtType[i].checked)
	                             {

                             j++;		
	                         }

	
                                }
 
	          
				if(txtForm.txtTitle.value=='0')
					{
					alert(" Please enter Qulification");
					txtForm.txtTitle.focus();
					return false;
					}
					
								/*else if(j==0)
                             {
	                            alert("Please Select Type"); 
	
	                               return false;
                                    }*/
									
					else if(txtForm.txtCourse.value=='0')
					{
					alert("Please Select Course");
					txtForm.txtCourse.focus();
					return false;
					}
									
				    else if(txtForm.txtBacklogs.value=='0')
					{
					alert("Please Select Back Logs");
					txtForm.txtBacklogs.focus();
					return false;
					}
					
					
					
					 else if(txtForm.txtBranch.value=='')
					{
					alert("Please Enter Branch");
					txtForm.txtBranch.focus();
					return false;
					}
					
					 else if(txtForm.txtCountry.value=='0')
					{
					alert("Please Select  Country");
					txtForm.txtCountry.focus();
					return false;
					}
					
					
					else if(txtForm.txtState.value=='0')
					{
						
					alert("Please Select  State");
					txtForm.txtState.focus();
					return false;
					}
					
					
					 else if(txtForm.selInst.value=='0')
					{
					alert("Please Select  Institute");
					txtForm.selInst.focus();
					return false;
					}
									
					 else if(txtForm.selUniv.value=='0')
					{
					alert("Please enter university");
					txtForm.selUniv.focus();
					return false;
					}
					else if(txtForm.txtYear.value=='0')
					{
					alert("Please Select Year Of Pass Out");
					txtForm.txtYear.focus();
					return false;
					}
					else if(txtForm.txtMonth.value=='0')
					{
					alert("Please Select Month Of Pass Out");
					txtForm.txtMonth.focus();
					return false;
					}
					else if(txtForm.txtPercentage.value=='')
					{
					alert("Please Enter Percentage");
					txtForm.txtPercentage.focus();
					return false;
					}
					else if(txtForm.txtPercentage.value.search(percentageExp) == -1)
					{
					alert(" Please enter percentage with two digit  numbers");
					txtForm.txtPercentage.focus();
					return false;
					}
					
					
			
				}
					
function Certification_Validation()
			{
				
			var txtForm=document.infoForm;
	          
			if(txtForm.txtTitle.value=='')
					{
					alert("Please enter title");
					txtForm.txtTitle.focus();
					return false;
					}
					 else if(txtForm.txtYearOfCertification.value=='')
					{
					alert("Please enter year of certification");
					txtForm.txtYearOfCertification.focus();
					return false;
					}
					 else if(txtForm.txtGrade.value=='')
					{
					alert("Please enter grade");
					txtForm.txtGrade.focus();
					return false;
					}
					
					
					
					
					
			}
													
					

function Achivements_Validation()
			{
			
			var txtForm=document.infoForm;
	          
			if(txtForm.txtTitle.value=='')
					{
					alert("Please enter title");
					txtForm.txtTitle.focus();
					return false;
					}
					
			}
													
					

		
			
			
			function stu_Projects_Validation()
			{
				
			
				
			var txtForm=document.infoForm;
	          
			if(txtForm.txtTitle.value=='')
					{
					alert("Please enter title");
					txtForm.txtTitle.focus();
					return false;
					}
					 else if(txtForm.txtCompany.value=='')
					{
					alert(" Please enter company");
					txtForm.txtCompany.focus();
					return false;
					}
					
				
					
					else if(txtForm.selFrom.value=='0')
					{
					alert("Select 'From year'");
					txtForm.selFrom.focus();
					return false;
					}
					
					else if(txtForm.selTo.value=='0')
					{
					alert("Select 'To year'");
					txtForm.selTo.focus();
					return false;
					}
					
					
					else if(txtForm.selEnd.value=='0')
					{
					alert("Select worked on");
					txtForm.selEnd.focus();
					return false;
					}
					
					 else if(txtForm.Role.value=='')
					{
					alert(" Please enter role");
					txtForm.Role.focus();
					return false;
					}
					 else if(txtForm.TeamSize.value=='')
					{
					alert(" Please enter team size");
					txtForm.TeamSize.focus();
					return false;
					}
					 else if(txtForm.areaDescription.value=='')
					{
					alert(" Please enter project description");
					txtForm.areaDescription.focus();
					return false;
					}
					 else if(txtForm.areaTools.value=='')
					{
					alert(" Please enter tools used  ");
					txtForm.areaTools.focus();
					return false;
					}
					 else if(txtForm.areaChallenge.value=='')
					{
					alert(" Please enter challenges");
					txtForm.areaChallenge.focus();
					return false;
					}
					else
					{
						return true
						}
			}
					
					
	function Resume_validation()
			{
				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
				var phoneExp  =/^([0-9]{10})/;
				//alert("sriahri");
			var txtForm=document.infoForm;
	          
			if(txtForm.txtTitle.value=='')
					{
					alert(" Please enter title");
					txtForm.txtTitle.focus();
					return false;
					}else if(txtForm.txtFName.value=='')
					{
					alert(" Please enter father's name");
					txtForm.txtFName.focus();
					return false;
					}
					else if(txtForm.txtEmail.value=='')
					{
					alert(" Please enter email");
					txtForm.txtEmail.focus();
					return false;
					}
					else if(txtForm.txtEmail.value.search(emailExp) == -1)
					{
					alert("Please enter valid email address");
					txtForm.txtEmail.focus();
					return false;
					}
					else if (txtForm.txtPhone.value=='')
					 {
                  alert(" Please enter phone number");
		         txtForm.txtPhone.focus();
				  return false;
                     }
					 
					 else if(txtForm.txtPhone.value.search(phoneExp) == -1)
					{
					alert("Please enter valid phone number");
					txtForm.txtPhone.focus();
					return false;
					}
	               
					
								
					else if(txtForm.txtAddress.value=='')
					{
					alert("Please enter address");
					txtForm.txtAddress.focus();
					return false;
					
					}
					else if(txtForm.txtCity.value=='')
					{
					alert("Please enter city");
					txtForm.txtCity.focus();
					return false;
					
					}
					
                   else if(txtForm.selCountry.value=='')
					{
					alert("Please select country");
					txtForm.selCountry.focus();
					return false;
					
					}
					
					else if(txtForm.txtObjective.value=='')
					{
					alert(" Please enter objective");
					txtForm.selCountry.focus();
					return false;
					
					}
					else if(txtForm.selSelect.selectedIndex == 0)
					{
					alert(" please select Status");
					txtForm.selSelect.focus();
					return false;
					
					}


			}
			
			function  Password_Change_Validation()
			{
				
				
				
			var txtForm=document.infoForm;
	          
			if(txtForm.txtOldPwd.value=='')
					{
					alert("Please enter old password");
					txtForm.txtOldPwd.focus();
					return false;
					}
					 else if(txtForm.txtNewPwd.value=='')
					{
					alert(" Please enter new password");
					txtForm.txtNewPwd.focus();
					return false;
					}
					
				
					
					else if(txtForm.txtCNewPwd.value=='')
					{
					alert("please enter confirm password'");
					txtForm.txtCNewPwd.focus();
					return false;
					}
				
					
				else if(txtForm.txtNewPwd.value !=  txtForm.txtCNewPwd.value)

                 {


              alert("New Password and confirm password not matched!");

        txtForm.txtNewPwd.focus();

        return false;
                }
	
					
			}
				
				
				

function loadGradBranch(id)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("divGradBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_branch.php?id="+id,true);
xmlhttp.send();
}

function loadPGBranch(id)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("divPGBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_pg_branch.php?id="+id,true);
xmlhttp.send();
}
function loadOtherBranch(id,divid)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("divOtherBranch"+divid).innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_other_branch.php?id="+id,true);
xmlhttp.send();
}

function loadOthermoreBranch(id)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("divOthermoreBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_other_more_branch.php?id="+id,true);
xmlhttp.send();
}
function loadPGDipBranch(id)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("loadPGDipBranch").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","ajax_pg_dip_branch.php?id="+id,true);
xmlhttp.send();
}

function academicinfovalidation()
{
	var title=document.forms['formAcademic']['txtTitle'].value;
	var company=document.forms['formAcademic']['txtCompany'].value;
	var role=document.forms['formAcademic']['txtRole'].value;
	var selFrom=document.forms['formAcademic']['selFrom'].value;
	var selFromYear=document.forms['formAcademic']['selFromYear'].value;
	var selMonth1=document.forms['formAcademic']['selMonth1'].value;
	var selYear1=document.forms['formAcademic']['selYear1'].value;
	
	if(title=null || title=="")
	{
		alert("Please enter title");
		return false;
	}
	else if(company=null || company=="")
	{
		alert("Please enter company");
		return false;
	}
	
	else if(selFrom=='0')
			{
					alert("Please select month in 'From Date'");
					
					return false;
			}		
			else
			if(selFromYear=='0')
			{
					alert("Please select year in 'From Date'");
					
					return false;	
			}
			
			else
				if(selMonth1=='0')
			{
					alert("Please select month in 'To Date''");
					
					return false;
			}	
			else
			
			if(selYear1=='0')
			{
					alert("Please select year in 'To Date'");
					
					return false;	
			}
			else
		   if(selFromYear!='0' && selYear1!='0')
			{
			
			 if(selFromYear>selYear1){
					alert("From Year should less than To Year");
					
					return false;	
			}     } 
			if(role=null || role=="")
	{
		alert("Please enter role");
		return false;
	}
}
function careerobjvalidation()
{
	var txtCareer=document.forms['careerForm']['txtCareer[]'].value;
	
	
	if(txtCareer=null || txtCareer=="")
	{
		alert("Please Enter Career Objective");
		return false;
	}
	
}
function achievementvalidation()
{
	var txtAchiv=document.forms['archForm']['txtAchiv[]'].value;
	
	
	if(txtAchiv=null || txtAchiv=="")
	{
		alert("Please Enter Achievement Details");
		return false;
	}
	
}
function class10thvalidation()
{
	
	
//	var selMonth10=document.forms['form10']['selMonth10'].value;
	var selYear10=document.forms['form10']['selYear10'].value;
	var txtSchool10=document.forms['form10']['txtSchool10'].value;
	var txtBoard10=document.forms['form10']['txtBoard10'].value;
	var txtPer10=document.forms['form10']['txtPer10'].value;
	var frm=document.form10;
	
	 
 



	
var x = parseFloat(txtPer10);
	
	/* if(selMonth10=='0')
			{
					alert("Please Select month ");
					
					return false;
			}
			else*/
		
			if(selYear10=='0')
			{
					alert("Please select year ");
					
					return false;	
			}
			
			if ( ( frm.radPer10[0].checked == false ) && ( frm.radPer10[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
			
				 if(isNaN(txtPer10))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
		if(document.getElementById('radPer10').checked==true){
			 if(txtPer10=null || txtPer10=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPer10.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPer102').checked==true){
			 if(txtPer10=null || txtPer10=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPer10.focus();
		return false;
	}
			
			}
/*		 if(txtPer10=null || txtPer10=="")
	{
		alert("Please Enter Marks");
		return false;
	}	
	var maxvalue = 100;	
		 if(txtPer10==maxvalue)
	{
		alert("Please Enter Marks");
		return false;
	}*/
	
	if(txtSchool10=null || txtSchool10=="")
	{
		alert("Please Enter School/College Name");
		return false;
	}
	 if(txtBoard10=null || txtBoard10=="")
	{
		alert("Please Enter Board Name");
		return false;
	}
	
			
	
}
function class12thvalidation()
{
	
	//var selMonth12=document.forms['form12']['selMonth12'].value;
	var selYear12=document.forms['form12']['selYear12'].value;
	var txtSchool12=document.forms['form12']['txtSchool12'].value;
	var txtBoard12=document.forms['form12']['txtBoard12'].value;
	var txtPer12=document.forms['form12']['txtPer12'].value;
		var frm=document.form12;
	var x = parseFloat(txtPer12);
	/* if(selMonth12=='0')
			{
					alert("Please select month ");
					
					return false;
			}
			else*/
		
			if(selYear12=='0')
			{
					alert("Please select year ");
					
					return false;	
			}
				if ( ( frm.radPer12[0].checked == false ) && ( frm.radPer12[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
	 if(isNaN(txtPer12))
					 {
						alert("Enter numeric value");
						
						return false;
					 }	
				
						
						if(document.getElementById('radPer12').checked==true){
			 if(txtPer12=null || txtPer12=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPer12.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPer122').checked==true){
			 if(txtPer12=null || txtPer12=="")
	{
		alert("Please Enter Marks");
		return false;
	}
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPer12.focus();
		return false;
	}
			
			}
					 
		
	
	if(txtSchool12=null || txtSchool12=="")
	{
		alert("Please Enter School/College Name");
		return false;
	}
	 if(txtBoard12=null || txtBoard12=="")
	{
		alert("Please Enter Board Name");
		return false;
	}
	
			
	
}

function Graduationvalidation()
{
	
	var selCourseGrad=document.forms['formGrad']['selCourseGrad'].value;
		var selBranchGrad=document.forms['formGrad']['selBranchGrad'].value;
	
	var selStateGrad=document.forms['formGrad']['selStateGrad'].value;
	var selInstGrad=document.forms['formGrad']['selInstGrad'].value;
	var selCountryGrad=document.forms['formGrad']['selCountryGrad'].value;
	var sel_CountryGrad=document.forms['formGrad']['sel_CountryGrad'].value;
	//var txtotherGradInst=document.forms['formGrad']['txtotherGradInst'].value;
	var selUniversityGrad=document.forms['formGrad']['selUniversityGrad'].value;
	var txtotherGradUniv=document.forms['formGrad']['txtotherGradUniv'].value;
	//var selMonthGrad=document.forms['formGrad']['selMonthGrad'].value;
	var selYearGrad=document.forms['formGrad']['selYearGrad'].value;
	var txtPerGrad=document.forms['formGrad']['txtPerGrad'].value;	
	var frm=document.formGrad;
	
	 if(selCourseGrad=='0')
			{
					alert("Please select Course");
					
					return false;
			}
		
		 if(selBranchGrad=='0')
			{
					alert("Please select Branch");
					
					return false;
			}
		if(selCountryGrad=='99')
		{
		
			if(selStateGrad=='0')
			{
					alert("Please select State ");
					
					return false;	
			}
		}
		if(selInstGrad=='')
			{
					alert("Please Enter Institute ");
					
					return false;	
			}
			
			if(selCountryGrad=='-1')
			{ 
				if(sel_CountryGrad=="")
				{
					alert("Please enter other Country ");
					
					return false;	
				}
			}
			/*	if(selInstGrad=='-1')
			{ 
				if(txtotherGradInst=="")
				{
					alert("Please enter other institute ");
					
					return false;	
				}
			}*/
				if(selUniversityGrad=='0')
			{
					alert("Please select University");
					
					return false;	
			}
			if(selUniversityGrad=='-1')
			{ 
				if(txtotherGradUniv=="")
				{
					alert("Please enter other University ");
					
					return false;	
				}
			}
			/*	if(selMonthGrad=='0')
			{
					alert("Please select Month");
					
					return false;	
			}*/
				if(selYearGrad=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
				if ( ( frm.radPerGrad[0].checked == false ) && ( frm.radPerGrad[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
				 if(isNaN(txtPerGrad))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
		
		
	
			
			
			
			
	var x = parseFloat(txtPerGrad);	 	
						
						if(document.getElementById('radPerGrad').checked==true){
		
			
		if(txtPerGrad=null ||txtPerGrad=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerGrad.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerGrad2').checked==true){
						
		if(txtPerGrad=null ||txtPerGrad=="")
			{
					alert("Please Enter Aggregate Marks");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerGrad.focus();
		return false;
	}
			
			}
		
	
}
function PGvalidation()
{
	
	var selCoursePG=document.forms['formPG']['selCoursePG'].value;
	var selBranchPG=document.forms['formPG']['selBranchPG'].value;
	
	var selStatePG=document.forms['formPG']['selStatePG'].value;
	var selInstPG=document.forms['formPG']['selInstPG'].value;
		var selCountryPG=document.forms['formPG']['selCountryPG'].value;
	var sel_CountryPG=document.forms['formPG']['sel_CountryPG'].value;
//	var txtotherPGInst=document.forms['formPG']['txtotherPGInst'].value;
	var txtotherPGUniv=document.forms['formPG']['txtotherPGUniv'].value;
	var selUniversityPG=document.forms['formPG']['selUniversityPG'].value;
	//var selMonthPG=document.forms['formPG']['selMonthPG'].value;
	var selYearPG=document.forms['formPG']['selYearPG'].value;
	var txtPerPG=document.forms['formPG']['txtPerPG'].value;	
	
	 if(selCoursePG=='0')
			{
					alert("Please select Course");
					
					return false;
			}
		 if(selBranchPG=='0')
			{
					alert("Please select Branch");
					
					return false;
			}
		if(selCountryPG=='99')
		{
			
			if(selStatePG=='0')
			{
					alert("Please select State ");
					
					return false;	
			}
		}
		if(selInstPG=='')
			{
					alert("Please Enter Institute/College ");
					
					return false;	
			}
			
			if(selCountryPG=='-1')
			{ 
				if(sel_CountryPG=="")
				{
					alert("Please enter other Country ");
					
					return false;	
				}
			}
				/*if(selInstPG=='-1')
			{ 
				if(txtotherPGInst=="")
				{
					alert("Please enter other institute ");
					
					return false;	
				}
			}*/
				if(selUniversityPG=='0')
			{
					alert("Please select University");
					
					return false;	
			}
				if(selUniversityPG=='-1')
			{ 
				if(txtotherPGUniv=="")
				{
					alert("Please enter other University ");
					
					return false;	
				}
			}
		/*		if(selMonthPG=='0')
			{
					alert("Please select Month");
					
					return false;	
			}*/
				if(selYearPG=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerPG))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
       		var frm=document.formPG;
	var x = parseFloat(txtPerPG);	 	
		if ( ( frm.radPerPG[0].checked == false ) && ( frm.radPerPG[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
						if(document.getElementById('radPerPG').checked==true){
		
			
		if(txtPerPG=null ||txtPerPG=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerPG.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerPG2').checked==true){
						
		if(txtPerPG=null ||txtPerPG=="")
			{
					alert("Please Enter Aggregate Marks");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerPG.focus();
		return false;
	}
			
		
	
			
	
}
}

 function PGDipvalidation()
{
	
	var selCoursePGDip=document.forms['formPGDip']['selCoursePGDip'].value;
	
var selCountryPGDip=document.forms['formPGDip']['selCountryPGDip'].value;
	var selStatePGDip=document.forms['formPGDip']['selStatePGDip'].value;
		var selInstPGDip=document.forms['formPGDip']['selInstPGDip'].value;
	var txtotherPGDipInst=document.forms['formPGDip']['txtotherPGDipInst'].value;

		var selMonthPGDip=document.forms['formPGDip']['selMonthPGDip'].value;
	var selYearPGDip=document.forms['formPGDip']['selYearPGDip'].value;
	var txtPerPGDip=document.forms['formPGDip']['txtPerPGDip'].value;	
		
	 if(selCoursePGDip=='0')
			{
					alert("Please select Course");
					
					return false;
			}
			if(selCountryPGDip=='99')
			{
	if(selStatePGDip=='0')
			{
					alert("Please select State ");
					
					return false;	
			}
			}
				if(selInstPGDip=='0')
			{
					alert("Please select Institute ");
					
					return false;	
			}
				if(selInstPGDip=='-1')
			{ 
				if(txtotherPGDipInst=="")
				{
					alert("Please enter other institute ");
					
					return false;	
				}
			}
		
				if(selMonthPGDip=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearPGDip=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerPGDip))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
			  		var frm=document.formPGDip;
	var x = parseFloat(txtPerPGDip);	 	
		if ( ( frm.radPerPGDip[0].checked == false ) && ( frm.radPerPGDip[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
						if(document.getElementById('radPerPGDip').checked==true){
		
			
		if(txtPerPGDip=null ||txtPerPGDip=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerPGDip.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerPGDip2').checked==true){
						
		if(txtPerPGDip=null ||txtPerPGDip=="")
			{
					alert("Please Enter Aggregate Marks");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerPGDip.focus();
		return false;
	}
			
		
	
			
	
}
	

}
function Othermorevalidation()
{
	
	var selCourseOthermore=document.forms['formOthermore']['selCourseOthermore'].value;

	var selStateOthermore=document.forms['formOthermore']['selStateOthermore'].value;
	var selInstOthermore=document.forms['formOthermore']['selInstOthermore'].value;
	var selUniversityOthermore=document.forms['formOthermore']['selUniversityOthermore'].value;
	
		var txtothermoreInst=document.forms['formOthermore']['txtothermoreInst'].value;
	var txtothermoreUniv=document.forms['formOthermore']['txtothermoreUniv'].value;
	
	var selMonthOthermore=document.forms['formOthermore']['selMonthOthermore'].value;
	var selYearOthermore=document.forms['formOthermore']['selYearOthermore'].value;
	var txtPerOthermore=document.forms['formOthermore']['txtPerOthermore'].value;	
	
	 if(selCourseOthermore=='0')
			{
					alert("Please select Course");
					
					return false;
			}
		
		
		
			if(selStateOthermore=='0')
			{
					alert("Please select States ");
					
					return false;	
			}
		if(selInstOthermore=='0')
			{
					alert("Please select Institute ");
					
					return false;	
			}
			
			if(selInstOthermore=='-1')
			{ 
				if(txtothermoreInst=="")
				{
					alert("Please enter other institute ");
					
					return false;	
				}
			}
				if(selUniversityOthermore=='0')
			{
					alert("Please select University");
					
					return false;	
			}
			if(selUniversityOthermore=='-1')
			{ 
				if(txtothermoreUniv=="")
				{
					alert("Please enter other University ");
					
					return false;	
				}
			}
				if(selMonthOthermore=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearOthermore=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerOthermore))
					 {
						alert("Enter numeric value");
						
						return false;
					 }
			var frm=document.formOthermore;
	var x = parseFloat(txtPerOthermore);	
		if ( ( frm.radPerOthermore[0].checked == false ) && ( frm.radPerOthermore[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
						if(document.getElementById('radPerOthermore').checked==true){
		
			
		if(txtPerOthermore=null ||txtPerOthermore=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
if (isNaN(x) || x < 0 || x > 100) 
	{
		alert("Please Enter Marks below 100");
		frm.txtPerOthermore.focus();
		return false;
	}
			
			}
				if(document.getElementById('radPerOthermore2').checked==true){
						
		if(txtPerOthermore=null ||txtPerOthermore=="")
			{
					alert("Please Enter Aggregate Marks");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
	{
		alert("Please Enter Marks below 10");
		frm.txtPerOthermore.focus();
		return false;
	}
			
		
	
			
	
}
	
			
	
}
function Othervalidation()
{
	
	
	var selCourseOther=document.forms['formOther']['selCourseOther'].value;
	
	var selStateOther=document.forms['formOther']['selStateOther'].value;
	var selInstOther=document.forms['formOther']['selInstOther'].value;
	var selUniversityOther=document.forms['formOther']['selUniversityOther'].value;
	var txtotherInst=document.forms['formOther']['txtotherInst'].value;
	var txtotherUniv=document.forms['formOther']['txtotherUniv'].value;
	var selMonthOther=document.forms['formOther']['selMonthOther'].value;
	var selYearOther=document.forms['formOther']['selYearOther'].value;
	var txtPerOther=document.forms['formOther']['txtPerOther'].value;	


	
	 if(selCourseOther=='0')
			{
					alert("Please Select Course");
					
					return false;
			}
		
		
			if(selStateOther=='0')
			{
					alert("Please Select State ");
					
					return false;	
			}
		if(selInstOther=='0')
			{
					alert("Please Select Institute ");
					
					return false;	
			}
			
			if(selInstOther=='-1')
			{ 
				if(txtotherInst=="")
				{
					alert("Please enter other institute ");
					
					return false;	
				}
			}
				if(selUniversityOther=='0')
			{
					alert("Please select University");
					
					return false;	
			}
				if(selUniversityOther=='-1')
			{ 
				if(txtotherUniv=="")
				{
					alert("Please enter other University ");
					
					return false;	
				}
			}
				if(selMonthOther=='0')
			{
					alert("Please select Month");
					
					return false;	
			}
				if(selYearOther=='0')
			{
					alert("Please select Year");
					
					return false;	
			}
			 if(isNaN(txtPerOther))
					 {
						alert("Please numeric value");
						

						return false;
					 }
			
	
	var frm=document.formOther;
	var x = parseFloat(txtPerOther);	
		if ( ( frm.radPerOther[0].checked == false ) && ( frm.radPerOther[1].checked == false ) )
			{
			alert ( "Please choose Percentage or CGPA" );
			return false; 
			}
						
	if(document.getElementById('radPerOther').checked==true)
	{
		
			
		if(txtPerOther=null ||txtPerOther=="")
			{
					alert("Please Enter Percentage");
					
					return false;	
			}
		if (isNaN(x) || x < 0 || x > 100) 
		{
		alert("Please Enter Marks below 100");
		frm.txtPerOther.focus();
		return false;
		}
			
	}
	if(document.getElementById('radPerOther2').checked==true)
	{
						
		if(txtPerOther=null ||txtPerOther=="")
			{
					alert("Please Enter Aggregate Marks");
					
					return false;	
			}
		
		if (isNaN(x) || x < 0 || x > 10) 
		{
		alert("Please Enter Marks below 10");
		frm.txtPerOther.focus();
		return false;
		}
			
		
	}
			
	
}


function instGrad(id){
if(id=='-1'){

document.getElementById('divGradtext').style.display='block';

}else{

document.getElementById('divGradtext').style.display='none';

}

if(id=='99'){
document.getElementById('selStateGrad').disabled=false;
}else {
document.getElementById('selStateGrad').disabled = true;
}


}


function univGrad(id){
if(id=='-1'){

document.getElementById('divUnivtext').style.display='block';


}else{


document.getElementById('divUnivtext').style.display='none';

}

}




function instPG(id){
if(id=='-1'){
document.getElementById('divPGtext').style.display='block';
}else{
document.getElementById('divPGtext').style.display='none';
}
if(id=='99'){
document.getElementById('selStatePG').disabled=false;
}else {
document.getElementById('selStatePG').disabled = true;
}

}


function univPG(id){
if(id=='-1'){
document.getElementById('divPGUnivtext').style.display='block';
}else{
document.getElementById('divPGUnivtext').style.display='none';
}

}
function instOther(di,id){
if(di=='-1'){
document.getElementById('divOthertext'+id).style.display='block';
}else{
document.getElementById('divOthertext'+id).style.display='none';
}

}

function univOther(di,id){
if(di=='-1'){
document.getElementById('divOtherUnivtext'+id).style.display='block';
}else{
document.getElementById('divOtherUnivtext'+id).style.display='none';
}

}

function clearCont(cont){

if(cont=='Student ID'){
alert(cont);
document.getElementById('Rvstudent').value='';
}
}
function instPGDip(id){
if(id=='-1'){
document.getElementById('divPGDiptext').style.display='block';
}else{
document.getElementById('divPGDiptext').style.display='none';
}

if(id=='99'){
document.getElementById('selStatePGDip').disabled=false;
}else {
document.getElementById('selStatePGDip').disabled = true;
}

}
function instPGDip1(id){
if(id=='-1'){
document.getElementById('divPGDiptext1').style.display='block';
}else{
document.getElementById('divPGDiptext1').style.display='none';
}



}


function univPGDip(id){
if(id=='-1'){
document.getElementById('divPGDipUnivtext').style.display='block';
}else{
document.getElementById('divPGDipUnivtext').style.display='none';
}

}


function instotherMore(id){
if(id=='-1'){
document.getElementById('divothermoreInsttext').style.display='block';
}else{
document.getElementById('divothermoreInsttext').style.display='none';
}

}


function univotherMore(id){
if(id=='-1'){
document.getElementById('divothermoreUnivtext').style.display='block';
}else{
document.getElementById('divothermoreUnivtext').style.display='none';
}

}


	function checkingRoll(){


			if(document.getElementById('chkRoll').checked==true){
			document.getElementById('addSubscriptionHidden').style.display='block';
			}else{
			document.getElementById('addSubscriptionHidden').style.display='none';
			rvupdate();
			
			}
			
			
			
			}
 var t=0;
function addTextarea(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", type);
element.setAttribute("id", "txtCareer"+t);
	element.setAttribute("name", "txtCareer[]");
	element.setAttribute("class", "textareaBox");

	var newTexts = document.getElementById("newTexts");

	//Append the element in page (in span).
	newTexts.appendChild(element);
	
	
t++;
}
function addsecondTextarea(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", type);
element.setAttribute("id", "txtAchiv"+t);
	element.setAttribute("name", "txtAchiv[]");
	element.setAttribute("class", "textareaBox");

	var newTexts = document.getElementById("newsecTexts");

	//Append the element in page (in span).
	newTexts.appendChild(element);
	
	
t++;
}

var c='';
function addcoreTextarea(type) {

	//Create an input type dynamically.
	var element = document.createElement("input");

	//Assign different attributes to the element.
	element.setAttribute("type", type);
element.setAttribute("id", "txtCore"+c);
	element.setAttribute("name", "txtCore[]");
	element.setAttribute("class", "textareaBox");

	var newTexts = document.getElementById("newCoreTexts");

	//Append the element in page (in span).
	newTexts.appendChild(element);
	
	
c++;
}
function checkID(id)
{
	
	if(id!=''){
	//alert(id);
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert(xmlhttp.responseText);
    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	if(xmlhttp.responseText==0){
alert("The UID you have entered is not matching RV-VLSI Database. Kindly check your UID again, or get in touch with RV-VLSI Admin for any assistance");
	//	document.getElementById("Rvstudent").innerHTML=xmlhttp.responseText;	
				}
				
if(xmlhttp.responseText==2){
alert("Updated Sucessfully");
	//	document.getElementById("Rvstudent").innerHTML=xmlhttp.responseText;	
				}
		if(xmlhttp.responseText==1){
alert("This UID Allotted for Someone. Kindly check your UID again, or get in touch with RV-VLSI Admin for any assistance.");
			document.getElementById("Rvstudent").innerHTML="Student ID";	
				}
    }
  }

xmlhttp.open("GET","ajax/ajax_checkID.php?id="+id,true);
xmlhttp.send();
}
}


function rvupdate()
{
	//alert(id);
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert("Updated sucessfully");
    }
  }

xmlhttp.open("GET","ajax/rv_update.php",true);
xmlhttp.send();
}
