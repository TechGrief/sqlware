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

<!--link rel="icon" type="image/x-icon" href="/php/favicon.ico">-->

<!DOCTYPE html>
<html>

<header>
    <style>
    </style>
</header>


<body>
    
<?php echo loadDashboardNavBar(4, 1); ?>

        <a href="presenterboard/"><div class="usercountdivleft">
            <h2><i class="fa fa-tv" style="height:15px;width:15px;margin-right:4px;"></i> Presenterboard</h2>
            <br>
            <h1>Manage</h1>
        </div></a>
        <a href="quickurl/"><div class="usercountdivright">
        <h2><i class="fa fa-link" style="height:15px;width:15px;margin-right:5px;"></i> URL Shortener</h2>
            <br>
            <h1>Manage</h1>
        </div></a>

<div style="display:flex;width:100%;height:60px;"></div>





<div class="contentdiv">
    
</div>
    





<?php loadFooter(); } else echo('<meta http-equiv="refresh" content="0; url=../?loggout=true" />');}?>


</body>

</html>