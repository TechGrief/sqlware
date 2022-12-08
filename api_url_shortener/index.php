<?phpheader('Content-Type: application/json; charset=utf-8');$jsonoutputvisible = true;//Configure your MYSQL database access data here, it should be the same database as that of your panel//You can try to update this settings automatically, use parameter ?mysql_cfg=auto (Example: http://localhost/api_url_shortener?mysql_cfg=auto)if(!isset($_GET["mysql_cfg"])){  $host = "localhost";  $name = "db";  $user = "sqlware";  $passwort = '96$pPyFfqS/5xLc6';  $GLOBALS["mysql"] = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);}else if(isset($_GET["mysql_cfg"])){//This will (try) update your mysql config automatically -> call ?mysql_cfg=auto    $jsonoutputvisible = false;    $bneriheygnbweohn = "";    $foundmysql = false;    if(file_exists("mysql.php")){        require("mysql.php");         $foundmysql = true;    }else{        for ($x = 0; $x <= 32; $x++) {            if(file_exists($bneriheygnbweohn. "php/mysql.php")){                 require($bneriheygnbweohn. "php/mysql.php");                 $foundmysql = true;            }             $bneriheygnbweohn .= "../";        }    }    if($foundmysql){        header('Content-Type: text/html; charset=utf-8');            http_response_code(200);            echo("<body style='background-color:#F9F5EB;color:#002B5B;'><div style='line-height:25px;font-size:16px;'>            <b><label style='color:#8FE3CF;'><u>></u></label> MySQL Config found!");            echo("<br><label style='color:#8FE3CF;'><u>></u></label> In ".$bneriheygnbweohn. "php/mysql.php");            echo("<br><label style='color:#8FE3CF;'><u>></u></label> Fetching Data...");                        $f = fopen("index.php", 'r');            if ($f) {                $contents = fread($f, filesize("index.php"));                fclose($f);                $content = nl2br($contents);                $content = $contents;                                $content = repcfg('$'.'host = ', '  $host '.'= "'.$host.'";'."\r", $content);                $content = repcfg('$'.'name = ', '  $name '.'= "'.$name.'";'."\r", $content);                $content = repcfg('$'.'user = ', '  $user '.'= "'.$user.'";'."\r", $content);                $content = repcfg('$'.'passwort = ', '  $passwort '.'= \''.$passwort.'\';'."\r", $content);                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Successfully updated MySQL Config!");                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Generating security key...");                $rndmkey = generateRandomString(8);                $content = repcfg('$'.'keyforcreating = ', '  $keyforcreating '.'= \''.$rndmkey.'\';'."\r", $content);                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Security key successfully generated!");                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Generated security key:<label style='background-color:#8FE3CF;'> ".$rndmkey."<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label> (Save this)");                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Creating mail address...");                echo("<br><label style='color:#8FE3CF;'><u>></u></label> At the moment only smtp is supported");                $mails = "noreply@".getConfigValue("server_host");                $content = repcfg('$'.'servermail = ', '  $servermail '.'= \''.$mails.'\';'."\r", $content);                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Mail set successful");                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Mail:<label style='background-color:#8FE3CF;'> ".$mails."<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label>");                file_put_contents("index.php", $content);                                echo("<br><br><label style='color:#8FE3CF;visibility:hidden;'><u>></u></label><label style='background-color:#8FE3CF;'> Data loaded, created and synchronised successfully!<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label> ");                echo("<br><br><label style='color:#8FE3CF;visibility:hidden;'><u>></u></label><label style='background-color:cyan;'> Api is now operational!<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label> ");                                echo("<br><br><label style='color:#8FE3CF;'>☞</label> Save the parameter \"key\", which you will need later to access the API:<label style='background-color:#8FE3CF;'> ".$rndmkey."<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label>");                echo("<br><label style='color:#8FE3CF;'>☞</label> Every time you open this setup, a new \"key\" is generated!");                                                echo("<br><br><label style='color:#8FE3CF;visibility:hidden;'><u>></u></label><label style='background-color:#17A589;'> Testing<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label> ");                                echo("<br><label style='color:#8FE3CF;'><u>></u></label> MySQL connection...");                try {                    new PDO("mysql:host=$host;dbname=$name", $user, $passwort);                    echo("<br><label style='color:#8FE3CF;'><u>></u></label> <label style='background-color:cyan;'>Successful!<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label>");                } catch (\Throwable $th) {                    echo("<br><label style='color:#8FE3CF;'><u>></u></label> <label style='background-color:indianred;'>Unsuccessful!<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label>");                }                echo("<br><label style='color:#8FE3CF;'><u>></u></label> API-Short ability...");                $protocox = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";                 $urlx = $protocox . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];                                $ux =explode("?",$urlx)[0].'?key='.$rndmkey.'&url=https://google.com';                echo("<br><label style='color:#8FE3CF;'><u>></u></label> Test url: $ux");                $short = json_decode(simplecurlex($ux));                if(isset($short->result_code) && $short->result_code == "201"){                    echo("<br><label style='color:#8FE3CF;'><u>></u></label> <label style='background-color:cyan;'>Successful! Short: $short->url, redirect to google.com<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label>");                } else {                    echo("<br><label style='color:#8FE3CF;'><u>></u></label> <label style='background-color:indianred;'>Unsuccessful! (".$short->result_description.")<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label>");                }                                echo("<br><br><label style='color:#8FE3CF;visibility:hidden;'><u>></u></label><label style='background-color:#17A589;'> How to use<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label> ");                echo("<br><br><label style='color:#8FE3CF;'>☞</label> Every time you open this setup, a new \"key\" is generated!");                            }            else echo("<br><br><label style='color:#8FE3CF;visibility:hidden;'><u>></u></label><label style='background-color:indianred;'> Unsuccessfully [File Error]!<label style='color:#8FE3CF;visibility:hidden;'><u>a</u></label></label> ");            echo "</div></b>";            exit();    }else{        http_response_code(400);        echo("<br><label style='color:indianred;'><u>></u></label> MySQL Config NOT found!</b> ");    }    exit();}//BASIC CONFIG HERE//  --->>//You can connect this API with RapidAPI, for this you should set the variable $GLOBALS["enablerapidapiauth"] to true!//RapidAPI Example: https://rapidapi.com/TechGrief/api/url-shortener-german-quality-and-speed/$GLOBALS["enablerapidapiauth"] = false;//If False: The Level will be 3 (access to all settings/tools)//When a mail is sent, the following mail is used  $servermail = 'noreply@192.168.0.30';//keyforcreating: Set a key here that will be used EVERY time to shorten a URL (default: 123).//parameter/use: ?key=<your_key>  $keyforcreating = '3vE45921';//  <<---//END BASIC CONFIG $jsonoutput = '{"result_code":"400","result_description":"Bad Request", "value":""}';http_response_code(400);if(isset($_GET["rus"])){    if(ctype_alnum($_GET["rus"])){    header('Content-Type: text/html; charset=utf-8');    $geturl = geturlshortenerurl_fromapi($_GET["rus"], true, true);        if($geturl !== false){            if($geturl["woopra_project_name"] != NULL && $geturl["woopra_project_name"] != ""){                $jsonoutputvisible = false;                header( "Refresh:1; url=". $geturl["url"], true, 302);            }            else            header('Location: ' . $geturl["url"], true, false ? 301 : 302);        }    $jsonoutput = '{"result_code":"200","result_description":"Please Wait...", "value":""}';}}else if(isset($_GET["url"]) && isset($_GET["key"]) && $_GET["key"] == $keyforcreating && getConfigValue("api_url_shortener") == "1" && rapidapi_auth(0)){    $alias = "first";    if(isset($_GET["alias"]) && ctype_alnum($_GET["alias"])) $alias = $_GET["alias"];    else $alias = strtolower(generateRandomString(6));    while(geturlshortenerurl_fromapi($alias, false))        $alias = strtolower(generateRandomString(6));    if(isset($_GET["alias"]) && $_GET["alias"] == $alias || !isset($_GET["alias"])){        if(ifUrlValid($_GET["url"])){            if(isset($_GET["max"]) && rapidapi_auth(1) && is_numeric($_GET["max"]) && $_GET["max"] > 0) $max = $_GET["max"]; else $max = -1;            if(createurlshortenerurl_fromapi($_GET["url"], $alias, $max)){                if(rapidapi_auth(2) && isset($_GET["mail"]) && filter_var($_GET["mail"], FILTER_VALIDATE_EMAIL)) $sendmailto = $_GET["mail"];                else $sendmailto = "unset";                $url = getfullshorturl($alias);                $qrc = "no access";                if(rapidapi_auth(3) && isset($_GET["woopra"])) $wooprapn = $_GET["woopra"]; else $wooprapn = "Unset/No access";                if(rapidapi_auth(3)) $qrc = "https://api.qrserver.com/v1/create-qr-code/?data=".urlencode($url)."&size=250x250&ecc=M";                $jsonoutput = '{"result_code":"201","result_description":"Created", "alias":"'.$alias.'", "lvl":"'.rapidapi_auth(0,true).'", "mail": "'.$sendmailto.'", "url":"'.$url.'", "save_ip":"true", "RAPIDAPI_SUBSCRIPTION":"'.(isset($_SERVER["HTTP_X_RAPIDAPI_SUBSCRIPTION"]) ? $_SERVER["HTTP_X_RAPIDAPI_SUBSCRIPTION"] : "none").'", "qrcode":"'.$qrc.'", "maxviews":"'.($max == -1 ? "No limit" : $max).'", "woopra":"'.$wooprapn.'"}';                http_response_code(201);            }else{                $jsonoutput = '{"result_code":"404","result_description":"Unknown Error"}';                http_response_code(404);            }        }else{            $jsonoutput = '{"result_code":"400","result_description":"Bad Request, invalid url", "value":""}';            http_response_code(400);        }    }else if(isset($_GET["alias"]) && !ctype_alnum($_GET["alias"])){        $jsonoutput = '{"result_code":"400","result_description":"Bad Request, invalid alias format", "value":""}';        http_response_code(400);    }else{        $jsonoutput = '{"result_code":"409","result_description":"Conflict: '.$_GET["alias"].' already exists", "value":""}';        http_response_code(409);    }}else if(isset($_GET["url"]) && getConfigValue("api_url_shortener") !== "1"){    $jsonoutput = '{"result_code":"503","result_description":"Service Unavailable", "value":""}';    http_response_code(503);}else if(isset($_GET["alias"]) && !isset($_GET["url"]) && isset($_GET["key"]) && $_GET["key"] == $keyforcreating && getConfigValue("api_url_shortener") == "1"  && rapidapi_auth(1)){    $rt = geturlshortenerarray_fromapi($_GET["alias"]);    if($rt !== null && $rt !== "403"){        if(rapidapi_auth(2) && filter_var($rt["not_mail"], FILTER_VALIDATE_EMAIL)) $sendmailto = $rt["not_mail"];        else $sendmailto = "unset/already sent";        $qrc = "no access";        if(rapidapi_auth(3)) $qrc = "https://api.qrserver.com/v1/create-qr-code/?data=".getfullshorturl($rt["alias"])."&size=250x250&ecc=M";        if($rt["woopra_project_name"] != NULL && $rt["woopra_project_name"] != "") $wooprapn = $rt["woopra_project_name"]; else $wooprapn = "Unset/No access";        $jsonoutput = '{"result_code":"200","result_description":"OK", "user":"'.$rt["user"].'", "mail": "'.$sendmailto.'", "RAPIDAPI_SUBSCRIPTION":"'.(isset($_SERVER["HTTP_X_RAPIDAPI_SUBSCRIPTION"]) ? $_SERVER["HTTP_X_RAPIDAPI_SUBSCRIPTION"] : "none").'", "alias":"'.$rt["alias"].'", "save_ip":"'.($rt["save_ip"] ? "true" : "false").'", "clicks":"'.$rt["views"].'", "maxviews":"'.($rt["max_views"] == -1 ? "No limit" : $rt["max_views"]).'", "time":"'.$rt["time"].'", "url":"'.$rt["url"].'", "short":"'.getfullshorturl($rt["alias"]).'", "qrcode":"'.$qrc.'", "woopra":"'.$wooprapn.'"}';        http_response_code(200);    }else if($rt == "403"){        $jsonoutput = '{"result_code":"403","result_description":"Forbidden", "value":"You are not the owner"}';        http_response_code(403);    }    else{        $jsonoutput = '{"result_code":"404","result_description":"Not Found", "value":""}';        http_response_code(404);    }}else if(isset($_GET["ipinfo"]) && !isset($_GET["url"]) && isset($_GET["key"]) && $_GET["key"] == $keyforcreating && getConfigValue("api_url_shortener") == "1" ){    if(rapidapi_auth(0)){        $rt = geturlshortenerarray_fromapi($_GET["ipinfo"]);        if($rt !== null && $rt !== "403"){            $jsonoutput = '{"result_code":"200","result_description":"OK", "alias":"'.$_GET["ipinfo"].'", "save_ip":"'.($rt["save_ip"] ? "true" : "false").'", "ip":'.$rt["ips"].'}';            http_response_code(200);        }else if($rt == "403"){            $jsonoutput = '{"result_code":"403","result_description":"Forbidden", "value":"You are not the owner"}';            http_response_code(403);        }        else{            $jsonoutput = '{"result_code":"404","result_description":"Not Found", "value":""}';            http_response_code(404);        }    }else{        $currentlevel = rapidapi_auth(0, true);        $jsonoutput = '{"result_code":"403","result_description":"Forbidden", "value":"Upgrade ('.$currentlevel.')"}';        http_response_code(403);    }}else if(isset($_GET["delete"]) && !isset($_GET["url"]) && isset($_GET["key"]) && $_GET["key"] == $keyforcreating && getConfigValue("api_url_shortener") == "1"  && rapidapi_auth(1) && $GLOBALS["enablerapidapiauth"]){    $rt = geturlshortenerarray_fromapi($_GET["delete"]);    if($rt !== null){        if(deleteurl_fromapi($_GET["delete"])){            $jsonoutput = '{"result_code":"200","result_description":"OK", "value":"Successfully deleted!"}';            http_response_code(200);        }else{            $jsonoutput = '{"result_code":"403","result_description":"Forbidden", "value":"You are not the owner"}';            http_response_code(403);        }    }    else{        $jsonoutput = '{"result_code":"404","result_description":"Not Found", "value":""}';        http_response_code(404);    }}else if(isset($_GET["key"]) && $_GET["key"] !== $keyforcreating || !rapidapi_auth(1) && isset($_GET["key"]) && $_GET["key"] == $keyforcreating || !isset($_GET["key"])){    $currentlevel = rapidapi_auth(0, true);    $jsonoutput = '{"result_code":"403","result_description":"Forbidden", "value":"Upgrade ('.$currentlevel.')"}';    http_response_code(403);}if($jsonoutputvisible)print_r($jsonoutput);/*echo "{";foreach ($_SERVER as $key => $value) {    echo "\"$key\":\"".str_replace(array("\n\r", "\n", "\r"), "", $value)."\",";}echo "\"test\":\"\"}";print_r(get_browser(null, true));*/die();function ifUrlValid($url){    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {        return true;      } else {        return false;      }}function rapidapi_auth($minlevel = 0, $returncurrentlevel = false){//BASIC (ALL) = 0, +PRO++ = 1, ++ULTRA+ = 2, +++MEGA = 3    if($GLOBALS["enablerapidapiauth"]){        if(isset($_SERVER["HTTP_X_RAPIDAPI_SUBSCRIPTION"])){            $currentlevel = 0;            $lvl = $_SERVER["HTTP_X_RAPIDAPI_SUBSCRIPTION"];            if($lvl == 'BASIC') $currentlevel = 0;            else if($lvl == 'PRO') $currentlevel = 1;            else if($lvl == 'ULTRA') $currentlevel = 2;            else if($lvl == 'MEGA') $currentlevel = 3;            if($returncurrentlevel) return "$currentlevel";            if($currentlevel >= $minlevel) return true; else return false;        }else if($returncurrentlevel) return "-1"; else return false;    }else if($returncurrentlevel) return "-1"; else return true;}function generateRandomString($len = 64) {    $characters = '0123456789abcdefghij0123456789klmnopq0123456789rstuvwxyzAB0123456789CDEFGHIJKLMNOPQR0123456789STUVWXYZ0123456789';    $charactersLength = strlen($characters);    $randomString = '';    for ($i = 0; $i < $len; $i++) {        $randomString .= $characters[rand(0, $charactersLength - 1)];    }    return $randomString;}   function getfullshorturl($alias){    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER["HTTP_HOST"].explode("?",$_SERVER["REQUEST_URI"])[0];    return $actual_link.$alias;}function geturlshortenerurl_fromapi($alias, $countview = true, $returnURLandWOOPRA = false){    if(isset($alias)){        $stmt = $GLOBALS["mysql"]->prepare('SELECT * FROM `urlshortener_api` WHERE alias = :alias');        $stmt->bindParam(":alias", $alias);        $stmt->execute();        $count = $stmt->rowCount();        if ($count !== 0) {            $row = $stmt->fetch();            if($countview){                $cancallnow = false;                if($row["views"] < $row["max_views"]) $cancallnow = true;                else if($row["max_views"] == -1) $cancallnow = true;                                if($cancallnow){                    $ipsx = getIpArray();                    $ip = getIpArray(true);                    $untilnow = $row["ips"];                    if($row["save_ip"]){                        $found = false;                        foreach (json_decode($row["ips"]) as $key => $value) {                            if($value->ip == $ip){                                $found = true;                                break;                            }                        }                        if(!$found){                            try {                                if($untilnow == "[]")                                     $untilnow = "[".$ipsx."]";                                else                                     $untilnow = substr_replace($untilnow,"",-1) . "," . $ipsx."]";                                                                $cnt = count(json_decode($untilnow));                                    if($cnt  > 16 && rapidapi_auth(3)){                                    $untilnow = json_encode(array_slice(json_decode($untilnow), 1));                                }else if($cnt  > 8 && rapidapi_auth(2)){                                    $untilnow = json_encode(array_slice(json_decode($untilnow), 1));                                }else if($cnt  > 4 && rapidapi_auth(1)){                                    $untilnow = json_encode(array_slice(json_decode($untilnow), 1));                                }else if($cnt  > 2 && rapidapi_auth(0)){                                    $untilnow = json_encode(array_slice(json_decode($untilnow), 1));                                }                            } catch (\Throwable $th) {                                $untilnow = "[".$ipsx."]";                            }                        }                    }                    if($row["not_mail"] !== NULL && filter_var($row["not_mail"], FILTER_VALIDATE_EMAIL)){                        $to = $row["not_mail"];                        $subject = "Someone just clicked on your link! (".$row["alias"].")";                        $message = "<html> <head> <title>HTML email</title> </head> <body> <b></b><h1>Someone just clicked on your link!</h1></b> <h3>Details</h3> <ul>                        <li><b>URL: </b>".$row["url"]."</li>                        <li><b>Alias: </b>".$row["alias"]."</li>                        </ul> <br> <h3>Client Details</h3> <ul>";                        foreach (json_decode($ipsx) as $key => $value) {                            $message = $message."<li><b>$key</b> -> $value</li>";                        }                        $message = $message.'</ul><br><p>From now on you will no longer receive messages for this URL ('.$row["url"].')!</p></body></html>';                        // Always set content-type when sending HTML email                        $headers = "MIME-Version: 1.0" . "\r\n";                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";                        $headers .= 'From: <'.$servermail.'>' . "\r\n";                        try{                            mail($to,$subject,$message,$headers);                        } catch (\Throwable $th) { }                    }                    if($row["woopra_project_name"] != NULL && $row["woopra_project_name"] != ""){                        echo '                        <!-- Start of Woopra Code -->                        <script>                            !function(){var t,o,c,e=window,n=document,r=arguments,a="script",i=["call","cancelAction","config","identify","push","track","trackClick","trackForm","update","visit"],s=function(){var t,o=this,c=function(t){o[t]=function(){return o._e.push([t].concat(Array.prototype.slice.call(arguments,0))),o}};for(o._e=[],t=0;t<i.length;t++)c(i[t])};for(e.__woo=e.__woo||{},t=0;t<r.length;t++)e.__woo[r[t]]=e[r[t]]=e[r[t]]||new s;(o=n.createElement(a)).async=0,o.src="https://static.woopra.com/js/w.js",(c=n.getElementsByTagName(a)[0]).parentNode.insertBefore(o,c)}("woopra");                            woopra.config({                              domain: "'.$row["woopra_project_name"].'"                            });                            //woopra.track();                            woopra.track("'.$alias.'", {                                url: window.location.pathname,                                title: document.title                            });                        </script>     <style>body{    padding: 1em;    background: #2B3134;    color: #777;    text-align: center;    font-family: "Gill sans", sans-serif;    width: 80%;    margin: 0 auto;  }  h1{    margin: 1em 0;    border-bottom: 1px dashed;    padding-bottom: 1em;    font-weight: lighter;  }  p{    font-style: italic;  }  .loader{    margin: 0 0 2em;    height: 100px;    width: 20%;    text-align: center;    padding: 1em;    margin: 0 auto 1em;    display: inline-block;    vertical-align: top;        position: fixed;    z-index: 999;    height: 2em;    width: 2em;    overflow: visible;    margin: auto;    top: 0;    left: 0;    bottom: 0;    right: 0;  }    /*    Set the color of the icon  */  svg path,  svg rect{    fill: #FF6700;  }  </style><center><!-- 8 --><div class="loader loader--style8" title="7">  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"     width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">    <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />    </rect>    <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />    </rect>    <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />    </rect>  </svg></center>                        <!-- End of Woopra Code -->';                    }                    $newviews = $row["views"] + 1;                    $stmtx = $GLOBALS["mysql"]->prepare('UPDATE `urlshortener_api` SET views = :viewsx , ips = :ips, not_mail = NULL WHERE alias = :alias');                    $stmtx->bindParam(":viewsx", $newviews);                    $stmtx->bindParam(":alias", $alias);                    $stmtx->bindParam(":ips", $untilnow);                    $stmtx->execute();                    $countx = $stmtx->rowCount();                                        if ($countx !== 0){                        $newarr = array();                        $newarr["url"] = $row["url"];                        $newarr["woopra_project_name"] = $row["woopra_project_name"];                        if($returnURLandWOOPRA) return $newarr;                        else return $row["url"];                    }                    else return false;                }else{                        $newarr = array();                        $newarr["url"] = "errorpage.html";                        $newarr["woopra_project_name"] = $row["woopra_project_name"];                        if($returnURLandWOOPRA) return $newarr;                        else return "errorpage.html";                }            }else return true;            return false;        }else return false;    }else return false;}function createurlshortenerurl_fromapi($url, $alias, $maxviews = -1){    if(isset($url) && isset($alias) && getConfigValue("api_url_shortener") == "1"){                if(rapidapi_auth(2) && isset($_GET["mail"]) && filter_var($_GET["mail"], FILTER_VALIDATE_EMAIL)) $sendmailto = $_GET["mail"];        else $sendmailto = NULL;        if(rapidapi_auth(3) && isset($_GET["woopra"])) $wooprapn = $_GET["woopra"];        else $wooprapn = "";                if(!is_numeric($maxviews)) $maxviews = -1;        $username = (isset($_SERVER["HTTP_X_RAPIDAPI_USER"]) ? $_SERVER["HTTP_X_RAPIDAPI_USER"] : "none");        $stmt = $GLOBALS["mysql"]->prepare('INSERT INTO `urlshortener_api`(`id`, `user`, `views`, `url`, `alias`, `save_ip`, `not_mail`, `max_views`, `woopra_project_name`) VALUES (NULL, :usen, 0, :urli, :aliasi, :saveip, :notmail, :maxviews, :woopra);');        $stmt->bindParam(":urli", $url);        $stmt->bindParam(":aliasi", $alias);        $stmt->bindParam(":usen", $username);        if($maxviews < 0) $maxviews = -1;        $stmt->bindParam(":maxviews", $maxviews);        if(rapidapi_auth(0)) $sa = 1; else $sa = 0;        $stmt->bindParam(":saveip", $sa);        $stmt->bindParam(":notmail", $sendmailto);        $stmt->bindParam(":woopra", $wooprapn);        $stmt->execute();        $count = $stmt->rowCount();        if ($count !== 0) return true; else return false;    }    return false;}function deleteurl_fromapi($alias){    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");    if(isset($alias)){        $username = (isset($_SERVER["HTTP_X_RAPIDAPI_USER"]) ? $_SERVER["HTTP_X_RAPIDAPI_USER"] : "none");        $stmt = $GLOBALS["mysql"]->prepare('DELETE FROM `urlshortener_api` WHERE user = :users AND alias = :aliasz');        $stmt->bindParam(":users", $username);        $stmt->bindParam(":aliasz", $alias);        $stmt->execute();        $count = $stmt->rowCount();        if ($count !== 0) {            return true;        }else{            return false;        }    }else{        return false;    }}function getIpArray($onlyteturnip = false){    if(isset($_SERVER["HTTP_X_REAL_IP"])) $ip = $_SERVER["HTTP_X_REAL_IP"]; else $ip = getclientip_class();    try {        if(!isset($GLOBALS["exarray"])){            $exarray = array();            $dw = file_get_contents("http://ip-api.com/php/$ip");            $downjson = unserialize($dw);            $exarray["ip"] = $ip;            $exarray["time"] = date("Y-m-d H:m:s");            $exarray["user_agent"] = $_SERVER["HTTP_USER_AGENT"];            foreach ($downjson as $key => $value) {                $exarray[$key] = $value;            }            $GLOBALS["exarray"] = $exarray;        }else $exarray = $GLOBALS["exarray"];        if($onlyteturnip) return $ip;        else return json_encode($exarray);    } catch (\Throwable $th)  {        if($onlyteturnip) return "0.0.0.0";        else        return '{"ip":"'.$ip.'", "data":"unknown"}';    }}function getclientip_class() {    if(isset($GLOBALS["cip"])){        return $GLOBALS["cip"];    }    $ipaddress = '';    if (isset($_SERVER['HTTP_CLIENT_IP']))        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];    else if(isset($_SERVER['HTTP_X_FORWARDED']))        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];    else if(isset($_SERVER['HTTP_FORWARDED']))        $ipaddress = $_SERVER['HTTP_FORWARDED'];    else if(isset($_SERVER['REMOTE_ADDR']))        $ipaddress = $_SERVER['REMOTE_ADDR'];    else        $ipaddress = 'false';        if($ipaddress=="::1") $ipaddress="localhost";    $GLOBALS["cip"] = $ipaddress;    return $ipaddress;}function geturlshortenerarray_fromapi($alias){    if(isset($alias)){        $stmt = $GLOBALS["mysql"]->prepare('SELECT * FROM `urlshortener_api` WHERE alias = :alias');        $stmt->bindParam(":alias", $alias);        $stmt->execute();        $count = $stmt->rowCount();        if ($count !== 0) {            $row = $stmt->fetch();            $username = (isset($_SERVER["HTTP_X_RAPIDAPI_USER"]) ? $_SERVER["HTTP_X_RAPIDAPI_USER"] : "none");            if($username !== $row["user"] && $GLOBALS["enablerapidapiauth"]) return "403";            return $row;        }else return null;    }else return null;}function getConfigValue($namz){    if(isset($namz)){        $stmt = $GLOBALS["mysql"]->prepare('SELECT * FROM `config` WHERE name = :namu');        $stmt->bindParam(":namu", $namz);        $stmt->execute();        $count = $stmt->rowCount();        if ($count !== 0) {            $row = $stmt->fetch();            return $row["value"];        }else return false;    }else return false;}function repcfg($old_line, $new_line, $content){    /*$old_line = '$'.'host = ';    $new_line = '$host '.'= "'.$host.'";'."\r";*/    $new_contents= "";    if( strpos($content, $old_line) !== false) {        $contents_array = preg_split("/\\r\\n|\\r|\\n/", $content);        foreach ($contents_array as &$record) {            if (strpos($record, $old_line) !== false) {                $new_contents .= $new_line;            }else{                $new_contents .= $record . "\r";            }        }    }    return $new_contents;}function simplecurlex($url){    $curl = curl_init();    curl_setopt_array($curl, array(    CURLOPT_URL => $url,    CURLOPT_RETURNTRANSFER => true,    CURLOPT_ENCODING => '',    CURLOPT_MAXREDIRS => 10,    CURLOPT_TIMEOUT => 0,    CURLOPT_FOLLOWLOCATION => true,    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,    CURLOPT_CUSTOMREQUEST => 'GET',    ));    $response = curl_exec($curl);    curl_close($curl);    return $response;}?>