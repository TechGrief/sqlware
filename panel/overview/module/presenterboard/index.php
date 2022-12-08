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

if(isset($_GET["popup"])) popup( htmlentities($_GET["popup"]), "#5ccd7c", NULL, NULL, "90%", true);

    if(isset($_GET["p"]) && !isset($_GET["set_new_tempimgurl"])){
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                $protocol = 'https://';
        }else {
            $protocol = 'http://';
        }
        echo '<style>
        html, body, iframe 
        {
         background: black;
         margin: 0px; 
         padding: 0px; 
         height: 100%; 
         width: 100%;
         border: none;
        }
        </style>
        <!--Change src if class.php isnt on same domain (Sub-domain = Change!)-->
        <iframe src="'.$protocol.getConfigValue("server_host").'/php/class.php/?present='.$_GET["p"].'" 
        scrolling="auto" stlyle="padding:0;margin:0;border:2px solid red;"></iframe>';
    }
    
    else
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
    
<?php 
$cfgxz = getfirstpresenterboardmoduleCONFIGbyUserID(getuserid_class($_COOKIE["username"]));

if(isset($_GET["action"]) && $_GET["action"] == "changeimgurl"){
    $urlz = preg_replace('/\s+/', ' ', trim($cfgxz["imgurl"]));
    popup_box_input("imgurl", "Image URL", "link", htmlentities($urlz));
}else if(isset($_GET["imgurl"])){
    updatefirstpresenterboardmoduleurl($cfgxz["id"], $_GET["imgurl"]);
    echo('<meta http-equiv="refresh" content="0; url=?"/>');
}
else if(isset($_GET["action"]) && $_GET["action"] == "updatepspdfkitapikey"){
    popup_box_input("updatepspdfkitapikey", "PSPDFKit Api Key", "key", getpspdfkitkey());
}else if(isset($_GET["updatepspdfkitapikey"])){
    updatepspdfkitkey($_GET["updatepspdfkitapikey"]);
    echo('<meta http-equiv="refresh" content="0; url=?"/>');
}
else if(isset($_GET["action"]) && $_GET["action"] == "changeimgforcereload"){
    popup_box_select_imgforcereload($cfgxz["forcereload"]);
}else if(isset($_GET["imgforcereload"])){
    updatefirstpresenterboardmoduleforcereload($cfgxz["id"],$_GET["imgforcereload"]);
    echo('<meta http-equiv="refresh" content="0; url=?"/>');
}
else if(isset($_GET["action"]) && $_GET["action"] == "changedelay"){
    popup_box_input("delay", "Delay", "clock-o", $cfgxz["delay"], 1);
}else if(isset($_GET["delay"])){
    updatefirstpresenterboardmoduledelay($cfgxz["id"],$_GET["delay"]);
    echo('<meta http-equiv="refresh" content="0; url=?"/>');
}
else if(isset($_GET["action"]) && $_GET["action"] == "changecloud"){
    popup_box_select_cloud();
}else if(isset($_GET["changecloud"])){
    updateselectedcloud($_COOKIE["username"],$_GET["changecloud"]);
    echo('<meta http-equiv="refresh" content="0; url=?"/>');
}
else if(isset($_GET["action"]) && $_GET["action"] == "preview"){
    if(isset($_COOKIE["preview"]) && $_COOKIE["preview"] == "off"){
        if (isset($_COOKIE['preview'])) {
            unset($_COOKIE['preview']); 
            setcookie('preview', null, -1, '/'); 
        }
    }else{
        setcookie('preview', "off", strtotime("+1 year"), '/'); 
    }
    header("Location: .");
}

