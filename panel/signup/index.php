<?php //Searches for the //required PHP class -> Logs to class -> Max search: 32
$bneriheygnbweohn = "";
for ($x = 0; $x <= 32; $x++) {
    echo('<script>console.log("attemp:'.$x.'->'.$bneriheygnbweohn."php/class.php".'")</script>');
    if(file_exists($bneriheygnbweohn. "php/class.php")){ require($bneriheygnbweohn. "php/class.php"); echo('<script>console.log("Class.php Found! ('.$bneriheygnbweohn. "php/class.php".')")</script>'); break; } 
    $bneriheygnbweohn .= "../";
}
beginHeadLoad();
$usrisAdmin = (isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"]) && iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"]) && ifuserisadmin_class($_COOKIE["username"]));
if(!$usrisAdmin && !ifServiceForUserEnabled()){
	popup("The service has been temporarily disabled!");
}
else if($usrisAdmin || ifServiceForUserEnabled()){
?>
<?php
$signupFail = false;
$signupTrue = false;

if(isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"])){
	//require($sqlwarepath."/php/class.php");
	if(iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"]) && ifuserisadmin_class($_COOKIE["username"])){
		header("Location: ".$sqlwarepath."/panel/");
		exit;
	}
}

//require($sqlwarepath."/php/class.php");

if(isset($_POST["u"]) && isset($_POST["p"])  && isset($_POST["e"]) && isset($_POST["submit"])){

	
	//header("Location: /test/test/?w=".$_POST["e"]);
	if(usersignup_class($_POST["u"], $_POST["p"], $_POST["e"])){
		$signupTrue = true;
		echo('<meta http-equiv="refresh" content="3;url=../?u='.$_POST["u"].'" />');

	}else{
		$signupFail = true;
	}

}else if(isset($_GET["showpopup"]))
	if($_GET["showpopup"] == "welcome" && countuser_class() == 0)
	popup("Welcome!<br><br>Start by creating a user and choosing a secure password!<br><br>This user will have admin rights! (Access to all system tools!)<br><br>", "#5ccd7c", "fa fa-cogs");
	else popup("#ERROR 404<br><br>We didn't expect to see you here!", "indianred", "fa fa-warning", "./");
loadwindowwidthandheighttocookie();

$p1 = new PopUp(title: "Sign Up", submit_text: "Sign Up", close_text:"Login", close_redirecturl:"../", description: null, type: "input_1", img: "https://i.postimg.cc/hv751jCp/cosmic-nebula-4-by-cosmicspark-dfehb70-fullview.jpg");
$p1->addInput(new Input(id: "e", type: "email", title: "Mail"));
$p1->addInput(new Input(id: "u", type: "text", title: "Username"));
$p1->addInput(new Input(id: "p", type: "password", title: "Password"));
if($p1->generateCode()){
    
} 

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
}
.sus:hover{
border:2.5px solid #393E46;
background-color: #393E46;
color: indianred;
}
@media (max-width : 600px){ /*from 0 to 800 px max height applies x3pro=394px*/
	.font1{
		font-family: "Georgia", serif;
		font-size: 25px;
	}
	.formholder{
		display:flex;
		margin:auto;
		width:430px;
		/*height: 265px;*/
		height: <?php if($signupFail || $signupTrue) echo "398px"; else echo "347px"; ?>;	
		border:2.5px solid #00ADB5;
		background-color:#393E46;
		border-radius: 20px;
		transition: 0.5s all;
	}
}
@media screen and (min-width: 600px) {
	.font1{
		font-family: "Georgia", serif;
		font-size: 20px;
	}
	.formholder{
		display:flex;
		margin:auto;
		width:430px;
		/*height: 250px;	*/
		height: <?php if($signupTrue || $signupFail) echo "382px"; else echo "342px"; ?>;	
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
	if($signupFail){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="warn" disabled value="Signup failed!">
   	 		</td>
	  	</tr>

		');
	}else if($signupTrue){
		echo('
		<tr syle="width:380px;height:30px;">
	    	<td style="width:380px;">
    			<input autocomplete="off" type="text" class="sus" disabled value="Signup successful!">
   	 		</td>
	  	</tr>

		');
	}
	?>
	  





  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
    	<td style="width:105px;" class="font1">Email</td>
  	</tr>
  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
	    <td style="width:275px;" class="font1">
    		<input autocomplete="off" type="email" name="e" class="font1" style="width:100%;height:37px;" //required <?php if(isset($_POST["u"])) echo("value=\"".$_POST["e"]."\""); ?>>
   	 	</td>
  	</tr>
    
  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
    	<td style="width:105px;" class="font1">Username</td>
  	</tr>
  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
	    <td style="width:275px;" class="font1">
    		<input autocomplete="off" type="text" name="u" class="font1" style="width:100%;height:37px;" //required <?php if(isset($_POST["u"])) echo("value=\"".$_POST["u"]."\""); ?>>
   	 	</td>
  	</tr>

    <tr syle="width:380px;height:30px;" class="font1" id="lblColor">
 	   <td style="width:105px;" class="font1">Password</td>
  	</tr>
  	<tr syle="width:380px;height:30px;" class="font1" id="lblColor">
	    <td style="width:275px;" class="font1">
    		<input autocomplete="off" type="password" name="p" class="font1" style="width:100%;height:37px;" //required>
   	 	</td>
  	</tr>

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
    		<input type="submit" name="submit" class="font1" id="formsubmitbutton" <?php if(!signupenabled_class()) echo("disabled"); ?> //required <?php if($signupTrue) echo "disabled value=\"Please wait...\""; else echo ' value="Signup"';?>>
   	 	</td>
  	</tr>
  
	<tr syle="width:380px;height:30px;" id="lblColor" style='text-align:right;font-size:18px;font-family:"Georgia", serif;color:#00ADB5;'>
 	   <td style="padding-top:4px;"><a href="../" style='text-decoration:underline;color:#00ADB5;'>Login</a></td>
  	</tr>
  
</table>
</form>

</div>

</body>
</html>
<?php }
echo($p1->getCode());
echo('<script>'.$p1->script_js().'</script>');
} ?>