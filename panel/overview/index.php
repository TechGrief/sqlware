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
    
<?php echo loadDashboardNavBar(1, 0); ?>

        <a href="security/"><div class="usercountdivleft">
            <h2><i class="fa fa-sign-in" style="height:15px;width:15px;margin-right:4px;"></i> Logintokens</h2>
            <br>
            <h1><?php echo(str_replace(",",".",number_format(countuserlogintokens_class($_COOKIE["username"])))); ?></h1>
        </div></a>
        <div class="usercountdivright">
        <h2><i class="fa fa-server" style="height:15px;width:15px;margin-right:5px;"></i> Clients</h2>
            <br>
            <h1><?php echo(str_replace(",",".",number_format(countuserclients_class($_COOKIE["username"])))); ?></h1>
        </div>

<div style="display:flex;width:100%;height:60px;"></div>





<div class="contentdiv">
    
</div>
    





<?php loadFooter(); } else echo('<meta http-equiv="refresh" content="0; url=../?loggout=true" />');}?>


</body>

</html>