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

if(glogch()) {
?>

<!--link rel="icon" type="image/x-icon" href="/php/favicon.ico">-->

<!DOCTYPE html>
<html>

<header>
    <style>
    </style>
</header>


<body>
    
<?php 

echo loadDashboardNavBar(4, 2); 

$deleted = false;
if(isset($_POST["createnewshorturl"])){
    $susshorted = false;
    $finurl = "ERROR";
    $rndmstring = strtolower(generateRandomString(5));
    while(geturlshortenerurl($rndmstring, false)){
        $rndmstring = strtolower(generateRandomString(5));
    }
    if(createurlshortenerurl($_POST["createnewshorturl"], $rndmstring)){
        $finurl =getfullshorturl($rndmstring);
        $susshorted = ifurlredirects($finurl);
    }
}else if(isset($_GET["deleteshorturl"])){
    $deleted = deleteshorturl($_GET["deleteshorturl"]);
}

?>

<?php if(isset($_POST["createnewshorturl"]) && isset($susshorted) && isset($finurl) && $susshorted){ ?>

        <div class="usercountdivleft" style="width:88%;float:center;margin-left:calc(6% - 5px);padding-bottom:16px;border-color:#1E90FF ;background-color:#1E90FF ;">
            <h2 style="color:#F0F8FF;"><i class="fa fa-mail-forward" style="height:15px;width:15px;margin-right:4px;"></i> Result</h2>
            <br>
            <h1 style="display:block;">
                    <input type="url" name="createnewshorturl" class="simpleinput" id="simpleinputurl" style="pointer:cursor;" spellcheck="false" readonly="readonly" value="<?php echo $finurl; ?>">
                    <a target="_blank" class="simpleinputsubmit" style="margin-top:9px;height:50px;width:50px;padding:0;" href="<?php echo $finurl; ?>"><i class="fa fa-location-arrow" style="margin-top:11.5px;margin-left:13px;"></i></a>
                    <a class="simpleinputsubmit" style="margin-top:9px;height:50px;width:50px;padding:0;margin-right:9px;" onclick="jsCopyUrlFuncion()"><i class="fa fa-copy" style="margin-top:11.5px;margin-left:12px;display:block;" id="copyfa"></i><i id="checkfa" class="fa fa-check" style="margin-top:11.5px;margin-left:12px;display:none;"></i></a>
            </h1>
        </div>

        <script>
        function jsCopyUrlFuncion() {
            var copyText = document.getElementById("simpleinputurl");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            copyText.setSelectionRange(0, 0);

            document.getElementById("checkfa").style.display = "block";
            document.getElementById("copyfa").style.display = "none";
            
            setTimeout(function() {
                document.getElementById("checkfa").style.display = "none";
                document.getElementById("copyfa").style.display = "block";
            }, 1900);
        }
    </script>

        <div style="display:flex;width:100%;height:20px;"></div>
<?php } else if(isset($_POST["createnewshorturl"]) && isset($susshorted) && isset($finurl) && !$susshorted){ ?>

<div class="usercountdivleft" style="width:88%;float:center;margin-left:calc(6% - 5px);padding-bottom:16px;border-color:indianred ;background-color:indianred ;">
    <h2 style="color:#FFE4E1;"> ERROR - Domain Error</h2>
    <br>
    <h1 style="display:block;">
            <input type="text" name="createnewshorturl" class="simpleinput" style="pointer:cursor;color:#F08080;border-color:#F08080;background-color:#FFE4E1;" spellcheck="false" readonly="readonly" value="Some unknown error has occurred!">
            
    </h1>
</div>
<div style="display:flex;width:100%;height:20px;"></div>
<?php } else if(isset($_GET["deleteshorturl"]) && isset($deleted) && $deleted){ ?>

<div class="usercountdivleft" style="width:88%;float:center;margin-left:calc(6% - 5px);padding-bottom:16px;border-color:#1E90FF ;background-color:#1E90FF ;">
    <h2 style="color:#F0F8FF;"><i class="fa fa-mail-forward" style="height:15px;width:15px;margin-right:4px;"></i> Result</h2>
    <br>
    <h1 style="display:block;">
            <input type="url" name="createnewshorturl" class="simpleinput" id="simpleinputurl" style="pointer:cursor;" spellcheck="false" readonly="readonly" value="Deleted successfully!">
    </h1>
</div>

<div style="display:flex;width:100%;height:20px;"></div>
<?php }?>

        <div class="usercountdivleft" style="width:88%;float:center;margin-left:calc(6% - 5px);padding-bottom:16px;">
            <h2><i class="fa fa-link" style="height:15px;width:15px;margin-right:4px;"></i> URL</h2>
            <br>
            <h1 style="display:block;">
                <form action="." method="POST">
                    <input type="url" name="createnewshorturl" class="simpleinput" style="" spellcheck="false" autocomplete="off" placeholder="https://google.com" required>
                    <input type="submit" class="simpleinputsubmit" style="margin-top:9px;" value="Go!" required>
                </form>
            </h1>
        </div>




<div style="display:flex;width:100%;height:60px;"></div>




<div class="contentdiv">
    
<?php


$smt = getshorturls();
if($smt !== null){
    echo '<input type="text" id="lblforclipboardcopy" style="display:none;"/>
    <table class="rwd-table">
    <tr style="border-bottom:2px solid red;">
        <th>URL</th>
        <th>Action</th>
        <!--<th>Alias</th>-->
        <th>Views</th>
        <th>Date</th>
    </tr>'; 
    
    while($rw = $smt->fetch()){
        echo '
        <tr>
            <td data-th="URL">'.(ismobile_class(true) ? 
            substr(str_replace("https://","",str_replace("http://","",$rw["url"])), 0, 19) . "..."
            : substr($rw["url"], 0, 65) . (strlen($rw["url"]) > 65 ? "..." : "")).'</td>
            <td data-th="Action">
            <a href="'.(getfullshorturl($rw["alias"])).'" target="_blank"><i class="fa fa-location-arrow" style="margin-top:11.5px;" id="c2color"></i></a>
            <i 
            onclick="jsCopyUrl(\''.(getfullshorturl($rw["alias"])).'\', this);" 
            class="fa fa-copy" style="margin-top:11.5px;margin-left:4px;cursor:pointer;" id="c2color" ></i>
            <a href="'.("?deleteshorturl=".$rw["alias"]).'"><i class="fa fa-trash" style="margin-top:11.5px;margin-left:4px;" id="c2color"></i></a>
            </td>
                <!--<td data-th="Alias">'.$rw["alias"].' 
                </td>-->
            <td data-th="Views">'.$rw["views"].'</td>
            <td data-th="Date">'.date_format(new DateTime($rw["time"]), "m-d-Y").'</td>
        </tr>'; 
    }

    echo '</table>'; ?>
    <script>
        function jsCopyUrl(text, element) {
            document.getElementById('lblforclipboardcopy').value = text;
            var copyText = document.getElementById('lblforclipboardcopy');
            document.getElementById("lblforclipboardcopy").style.display = "block";
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            document.getElementById("lblforclipboardcopy").style.display = "none";
            element.className = "fa fa-check";

            setTimeout(function() {
            element.className = "fa fa-copy";
            }, 1900);
        }
    </script>

<?php
}

?>
    



</div>
    





<?php loadFooter(); } else echo('<meta http-equiv="refresh" content="0; url=../?loggout=true" />');}
?>


</body>

</html>