<style>
#floatleft a
{
color:white;
text-decoration: underline;
}
#floatleft a:hover
{
color:white;
text-decoration: none;
}
.header .small
{
color:white;
}
.betaversion
{
background-color:#008DFD;
padding:3px;
border: 1px solid #076BD2;color: #FFFFFF !important;width:400px;margin-right:auto;margin-left:auto;margin-top:-70px;
}

</style>
<div id="table">
<div id="row" class="header">
<div id="floatleft"><a href="index.php"><img src="images/logonanao.jpg" height="77" style="margin-top:5px;" align="absmiddle"></a>
<div class="betaversion">
	<span style="font-weight:bold";align="center">Try out our Beta Version</span>
<br>	<span class="small">This version lets you try our latest features<br>
  Please send us your valuable  <a href="feedback.php" rel="lyteframe" rev="width:450px; height:420px; scrolling:no">Feedback</a> to further enhance our services.</span></div>

</div>
<div class="floatright"> Welcome <?php echo $_SESSION["r_user_name"];?> | <a href="changepassword.php?r_id=<?php echo $_SESSION['r_id'];?>">Change Password</a>|<a href="recruiter_login.php">Logout</a> 
<br><br>
<a href="dashboard.php">Dashboard</a> | <a href="recruiteredit.php">Edit Profile</a>
</div>
</div>
</div>