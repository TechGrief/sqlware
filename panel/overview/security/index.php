<?php //Searches for the required PHP class -> Logs to class -> Max search: 32
$bneriheygnbweohn = "";
for ($x = 0; $x <= 32; $x++) {
    echo('<script>console.log("attemp:'.$x.'->'.$bneriheygnbweohn."php/class.php".'")</script>');
    if(file_exists($bneriheygnbweohn. "php/class.php")){ require($bneriheygnbweohn. "php/class.php"); echo('<script>console.log("Class.php Found! ('.$bneriheygnbweohn. "php/class.php".')")</script>'); break; } 
    $bneriheygnbweohn .= "../";
}
beginHeadLoad();
$usrisAdmin = (isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"]) && ifuserisadmin_class($_COOKIE["username"]));
if(!$usrisAdmin && !ifServiceForUserEnabled()){
	popup("The service has been temporarily disabled!");
}
else if($usrisAdmin || ifServiceForUserEnabled()){
if(isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"]) && iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"])) {

?>
<?php
if(isset($_GET["deletetoken"])){
    if($_GET["deletetoken"] == "all")
    deleteallusertoken_class($_COOKIE["username"]);
    else
    deleteusertoken_class($_COOKIE["username"],$_GET["deletetoken"]);

    if(isset($_GET["logout"]) && $_GET["logout"] == "true" || $_GET["deletetoken"] == $_COOKIE["logintoken"]){
        header("Location: ../../?loggout=true");
        exit;
    }
    popup("Acction successful!", "#5ccd7c", "fa fa-trash");
}

if(isset($_POST["op"]) && isset($_POST["np"]) && $_POST["op"] !== $_POST["np"]){
    if(!changeuserpw($_COOKIE["username"], $_POST["op"], $_POST["np"])) header("Location: ../../?loggout=true");
    else popup("Your password has been changed successfully!", "#5ccd7c", "fa fa-key");
}

if(isset($_POST["blockcountrycode"])){
    if(!blockloginforcountry_class($_COOKIE["username"], $_POST["blockcountrycode"]))
    popup("Unknown error occurred!", "indianred", "fa fa-globe");
    else
    popup("Area (".$_POST["blockcountrycode"].") blocked successfully!", "#5ccd7c", "fa fa-globe");
}
if(isset($_POST["unblockcountrycode"])){
    if(!unblockloginforcountry_class($_COOKIE["username"], $_POST["unblockcountrycode"]))
    popup("Unknown error occurred!", "indianred", "fa fa-globe");
    else
    popup("Area (".$_POST["unblockcountrycode"].") unblocked successfully!", "#5ccd7c", "fa fa-globe");
}



//2FA Google
if(isset($_POST["2fagoogle"]) && $_POST["2fagoogle"] == "enable" && isset($_POST["google2faverificationcode"]) && verifygoogle2fa_class($_COOKIE["username"], $_POST["google2faverificationcode"])){
    if(updategoogle2fastatus_class($_COOKIE["username"], $_COOKIE["logintoken"], 1)){
        popup("Google 2-Step Verification Enabled!", "#5ccd7c", "fa fa-google");
    }else
        popup("Unknown error occurred!", "indianred", "fa fa-google");
}else if(isset($_POST["2fagoogle"]) && $_POST["2fagoogle"] == "enable" && isset($_POST["google2faverificationcode"])){
    popup("Wrong Verification code!", "indianred", "fa fa-google");
}

if(isset($_POST["2fagoogle"]) && $_POST["2fagoogle"] == "disable" && isset($_POST["google2faverificationcode"]) && verifygoogle2fa_class($_COOKIE["username"], $_POST["google2faverificationcode"])){
    if(updategoogle2fastatus_class($_COOKIE["username"], $_COOKIE["logintoken"], NULL)){
        popup("Google 2-Step Verification disabled!", "#5ccd7c", "fa fa-google");
    }else
        popup("Unknown error occurred!", "indianred", "fa fa-google");
}else if(isset($_POST["2fagoogle"]) && $_POST["2fagoogle"] == "disable" && isset($_POST["google2faverificationcode"])){
    popup("Wrong Verification code!", "indianred", "fa fa-google");
}




//2FA MAIL
if(isset($_POST["2famail"]) && $_POST["2famail"] == "enable" && isset($_POST["mail2faverificationmail"])){
if(updatemail2famail_class($_COOKIE["username"], $_COOKIE["logintoken"], $_POST["mail2faverificationmail"], 1)){
    popup("MAIL 2-Step Verification Enabled!", "#5ccd7c", "fa fa-envelope");
}else popup("Unknown error occurred!", "indianred", "fa fa-envelope");
}
if(isset($_POST["2famail"]) && $_POST["2famail"] == "disable" && isset($_POST["mail2faverificationmail"])){
if(updatemail2famail_class($_COOKIE["username"], $_COOKIE["logintoken"], NULL, NULL)){
   popup("MAIL 2-Step Verification disabled!", "#5ccd7c", "fa fa-envelope");
}else popup("Unknown error occurred!", "indianred", "fa fa-envelope");
}



//2FA WEB
if(isset($_GET["webauth"]) && $_GET["webauth"] == "update" && !ifweb2faenabled_class($_COOKIE["username"])){
    if(updateweb2fastatus_class($_COOKIE["username"], $_COOKIE["logintoken"], 1)){
        popup("WEB 2-Step Verification Enabled!", "#5ccd7c", "fa fa-toggle-on","./");
    }else popup("Unknown error occurred!", "indianred", "fa fa-toggle-off","./");
}else if(isset($_GET["webauth"]) && $_GET["webauth"] == "update" && ifweb2faenabled_class($_COOKIE["username"])){
    if(updateweb2fastatus_class($_COOKIE["username"], $_COOKIE["logintoken"], NULL)){
        popup("WEB 2-Step Verification disabled!", "#5ccd7c", "fa fa-toggle-off","./");
    }else popup("Unknown error occurred!", "indianred", "fa fa-toggle-on","./");
}
//2FA WEB KEY
if(isset($_GET["webauth"]) && $_GET["webauth"] == "getkey" && ifweb2faenabled_class($_COOKIE["username"])){
    $newwebkey=getnewweb2fa_class($_COOKIE["username"]);
    if($newwebkey !== false){
        popup("<p id=\"popup1ar\" style=\"line-height: 1.25;\">
        <label id=\"popup1ar\" style=\"font-size:20px;color:#4285F4;border:2px solid #4285F4;padding:3px 8px 3px 8px;border-radius:4px;\">Web Key</label>
        
        <br>
        <br>
        <label id=\"popup1ar\" style=\"font-size:35px;font-weight:bold;\">".$newwebkey."</label></p>", "#5ccd7c", "fa fa-key","./");
    }else popup("Unknown error occurred!", "indianred", "fa fa-toggle-off","./");
}






//2FA BACKUP
if(isset($_GET["backupauth"]) && $_GET["backupauth"] == "update" && !ifbackup2faenabled_class($_COOKIE["username"])){
    if(updatebackup2fastatus_class($_COOKIE["username"], $_COOKIE["logintoken"], 1)){
        popup("Backup 2-Step Verification Enabled!", "#5ccd7c", "fa fa-toggle-on","./");
    }else popup("Unknown error occurred!", "indianred", "fa fa-toggle-off","./");
}else if(isset($_GET["backupauth"]) && $_GET["backupauth"] == "update" && ifbackup2faenabled_class($_COOKIE["username"])){
    if(updatebackup2fastatus_class($_COOKIE["username"], $_COOKIE["logintoken"], NULL)){
        popup("Backup 2-Step Verification disabled!", "#5ccd7c", "fa fa-toggle-off","./");
    }else popup("Unknown error occurred!", "indianred", "fa fa-toggle-on","./");
}
//2FA BACKUP KEY
if(isset($_GET["backupauth"]) && $_GET["backupauth"] == "getkey" && ifbackup2faenabled_class($_COOKIE["username"])){
    $newwebkey=getnewbackup2fa_class($_COOKIE["username"]);
    if($newwebkey !== false){
        popup("
            <p id=\"popup1ar\" style=\"line-height: 1.25;width:400px;word-wrap: break-word;display: inline-block;\">
    
                <label id=\"popup1ar\" style=\"font-size:20px;color:#4285F4;border:2px solid #4285F4;padding:3px 8px 3px 8px;border-radius:4px;\">New Backup Code</label>
                
                <br>
                <br>
    
                <label id=\"popup1ar\" style=\"font-size:30px;font-weight:bold;\">".getbackup2fa_class($_COOKIE["username"], $_COOKIE["logintoken"])."</label>
            
            </p>",
    
            "#5ccd7c", "fa fa-key","./");
    }else popup("Unknown error occurred!", "indianred", "fa fa-toggle-off","./");
}
//2FA BACKUP KEY SHOW
if(isset($_GET["backupauth"]) && $_GET["backupauth"] == "showkey" && ifbackup2faenabled_class($_COOKIE["username"]))
    popup("
        <p id=\"popup1ar\" style=\"line-height: 1.25;width:400px;word-wrap: break-word;display: inline-block;\">

            <label id=\"popup1ar\" style=\"font-size:20px;color:#4285F4;border:2px solid #4285F4;padding:3px 8px 3px 8px;border-radius:4px;\">Backup Code</label>
            
            <br>
            <br>

            <label id=\"popup1ar\" style=\"font-size:30px;font-weight:bold;\">".getbackup2fa_class($_COOKIE["username"], $_COOKIE["logintoken"])."</label>
        
        </p>",

        "#5ccd7c", "fa fa-key","./");

?>

<!DOCTYPE html>
<html>

<header>
    <meta name="viewport" content="width=device-width, initial-scale=0.7,user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php defstyles(); ?>
    
    <style>
    
</style>
</header>



<body>
    

<?php 
    echo loadDashboardNavBar(3, 1);
    $clientip = getclientip_class();
    ?>

    

        
<a href="https://ipinfo.io/<?php echo($clientip); ?>" target="_blank">
<div class="usercountdivleft">
        <h2><i class="fa fa-rss" style="height:15px;width:15px;margin-right:1px;"></i> Current IP</h2>
            <br>
            <h1 style="font-size:25px;"><?php echo($clientip); ?></h1>
        </div></a>
        <a href="https://wikipedia.org/wiki/<?php echo ip_info($clientip, "country"); ?>" target="_blank"><div class="usercountdivright">
        <h2><i class="fa fa-globe" style="height:15px;width:15px;margin-right:1px;"></i> Country</h2>
            <br>
            <h1 style="font-size:25px;"><?php echo ip_info($clientip, "country"); ?></h1>
        </div></a>

<div style="display:flex;width:100%;height:60px;"></div>






<div class="contentdiv">



<?php 

if(!ifany2faenabled_class($_COOKIE["username"])){
    echo('
    <div class="contentspan" style="border: 2px solid indianred;"><!--- Google 2FA -->
        <h1 style="color:indianred;"><u><b>Security leak identified!</b></u><h1>
        <h1 style="color:indianred;font-size:20px;line-height:1.5;">You should enable a <u>2-step verification!</u><br>Without this, attackers can access your account much more easily!<h1>
        
        </div>
<div style="display:flex;width:100%;height:25px;"></div>
    ');
}

?>







<div class="contentspan"><!--- Google 2FA -->
        <h1>Google 2-Step Verification<h1>
        <label style='color: indianred; font-family: "Georgia", serif; font-size:18px;text-align:center;line-height: 1.6;'>
        Use the <u>Google Authenticator</u> app to secure your account.
        </label>
        <br>
        <table style="width:100%; margin-top:15px;">
        <?php
                echo('
        <tr>
        <td>

        <script>
            function googlefunc() {
                var button_1google = document.getElementById("button_1google");
                var divgoogle = document.getElementById("divgoogle");
                if(button_1google.style.display !== "none"){
                    divgoogle.style.display = "block";
                    button_1google.style.display = "none";
                }
                else {
                    divgoogle.style.display = "none";
                    button_1google.style.display = "block";
                }
            }
        </script>

        <div class="');

        if(ifgoogle2faenabled_class($_COOKIE["username"])) echo("button_2"); 
        else echo("button_1"); echo('" onclick="googlefunc()" id="button_1google" style="width:110px;text-align:center">');
        
        if(ifgoogle2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-google" style="height:15px;width:15px;margin-right:1px;"></i> Disable'); 
        else echo('<i class="fa fa-google" style="height:15px;width:15px;margin-right:1px;"></i> Enable');
        
        echo('
        </div>
        <div id="divgoogle" style="display:none; max-width:500px;">
        <form method="POST" acction="index.php">

            <input class="');
            
            if(ifgoogle2faenabled_class($_COOKIE["username"])) echo("button_1");
            else echo("button_2");

            echo('" value="Cancel" onclick="googlefunc()" style="width:47%;text-align:center;float:left;"/><input type="submit" value="');
            if(ifgoogle2faenabled_class($_COOKIE["username"])) echo('Disable'); 
            else echo("Enable");
            echo('" class="');
            if(ifgoogle2faenabled_class($_COOKIE["username"])) echo("button_2"); else echo("button_1"); echo('" style="width:47%;text-align:center;float:right;"/>
                
            <br>
            <br>
            <br>
            <div style="margin: auto; width: 70%;text-align:center;">
            ');
        echo('  
                        <img src="'.getgoogle2faqr_class($_COOKIE["username"], $_COOKIE["logintoken"]).'" style="width:100%;max-width:300px;border-radius:7px;"/>
                    <label style="color: #112D4E; font-family: "Georgia", serif; font-weight:bold;font-size:16px;text-align:center;">'.getgoogle2faseed_class($_COOKIE["username"], $_COOKIE["logintoken"]).'</label>
                </div>    
        '); 
        ?>

        <div style="margin-top:20px;">

        <label for="t" class="labelform1">Verification code:</label>
        <br>
        <input type="hidden" name="2fagoogle" value="<?php if(ifgoogle2faenabled_class($_COOKIE["username"])) echo("disable"); else echo("enable"); ?>">
        <input id="t" type="number" name="google2faverificationcode" max="999999" class="inputform1" required style="margin-top:8px;">
        
        </div>
            </form>
        </div>
        </td>
        </tr>
        </table>
        </div>
<div style="display:flex;width:100%;height:25px;"></div>
        <!--iprows=getalllogintokenips_class($_COOKIE["username"]);
        if($iprows !== false){
            while($row = $iprows->fetch()){
                if($row["ip"] !== $clientip){
                    echo('
                    <tr>
                    <td>
                    <h2>
                    <i class="fa fa-plug" style="font-size:0.8em;"></i>
                    <label onclick=\'jsshowtoken("'.$row["ip"].'","'.$row["token"].'","'.ip_info($row["ip"], "Country").'")\'>'.$row["ip"].'</label>
                    </h2></td>
            
                    <td style="padding-left:20px;">
                    <h2>
                    <i class="fa fa-globe" style="font-size:0.8em;"></i>
                    <label>'.ip_info($row["ip"], "Country Code").'</label>
                    </h2></td>
            
                    ');
                    if($row["ip"] !== $clientip){
                        echo('<td style="padding-left:20px;">
                        <a href="?deletetoken='.$row["token"].'">
                        <h2><i class="fa fa-close" id="closeicon" style="margin-left:5px;font-size:1em;transition: 0.3s all;"></i></h2></a></td>');
                    }else {
                        echo('<td style="padding-left:20px;">
                        <a href="?deletetoken='.$row["token"].'&logout=true">
                        <h2><i class="fa fa-gavel" id="closeicon" style="margin-left:5px;font-size:1em;transition: 0.3s all;"></i></h2></a></td>');
                    }
                    echo("</tr>");
                }
               
            }
        }-->





        <div class="contentspan"><!--- Email 2FA -->
        <h1>Mail 2-Step Verification<h1>
        <table style="width:100%;">
        <?php
                echo('
        <tr>
        <td>

        <script>
            function wmailfunc() {
                var button_1wmail = document.getElementById("button_1wmail");
                var divwmail = document.getElementById("divwmail");
                if(button_1wmail.style.display !== "none"){
                    divwmail.style.display = "block";
                    button_1wmail.style.display = "none";
                }
                else {
                    divwmail.style.display = "none";
                    button_1wmail.style.display = "block";
                }
            }
        </script>

        <div class="');

        if(ifmail2faenabled_class($_COOKIE["username"])) echo("button_2"); 
        else echo("button_1"); echo('" onclick="wmailfunc()" id="button_1wmail" style="width:110px;text-align:center">');
        
        if(ifmail2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-envelope" style="height:15px;width:15px;margin-right:2px;"></i> Disable'); 
        else echo('<i class="fa fa-envelope" style="height:15px;width:15px;margin-right:2px;"></i> Enable');
        
        echo('
        </div>
        <div id="divwmail" style="display:none; max-width:500px;">
        <form method="POST" acction="index.php">

            <input class="');
            
            if(ifmail2faenabled_class($_COOKIE["username"])) echo("button_1");
            else echo("button_2");

            echo('" value="Cancel" onclick="wmailfunc()" style="width:47%;text-align:center;float:left;"/><input type="submit" value="');
            if(ifmail2faenabled_class($_COOKIE["username"])) echo('Disable'); 
            else echo("Save and Enable");
            echo('" id="btny1" class="');
            if(ifmail2faenabled_class($_COOKIE["username"])) echo("button_2"); else echo("button_1"); echo('" style="width:47%;text-align:center;float:right;"/>
                
            <br>
            <br>
            <br>
        '); 
        ?>

        <div style="margin-top:10px;">

        <label for="t" style='color: white; font-family: "Georgia", serif; font-weight:bold;font-size:20px;'>Verification mail:</label>
        <br>
        <input type="hidden" name="2famail" value="<?php if(ifmail2faenabled_class($_COOKIE["username"])) echo("disable"); else echo("enable"); ?>">
        <input id="t" type="mail" name="mail2faverificationmail" max-lenght="200" style='outline:none;
        background-color:#EEEEEE;
        border:2.5px solid #112D4E;
        border-radius: 5px;
        color: #364F6B;
        transition: 0.5s all;
        height:30px;
        font-size:18px;width:100%' required value="<?php echo getmail2faseed_class($_COOKIE["username"]); ?>">
        
        </div>
            </form>
        </div>
        </td>
        </tr>
        </table>
        </div>
    <div style="display:flex;width:100%;height:25px;"></div>


    






    <div class="contentspan"><!--- WEB 2FA -->
        <h1>Web 2-Step Verification<h1>
        <label style='color: indianred; font-family: "Georgia", serif; font-size:18px;text-align:center;line-height: 1.6;'>
        You can also get a code in your panel as a 2-Step verification.
        </label>
        <br>
        <table style="width:100%; margin-top:15px;">
        <?php
        
        echo('
        <tr>
        <td>

        <script>
            function wwebauthfunc() {
                window.location.href = "?webauth=update";
            }
            function wwebfunc() {
                window.location.href = "?webauth=getkey";
            }
        </script>

        <div class="');

        if(ifweb2faenabled_class($_COOKIE["username"])) echo("button_2"); 
        else echo("button_1"); echo('" onclick="wwebauthfunc()" id="button_1wweb" style="width:110px;text-align:center">');
        
        if(ifweb2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-toggle-on" style="height:15px;width:15px;margin-right:3px;"></i> Disable'); 
        else echo('<i class="fa fa-toggle-off" style="height:15px;width:15px;margin-right:3px;"></i> Enable');
        


        echo('</div><br><br><div class="');



        if(!ifweb2faenabled_class($_COOKIE["username"])) echo("button_2\""); 
        else echo("button_1\" onclick=\"wwebfunc()\""); echo(' id="button_1wweb" style="width:110px;text-align:center">');
        
        if(!ifweb2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-lock" style="height:15px;width:15px;margin-right:2px;"></i> Get Key'); 
        else {
            echo('<i class="fa fa-retweet" style="height:15px;width:15px;margin-right:2px;"></i> ');
            if(isset($newwebkey))
            echo $newwebkey;
            else
            echo "Get Key";
        }
        
        ?>
        </div>
        </td>
        </tr>
        </table>
        </div>
    <div style="display:flex;width:100%;height:25px;"></div>








    <div class="contentspan"><!--- BACKUP 2FA -->
        <h1>Backup 2-Step Verification Code<h1>
        <label style='color: indianred; font-family: "Georgia", serif; font-size:18px;text-align:center;line-height: 1.6;'>
        You can use this code for the 2-Step Verification.
        <br>But this code should mainly be used as backup code.
        <br>This code only will change after using it or after a manual re-generation. 
        <br>You should print out this code to be on the safe side and only use it in an emergency!
        </label>
        <br>
        <table style="width:100%;margin-top:20px;">
        <?php
        
        echo('
        <tr>
        <td>

        <script>
            function wbackupauthfunc() {
                window.location.href = "?backupauth=update";
            }
            function wbackupfunc() {
                window.location.href = "?backupauth=getkey";
            }
            function wbackupshowkeyfunc() {
                window.location.href = "?backupauth=showkey";
            }
        </script>

        <div class="');

        if(ifbackup2faenabled_class($_COOKIE["username"])) echo("button_2"); 
        else echo("button_1"); echo('" onclick="wbackupauthfunc()" id="button_1wbackup" style="width:110px;text-align:center">');
        
        if(ifbackup2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-toggle-on" style="height:15px;width:15px;margin-right:3px;"></i> Disable'); 
        else echo('<i class="fa fa-toggle-off" style="height:15px;width:15px;margin-right:3px;"></i> Enable');
        

        
        echo(' </div><br><br><div class="');



        if(!ifbackup2faenabled_class($_COOKIE["username"])) echo("button_2\""); 
        else echo("button_1\" onclick=\"wbackupshowkeyfunc()\""); echo(' id="button_1wbackup" style="width:110px;text-align:center">');
        
        if(!ifbackup2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-lock" style="height:15px;width:15px;margin-right:2px;"></i> Show Code'); 
        else {
            echo('<i class="fa fa-eye" style="height:15px;width:15px;margin-right:2px;"></i> Show Code');
        }
        
        echo('</div><br><br><div class="');



        if(!ifbackup2faenabled_class($_COOKIE["username"])) echo("button_2\""); 
        else echo("button_1\" onclick=\"wbackupfunc()\""); echo(' id="button_1wbackup" style="width:110px;text-align:center">');
        
        if(!ifbackup2faenabled_class($_COOKIE["username"])) echo('<i class="fa fa-lock" style="height:15px;width:15px;margin-right:2px;"></i> New Code'); 
        else {
            echo('<i class="fa fa-retweet" style="height:15px;width:15px;margin-right:2px;"></i> New Code');
        }
        
        ?>
        </div>

        <br><br>
        
        </td>
        </tr>
        </table>
        </div>
    <div style="display:flex;width:100%;height:25px;"></div>










<div class="contentspan"><!-- 2FA Logintokens -->
        <h1>Logintokens (<?php echo(str_replace(",",".",number_format(countuserlogintokens_class($_COOKIE["username"])))); ?>)<a href="?deletetoken=all&logout=true" style="color: #112D4E;"><i class="fa fa-trash" id="closeicon" style="margin-left:8px;font-size:0.7em;transition: 0.3s all;"></i></a><h1>
        <table>
        <?php
            $iprows=getalllogintokenips_class($_COOKIE["username"]);
            if($iprows !== false){
                echo('
        <tr>
        <td>
        <h2>
        <i class="fa fa-crosshairs" style="font-size:0.8em;"></i>
        <label>'.$clientip.'</label>
        </h2></td>

        <td style="padding-left:20px;">
        <h2>
        <i class="fa fa-globe" style="font-size:0.8em;"></i>
        <label>'.ip_info($clientip, "countryCode").'</label>
        </h2></td>
        <td style="padding-left:20px;">
        <a href="?deletetoken='.$_COOKIE["logintoken"].'">
        <h2><i class="fa fa-close" id="closeicon" style="margin-left:5px;font-size:1em;transition: 0.3s all;"></i></h2></a></td>
        </tr>

        ');
                while($row = $iprows->fetch()){
                    if($row["ip"] !== $clientip){
                        echo('
                        <tr>
                        <td>
                        <h2>
                        <i class="fa fa-plug" style="font-size:0.8em;"></i>
                        <label onclick=\'jsshowtoken("'.$row["ip"].'","'.$row["token"].'","'.ip_info($row["ip"], "Country").'")\'>'.$row["ip"].'</label>
                        </h2></td>
                
                        <td style="padding-left:20px;">
                        <h2>
                        <i class="fa fa-globe" style="font-size:0.8em;"></i>
                        <label>'.ip_info($row["ip"], "countryCode").'</label>
                        </h2></td>
                
                        ');
                        if($row["ip"] !== $clientip){
                            echo('<td style="padding-left:20px;">
                            <a href="?deletetoken='.$row["token"].'">
                            <h2><i class="fa fa-close" id="closeicon" style="margin-left:5px;font-size:1em;transition: 0.3s all;"></i></h2></a></td>');
                        }else {
                            echo('<td style="padding-left:20px;">
                            <a href="?deletetoken='.$row["token"].'&logout=true">
                            <h2><i class="fa fa-gavel" id="closeicon" style="margin-left:5px;font-size:1em;transition: 0.3s all;"></i></h2></a></td>');
                        }
                        echo("</tr>");
                    }
                   
                }
            }
        ?>
        </table>
    </div>



    <div style="display:flex;width:100%;height:25px;"></div>



    
    <div class="contentspan">
    <form method="POST" acction="index.php">
        <h1>Change Password</h1>
     <table>

    <tr><td>
    <label for="s" class="labelform1">Old Password</label></td>
                <td style="padding-left:7px;"><input class="inputform1" id="s" type="password" name="op" required>
    </td></tr>

    <tr>
<td><label for="t" class="labelform1" style='
        '>New Password</label></td>
                <td style="padding-left:7px;"><input class="inputform1" id="t" type="password" name="np" required>
    </td></tr>

<tr>
<td></td>
    <td style="padding-left:7px;"><input id="t" type="submit" class="formsubmitbutton" value="Change">
    </td></tr>


            </table>
    </div></form>




    <div style="display:flex;width:100%;height:25px;"></div>

    

    




<div class="contentspan">
    <form method="POST" acction="index.php">
        <h1>Disable login from specific Country</h1>
    <table>
    </td>
    <tr>
        <td><label class="labelform1">Country</label></td>
        <td style="padding-left:7px;">
            <select name="blockcountrycode" id="cars" class="inputform1" style='' required>

                <?php
                foreach(getcountrycodes_class() as $key => $value){
                    echo('<option value="'.$key.'">'.$value.'</option>');
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="padding-left:7px;"><input id="t" type="submit" class="formsubmitbutton" value="Block"></td>
    </tr>
            </table></form>



            <div style="display:flex;width:100%;height:5px;"></div>



            <form method="POST" acction="index.php">
        <h1>Reactivate login from specific Country</h1>
    <table>
    </td>
    <tr>
        <td><label class="labelform1">Country</label></td>
        <td style="padding-left:7px;">
            <select name="unblockcountrycode" id="unblockcountry" class="inputform1" required>

                <?php
                $aar = explode(",", getblockedcountrycode_class($_COOKIE["username"]));
                $ars = getcountrycodes_class();
                print_r($ars);
                foreach($aar as $zitm)
                {
                    if($zitm !== "")
                    echo('<option value="'.$zitm.'">'.$ars->$zitm.' ('.$zitm.')</option>');
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="padding-left:7px;"><input id="t" type="submit" class="formsubmitbutton" value="Reactivate"></td>
    </tr>
            </table></form>


    </div>







</div>




    
    



<?php 

/*if(userhasblockedthiscountry($_COOKIE["username"], ip_info($clientip, "Country Code"))) echo "TRUE!"; else echo"FALSE!";*/
?>


<?php } loadFooter();?>


</body>

<script>
    function jsshowtoken(ip="ERROR AT IP",showtoken="ERROR AT TOKEN",country="ERROR AT COUNTRY"){
        alert("\nIP Address:\n"+ip+"\n\nCountry:\n"+country+"\n\nToken:\n" + showtoken);
    }
</script>

</html>



<?php
}

//popup("HALLO");
?>