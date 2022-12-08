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
else if($usrisAdmin /*|| ifServiceForUserEnabled()*/){

    #region CFG: Server Structure
        if(isset($_POST["server_structure"])) updateConfigValue("server_structure", $_POST["server_structure"]);
        $p1 = new PopUp(title: "Home Page Structure",
            inputs: array(
                new Input(    
                    id: "server_structure", 
                    selected: getConfigValue("server_structure"), 
                    type: "select", 
                    title: "Select", 
                    json_content_encoded:'{"1":"Extended (No Bugs)","0":"Simple (iFrame)"}')
        )); echo($p1->generateCode() ? $p1->getCode() : "");
    #endregion

    #region CFG: Server Favicon
        if(isset($_POST["server_icon"])) updateConfigValue("server_icon", $_POST["server_icon"]);
        $p2 = new PopUp(title: "Page Favicon",
            inputs: array(
                new Input(    
                    id: "server_icon", 
                    type: "text",
                    value: getConfigValue("server_icon"),
                    title: "URL")
        )); echo($p2->generateCode() ? $p2->getCode() : "");
    #endregion
    
    #region CFG: Service Enabled
        if(isset($_POST["server_service_enabled"])) updateConfigValue("server_service_enabled", $_POST["server_service_enabled"]);
        $p3 = new PopUp(title: "Server Service",
            inputs: array(
                new Input(
                    id: "server_service_enabled", 
                    selected: getConfigValue("server_service_enabled"),
                    type: "select",
                    json_content_encoded:'{"1":"Enabled","0":"Disabled"}',
                    title: "Select")
        )); echo($p3->generateCode() ? $p3->getCode() : "");
    #endregion
    
    #region CFG: WEB absolute path
        $p4 = new PopUp(title: "WEB absolute path",
            type:"alert", description: realpath($bneriheygnbweohn)
        ); echo($p4->generateCode() ? $p4->getCode() : "");
    #endregion

    #region CFG: Server Host Domain
    if(isset($_POST["server_host"])) updateConfigValue("server_host", $_POST["server_host"]);
    $p5 = new PopUp(title: "Server Config",
        inputs: array(
            new Input(    
                id: "server_host", 
                type: "text",
                value: getConfigValue("server_host"),
                title: "Domain")
    )); echo($p5->generateCode() ? $p5->getCode() : "");
    #endregion

    #region CFG: Server Hostname
    if(isset($_POST["server_name"])) updateConfigValue("server_name", $_POST["server_name"]);
    $p6 = new PopUp(title: "Server Config",
        inputs: array(
            new Input(    
                id: "server_name", 
                type: "text",
                value: getConfigValue("server_name"),
                title: "Hostname")
    )); echo($p6->generateCode() ? $p6->getCode() : "");
    #endregion
    
    #region CFG: Mail Method
    if(isset($_POST["mail_method"])) updateConfigValue("mail_method", $_POST["mail_method"]);
    $p8 = new PopUp(title: "Mail Gateway",
            inputs: array(
                new Input(
                    id: "mail_method", 
                    selected: getConfigValue("mail_method"),
                    type: "select",
                    json_content_encoded:'{"osmtp":"osmtp (Own SMTP)","tsmtp":"tsmtp (Beta)"}',
                    title: "Select")
    )); echo($p8->generateCode() ? $p8->getCode() : "");
    #endregion

    #region CFG: Mail - external access
    if(isset($_POST["mail_enable_extern_tsmtp"])) updateConfigValue("mail_enable_extern_tsmtp", $_POST["mail_enable_extern_tsmtp"]);
    $p9 = new PopUp(title: "Mail Gateway",
            inputs: array(
                new Input(
                    id: "mail_enable_extern_tsmtp", 
                    selected: getConfigValue("mail_enable_extern_tsmtp"),
                    type: "select",
                    json_content_encoded:'{"0":"Denied","1":"Allowed"}',
                    title: "Select")
    )); echo($p9->generateCode() ? $p9->getCode() : "");
    #endregion

    #region CFG: Mail - OSMT Address
    if(isset($_POST["mail_osmtp_address"])) updateConfigValue("mail_osmtp_address", $_POST["mail_osmtp_address"]);
    $p10 = new PopUp(title: "Mail Address (SMTP)",
        inputs: array(
            new Input(    
                id: "mail_osmtp_address", 
                type: "email",
                value: getConfigValue("mail_osmtp_address"),
                title: "Mail")
    )); echo($p10->generateCode() ? $p10->getCode() : "");
    #endregion

    #region CFG: Mail - TSMT Address
    if(isset($_POST["server_tsmtp_address"])) updateConfigValue("server_tsmtp_address", $_POST["server_tsmtp_address"]);
    $p11 = new PopUp(title: "Tsmtp Gateway Server",
        inputs: array(
            new Input(    
                id: "server_tsmtp_address", 
                type: "text",
                value: getConfigValue("server_tsmtp_address"),
                title: "Url")
    )); echo($p11->generateCode() ? $p11->getCode() : "");
    #endregion

    #region CFG: OSMTP - Mail OSMTP Module
    if(isset($_POST["mail_osmtp_module"])) updateConfigValue("mail_osmtp_module", $_POST["mail_osmtp_module"]);
    $p7 = new PopUp(title: "SMTP Module",
            inputs: array(
                new Input(
                    id: "mail_osmtp_module", 
                    selected: getConfigValue("mail_osmtp_module"),
                    type: "select",
                    json_content_encoded:'{"0":"PHP mail()","1":"PHPMailer (SMTP)","2":"PHPMailer (Binary)"}',
                    title: "Select")
    )); echo($p7->generateCode() ? $p7->getCode() : "");
    #endregion

    #region CFG: OSMTP - SMTP Host
    if(isset($_POST["mail_osmtp_phpmailer_host"])) updateConfigValue("mail_osmtp_phpmailer_host", $_POST["mail_osmtp_phpmailer_host"]);
    $p12 = new PopUp(title: "SMTP Host",
        inputs: array(
            new Input(    
                id: "mail_osmtp_phpmailer_host", 
                type: "text",
                value: getConfigValue("mail_osmtp_phpmailer_host"),
                title: "Domain")
    )); echo($p12->generateCode() ? $p12->getCode() : "");
    #endregion

    #region CFG: OSMTP - SMTP PORT
    if(isset($_POST["mail_osmtp_phpmailer_port"])) updateConfigValue("mail_osmtp_phpmailer_port", $_POST["mail_osmtp_phpmailer_port"]);
    $p13 = new PopUp(title: "SMTP Host Port",
        inputs: array(
            new Input(    
                id: "mail_osmtp_phpmailer_port", 
                type: "text",
                value: getConfigValue("mail_osmtp_phpmailer_port"),
                title: "Port")
    )); echo($p13->generateCode() ? $p13->getCode() : "");
    #endregion

    #region CFG: OSMTP - SMTP Auth
    if(isset($_POST["mail_osmtp_phpmailer_smtp_auth"])) updateConfigValue("mail_osmtp_phpmailer_smtp_auth", $_POST["mail_osmtp_phpmailer_smtp_auth"]);
    $p14 = new PopUp(title: "SMTP Auth",
        inputs: array(
            new Input(
                id: "mail_osmtp_phpmailer_smtp_auth", 
                selected: getConfigValue("mail_osmtp_phpmailer_smtp_auth"),
                type: "select",
                json_content_encoded:'{"1":"Enabled","0":"Disabled"}',
                title: "Select")
    )); echo($p14->generateCode() ? $p14->getCode() : "");
    #endregion

    #region CFG: OSMTP - SMTP Username
    if(isset($_POST["mail_osmtp_phpmailer_smtp_username"])) updateConfigValue("mail_osmtp_phpmailer_smtp_username", $_POST["mail_osmtp_phpmailer_smtp_username"]);
    $p15 = new PopUp(title: "SMTP Username (Auth)",
        inputs: array(
            new Input(    
                id: "mail_osmtp_phpmailer_smtp_username", 
                type: "text",
                value: getConfigValue("mail_osmtp_phpmailer_smtp_username"),
                title: "User")
    )); echo($p15->generateCode() ? $p15->getCode() : "");
    #endregion

    #region CFG: OSMTP - SMTP Password
    if(isset($_POST["mail_osmtp_phpmailer_smtp_password"])) updateConfigValue("mail_osmtp_phpmailer_smtp_password", $_POST["mail_osmtp_phpmailer_smtp_password"]);
    $p16 = new PopUp(title: "SMTP Password (Auth)",
        inputs: array(
            new Input(    
                id: "mail_osmtp_phpmailer_smtp_password", 
                type: "password",
                value: getConfigValue("mail_osmtp_phpmailer_smtp_password"),
                title: "Password")
    )); echo($p16->generateCode() ? $p16->getCode() : "");
    #endregion

    #region CFG: Theme - Global default
    if(isset($_POST["server_global_default_theme"])) updateConfigValue("server_global_default_theme", $_POST["server_global_default_theme"]);
    $p17 = new PopUp(title: "Global Theme",
        inputs: array(
            new Input(
                id: "server_global_default_theme", 
                selected: getConfigValue("server_global_default_theme"),
                type: "select",
                json_content_encoded:'{"0":"Light","1":"Dark 1","2":"Dark 2","888":"Own Preset"}',
                title: "Select")
    )); echo($p17->generateCode() ? $p17->getCode() : "");
    #endregion

    #region CFG: Theme - Allow changes
    if(isset($_POST["server_global_allow_theme_changing"])) updateConfigValue("server_global_allow_theme_changing", $_POST["server_global_allow_theme_changing"]);
    $p18 = new PopUp(title: "Allow user, to change Theme",
        inputs: array(
            new Input(
                id: "server_global_allow_theme_changing", 
                selected: getConfigValue("server_global_allow_theme_changing"),
                type: "select",
                json_content_encoded:'{"0":"Denied","1":"Allowed"}',
                title: "Select")
    )); echo($p18->generateCode() ? $p18->getCode() : "");
    #endregion

    #region CFG: Theme - Set Preset
    //if(isset($_POST["server_global_allow_theme_changing"])) updateConfigValue("server_global_allow_theme_changing", $_POST["server_global_allow_theme_changing"]);
    
    if(isset($_POST["preset_theme_c2"])
    && isset($_POST["preset_theme_c6"])
    && isset($_POST["preset_theme_c7"])
    && isset($_POST["preset_theme_c10"])){
        updateConfigValue("theme_default_c2", $_POST["preset_theme_c2"]);
        updateConfigValue("theme_default_c6", $_POST["preset_theme_c6"]);
        updateConfigValue("theme_default_c7", $_POST["preset_theme_c7"]);
        updateConfigValue("theme_default_c10", $_POST["preset_theme_c10"]);
    }

    $p19 = new PopUp(title: "Change \"Own Preset\" colors",
        inputs: array(
            new Input(
                id: "preset_theme_c2", 
                value: getConfigValue("theme_default_c2"),
                type: "text",
                title: "<span style=\"color:".getConfigValue("theme_default_c2")."\">C2</span> Color (Accent color)"),
            new Input(
                id: "preset_theme_c6", 
                value: getConfigValue("theme_default_c6"),
                type: "text",
                title: "<span style=\"color:".getConfigValue("theme_default_c6")."\">C6</span> Color (Nav Background)"),
            new Input(
                id: "preset_theme_c7", 
                value: getConfigValue("theme_default_c7"),
                type: "text",
                title: "<span style=\"color:".getConfigValue("theme_default_c7")."\">C7</span> Color (Nav-Btn Background)"),
            new Input(
                id: "preset_theme_c10", 
                value: getConfigValue("theme_default_c10"),
                type: "text",
                title: "<span style=\"color:".getConfigValue("theme_default_c10")."\">C10</span> Color (Background)"),
    )); echo($p19->generateCode() ? $p19->getCode() : "");
    #endregion



    if(isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"]) && iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"]) && isset($_COOKIE["username"]) && ifuserisadmin_class($_COOKIE["username"])) {

    /*if(isset($_GET["action"]) && $_GET["action"] == "changemailmethod"){
        popup_box_select_mailmethod();
    }else if(isset($_GET["action"]) && $_GET["action"] == "server_host"){
        popup_box_input("server_host", "Server Domain", "wifi");
    }else if(isset($_GET["action"]) && $_GET["action"] == "server_name"){
        popup_box_input("server_name", "Server Hostname", "tag");
    }else if(isset($_GET["action"]) && $_GET["action"] == "server_tsmtp_address"){
        popup_box_input("server_tsmtp_address", "Class.php Address", "envelope");
    }else if(isset($_GET["action"]) && $_GET["action"] == "mail_osmtp_address"){
        popup_box_input("mail_osmtp_address", "Mail Address (SMTP)", "envelope");
    }else */if(isset($_GET["action"]) && $_GET["action"] == "mail_enable_extern_tsmtp"){
        updateConfigValue("mail_enable_extern_tsmtp", !getConfigValue("mail_enable_extern_tsmtp"));
        echo('<meta http-equiv="refresh" content="0; url=."/>');
    }else if(isset($_GET["action"]) && $_GET["action"] == "server_default_theme"){
        popup_box_input_change_theme();
    }else if(isset($_GET["action"]) && $_GET["action"] == "reset_theme"){
        updateConfigValue("theme_default_c2", "#3AB0FF");
        updateConfigValue("theme_default_c6", "#1B2430");
        updateConfigValue("theme_default_c7", "#D4DBE8");
        updateConfigValue("theme_default_c10", "#243040");
    }/*else if(isset($_GET["action"]) && $_GET["action"] == "server_global_default_theme"){
        popup_box_select_server_global_default_theme();
    }else if(isset($_GET["action"]) && $_GET["action"] == "server_global_allow_theme_changing"){
        updateConfigValue("server_global_allow_theme_changing", !getConfigValue("server_global_allow_theme_changing"));
        echo('<meta http-equiv="refresh" content="0; url=."/>');
    }else if(isset($_GET["action"]) && $_GET["action"] == "server_structure"){
        popup_box_select_server_structure();
    }*/else if(isset($_GET["action"]) && $_GET["action"] == "api_url_shortener"){
        popup_box_select_api_url_shortener();
    }/*else if(isset($_GET["action"]) && $_GET["action"] == "showrealpath"){
        popup(realpath($bneriheygnbweohn));
    }else if(isset($_GET["action"]) && $_GET["action"] == "changesmtpmodule"){
        popup_box_select_smtp_module();
    }else if(isset($_GET["action"]) && $_GET["action"] == "changesmtphost"){
        popup_box_input("mail_osmtp_phpmailer_host", "SMTP Host", "server");
    }else if(isset($_GET["action"]) && $_GET["action"] == "mail_osmtp_phpmailer_port"){
        popup_box_input("mail_osmtp_phpmailer_port", "SMTP Port", "location-arrow");
    }else if(isset($_GET["action"]) && $_GET["action"] == "mail_osmtp_phpmailer_smtp_username"){
        popup_box_input("mail_osmtp_phpmailer_smtp_username", "SMTP Username", "user");
    }else if(isset($_GET["action"]) && $_GET["action"] == "mail_osmtp_phpmailer_smtp_password"){
        popup_box_input("mail_osmtp_phpmailer_smtp_password", "SMTP Password", "key");
    }else if(isset($_GET["action"]) && $_GET["action"] == "mail_osmtp_phpmailer_smtp_auth"){
        updateConfigValue("mail_osmtp_phpmailer_smtp_auth", !getConfigValue("mail_osmtp_phpmailer_smtp_auth"));
        echo('<meta http-equiv="refresh" content="0; url=."/>');
    }*/

    /*else if(isset($_GET["mail_config_method"])){
        updateConfigValue("mail_method", $_GET["mail_config_method"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["server_host"])){
        updateConfigValue("server_host", $_GET["server_host"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["server_name"])){
        updateConfigValue("server_name", $_GET["server_name"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["server_tsmtp_address"])){
        updateConfigValue("server_tsmtp_address", $_GET["server_tsmtp_address"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["mail_osmtp_address"])){
        updateConfigValue("mail_osmtp_address", $_GET["mail_osmtp_address"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["server_structure"])){
        updateConfigValue("server_structure", $_GET["server_structure"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["set_default_global_theme_c2"])
    && isset($_GET["set_default_global_theme_c6"])
    && isset($_GET["set_default_global_theme_c7"])
    && isset($_GET["set_default_global_theme_c10"])){
        updateConfigValue("theme_default_c2", $_GET["set_default_global_theme_c2"]);
        updateConfigValue("theme_default_c6", $_GET["set_default_global_theme_c6"]);
        updateConfigValue("theme_default_c7", $_GET["set_default_global_theme_c7"]);
        updateConfigValue("theme_default_c10", $_GET["set_default_global_theme_c10"]);
        //echo('<meta http-equiv="refresh" content="0; url=?"/>');
        popup_box_input_change_theme();
    }*else if(isset($_GET["server_global_default_theme"])){
        updateConfigValue("server_global_default_theme", $_GET["server_global_default_theme"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }*/else if(isset($_GET["api_url_shortener"])){
        updateConfigValue("api_url_shortener", $_GET["api_url_shortener"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }/*else if(isset($_GET["smtp_module"])){
        updateConfigValue("mail_osmtp_module", $_GET["smtp_module"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["mail_osmtp_phpmailer_host"])){
        updateConfigValue("mail_osmtp_phpmailer_host", $_GET["mail_osmtp_phpmailer_host"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["mail_osmtp_phpmailer_port"])){
        updateConfigValue("mail_osmtp_phpmailer_port", $_GET["mail_osmtp_phpmailer_port"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["mail_osmtp_phpmailer_smtp_username"])){
        updateConfigValue("mail_osmtp_phpmailer_smtp_username", $_GET["mail_osmtp_phpmailer_smtp_username"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }else if(isset($_GET["mail_osmtp_phpmailer_smtp_password"])){
        updateConfigValue("mail_osmtp_phpmailer_smtp_password", $_GET["mail_osmtp_phpmailer_smtp_password"]);
        echo('<meta http-equiv="refresh" content="0; url=?"/>');
    }*/



    ?>
    <?php echo loadDashboardNavBar(2, 1); ?>
    <center>
        <label class="hrtitle">
        <?php echo "<i class=\"fa fa-code-fork\" style=\"height:15px;width:15px;padding:5px 3px 2px 4px;font-size:12px;border:1px solid ".$GLOBALS["c2"]."; border-radius:15px;\"></i><br>v" . 
        $version . " " . $versiontype . 
        "<br><i class=\"fa fa-info\" style=\"height:15px;width:15px;padding:5px 3px 2px 4px;font-size:12px;border:1px solid ".$GLOBALS["c2"]."; border-radius:15px;\"></i><br>" . 
        $versioninfo; ?><br><br><br>
        </label>
    </center>

            <div class="usercountdivleft" onclick='javascript:<?php echo $p3->script_js(); ?>'>
                <h2><i class="fa fa-dashboard" style="height:15px;width:15px;margin-right:5px;"></i> Service</h2>
                <br>
                <h1><?php echo (getConfigValue("server_service_enabled") == "1" ? "Enabled" : "Disabled"); ?></h1>
            </div>

            <div class="usercountdivright" onclick='javascript:<?php echo $p2->script_js(); ?>'>
            <h2><i class="fa fa-image" style="height:15px;width:15px;margin-right:5px;"></i> Page favicon</h2>
                <br>
                <h1><i class="fa fa-eye-slash" style="height:15px;width:15px;margin-right:5px;"></i></h1>
            </div>


    <div style="display:flex;width:100%;height:25px;"></div>

            <div class="usercountdivleft">
                <h2><i class="fa fa-sign-in" style="height:15px;width:15px;margin-right:4px;"></i> Logintokens</h2>
                <br>
                <h1><?php echo(str_replace(",",".",number_format(countlogintokens_class()))); ?></h1>
            </div>

            <div class="usercountdivright">
            <h2><i class="fa fa-user" style="height:15px;width:15px;margin-right:5px;"></i> User</h2>
                <br>
                <h1><?php echo(str_replace(",",".",number_format(countuser_class()))); ?></h1>
            </div>

    <div style="display:flex;width:100%;height:25px;"></div>

    <div class="usercountdivleft" onclick='javascript:<?php echo $p1->script_js(); ?>'>
        <h2><i class="fa fa-grav" style="height:15px;width:15px;margin-right:4px;"></i> Home Page Structure</h2>
        <br>
        <h1><?php echo (getConfigValue("server_structure") == "1" ? "Extended-Normal" : "Simple-iFrame"); ?></h1>
    </div>

    <!--<div class="usercountdivright">
    <h2><i class="fa fa-user" style="height:15px;width:15px;margin-right:5px;"></i> User</h2>
        <br>
        <h1><?php echo(str_replace(",",".",number_format(countuser_class()))); ?></h1>
    </div>-->

    <div style="display:flex;width:100%;height:12px;"></div>
    <center>
        <?php defstyles(); ?>
        <label style="" class="hrtitle">
        Updates</label><br>
        <!--<label style="font-size:25px;" class="hrtitle">Local</label><br>
        <label style="" class="hrtitle">✦</label>-->
    </center>
    <div style="display:flex;width:100%;height:12px;"></div>


            <a><div class="usercountdivleft">
                <h2><i class="fa fa-folder" style="height:15px;width:15px;margin-right:5px;"></i> WEB symbolic link</h2>
                <br>
                <h1><?php echo ($bneriheygnbweohn); ?></h1>
            </div></a>

            <div class="usercountdivright" onclick='javascript:<?php echo $p4->script_js(); ?>'>
            <h2><i class="fa fa-folder" style="height:15px;width:15px;margin-right:5px;"></i> WEB absolute path</h2>
                <br>
                <h1>
                <?php 
                echo(
                    (ismobile_class(true) ? 
                    substr(realpath($bneriheygnbweohn), 0, 10) . (strlen(realpath($bneriheygnbweohn)) > 10 ? "..." : "")
                    : substr(realpath($bneriheygnbweohn), 0, 25) . (strlen(realpath($bneriheygnbweohn)) > 25 ? "..." : ""))
                ); ?>
                </h1>
            </div>


    <div style="display:flex;width:100%;height:25px;"></div>


            <a onclick="manualupdate()"><div class="usercountdivleft">
                <h2><i class="fa fa-bug" style="height:15px;width:15px;margin-right:5px;"></i> Update (Manualy)</h2>
                <br>
                <h1>Use .vky</h1>
            </div></a>
            <form action="<?php echo $bneriheygnbweohn. "php/class.php"; ?>" id="updatevkyform" style="visibility:hidden;height:0px;display:none;" method="post" enctype="multipart/form-data">
                <input type="file" id="updatevkyformbtn" name="updatevkyfile_upload"
                accept=".vky" onchange="javascript:this.form.submit();">
                <input type="submit">
            </form> <script> function manualupdate(){ document.getElementById('updatevkyformbtn').click(); } </script>


            <a href="<?php echo($bneriheygnbweohn. "php/class.php"); ?>?action=autoupdategithub"><div class="usercountdivright">
                <h2><i class="fa fa-bug" style="height:15px;width:15px;margin-right:5px;"></i> Update (Automatic)</h2>
                <br>
                <h1>Github Release</h1>
            </div></a>



    <div style="display:flex;width:100%;height:12px;"></div>
    <center>
        <?php defstyles(); ?>
        <label style="" class="hrtitle">Server Information</label><br>
        <!--<label style="font-size:25px;" class="hrtitle">Local</label><br>
        <label style="" class="hrtitle">✦</label>-->
    </center>
    <div style="display:flex;width:100%;height:12px;"></div>


            <div class="usercountdivleft" onclick='javascript:<?php echo $p5->script_js(); ?>'>
                <h2><i class="fa fa-wifi" style="height:15px;width:15px;margin-right:5px;"></i> Server Host Domain</h2>
                <br>
                <h1><?php echo getConfigValue("server_host"); ?></h1>
            </div>

            <div class="usercountdivright" onclick='javascript:<?php echo $p6->script_js(); ?>'>
            <h2><i class="fa fa-tag" style="height:15px;width:15px;margin-right:5px;"></i> Server Hostname</h2>
                <br>
                <h1><?php echo getConfigValue("server_name"); ?></h1>
            </div>


    <div style="display:flex;width:100%;height:25px;"></div>

            <a href="https://wikipedia.org/wiki/<?php $serverip=exec('curl https://ipecho.net/plain'); $servercountry = ip_info($serverip, "Country");  echo($servercountry); ?>" target="_blank"><div class="usercountdivleft">
                <h2><i class="fa fa-globe" style="height:15px;width:15px;margin-right:5px;"></i> Server Location</h2>
                <br>
                <h1><?php echo(ip_info($serverip, "country")); ?></h1>
            </div></a>

            <a href="https://ipinfo.io/<?php echo($serverip); ?>" target="_blank"><div class="usercountdivright">
            <h2><i class="fa fa-rss" style="height:15px;width:15px;margin-right:5px;"></i> Server IP</h2>
                <br>
                <h1><?php echo($serverip); ?></h1>
            </div></a>


    <div style="display:flex;width:100%;height:25px;"></div>

            <div class="usercountdivleft">
                <h2><i class="fa fa-clock-o" style="height:15px;width:15px;margin-right:5px;"></i> Server Timezone</h2>
                <br>
                <h1><?php 
                $arrz = preg_split('#/#',date_default_timezone_get());
                echo($arrz[count($arrz)-1]); 
                ?></h1>
            </div>

            <a href="?test_upload_speed=now"><div class="usercountdivright">
                <h2><i class="fa fa-upload" style="height:15px;width:15px;margin-right:5px;"></i> Server Upload Speed</h2>
                <br>
                <h1><?php
                if(isset($_GET["test_upload_speed"])){
                    $upload_speed = exec('curl -s https://raw.githubusercontent.com/sivel/speedtest-cli/master/speedtest.py | python -');
                    
                    if(strpos($upload_speed, "Upload:") !== false) $ulz="./?speed=".str_replace("Upload: ", "", $upload_speed);
                    else $ulz = "./?speed=Unknown Error!";

                    echo('<meta http-equiv="refresh" content="0; url='.$ulz.'"/>');
                    exit;
                }
                else if(isset($_GET["speed"])) echo($_GET["speed"]. " ↻"); 
                else echo("↻");
                
                ?></h1>
            </div></a>

    <div style="display:flex;width:100%;height:12px;"></div>
    <center>
        <label style="" class="hrtitle">Mail Configuration</label><br>
        <!--<label style="font-size:25px;" class="hrtitle">Mail</label><br>
        <label style="" class="hrtitle">✦</label>-->
    </center>
    <div style="display:flex;width:100%;height:12px;"></div>
        <div class="usercountdivleft" onclick='javascript:<?php echo $p8->script_js(); ?>'>
            <h2><i class="fa fa-envelope" style="height:15px;width:15px;margin-right:5px;"></i> Mail Send Method</h2>
            <br>
            <h1><?php echo getConfigValue("mail_method"); ?></h1>
        </div>

        <div class="usercountdivright" onclick='javascript:<?php echo $p9->script_js(); ?>'>
        <h2><i class="fa fa-envelope" style="height:15px;width:15px;margin-right:5px;"></i> Allow external access</h2>
            <br>
            <h1><?php echo (getConfigValue("mail_enable_extern_tsmtp") == "1" ? "Allowed" : "Denied"); ?></h1>
        </div>


        <div style="display:flex;width:100%;height:12px;"></div>
        <div class="usercountdivleft" onclick='javascript:<?php echo $p10->script_js(); ?>'>
            <h2><i class="fa fa-envelope" style="height:15px;width:15px;margin-right:5px;"></i> Osmtp Mail Address</h2>
            <br>
            <h1><i class="fa fa-eye-slash" style="height:15px;width:15px;margin-right:5px;"></i></h1>
        </div>

        <div class="usercountdivright" onclick='javascript:<?php echo $p11->script_js(); ?>'>
        <h2><i class="fa fa-rss" style="height:15px;width:15px;margin-right:5px;"></i> Tsmtp Address</h2>
            <br>
            <h1><i class="fa fa-eye-slash" style="height:15px;width:15px;margin-right:5px;"></i></h1>
        </div>


        <div style="display:flex;width:100%;height:12px;"></div>
    <center>
        <label style="" class="hrtitle">OSMTP (SMTP) Configuration</label><br>
    </center>
    <div style="display:flex;width:100%;height:12px;"></div>
        <div class="usercountdivleft" onclick='javascript:<?php echo $p7->script_js(); ?>'>
            <h2><i class="fa fa-microchip" style="height:15px;width:15px;margin-right:5px;"></i> SMTP Module</h2>
            <br>
            <h1><?php $module = getConfigValue("mail_osmtp_module"); 
            if($module == "0") echo "PHP mail()";
            else if($module == "1") echo "PHPMailer (SMTP Server)";
            else if($module == "2") echo "PHPMailer (Sendmail binary)";
            ?></h1>
        </div>

        <div class="usercountdivright" onclick='javascript:<?php echo $p12->script_js(); ?>'>
        <h2><i class="fa fa-server" style="height:15px;width:15px;margin-right:5px;"></i> Host</h2>
            <br>
            <h1><?php echo getConfigValue("mail_osmtp_phpmailer_host"); ?></h1>
        </div>


        <div style="display:flex;width:100%;height:12px;"></div>
        <div class="usercountdivleft" onclick='javascript:<?php echo $p13->script_js(); ?>'>
            <h2><i class="fa fa-location-arrow" style="height:15px;width:15px;margin-right:5px;"></i> Port</h2>
            <br>
            <h1><?php echo getConfigValue("mail_osmtp_phpmailer_port"); ?></h1>
        </div>

        <div class="usercountdivright" onclick='javascript:<?php echo $p14->script_js(); ?>'>
        <h2><i class="fa fa-lock" style="height:15px;width:15px;margin-right:5px;"></i> SMTP Auth</h2>
            <br>
            <h1><?php echo (getConfigValue("mail_osmtp_phpmailer_smtp_auth") == "1" ? "Enabled" : "Disabled"); ?> </h1>
        </div>


        <div style="display:flex;width:100%;height:12px;"></div>
        <div class="usercountdivleft" onclick='javascript:<?php echo $p15->script_js(); ?>'>
            <h2><i class="fa fa-user" style="height:15px;width:15px;margin-right:5px;"></i> Username</h2>
            <br>
            <h1><?php echo getConfigValue("mail_osmtp_phpmailer_smtp_username"); ?></h1>
        </div>

        
        <div class="usercountdivright" onclick='javascript:<?php echo $p16->script_js(); ?>'>
        <h2><i class="fa fa-lock" style="height:15px;width:15px;margin-right:5px;"></i> Password</h2>
            <br>
            <h1><i class="fa fa-eye-slash" style="height:15px;width:15px;margin-right:5px;"></i></h1>
        </div>

        <div style="display:flex;width:100%;height:12px;"></div>
        <center>
        <label style="" class="hrtitle">Theme Design</label><br>
        <!--<label style="font-size:25px;" class="hrtitle">Mail</label><br>
        <label style="" class="hrtitle">✦</label>-->
        </center>
        <div style="display:flex;width:100%;height:12px;"></div>
        <div class="usercountdivleft" onclick='javascript:<?php echo $p17->script_js(); ?>'>
            <h2><i class="fa fa-cubes" style="height:15px;width:15px;margin-right:5px;"></i> Global Theme</h2>
            <br>
            <h1><?php $gt = getConfigValue("server_global_default_theme"); 
            echo ($gt == "0" ? "Light" : ($gt == "1" ? "Dark 1" : ($gt == "2" ? "Dark 2" : "Own Preset")))
            ?></h1>
        </div>

        <a href="?action=reset_theme">
        <div class="usercountdivright">
        <h2><i class="fa fa-refresh" style="height:15px;width:15px;margin-right:5px;"></i> Theme</h2>
            <br>
            <h1><?php echo "Reset Own Preset"; ?></h1>
        </div>
        </a>

        <div style="display:flex;width:100%;height:25px;"></div>

        <div class="usercountdivleft" onclick='javascript:<?php echo $p19->script_js(); ?>'>
            <h2><i class="fa fa-pencil" style="height:15px;width:15px;margin-right:5px;"></i> Own Preset</h2>
            <br>
            <h1><?php echo "Change"; ?></h1>
        </div>

        <div class="usercountdivright"  onclick='javascript:<?php echo $p18->script_js(); ?>'>
        <h2><i class="fa fa-diamond" style="height:15px;width:15px;margin-right:5px;"></i> Allow Design changes</h2>
            <br>
            <h1><?php $gt = getConfigValue("server_global_allow_theme_changing"); 
            echo ($gt == "1" ? "Allowed" : "Denied")
            ?></h1>
        </div>



        <div style="display:flex;width:100%;height:12px;"></div>
        <center>
        <label style="" class="hrtitle">API</label><br>
        <!--<label style="font-size:25px;" class="hrtitle">Mail</label><br>
        <label style="" class="hrtitle">✦</label>-->
        </center>
        <div style="display:flex;width:100%;height:12px;"></div>
        <a href="?action=api_url_shortener"><div class="usercountdivleft">
            <h2><i class="fa fa-handshake-o" style="height:15px;width:15px;margin-right:7px;"></i> API URL Shortner</h2>
            <br>
            <h1><?php $gt = getConfigValue("api_url_shortener"); 
            echo ($gt == "1" ? "Enabled" : "Disabled")
            ?></h1>
        </div></a>


    <div style="display:flex;width:100%;height:25px;"></div>

    <?php
                require($bneriheygnbweohn. "php/mysql.php");
                $stmt = $mysql->prepare('SELECT COUNT(*) as i, MONTH(time) as t FROM urlshortener_api GROUP BY 2');
                $stmt->execute();
                $count = $stmt->rowCount();
                $January=0;$February=0;$March=0;$April=0;$May=0;$June=0;$July=0;$August=0;$September=0;$October=0;$November=0;$December=0;
                if ($count !== 0){
                while($row = $stmt->fetch()){
                    if($row["t"] == "1"){ $January=$row["i"]; }
                    else if($row["t"] == "2"){ $February=$row["i"]; }
                    else if($row["t"] == "3"){ $March=$row["i"]; }
                    else if($row["t"] == "4"){ $April=$row["i"]; }
                    else if($row["t"] == "5"){ $May=$row["i"]; }
                    else if($row["t"] == "6"){ $June=$row["i"]; }
                    else if($row["t"] == "7"){ $July=$row["i"]; }
                    else if($row["t"] == "8"){ $August=$row["i"]; }
                    else if($row["t"] == "9"){ $September=$row["i"]; }
                    else if($row["t"] == "10"){ $October=$row["i"]; }
                    else if($row["t"] == "11"){ $November=$row["i"]; }
                    else if($row["t"] == "12"){ $December=$row["i"]; }
                }
                }

            ?>

            
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
            <canvas id="buyers" width="<?php echo $_COOKIE["window_width"]; ?>" height="400" style="padding: 0;
        margin: auto;
        display: block;
        width: <?php echo ($_COOKIE["window_width"] * 0.9); ?>px;
        height: <?php echo ($_COOKIE["window_height"] * 0.4); ?>px;"></canvas>
            <script>
                var buyerData = {
                    labels : ["January","February","March","April","May","June", "July", "August", "September", "October", "November", "December"],
                    borderColor : "<?php echo $GLOBALS["c2"]; ?>",
                    datasets : [
                    {
                        fillColor : "<?php echo $GLOBALS["c10"]; ?>",
                        strokeColor : "<?php echo $GLOBALS["c2"]; ?>",
                        pointColor : "<?php echo $GLOBALS["c2"]; ?>",
                        pointStrokeColor : "<?php echo $GLOBALS["c2"]; ?>",
                        data : [
                        <?php
                        echo $January.",";
                        echo $February.",";
                        echo $March.",";
                        echo $April.",";
                        echo $May.",";
                        echo $June.",";
                        echo $July.",";
                        echo $August.",";
                        echo $September.",";
                        echo $October.",";
                        echo $November.",";
                        echo $December;
                        ?>
                        ]
                    }
                ]
                }
                // get line chart canvas
                var buyers = document.getElementById('buyers').getContext('2d');
                // draw line chart
                new Chart(buyers).Line(buyerData);
                
            </script>



    <div class="contentdiv">
        
    </div>
        





    <?php } else echo('<meta http-equiv="refresh" content="0; url=../../?loggout=true" />');loadFooter();}?>


</body>

</html>