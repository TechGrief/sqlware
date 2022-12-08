<?php //Searches for the required PHP class -> Logs to class -> Max search: 32
$bneriheygnbweohn = "";
for ($x = 0; $x <= 32; $x++) {
    echo('<script>console.log("attemp:'.$x.'->'.$bneriheygnbweohn."php/class.php".'")</script>');
    if(file_exists($bneriheygnbweohn. "php/class.php")){ require($bneriheygnbweohn. "php/class.php"); echo('<script>console.log("Class.php Found! ('.$bneriheygnbweohn. "php/class.php".')")</script>'); break; } 
    $bneriheygnbweohn .= "../";
}
$usripc=getclientip_class();
$iparrz = ip_info($usripc, "", true);
$op = "";
foreach ($iparrz as $key => $value) {
	$op .= "[$key -> $value] ";
}
echo('<script>console.log("'.$op.'");</script>');
if(!tableexists_class("user") || (isset($_GET["create_dbs"]) && $_GET["create_dbs"] = "true")){
	//require($sqlwarepath."/php/class.php");
	createuserdb_class();
	createauthconfigdb_class();
	createlogintokensdb_class();
	createclientsdb_class();
	createuserpwresettokensdb_class();
	createconfigdb_class();
	createpresenterboardmoduledb_class();
	createpresentertemplatemoduledb_class();
	createurlshortenerdb_class();
	createurlshortener_apidb_class();
	
	insertConfigValue("mail_method", "osmtp");
	insertConfigValue("mail_osmtp_address", "noreply@my.domain");
	insertConfigValue("mail_enable_extern_tsmtp", "0");
	insertConfigValue("server_tsmtp_address", "https://techgrief.de/php/class.php");
	//phpmailer
	insertConfigValue("mail_osmtp_module", "0");
	insertConfigValue("mail_osmtp_phpmailer_host", "localhost");
	insertConfigValue("mail_osmtp_phpmailer_port", "25");
	insertConfigValue("mail_osmtp_phpmailer_smtp_auth", "0");
	insertConfigValue("mail_osmtp_phpmailer_smtp_username", "user");
	insertConfigValue("mail_osmtp_phpmailer_smtp_password", "123");

	insertConfigValue("server_service_enabled", "1");
	insertConfigValue("server_host", "my.domain");
	insertConfigValue("server_name", "My Server");
	insertConfigValue("server_icon", "https://img.icons8.com/color/2x/identity-disc.png");
	insertConfigValue("server_structure", "0");
	
	insertConfigValue("theme_default_c2", "#3AB0FF");
	insertConfigValue("theme_default_c6", "#1B2430");
	insertConfigValue("theme_default_c7", "#D4DBE8");
	insertConfigValue("theme_default_c10", "#243040");

	insertConfigValue("server_global_default_theme", "2");
	insertConfigValue("server_global_allow_theme_changing", "0");


	insertConfigValue("api_url_shortener", "0");

	//createpaycryptoapisdb_class();
	//createpaycryptotransactionsdb_class();
		echo('<meta http-equiv="refresh" content="0; url=./signup/?showpopup=welcome"/>');
		//header("Location: ./signup/?showpopup=welcome");
	exit();
}
beginHeadLoad();
//https://i.postimg.cc/hv751jCp/cosmic-nebula-4-by-cosmicspark-dfehb70-fullview.jpg 
//https://i.postimg.cc/RVq3YD8t/d4oo2gh-b8d494fb-774b-459f-9ae9-8126c719f6582.png
//https://i.postimg.cc/hv751jCp/cosmic-nebula-4-by-cosmicspark-dfehb70-fullview.jpg
$p1 = new PopUp(title: "Login", submit_text: "Login", allowclose: true, close_text:"Sign up", close_redirecturl:"./signup", description: null, method: "post", type: "input_1", img: "https://i.postimg.cc/dtRL59Tc/empty-world-by-viylne-df0s5dw-fullview2.jpg");
$p1->addInput(new Input(id: "u", type: "text", title: "Username"));
$p1->addInput(new Input(id: "p", type: "password", title: "Password"));
$p1->addInput(new Input(type: "link", title: "Reset Password", placeholder: "./resetpassword"));
//$p1->addInput(new Input(id: "select", type: "dropdown", title: "2FA Auth", json_content_encoded:'{"google":"Google Auth","mail":"Mail Code"}'));
if($p1->generateCode()){
    
} 


