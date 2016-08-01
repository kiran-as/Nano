function numbersonly(e){
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	if (unicode<48||unicode>57) //if not a number
	return false //disable key press
	}
}

function changeState(typeID)
{

	if(typeID!=99)
   {
	
	
	
	document.getElementById("selDiv").style.display='none';
	 
	document.getElementById("textDiv").style.display='block';
	
	} else 
	 {
		
	document.getElementById("selDiv").style.display='block';
	 
	document.getElementById("textDiv").style.display='none';
	
	 
	 }
	
	
			function isalpha(str)
	{
 	var re = /[^a-zA-Z' ']/g
  	if (re.test(str)) return false;
 	return true;
	
	}			
		
	  	
			function general_Validation()
			{
				//alert("sfgfd");
						
			var txtForm=document.formPersonal;	
                    var j=0;
 
                           for(var i=0;i<document.getElementsByName("txtGender").length;i++)
                             {
	                           if(txtForm.txtGender[i].checked)
	                             {

                             j++;		
	                         }

	
                                }
 
 
 

				var emailExp = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
		//		var phoneExp  =/^([0-9]{10})/;
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
					  else if (txtForm.txtPhoneNumber.value=='')
					 {
                  alert(" Please enter mobile number ");
		         txtForm.txtPhoneNumber.focus();
				  return false;
                     }
					 
					 
					 else if(txtForm.txtPhoneNumber.value.search(officephoneExp) == -1)
					{
					alert("Please enter  mobile number with numerics" );
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
					
					  else if (txtForm.txtAddress.value=='')
					 {
                  alert(" Please enter address for communication");
		         txtForm.txtAddress.focus();
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
					   
					   				
					
				 else if (txtForm.selState.value=='' && txtForm.txtOtherState.value=='')
					 {
                  alert(" Please enter State ");
		         txtForm.selState.focus();
				  return false;
                     }
					 else if (txtForm.selCountry.value=='')
					 {
                  alert(" Please enter country ");
		         txtForm.selCountry.focus();
				  return false;
                     }
					
					
					
					
					
					 else if(txtForm.txtDay.value=='')
					 {
                  alert(" Please  select day for date Of birth");
		         txtForm.txtDay.focus();
				  return false;
                     }
					  else if (txtForm.txtMonth.value=='Month')
					 {
                  alert(" Please  select month for date Of birth");
		         txtForm.txtMonth.focus();
				  return false;
                     }
					  else if (txtForm.txtYear.value==0)
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
 
 
					
					 
					
					
							   
                
					
		
		}
		
}