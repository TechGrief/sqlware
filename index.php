<?php //Searches for the required PHP class -> Logs to class -> Max search: 32
$bneriheygnbweohn = "";
for ($x = 0; $x <= 32; $x++) {
    echo('<script>console.log("attemp:'.$x.'->'.$bneriheygnbweohn."php/class.php".'")</script>');
    if(file_exists($bneriheygnbweohn. "php/class.php")){ require($bneriheygnbweohn. "php/class.php"); echo('<script>console.log("Class.php Found! ('.$bneriheygnbweohn. "php/class.php".')")</script>'); break; } 
    $bneriheygnbweohn .= "../";
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="TechGrief, TechGrief.de, YouTube, Code, Server, HTML, CSS, JavaScript, PHP, Apache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Free TechGrief.de Service tool Server - Many tools - Play Now!- By TechGrief on Youtube">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php beginHeadLoad(); ?>
</head>
<body>
    <h1>TechGrief.de</h1>
<?php
if(isset($_GET["rus"])){
    $url = geturlshortenerurl($_GET["rus"]); 
    if($url != false) header('Location: ' . $url, true, false ? 301 : 302); else header('Location: /panel');
}
else header('Location: /panel');
/*if(getConfigValue("server_structure") == "1")
echo '<style>
    html, body, iframe 
    {
     margin: 0px; 
     padding: 0px; 
     height: 100%; 
     width: 100%;
     border: none;
    }
    </style>
    <iframe src="/panel" id="iframe_home_page"></iframe>';
    else header('Location: /panel/');*/
?>
</body>
</html>