$pwFalse = false;
$pwTrue = false;
$errornoadmin=false;
$errorloggout=false;
$userloggedin=false;


if (isset($_GET["loggout"])){
	if(isset($_COOKIE["logintoken"]))
		setcookie("logintoken", "", time()-3600, "/");
	if(isset($_COOKIE["username"]))
		setcookie("username", "", time()-3600, "/");
	
	if(isset($_COOKIE["window_height"]))
		setcookie("window_height", "", time()-3600, "/");
	if(isset($_COOKIE["window_width"]))
		setcookie("window_width", "", time()-3600, "/");
	if(isset($_COOKIE["signinup_bgimgurl"]))
		setcookie("signinup_bgimgurl", "", time()-3600, "/");

		echo('<meta http-equiv="refresh" content="0; url=."/>');
		//echo('<meta http-equiv="refresh" content="0; url=?showpopup=You have been logged out of your account!"/>');
		//header("Location: index.php?showpopup=You have been logged out of your account!");
}/*else if(isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"])){
	//require($sqlwarepath."/php/class.php");
	if(iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"]) && ifuserisadmin_class($_COOKIE["username"])){
		echo('<meta http-equiv="refresh" content="0; url=overview/"/>');
		//header("Location: overview/");
		exit;
	}
}*/else if(isset($_GET["showpopup"]))
	popup($_GET["showpopup"], "indianred", "fa fa-info", "./");

