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
			

function validateProgram()
			{
				
		var frm=document.programForm;
			
				if(frm.txtTitle.value=='')
					 {
					alert("Enter Title");
					frm.txtTitle.focus();
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
			
				function toEdit(){
							var ok;
							ok = window.confirm('Do you really want to edit ?');
							if(ok){
								return true;
							}else{
								return false;
							}
							}	
							
				function toDelete(){
							var ok;
							ok = window.confirm('Do you really want to Delete ?');
							if(ok){
								return true;
							}else{
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