else if(isset($_GET["set_new_tempimgurl"])){
    updatefirstpresenterboardmoduleurl($cfgxz["id"], urldecode($_GET["set_new_tempimgurl"]));
    echo "<a href=\"javascript:history.go(-1)\"><- GO BACK</a>";
    echo "<script>window.close();</script>";
}
else if(isset($_GET["addimgtotemplateid"])){
    popup_box_input_2values($_GET["addimgtotemplateid"], (isset($_GET["insert_position"]) ? $_GET["insert_position"] : "0"));
}
else if(isset($_GET["addtexttotemplateid"])){
    popup_box_input_2values_big($_GET["addtexttotemplateid"], (isset($_GET["insert_position"]) ? $_GET["insert_position"] : "0"));
}
else if(isset($_GET["deletetemplateidni"])){
    deletetemplate($_GET["deletetemplateidni"]);
}
else if(isset($_GET["action"]) && $_GET["action"] == "newtemplate"){
    popup_box_input("newtemplate", "Template name:", "modx");
}else if(isset($_GET["newtemplate"])){
    createnewtemplate($_COOKIE["username"], $_GET["newtemplate"]);
    echo('<meta http-equiv="refresh" content="0; url=?"/>');
}else if(isset($_GET["importlist"]) && isset($_GET["importlistdata"])){
    if(addtemplateimglist($_GET["importlist"],htmlentities($_GET["importlistdata"]))){
        echo('<meta http-equiv="refresh" content="0; url=?template='.$_GET["deletetemplateid"].'#xlok"/>'); 
    }
}else if(isset($_GET["importlist"])){
    popup_box_input_import2c($_GET["importlist"]);
}
$cfgxz = getfirstpresenterboardmoduleCONFIGbyUserID(getuserid_class($_COOKIE["username"]));

echo loadDashboardNavBar(4, 2); 
?>

        <a href="?p=<?php echo($cfgxz["id"]); ?>" target="_blank"><div class="usercountdivleft">
            <h2><i class="fa fa-tv" style="height:15px;width:15px;margin-right:4px;"></i> Presenter ID</h2>
            <br>
            <h1><?php echo($cfgxz["id"]); ?></h1>
        </div></a>
        <a href="?action=changeimgurl">
        <div class="usercountdivright">
        <h2><i class="fa fa-link" style="height:15px;width:15px;margin-right:5px;"></i> Image URL / Text</h2>
            <br>
            <h1>
            <?php
            $fy = (ismobile_class(true) ? 
            substr(str_replace("https://","",str_replace("http://","",$cfgxz["imgurl"])), 0, 11) . "..."
            : substr($cfgxz["imgurl"], 0, 19) . "..."); 
            echo(htmlentities($fy)); 
            ?></h1>
        </div></a>

<div style="display:flex;width:100%;height:60px;"></div>


        <a href="?action=changedelay"><div class="usercountdivleft">
            <h2><i class="fa fa-clock-o" style="height:15px;width:15px;margin-right:4px;"></i> Delay</h2>
            <br>
            <h1><?php echo($cfgxz["delay"]); ?></h1>
        </div></a>
        <a href="?action=changeimgforcereload"><div class="usercountdivright">
        <h2><i class="fa fa-bolt" style="height:15px;width:15px;margin-right:5px;"></i> Forcereload</h2>
            <br>
            <h1>
            <?php echo ($cfgxz["forcereload"] == "1" ? "Enabled" : "Disabled"); ?></h1>
        </div></a>

        <div style="display:flex;width:100%;height:12px;"></div>
    <center>
    <label style="" class="hrtitle">✦</label><br>
    <!--<label style="font-size:25px;" class="hrtitle">Mail</label><br>
    <label style="" class="hrtitle">✦</label>-->
    </center>
    <div style="display:flex;width:100%;height:12px;"></div>


<a href="?action=changecloud"><div class="usercountdivleft">
            <h2><i class="fa fa-cloud" style="height:15px;width:15px;margin-right:4px;"></i> Cloud</h2>
            <br>
            <h1><?php echo(getselectedcloud($_COOKIE["username"])); ?></h1>
        </div></a>
        <a href="?action=newtemplate"><div class="usercountdivright">
        <h2><i class="fa fa-modx" style="height:15px;width:15px;margin-right:5px;"></i> Template</h2>
            <br>
            <h1>
            <i class="fa fa-plus" style="height:15px;width:15px;"></i></h1>
        </div></a>