if(isset($_POST["u"]) && isset($_POST["p"]) && isset($_POST["submit"])){
	//popup2falogin("u",$_POST["u"],"p", $_POST["p"]);

	$usrisAdmin = ifuserisadmin_class($_POST["u"]);
	if(!$usrisAdmin && !ifServiceForUserEnabled()){
		popup("The service has been temporarily disabled!");
	}
	else if($usrisAdmin || ifServiceForUserEnabled()){

	if(userlogin_class($_POST["u"], $_POST["p"]) && !ifany2faenabled_class($_POST["u"])){
		$pwFalse = false;
		$pwTrue = true;

		//session_start();
		//$_SESSION["username"] = $_POST["u"];
		//header("Location: geheim.php");
		setcookie("logintoken", getlogintoken_class($_POST["u"]), time() + (86400), "/"); // 86400 = 1 day
		setcookie("username", $_POST["u"], time() + (86400), "/"); // 86400 = 1 day

		if(ifuserisadmin_class($_POST["u"]))
			echo('<meta http-equiv="refresh" content="1;url=overview/" />');
		else
			header("Location: .");
			//echo('<meta http-equiv="refresh" content="3;url=?error=noadmin" />');

	}else if(userlogin_class($_POST["u"], $_POST["p"]) && ifany2faenabled_class($_POST["u"]) && !isset($_POST["authmtd"])){//->When 2fa on -> chose method

		popup2falogin("u",$_POST["u"],"p", $_POST["p"]);

	}else if(userlogin_class($_POST["u"], $_POST["p"]) && ifany2faenabled_class($_POST["u"]) && isset($_POST["authmtd"])){//->After choosing 2fa method->Manage connections to redirect
		
		$resumeunlock = false;
		if($_POST["authmtd"] == "google" && ifgoogle2faenabled_class($_POST["u"])) $resumeunlock = true;
		if($_POST["authmtd"] == "web" && ifweb2faenabled_class($_POST["u"])) $resumeunlock = true;
		if($_POST["authmtd"] == "mail" && ifmail2faenabled_class($_POST["u"])) $resumeunlock = true;
		if($_POST["authmtd"] == "backup" && ifbackup2faenabled_class($_POST["u"])) $resumeunlock = true;

		if($resumeunlock){
			if($_POST["authmtd"] == "google" && ifgoogle2faenabled_class($_POST["u"])) popupgoogle2fa($_POST["u"], $_POST["p"]);
			else if($_POST["authmtd"] == "web" && ifweb2faenabled_class($_POST["u"])) popupweb2fa($_POST["u"], $_POST["p"]);
			else if($_POST["authmtd"] == "mail" && ifmail2faenabled_class($_POST["u"])) popupmail2fa($_POST["u"], $_POST["p"]);
			else if($_POST["authmtd"] == "backup" && ifbackup2faenabled_class($_POST["u"])) popupbackup2fa($_POST["u"], $_POST["p"]);
		}else{
			popup("Unknown error occurred!", "indianred", NULL,"./");
			exit;
		}

	}else{
		$pwFalse = true;
	}
	}

}else if(isset($_GET["error"]) && $_GET["error"] == "noadmin"){
	$errornoadmin=true;
}else if(isset($_GET["error"]) && $_GET["error"] == "loggout"){
	$errorloggout=true;
}else if(isset($_POST["u"]) && isset($_POST["t"]) && isset($_POST["submit"])  && false){
	//require($sqlwarepath."/php/class.php");

	if(iftokenanduserandiptrue_class($_POST["t"], $_POST["u"])){
		$pwFalse = false;
		$pwTrue = true;

		//session_start();
		//$_SESSION["username"] = $_POST["u"];
		//header("Location: geheim.php");
		setcookie("logintoken", $_POST["t"], time() + (86400), "/"); // 86400 = 1 day
		setcookie("username", $_POST["u"], time() + (86400), "/"); // 86400 = 1 day

		if(ifuserisadmin_class($_POST["u"]))
			echo('<meta http-equiv="refresh" content="1;url=overview/" />');
		else
			header("Location: .");
			//echo('<meta http-equiv="refresh" content="3;url=?error=noadmin" />');
	}else{
		$pwFalse = true;
	}

}else if(isset($_POST["u2"]) && isset($_POST["p2"]) && isset($_POST["submit"])){
	if(isset($_POST["google2faverifycode"]))
		if(verifygoogle2fa_class($_POST["u2"],$_POST["google2faverifycode"])){
			$pwFalse = false;
			$pwTrue = true;
			setcookie("logintoken", getlogintoken_class($_POST["u2"]), time() + (86400), "/"); // 86400 = 1 day
			setcookie("username", $_POST["u2"], time() + (86400), "/"); // 86400 = 1 day
			echo('<meta http-equiv="refresh" content="1;url=overview/" />');
		}
		else popup("The code does not match!", "indianred", "fa fa-google","./");
	else if(isset($_POST["mail2faverifycode"]))
		if(verifymail2fa_class($_POST["u2"],$_POST["mail2faverifycode"])){
			$pwFalse = false;
			$pwTrue = true;
			setcookie("logintoken", getlogintoken_class($_POST["u2"]), time() + (86400), "/"); // 86400 = 1 day
			setcookie("username", $_POST["u2"], time() + (86400), "/"); // 86400 = 1 day
			echo('<meta http-equiv="refresh" content="1;url=overview/" />');
		}
		else popup("The code does not match!", "indianred", "fa fa-envelope","./");
	else if(isset($_POST["web2faverifycode"]))
		if(verifyweb2fa_class($_POST["u2"],$_POST["web2faverifycode"])){
			$pwFalse = false;
			$pwTrue = true;
			setcookie("logintoken", getlogintoken_class($_POST["u2"]), time() + (86400), "/"); // 86400 = 1 day
			setcookie("username", $_POST["u2"], time() + (86400), "/"); // 86400 = 1 day
			echo('<meta http-equiv="refresh" content="1;url=overview/" />');
		}
		else popup("The code does not match!", "indianred", "fa fa-globe","./");
	else if(isset($_POST["backup2faverifycode"]))
		if(verifybackup2fa_class($_POST["u2"],$_POST["backup2faverifycode"])){
			getnewbackup2fa_class($_POST["u2"]);
			$pwFalse = false;
			$pwTrue = true;
			setcookie("logintoken", getlogintoken_class($_POST["u2"]), time() + (86400), "/"); // 86400 = 1 day
			setcookie("username", $_POST["u2"], time() + (86400), "/"); // 86400 = 1 day
			echo('<meta http-equiv="refresh" content="1;url=overview/" />');
		}
		else popup("The code does not match!", "indianred", "fa fa-cloud","./");
}
else if(isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"]) && iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"])){
	echo('<meta http-equiv="refresh" content="1;url=overview/" />');
	$userloggedin = true;
}

