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
				function toDelete()
				{
							var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							      }
							else
							{
								return false;
							}
				}
function RecruitersValidation()
			{
				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
				var phoneExp  =/^([0-9]{10})/;
				var stdphoneExp  =/^([0-9])/;
				var officephoneExp =/^([0-9])/;
			var txtForm=document.txtForm_rec;
	          
			      if(txtForm.txtUserName.value=='')
					{
					alert(" Please enter user name");
					txtForm.txtUserName.focus();
					return false;
					}
					else if(txtForm.txtEmail.value=="")
					{
					alert(" Please enter email");
					txtForm.txtEmail.focus();
					return false;
					}
					else if(txtForm.txtEmail.value.search(emailExp) == -1)
					{
					alert("Please enter valid email address");
					txtForm.txtEmail.value='';
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
					alert("Password must contain at least three characters");
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
		          else if(txtForm.txtCompany.value=='')
					{
					alert(" Please enter company name");
					txtForm.txtCompany.focus();
					return false;
					}
					 else if(txtForm.txtAddress.value=='')
					{
					alert(" Please enter company address");
					txtForm.txtAddress.focus();
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
					else if(txtForm.txtPinCode.value=='')
					{
					alert(" Please enter pincode ");
					txtForm.txtPinCode.focus();
					return false;
					}
					
					 else if (txtForm.txtPinCode.value.search(officephoneExp) == -1)
					 {
                  alert(" Please enter pin code With numerical values ");
		         txtForm.txtPinCode.focus();
				  return false;
                     }
					 
									
					else if(txtForm.txtDesignation.value=='')
					{
					alert(" Please enter designation");
					txtForm.txtDesignation.focus();
					return false;
					}
					
					
					else if (txtForm.txtStdCode.value=='')
					 {
                     alert(" Please enter std code");
		             txtForm.txtStdCode.focus();
				     return false;
                     }
					 
					 
					 else if(txtForm.txtStdCode.value.search(stdphoneExp) == -1)
					 {
					alert("Please enter valid std code with numerical values");
					txtForm.txtStdCode.focus();
					return false;
					 }
					
					 else if (txtForm.txtContactNo.value=='')
					 {
                     alert(" Please enter contact number");
		             txtForm.txtContactNo.focus();
				     return false;
                     }
					 
					  else if(txtForm.txtContactNo.value.search(stdphoneExp) == -1)
					 {
					alert("Please enter valid contact number with numerical values");
					txtForm.txtContactNo.focus();
					return false;
					 }else if(txtForm.txtContactNo.value.length>10)
					  {
					alert("Please enter valid contact number  ");
					txtForm.txtContactNo.focus();
					return false;
					  }
					 
				
					 else if (txtForm.txtPhoneNumber.value=='')
					 {
                      alert(" Please enter mobile number");
		              txtForm.txtPhoneNumber.focus();
				      return false;
                     }
					 
					 else if(isNaN(txtForm.txtPhoneNumber.value)||txtForm.txtPhoneNumber.value.indexOf(" ")!=-1)
					  {
					alert("Please enter valid mobile number with  numerical values  ");
					txtForm.txtPhoneNumber.focus();
					return false;
					  }
else if(txtForm.txtPhoneNumber.value.length>10)
					  {
					alert("Please enter valid mobile number  ");
					txtForm.txtPhoneNumber.focus();
					return false;
					  }
					
					 else if (txtForm.txtWebUrl.value=='')
					 {
                      alert(" Please enter web site url ");
		              txtForm.txtWebUrl.focus();
				      return false;
                     }
					 
					  else if (txtForm.txtComDescriptn.value=='')
					 {
                       alert(" Please enter company description ");
		               txtForm.txtComDescriptn.focus();
				       return false;
                     }
					 
					  else if (txtForm.txtIndustry.value=='')
					 {
                       alert(" Please enter type of industry ");
		               txtForm.txtIndustry.focus();
				       return false;
                     }
					 
					  else if (txtForm.txtNofEmployes.value=='')
					 {
						alert(" Please enter no of employes ");
						txtForm.txtNofEmployes.focus();
						return false;
                     }

			 if(txtForm.txtEmail.value!='')
									{
										var em_tst=0;
										var email=txtForm.txtEmail.value;
										var email_check=new Array('gmail.com','yahoo.com','aol.com','mail.com','live.com','hotmail.com','zenbe.com');
				
								if(email.search(/yahoo.com/i)>0)

									em_tst++;

								if(email.search(/gmail.com/i)>0)

									em_tst++;
								if(email.search(/aol.com/i)>0)
									em_tst++;
									if(email.search(/mail.com/i)>0)
									em_tst++;
									if(email.search(/live.com/i)>0)
									em_tst++;
									if(email.search(/hotmail.com/i)>0)
									em_tst++;	
									if(email.search(/zenbe.com/i)>0)
									em_tst++;
									if(email.search(/mymail-in.net/i)>0)
									em_tst++;
								if(em_tst>0)
									{
									alert("Please register with your 'Official Email Id'");
								txtForm.txtEmail.focus();return false;		

									}
									
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
					}else  if(txtForm.txtPassword.value=='')
					{
					alert("Please Enter Password");
					txtForm.txtPassword.focus();
					return false;
					}
					
			}
			

					
function Certification_Validation()
			{
				
				var percentageExp  =/^([0-9])/;
				
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
					else if(txtForm.txtPercentage.value=='')
					{
					alert("Please enter percentage");
					txtForm.txtPercentage.focus();
					return false;
					}
					else if(txtForm.txtPercentage.value.search(percentageExp) == -1)
					{
					alert("Please enter precentage with numbers");
					txtForm.txtPercentage.focus();
					return false;
					}
					
					
					
			}
													
					

function Voluntary_Validation()
			{
				
				var percentageExp  =/^([0-9]{2})/;
				
			var txtForm=document.infoForm;
	          
			if(txtForm.txtTitle.value=='')
					{
					alert("Please enter title");
					txtForm.txtTitle.focus();
					return false;
					}
					 else if(txtForm.txtyear.value=='')
					{
					alert("Please enter year ");
					txtForm.txtyear.focus();
					return false;
					}
					
					
					
					
			}
													
					
function Projects_Validation()
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
			
			function job_details_validation()
			{
				
			
			var txtForm=document.jobForm;
	          
			if(txtForm.txtTitle.value=='')
					{
					alert("Please Enter Title");
					txtForm.txtTitle.focus();
					return false;
					}
					 else if(txtForm.areaDescription.value=='')
					{
					alert(" Please Enter Description");
					txtForm.areaDescription.focus();
					return false;
					}
					
				
					
					else if(txtForm.areaskills.value=='')
					{
					alert("please Enter Skills");
					txtForm.areaskills.focus();
					return false;
					}
					
				
	
					
			}
				