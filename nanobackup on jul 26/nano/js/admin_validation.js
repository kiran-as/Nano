// JavaScript Document

function loginValidation()
			{
			var frm=document.login;
			
					if(frm.txtEmailId.value=="")
				{
					alert("Enter Email id");
					frm.txtEmailId.focus();
					return false;
				} if(frm.txtEmailId.value.search(/^\w+(\.\w+)*@\w+(\.\w+)*\.\w{2,3}$/) == -1) 
										{
										alert("Enter valid email");
										frm.txtEmailId.value='';
										frm.txtEmailId.focus();
										return false;
										}

			if(frm.txtPassword.value=='')
					{
					alert("Enter Password");
					frm.txtPassword.value='';
					frm.txtPassword.focus();
					return false;
					}
				
			}
			


			
			function institute_validation()
			{
				
		var frm=document.txtForm;
			
				if(frm.txtInstitute.value=='')
					 {
					alert("Please enter institute");
					frm.txtInstitute.focus();
					return false;
					 }
					 else if (frm.txtSelect.value=='0')
					 {
				alert("Please select status ");
					frm.txtSelect.focus();
					return false;
					 }
			}
			
		
			
function validateNews()
			{
				
		var frm=document.newsForm;
			
				if(frm.txtTitle.value=='')
					 {
					alert("Enter Title");
					frm.txtTitle.focus();
					return false;
					 }else if(frm.txtDate.value=='')
					 			{
								alert("Enter Date");
								frm.txtDate.focus();
								return false;
								}
				
				
			}		
			
						
			
			
			function validateTests()
			{
				
		var frm=document.TestsForm;
			
				if(frm.txtTitle.value=='')
					 {
					alert("Enter Title");
					frm.txtTitle.focus();
					return false;
					 }else if(frm.selDur.value == '0')
					 			{
								alert("Select Time Duration");
								frm.selDur.focus();
								return false;
								}else if(frm.selStatus.value == '0')
					 			{
								alert("Please Select Status");
								frm.selStatus.focus();
								return false;
								}
				
				
			}		
			function validateQuestions()
			{
				
		var frm=document.QuestionForm;
			
				 if(frm.txtAns1.value=='')
					 {
					alert("Enter  1st Answer ");
					frm.txtAns1.focus();
					return false;
					 }else if(frm.txtAns2.value=='')
					 {
					alert("Enter  2nd Answer ");
					frm.txtAns2.focus();
					return false;
					 }else if(frm.txtAns3.value=='')
					 {
					alert("Enter  3rd Answer ");
					frm.txtAns3.focus();
					return false;
					 }else if(frm.txtAns4.value=='')
					 {
					alert("Enter  4th Answer ");
					frm.txtAns4.focus();
					return false;
					 }
					 else if(frm.selAns.value == 0)
					 			{
								alert("Select RIght Answer");
								frm.selDur.focus();
								return false;
								}				
				
			}
			
			
			


function validate_cat()
			{
			var frm=document.catForm;
				if(frm.txtSeriesName.value=='')
					{
					alert("Enter Series Name");
					frm.txtSeriesName.focus();
					return false;
					}

			}
			
			
function validateSubProg()
			{
			var frm=document.newsSubProg;
			
				if(frm.txtTitle.value=='')
					{
					alert("Enter Title");
					frm.txtTitle.focus();
					return false;
					}
				
			}
			
			
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
							
				function toDeleteAll(){
							var ok;
							ok = window.confirm('Do you really want to Delete all Enquires ?');
							if(ok){
								return true;
							}else{
								return false;
							}
							}	
							
							
							
				function quitExam()
				{
							var ok;
							ok = window.confirm('Do you really want to submit this exam ?');
							if(ok){
								return true;
							      }
							else
							{
								return false;
							}
							       }				
				
		function validateChangePassword()
			{
				var frm=document.changeForm;
				if(frm.txtOldPassword.value=="")
							{
							alert("Enter older Password	");
							frm.txtOldPassword.focus();
							return false;
							} else 
									if(frm.txtNewPassword.value=="")
									{
									alert("Enter New Password	");
									frm.txtNewPassword.focus();
									return false;
									} else 
										if(frm.txtConfPassword.value=="")
											{
											alert("Enter Conform Password	");
											frm.txtConfPassword.focus();
											return false;
											}else
												if(frm.txtConfPassword.value!=frm.txtNewPassword.value)
													{
													alert("Enter Password and Conform are different.");
													frm.txtNewPassword.value='';
													frm.txtConfPassword.value='';
													frm.txtConfPassword.focus();
													return false;
													}				
				
			}					