loadwindowwidthandheighttocookie();
if(false){
?>

<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=0.7,user-scalable=no">

<style>

html,body {
  height:100%;
  width:100%;
  margin:0;
}
body{
color:#EEEEEE;
display:flex;
background-color:#EEEEEE;
  background-repeat: no-repeat;
  /*background-size: <?php //echo($_COOKIE["window_width"]."px ".$_COOKIE["window_height"]."px"); ?>;*/
  background-size:cover;
<?php if(isset($_COOKIE["signinup_bgimgurl"])) echo "backdrop-filter: blur(5px); background-image: url(\"".$_COOKIE["signinup_bgimgurl"]."\");";?>
}
form{
display:flex;
margin:auto;
width:380px;
}
form input{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
outline:none;
background-color:#EEEEEE;
border:2.5px solid #00ADB5;
border-radius: 5px;
color: #364F6B;
transition: 0.5s all;
height:30px;
}
form input:hover{
	border:2.5px solid #F08A5D;
}

.warn{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
	outline:none;
	background-color:#e8b4b4;
	border:2.5px solid indianred;
	border-radius: 5px;
	color: #364F6B;
	transition: 0.5s all;
	height:40px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	letter-spacing: 0px;
	word-spacing: 2px;
	color: #393E46	;
	font-weight: 700;
	text-decoration: none;
	font-style: normal;
	font-variant: normal;
	text-transform: none;
}
.warn:hover{
	border:2.5px solid #393E46;
	background-color: #393E46;
	color: indianred;
}
.sus{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
	outline:none;
	background-color:#62D2A2;
	border:2.5px solid #1FAB89;
	border-radius: 5px;
	color: #364F6B;
	transition: 0.5s all;
	height:40px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	letter-spacing: 0px;
	word-spacing: 2px;
	color: #393E46	;
	font-weight: 700;
	text-decoration: none;
	font-style: normal;
	font-variant: normal;
	text-transform: none;
	padding-left:5px;
}
.sus:hover{
	border:2.5px solid #393E46;
	background-color: #393E46;
	color: indianred;
}
@media (max-width : 700px){ /*from 0 to 600 px max height applies x3pro=394px*/
	.font1{
		font-family: "Georgia", serif;
		font-size: 25px;
	}
	.formholder{
		display:flex;
		margin:auto;
		width:435px;
		/*height: 265px;*/
		height:
		<?php
		$h = 0;
		if(isset($_GET["loginmethod"]) && $_GET["loginmethod"] =="token"  && false) $h = $h + 60;
		if($pwFalse || $pwTrue || $errornoadmin || $errorloggout || $userloggedin) $h = $h + 320;
		else $h = $h +290; 
		echo($h +15);
		?>px;	
		border:2.5px solid #00ADB5;
		background-color:#393E46;
		border-radius: 20px;
		transition: 0.5s all;
	}
	.sus{
		width: 100%;
		height:55px;
		font-size: 25px;
	}
}
@media screen and (min-width: 700px) {
	.font1{
		font-family: "Georgia", serif;
		font-size: 20px;
	}
	.formholder{
		display:flex;
		margin:auto;
		width:430px;
		/*height: 250px;	*/
		height: 
		<?php 
		$h = 0;
		if(isset($_GET["loginmethod"]) && $_GET["loginmethod"] =="token"  && false) $h = $h + 60;
		if($pwFalse || $pwTrue || $errornoadmin || $errorloggout || $userloggedin) $h = $h + 315;
		else $h = $h + 275; 
		echo $h;
		?>px;	
		border:2.5px solid #00ADB5;
		background-color:#393E46;
		border-radius: 20px;
		transition: 0.5s all;
	}
}

.formholder:hover{
border:2.5px solid #F08A5D;
}
#formsubmitbutton{
height: 48px;
width: <?php if($pwTrue) echo '180px'; else '100px'; ?>;
color:#00ADB5;
float:right;
}
#formsubmitbutton:hover{
background-color:#F08A5D;
color:#EEEEEE;
border:2.5px solid #F08A5D;
cursor:pointer;
}
#lblColor{
transition: 0.5s all;
}
#lblColor:hover{
	color:#F08A5D;
}
</style>

<body>


<div class="formholder">