<div style="display:flex;width:100%;height:60px;"></div>


<a href="?action=updatepspdfkitapikey"><div class="usercountdivleft">
            <h2><i class="fa fa-key" style="height:15px;width:15px;margin-right:4px;"></i> PSPDFKit.com API Key</h2>
            <br>
            <h1><i class="fa fa-eye-slash" style="height:15px;width:15px;margin-right:5px;"></i></h1>
        </div></a>
        
        
        <a href="?action=preview">
        <div class="usercountdivright">
        <h2><i class="fa fa-grav" style="height:15px;width:15px;margin-right:5px;"></i> Preview</h2>
            <br>
            <h1>
                <?php
                if(isset($_COOKIE["preview"]) && $_COOKIE["preview"] == "off"){
                    echo("Disabled");
                }else{
                    echo("Enabled");
                }
                ?>
            </h1>
        </div></a>



<div class="contentdiv">
    
<?php
echo('
<iframe src="" name="page" style="visibility:hidden;"></iframe> ');
if(isset($_COOKIE["preview"]) && $_COOKIE["preview"] == "off"){
    //echo("Disabled");
}else{echo('
    <iframe src="" name="page" style="visibility:hidden;"></iframe>
    <div id="presenterpreview" style="
    position: fixed;
    bottom: 0;
    right: 0;
    width: calc(1920px / 4.6);
    height: calc(1080px / 4.6);
    z-index: 999;
    background-color:black;
    ">
    <iframe src="?p='.$cfgxz["id"].'" scrolling="auto" style="height:100%;width:100%;"></iframe>
    </div>');
}

if(isset($_GET["addtemplateimg"]) && isset($_GET["addtemplateid"])){
    if(isset($_GET["insert_position"])) $pos = $_GET["insert_position"]; else $pos = 0;

    if(addtemplateimg($_GET["addtemplateid"],$_GET["addtemplateimg"], $pos)){
       echo('<meta http-equiv="refresh" content="0; url=?template='.$_GET["addtemplateid"].'#xlok"/>'); 
    }else echo "ERROR";
}else if(isset($_GET["addtemplatetext"]) && isset($_GET["addtemplateid"])){
    if(isset($_GET["insert_position"])) $pos = $_GET["insert_position"]; else $pos = 0;

    if(addtemplateimg($_GET["addtemplateid"],nl2br($_GET["addtemplatetext"]), $pos)){
       echo('<meta http-equiv="refresh" content="0; url=?template='.$_GET["addtemplateid"].'#xlok"/>'); 
    }else echo "ERROR";
}
else if(isset($_GET["deletetemplateid"]) && isset($_GET["deletetemplateimg"])){
    if(removetemplateimg($_GET["deletetemplateid"],$_GET["deletetemplateimg"])){
        echo('<meta http-equiv="refresh" content="0; url=?template='.$_GET["deletetemplateid"].'#xlok"/>'); 
    }
}else if(isset($_FILES["fileupload"]) && isset($_GET["template"])){
    echo("<script>console.log('".$_FILES["fileupload"]["type"]."');</script>");
    if(strpos($_FILES["fileupload"]["type"], 'image') !== false){
        $sc = getselectedcloud($_COOKIE["username"]);
        $uc = false;
        foreach (get_supported_clouds() as $element) {
            if($sc == $element){
                if($element == "anonfiles.com")
                $resultz = upload_extern_anonfiles($_FILES["fileupload"]);
                if($element == "upload.vaa.red")
                $resultz = upload_extern_vaared($_FILES["fileupload"]);
                if($element == "transfer.sh")
                $resultz = upload_extern_transfersh($_FILES["fileupload"]);
                if($element == "freeimage.host")
                $resultz = upload_extern_freeimage($_FILES["fileupload"]);
                if($resultz !== false){
                    $uc = true;
                    echo('<meta http-equiv="refresh" content="0; url=?addtemplateimg='.$resultz.'&addtemplateid='.$_GET["template"].'#xlok"/>'); 
                }else echo "Error on Upload!";
            }
        }
        if($uc == false) echo "ERROR: UNKNOWN CLOUD";
    }else if(strpos($_FILES["fileupload"]["type"], 'vnd.openxmlformats-officedocument.presentationml.presentation') !== false){
        $sc = getselectedcloud($_COOKIE["username"]);
        $uc = false;
        foreach (get_supported_clouds() as $element) {
            if($element == "transfer.sh"){
                foreach(convert_and_upload_images_from_pptx_file_to_transfersh(getpspdfkitkey(),$_FILES["fileupload"]) as $kingurl){
                    addtemplateimg($_GET["template"],$kingurl);
                    echo("<script>console.log('Adding $kingurl');</script>");
                }
                echo('<meta http-equiv="refresh" content="0; url=?template='.$_GET["template"].'#xlok"/>'); 
                exit;
            }
        }
        if($uc == false) echo "ERROR xxx";
    }else if(strpos($_FILES["fileupload"]["type"], 'pdf') !== false){
        $sc = getselectedcloud($_COOKIE["username"]);
        $uc = false;
        foreach (get_supported_clouds() as $element) {
            if($element == "transfer.sh"){
                foreach(convert_and_upload_images_from_pdf_file_to_transfersh(getpspdfkitkey(),$_FILES["fileupload"]) as $kingurl){
                    addtemplateimg($_GET["template"],$kingurl);
                    echo("<script>console.log('Adding $kingurl');</script>");
                }
                echo('<meta http-equiv="refresh" content="0; url=?template='.$_GET["template"].'#xlok"/>'); 
                exit;
            }
        }
        if($uc == false) echo "ERROR xxx";
    }

}
else{

$smt = gettemplates($_COOKIE["username"]);
if($smt !== null)
while($rw = $smt->fetch()){
    $arz = unserialize($rw["imgurllist"]);
    echo('
    
    <a href="?template='.(isset($_GET["template"]) && $_GET["template"] == $rw["id"] ? "-1" : $rw["id"] . "#xlok").'" ><div class="templatetitlediv" '.(isset($_GET["template"]) && $_GET["template"] == $rw["id"] ? "id=\"xlok\"" : "").'>
        <h2>
        '.(isset($_GET["template"]) && $_GET["template"] == $rw["id"] ? '<i class="fa fa-minus" style="height:15px;width:15px;margin-right:4px;"></i> ' : '<i class="fa fa-plus" style="height:15px;width:15px;margin-right:4px;"></i> ').'
        
        '.$rw["templatename"].'
        </h2>
    </div></a>
    <div style="display:flex;width:100%;height:15px;"></div>

    ');
    if(isset($_GET["template"]) && $_GET["template"] == $rw["id"]){
    $last_was_left = 0;
    $count = 0;
    if(is_array($arz))
    foreach($arz as $aritm){
        $count++;
        if($last_was_left == 0){
            echo('
            
    <div style="display:flex;width:100%;height:15px;"></div>
        
            <div class="tempdivimgleft" style="text-align: center;vertical-align: middle;position: relative;overflow: hidden;">

            <a href="?set_new_tempimgurl='.urlencode($aritm).'" target="page" style="text-decoration: none;"> 
                '.(imgcheck($aritm) ? '
                <img src="'.$aritm.'" class="tempimgleft"/> 
                ' : '
                <div style=\'word-wrap: break-word;height: 100%; width: 100%;background: black; color:white; display: flex; flex-direction: column; justify-content: center; text-align: center;font-size:calc((14vw) / 7);font-weight:bold;font-family: \"Ubuntu\", sans-serif;line-height:calc((22.8vw - 1.5rem) / 7);\'>'.$aritm.'</div>
                ').'
                <div class="tempimgtexthover">'.$count.'</div>
                <a href="?deletetemplateimg='.$count.'&deletetemplateid='.$rw["id"].'">
                    <div class="tempimgtexthoverTrash"><i class="fa fa-trash" style="height:15px;width:30px;"></i></div>
                </a>
            </a>

            </div>
  
            ');
            $last_was_left = 1;
        }else{
            $last_was_left = 0;
            echo('
            <div class="tempdivimgright" style="text-align: center;vertical-align: middle;position: relative;overflow: hidden;">

            <a href="?set_new_tempimgurl='.urlencode($aritm).'" target="page" style="text-decoration: none;" >
                '.(imgcheck($aritm) ? '
                <img src="'.$aritm.'" class="tempimgright"/> 
                ' : '
                <div style=\'word-wrap: break-word;height: 100%; width: 100%;background: black; color:white; display: flex; flex-direction: column; justify-content: center; text-align: center;font-size:calc((14vw) / 7);font-weight:bold;font-family: \"Ubuntu\", sans-serif;line-height:calc((22.8vw - 1.5rem) / 7);\'>'.$aritm.'</div>
                ').'
                <div class="tempimgtexthover">'.$count.'</div>
                <a href="?deletetemplateimg='.$count.'&deletetemplateid='.$rw["id"].'">
                    <div class="tempimgtexthoverTrash"><i class="fa fa-trash" style="height:15px;width:30px;"></i></div>
                </a>
            </a>

            </div>');
        }
    }
		
    if($last_was_left == 1) echo("");

    echo('

    <div style="display:flex;width:100%;height:12px;"></div>
    <center> 
    
    <input id="add-img-to-template-input" min="0" max="64" placeholder="Position" name="insert_position" type="number" spellcheck="false" autofocus="autofocus">

    <a href="?addimgtotemplateid='.$rw["id"].'" style="text-decoration: none;" id="href-link">
        <i class="fa fa-link" id="add-img-to-template" style="margin-right:5px;border-radius:13px;"></i>
    </a>

    <a href="?addtexttotemplateid='.$rw["id"].'" style="text-decoration: none;" id="href-text">
        <i class="fa fa-edit" id="add-img-to-template" style="margin-right:5px;border-radius:13px;"></i>
    </a>
    <div style="display:flex;width:100%;height:12px;"></div>

        <form id="form" method="post" enctype="multipart/form-data">

        

            <label>
            <i class="fa fa-upload" id="add-img-to-template" style="margin-right:5px;"></i>
            <input id="file-input" type="file" name="fileupload" style="display: none;"/>
            </label>

            
            <input type="submit" style="display: none;">

            <a href="?deletetemplateidni='.$rw["id"].'" style="text-decoration: none;">
                <i class="fa fa-trash" id="add-img-to-template" style="margin-right:5px;" 
                onmouseover="this.style.color=\'indianred\';" 
                onmouseout="this.style.color=document.getElementById(\'add-img-to-template\').style.color;"></i>
            </a>

            <!--<a href=\'?popup='.htmlentities($rw["imgurllist"]).'\' style="text-decoration: none;" >
                <i class="fa fa-share-alt" id="add-img-to-template" style="margin-right:5px;padding-left:21px;padding-right:25.42px"></i>
            </a>

            <a href="?importlist='.$rw["id"].'" style="text-decoration: none;" >
                <i class="fa fa-code" id="add-img-to-template" style="margin-right:5px;padding:20px 20px 20px 20px;"></i>
            </a>-->

        </form>

            
    <script>
    document.getElementById("file-input").onchange = function() {
        document.getElementById("form").submit();
    };

    const input = document.getElementById("add-img-to-template-input");
    input.addEventListener("input", updateValue);

    const defaulthreflink = document.getElementById("href-link").href;
    const defaulthreftext = document.getElementById("href-text").href;


    function updateValue(e) {
        document.getElementById("href-link").href = defaulthreflink + "&insert_position=" + e.target.value; 
        document.getElementById("href-text").href = defaulthreftext + "&insert_position=" + e.target.value; 
    }
    </script>

    </center>
    <div style="display:flex;width:100%;height:12px;"></div>
    
    <div style="display:flex;width:100%;height:50px;"></div>
    ');

    }
    
}
}
?>
    



</div>
    





<?php loadFooter(); } else echo('<meta http-equiv="refresh" content="0; url=../?loggout=true" />');}
?>


</body>

</html>