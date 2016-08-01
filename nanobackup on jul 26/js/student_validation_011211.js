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
					else if(txtForm.txtEmailConfirm.value=='')
					{
					alert(" Please enter confirm email address");
					txtForm.txtEmailConfirm.focus();
					return false;
					}
					else if(txtForm.txtEmailConfirm.value.search(emailExp) == -1)
					{
					alert("Please enter valid  confirm email address");
					txtForm.txtEmailConfirm.focus();
					return false;
					}
					else if(txtForm.txtEmail.value !=  txtForm.txtEmailConfirm.value)

                     {

                        alert("Email address and confirm email address not matched!");

                         txtForm.txtEmail.focus();

                        return false;
                     }

					
	               
					
								
					else if(txtForm.txtPassword.value=='')
					{
					alert("Please enter password");
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
					alert("Please enter confirm password");
					txtForm.txtConfirmPassword.focus();
					return false;
					
					}
					

                        else if(txtForm.txtPassword.value !=  txtForm.txtConfirmPassword.value)

                               {
                           alert("Password and confirm password not matched!");

                         txtForm.txtPassword.focus();

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
                  alert(" Please  select year for date Of birth");
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
					 
					       else if (txtForm.txtPhoneNumber.value=='')
					 {
                  alert(" Please enter mobile number ");
		         txtForm.txtPhoneNumber.focus();
				  return false;
                     }
					 
					 
					 else if(txtForm.txtPhoneNumber.value.search(officephoneExp) == -1)
					{
					alert("Please enter  mobile number with numerics");
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
					alert("Please Enter office contact number with numerics");
					txtForm.txtContactNo.focus();
					return false;
					}
					
					  
					
							   
            
					  else if (txtForm.selCountry.value=='')
					 {
                  alert(" Please enter Country ");
		         txtForm.selCountry.focus();
				  return false;
                     }

					 else if (txtForm.selState.value=='' && txtForm.txtState.value=='')
					 {
                  alert(" Please enter State ");
		         txtForm.selState.focus();
				  return false;
                     }
					 
					else if (txtForm.txtCity.value =='')
					 {
						  alert(" Please enter city ");
		        		 txtForm.txtCity.focus();
				  return false;
					 }
                 else if (isalpha(txtForm.txtCity.value)==false)
							{
							alert("Please enter city with alphabets");	
							txtForm.txtCity.focus();
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
                  alert(" Please enter pin code with numerics ");
		         txtForm.txtPinCode.focus();
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
					alert("Please enter email");
					txtForm.txtEmailId.focus();
					return false;
					}
					else if(txtForm.txtEmailId.value.search(emailExp) == -1)
					{
					alert("Please enter valid email address");
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
				