<form method="POST" acction="index.php">

			
	<table style="width:380px;" class="font1">



	<?php
	if($pwFalse && userhasblockedthiscountry($_POST["u"], ip_info($usripc, "Country Code"))){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="warn" disabled value="Login for '.ip_info($usripc, "Country Code").' failed!">
   	 		</td>
	  	</tr>

		');
	}else if($pwFalse && getuserid_class($_POST["u"]) == 0){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="warn" disabled value="Login failed!">
   	 		</td>
	  	</tr>

		');
	}else if($pwFalse && getuserid_class($_POST["u"]) !== 0){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
			<a href="resetpassword/"><input autocomplete="off" type="text" class="warn" disabled value="Login failed! Reset Password?" style="cursor:pointer;text-decoration:underline;"></a>
   	 		</td>
	  	</tr>
		
		');
	}else if($pwTrue){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="sus" disabled value="Loggin successful!">
   	 		</td>
	  	</tr>

		');
	}else if($errornoadmin){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="warn" disabled value="No administrator access!">
   	 		</td>
	  	</tr>

		');
	}else if($errorloggout){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="warn" disabled value="Logged out!">
   	 		</td>
	  	</tr>

		');
	}else if($userloggedin){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="sus" disabled value="Redirecting...">
   	 		</td>
	  	</tr>

		');
	}
	?>
	  





  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
    	<td style="width:105px;" class="font1">Username</td>
  	</tr>
  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
	    <td style="width:275px;" class="font1">
    		<input autocomplete="off" type="text" name="u" class="font1" style="width:100%;height:37px;" required <?php if(isset($_POST["u"])) echo 'value="'.$_POST["u"].'"'; else if(isset($_GET["u"])) echo 'value="'.$_GET["u"].'"'; ?>>
   	 	</td>
  	</tr>
    
    <?php
	if(isset($_GET["loginmethod"]) && $_GET["loginmethod"] =="token" && false){
		echo('
		<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
 	   	<td style="width:105px;" class="font1">Token</td>
		</tr>
		<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
			<td style="width:275px;" class="font1">
				<input autocomplete="off" type="text" name="t" class="font1" style="width:100%;height:37px;" required>
			</td>
		</tr>
		');
		echo('
		<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
 	   	<td style="width:105px;" class="font1">IP Addess</td>
		</tr>
		<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
			<td style="width:275px;" class="font1">
				<input disabled autocomplete="off" type="text" name="t" class="font1" style="width:100%;height:37px;background-color:#bdbdbd;" value="'.$usripc.'">
			</td>
		</tr>
		');
	}else{
		echo('
		<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
 	   	<td style="width:105px;" class="font1">Password</td>
		</tr>
		<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
			<td style="width:275px;" class="font1">
				<input autocomplete="off" type="password" name="p" class="font1" style="width:100%;height:37px;" required>
			</td>
		</tr>
		');
	}
		
	?>

	  <tr syle="width:380px;">
	    <td style="width:275px;">
    		<div style="display:block;height:5px;"></div>
   	 	</td>
  	</tr>
    
    
    <tr syle="width:380px;height:50px;" class="font1">
 	   <td style="width:105px;" class="font1"></td>
  	</tr>
  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
	    <td style="width:275px;" class="font1">
    		<input type="submit" name="submit" class="font1" id="formsubmitbutton" required <?php if($pwTrue) echo "disabled value=\"Please wait...\""; else echo ' value="Login"';?>>
   	 	</td>
  	</tr>
	  
  
	<tr syle="width:380px;height:30px;" id="lblColor" style='text-align:right;font-size:18px;font-family:"Georgia", serif;color:#00ADB5;'>
 	   <td style="width:150dpx;padding-top:4px;">
		<?php
		if(isset($_GET["loginmethod"]) && $_GET["loginmethod"] =="token"  && false){
			echo('<a href="." style="text-decoration:underline;color:#00ADB5;float:left;">Use Password</a>');
		}else{
			//echo('<a href="?loginmethod=token" style="text-decoration:underline;color:#00ADB5;float:left;">Use Logintoken</a>');
		}
?>
		<a href="signup" style='text-decoration:underline;color:#00ADB5;'>Signup</a></td>
  	</tr>

  
</table>
</form>

</div>

</body>
</html><?php } 

echo($p1->getCode());
	echo('<script>'.$p1->script_js().'</script>');?>