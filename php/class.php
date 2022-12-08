<?php

static $panelversion="1.0";
static $officialsite="http://techgrief.us.to/";
static $officialsitename="TechGrief.us.to";
static $officialsiteowner="TechGrief";


function defstyles(){
    /*echo '<meta name="viewport" content="width=device-width, initial-scale=0.7,user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="'.getConfigValue("server_icon").'" type="image/x-icon">';*/
    
    loadwindowwidthandheighttocookie();

    $allowthemechanging = getConfigValue("server_global_allow_theme_changing");
    if($allowthemechanging !== "0" && $allowthemechanging !== "1") $allowthemechanging = "1";
    if(isset($_GET["theme"]) && ($_GET["theme"] == 0 || $_GET["theme"] == 1) && $allowthemechanging == "1"){
        if(isset($_COOKIE["theme"]))
            setcookie("theme", "", time()-(86400) * 16, "/");
        setcookie("theme", $_GET["theme"], time() + (86400) * 16, "/"); // 86400 = 1 day
        header("Location: .");
    }else if(isset($_GET["theme"]) && $allowthemechanging !== "1") popup("Design changes were not allowed by administrator!");

    echo('
    <script>
        console.log(\'----------You-can-set-Theme-Manualy---------\n\r\n\rCMD:\n\rTheme(id);\n\r\n\rExample:\n\rGlobal-Preset Theme: Theme(888);\n\rBlue-Dark: Theme(2);\n\rOrange-Dark-2: setTheme(1);\n\Green-Light-2: setTheme();\');
        console.log(\'----------You-can-set-your-own-Theme----------\n\r\n\rCMD:\n\rsetTheme(c2,c6,c7,c10);\n\r\n\rExample:\n\rBlue-Dark: setTheme("#3AB0FF", "#1B2430", undefined, "#243040");\n\rOrange-Dark: setTheme("#fb8663", "#1B2430", undefined, "#243040");\');
    function Theme(theme = "2"){
        var today = new Date();
        var expire = new Date();
        expire.setTime(today.getTime() + 3600000*24*100);
        document.cookie = "theme="+theme+";expires=" + expire.toGMTString() + "; path=/";
        location.reload();
    }
    function setTheme(c2 = "#FC997C", c6 = "#1B3148", c7 = "#D4DBE8", c10 = "#2E4C6D") {
        var today = new Date();
        var expire = new Date();
        expire.setTime(today.getTime() + 3600000*24*100);
        document.cookie = "theme=999;expires=" + expire.toGMTString() + "; path=/";
        document.cookie = "c2="+c2+";expires=" + expire.toGMTString() + "; path=/"; //#FC997C
        document.cookie = "c6="+c6+";expires=" + expire.toGMTString() + "; path=/"; //#1B3148
        document.cookie = "c7="+c7+";expires=" + expire.toGMTString() + "; path=/"; //#D4DBE8
        document.cookie = "c10="+c10+";expires=" + expire.toGMTString() + "; path=/"; //#2E4C6D
        location.reload();
    }
    </script>');

    $c1 = "#28425f";
    $c2 = "#5ccd7c";
    $c3 = "#999";
    $c4 = "indianred";
    $c5 = "#3F72AF";
    $c6 = "#2b4d77";
    $c7 = "#112D4E";
    $c8 = "#DBE2EF";
    $c9 = "#EEEEEE";
    $c10 = "#112D4E";

    $profile = getConfigValue("server_global_default_theme");
    if(isset($_COOKIE["theme"]) && $allowthemechanging == "1") $profile = $_COOKIE["theme"];

    if($profile == 0){
        $c1 = "#28425f";
        $c2 = "#5ccd7c";
        $c3 = "#999";
        $c4 = "indianred";
        $c5 = "#3F72AF";
        $c6 = "#2b4d77";
        $c7 = "#112D4E";
        $c8 = "#DBE2EF";
        $c9 = "#EEEEEE";
        $c10 = "#F9F7F7";
    }else if($profile == 1){
        $c1 = "#28425f";
        $c2 = "#FC997C";//Nav acent color
        $c3 = "#999";
        $c4 = "indianred";
        $c5 = "#3F72AF";
        $c6 = "#1B3148";
        $c7 = "#D4DBE8";
        $c8 = "#DBE2EF";
        $c9 = "#EEEEEE";
        $c10 = "#2E4C6D";
    }else if($profile == 2){
        $c1 = "#28425f";
        $c2 = "#3AB0FF";//Change - Nav acent color
        $c3 = "#999";
        $c4 = "indianred";
        $c5 = "#3F72AF";
        $c6 = "#1B2430";//Change
        $c7 = "#D4DBE8";//Change
        $c8 = "#DBE2EF";
        $c9 = "#EEEEEE";
        $c10 = "#243040";//Change
    }else if($profile == 888){
        $c1 = "#28425f";
        $c2b = getConfigValue("theme_default_c2");
        $c2 = ($c2b !== false ? $c2b : "#3AB0FF");//Change - Nav acent color
        $c3 = "#999";
        $c4 = "indianred";
        $c5 = "#3F72AF";
        $c6b = getConfigValue("theme_default_c6");
        $c6 = ($c6b !== false ? $c6b : "#1B2430");//Change
        $c7b = getConfigValue("theme_default_c7");
        $c7 = ($c7b !== false ? $c7b : "#D4DBE8");//Change
        $c8 = "#DBE2EF";
        $c9 = "#EEEEEE";
        $c10b = getConfigValue("theme_default_c10");
        $c10 = ($c10b !== false ? $c10b : "#243040");//Change
    }else if($profile == 999 && isset($_COOKIE["c2"]) && isset($_COOKIE["c6"]) && isset($_COOKIE["c7"]) && isset($_COOKIE["c10"])){
        $c1 = "#28425f";
        $c2 = $_COOKIE["c2"];//Change - Nav acent color
        $c3 = "#999";
        $c4 = "indianred";
        $c5 = "#3F72AF";
        $c6 = $_COOKIE["c6"];//Change
        $c7 = $_COOKIE["c7"];//Change
        $c8 = "#DBE2EF";
        $c9 = "#EEEEEE";
        $c10 = $_COOKIE["c10"];//Change
    }
    $GLOBALS["c1"] = $c1;
    $GLOBALS["c2"] = $c2;
    $GLOBALS["c3"] = $c3;
    $GLOBALS["c4"] = $c4;
    $GLOBALS["c5"] = $c5;
    $GLOBALS["c6"] = $c6;
    $GLOBALS["c7"] = $c7;
    $GLOBALS["c8"] = $c8;
    $GLOBALS["c9"] = $c9;
    $GLOBALS["c10"] = $c10;

    echo('
    <style>
    /* hide scrollbar but allow scrolling */
body {
    -ms-overflow-style: none; /* for Internet Explorer, Edge */
    scrollbar-width: none; /* for Firefox */
    overflow-y: scroll; 
}

body::-webkit-scrollbar {
    display: none; /* for Chrome, Safari, and Opera */
}
    body {
        background-color:'.$c10.';
        margin:0px;
    }
    html {
        scroll-behavior: smooth;
    }
    .simpleinput {
        color: '.$c2.';
        font-size:27px;
        width:100%;
        padding:5px;
        outline:none;
        
        border:2.5px solid '.$c2.';
        background-color:'.$c8.';
        border-radius: 10px;
        transition: 0.7s all;
        font-family: "Arial Black", Gadget, sans-serif;
    }
    .simpleinput:hover {
        background-color:'.$c7.';
    }
    .simpleinputsubmit {
        color: '.$c2.';
        font-size:27px;
        padding:5px;
        padding-left:15px;
        padding-right:15px;
        outline:none;
        
        border:2.5px solid '.$c2.';
        background-color:'.$c8.';
        border-radius: 10px;
        transition: 0.7s all;
        font-family: "Arial Black", Gadget, sans-serif;
        float:right;
        cursor:pointer;
    }
    .simpleinputsubmit:hover {
        color: '.$c8.';
        border:2.5px solid '.$c8.';
        background-color:'.$c2.';
    }
    
    .hrtitle {
        color: '.$c2.';
        font-family: "Arial Black", Gadget, sans-serif;
        font-variant: small-caps;
        letter-spacing: 2px;
    }
    .button_1 {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      background-color:'.$c1.';
      border: 0px solid '.$c2.';
      color:'.$c2.';
      border-width: 0px 0px 4px 0px;
      user-select:none;
      }
      .button_1 > div {
        color: '.$c3.';
      font-size: 10px;
      font-family: Helvetica Neue;
      font-weight: initial;
      font-style: normal;
      text-align: center;
      margin: 0px 0px 0px 0px;
      }
      .button_1 > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static
      }
    .button_1:hover{
      background-color:'.$c2.';
      color:'.$c1.';
      border: 0px solid '.$c1.';
      border-width: 0px 0px 4px 0px;
    }


    .button_2 {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      background-color:'.$c1.';
      border: 0px solid '.$c4.';
      color:'.$c4.';
      border-width: 0px 0px 4px 0px;
      }
      .button_2 > div {
        color: '.$c3.';
      font-size: 10px;
      font-family: Helvetica Neue;
      font-weight: initial;
      font-style: normal;
      text-align: center;
      margin: 0px 0px 0px 0px;
      }
      .button_2 > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static
      }
    .button_2:hover{
      background-color:'.$c4.';
      color:'.$c1.';
      border: 0px solid '.$c1.';
      border-width: 0px 0px 4px 0px;
    }

    .textarea_1 {
        transition: 0.1s all;
        backface-visibility: hidden;
        cursor: pointer;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        text-align:center;
        word-wrap:break-word;
      }

    @media (max-width : 800px){ /*from 0 to 600 px max height applies x3pro=394px*/
        .textinput_1 {
            width:80%;
            padding:20px;
            background-color:'.$c1.';
            border: 0px solid '.$c2.';
            color:'.$c2.';
            border-width: 2px;
            border-radius:5px;
            text-align:center;
            font-size: 30px;
            word-wrap: break-word;
            display: inline-block;
            position: absolute;
        }
        .templatetitlediv h2{
            display:inline-block;
            height:20px;
            font-size:20px;
            margin-top:10px;
            margin-bottom:10px;
            margin-left:10px;
            margin-right:10px;
        }
    }
    @media screen and (min-width: 800px) {
        .textinput_1 {
            height:60px;
            width:800px;
            background-color:'.$c1.';
            border: 0px solid '.$c2.';
            color:'.$c2.';
            border-width: 2px;
            border-radius:5px;
            min-height: 10em;
            text-align:center;
            display: table-cell;
            vertical-align: middle;
        }
        .templatetitlediv h2{
            display:inline-block;
            height:20px;
            font-size:20px;
            margin-top:10px;
            margin-bottom:20px;
            margin-left:10px;
            margin-right:10px;
        }
    }
    .textarea_1_a:hover{
      background-color:'.$c2.';
      color:'.$c1.';
      border: 0px solid '.$c1.';
      border-width: 2px;
    }


    .navidiv{
        height:76px;
        width:100%;
        display:block;
        background-color:'.$c5.';
        background-color:'.$c6.';
        margin:0px;
    }
    .navibuttondivnew{
        border:2px solid '.$c7.';
        border-radius: 10px;
        margin: 10px;
        display:inline-block;
        align-items: center;
        height:50px;
        /*width:100px;*/
        color:'.$c7.';
        background-color: '.$c8.';
		font-family: "Georgia", serif;
        transition: 0.5s all;
		font-size: 25px;
        cursor:pointer;
        float:center;
    }
    .navibuttondivnew:hover{
        color:'.$c8.';
        background-color: '.$c7.';
    }
    .navibuttonlabeldivnew{
        display:inline-block;
        height:25px;
        margin-left:13px;
        margin-right:16px;
        margin-top:10.5px;
        margin-bottom:14.5px;
        cursor:pointer;
    }
    .navibuttondivtitle{
        border:2px solid '.$c2.';
        border-radius: 10px;
        margin: 10px;
        display:inline-block;
        align-items: center;
        height:50px;
        /*width:100px;*/
        color:'.$c2.';
        background-color: '.$c7.';
		font-family: "Georgia", serif;
        transition: 0.5s all;
		font-size: 25px;
        cursor:pointer;
    }
    .navibuttondivtitle:hover{
        color:'.$c7.';
        background-color: '.$c2.';
    }
    #navibuttondivtitleselected{
        color: '.$c7.';
        background-color: '.$c2.';
    }
    #navibuttondivtitleselected:hover{
        color: '.$c8.';
    }
    .navibuttonlabeldivtitle{
        display:inline-block;
        height:25px;
        margin-left:13px;
        margin-right:16px;
        margin-top:12.5px;
        margin-bottom:14.5px;
        cursor:pointer;
    }
    .navibuttondivsignout{
        border:2px solid '.$c4.';
        border-radius: 10px;
        margin: 10px;
        display:inline-block;
        align-items: center;
        height:50px;
        /*width:100px;*/
        color:'.$c4.';
        background-color: '.$c7.';
		font-family: "Georgia", serif;
        transition: 0.5s all;
		font-size: 25px;
        cursor:pointer;
        float:right;
    }
    .navibuttondivsignout:hover{
        color:'.$c7.';
        background-color: '.$c4.';
    }
    .navibuttonlabeldivsignout{
        display:inline-block;
        height:25px;
        margin-left:14px;
        margin-right:15px;
        margin-top:13px;
        margin-bottom:12px;
        cursor:pointer;
    }
    .navibuttondivchangetheme{
        border:2px solid '.$c6.';
        border-radius: 10px;
        margin: 10px;
        display:inline-block;
        align-items: center;
        height:50px;
        /*width:100px;*/
        color:'.$c6.';
        background-color: '.$c7.';
		font-family: "Georgia", serif;
        transition: 0.5s all;
		font-size: 25px;
        cursor:pointer;
        float:right;
    }
    .navibuttondivchangetheme:hover{
        color:'.$c7.';
        background-color: '.$c6.';
    }
    .navibuttonlabeldivchangetheme{
        display:inline-block;
        height:25px;
        margin-left:14px;
        margin-right:15px;
        margin-top:13px;
        margin-bottom:12px;
        cursor:pointer;
    }
.inputform1{
    outline:none;
background-color:'.$c9.';
border:2.5px solid '.$c7.';
border-radius: 5px;
color: '.$c2.';
transition: 0.5s all;
height:30px;
font-size:18px;width:100%;
}
.inputform1:hover{
border:2.5px solid '.$c2.';
}
.labelform1{
    transition: 0.4s all;
    color: '.$c7.';
    font-family: "Georgia", serif; font-weight:bold; 
}
.labelform1:hover{
    color: '.$c2.';
}
    .formsubmitbutton{
        outline:none;
background-color:'.$c7.';
border:2.5px solid '.$c2.';
border-radius: 5px;
color: '.$c2.';
transition: 0.5s all;
height:30px;
font-size:18px;
cursor:pointer;
width:100%;
transition: 0.5s all;
    }
    .formsubmitbutton:hover{
background-color:'.$c2.';
border:2.5px solid '.$c2.';
color: '.$c7.';
    }
.contentdiv{
    /*height:100%;*/
    display:block;
    width:96%;
    padding-left:2%;
    padding-right:2%;
    word-wrap: break-word;
    cursor:default;
    padding-bottom:150px;
}

.contentspan{
    border-radius: 5px;
    border:2px solid '.$c8.';
    transition: 0.45s all;
    padding-left: 10px;
    padding-right: 10px;
}
.contentspan:hover{
    border:2px solid '.$c2.';
}
.contentspan h1{
    margin-top:10px;
    color: '.$c7.';
	font-family: "Georgia", serif;
    transition: 0.5s all;
}
.contentspan h1:hover{
    color: '.$c2.';
}
.contentspan h2{
    color: '.$c7.';
	font-family: "Georgia", serif;
    transition: 0.5s all;
}
.contentspan h2:hover{
    color: '.$c2.';
}
#closeicon:hover{
    cursor:pointer;
    color:'.$c4.';
}

#add-img-to-template {
    color:  '.$c2.';
    border-radius: 50%;
    border:2.5px solid '.$c2.';
    padding:21px 23.42px 19px 23px;
    font-size:30px;
    transition: 0.3s all;
}
#add-img-to-template:hover {
    background-color:'.$c2.';
    color:  '.$c10.';
    cursor:pointer;
}

#add-img-to-template-input {
    color:  '.$c2.';
    border-radius: 12px;
    border:2.5px solid '.$c2.';
    margin-right:5px;
    outline:none;
    padding:20.5px 4px 18.5px 4px;
    font-size:30px;
    width:150px;
    transition: 0.3s all;
}
.templatetitlediv{
    margin-left:2.5%;
    display:block;
    width:95%;
    //padding-bottom:20px;
    border:2.5px solid '.$c2.';
    background-color:'.$c2.';
    border-radius: 10px;
    transition: 0.7s all;
    /*margin-right:30px;*/
    font-family: "Arial Black", Gadget, sans-serif;
    font-variant: small-caps;
    color:  '.$c8.';
    float:left;
}
.templatetitlediv:hover{
    border:2.5px solid '.$c2.';
    background-color:'.$c8.';
    color: '.$c2.';
    cursor:pointer;
}



.tempdivimgleft{
    width:47%;
    margin-left:2%;
    float:left;
    height:'.(ismobile_class(true) ? "200px" : "350px").';
}
.tempdivimgleft:hover{
    cursor:pointer;
}
.tempdivimgright{
    width:47%;
    margin-right:2%;
    float:right;
    height:'.(ismobile_class(true) ? "200px" : "350px").';
}
.tempdivimgright:hover{
    cursor:pointer;
}

.tempimgleft{
    opacity: 1;
    filter: alpha(opacity=40);
    max-height:'.(ismobile_class(true) ? "180px" : "350px").';
    max-width:100%;
    position: absolute;
    top: 0;
    bottom: 0;
    left:0;
    right:0;
    margin: auto;
}
.tempimgright{
    opacity: 1;
    filter: alpha(opacity=40);
    max-height:'.(ismobile_class(true) ? "200px" : "350px").';
    max-width:100%;
    position: absolute;
    top: 0;
    bottom: 0;
    left:0;
    right:0;
    margin: auto;
}

.tempimgtexthover{
    font-size:45px;
    position: absolute;
    top: 50%;
    left: 50%;
    opacity: 0;
    filter: alpha(opacity=40);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
    color: '.$c2.';
    font-weight:bold;
    transition: 0.3s all;
}
.tempimgtexthover:hover{
    opacity: 1;
    filter: alpha(opacity=100);
}

.tempimgtexthoverTrash{
    font-size:35px;
    position: absolute;
    top: 10%;
    left: 50%;
    opacity: 0;
    filter: alpha(opacity=40);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
    color: '.$c2.';
    font-weight:bold;
    transition: 0.25s all;
    color:indianred;
}
.tempimgtexthoverTrash:hover{
    opacity: 1;
    filter: alpha(opacity=100);
    color:indianred;
}
div.tempdivimgright:hover div.tempimgtexthover {
    transition: 0.4s all;
    opacity: 1;
    filter: alpha(opacity=100);
}
div.tempdivimgright:hover div.tempimgtexthoverTrash {
    transition: 0.4s all;
    opacity: 1;
    filter: alpha(opacity=100);
}
div.tempdivimgright:hover img.tempimgright {
    transition: 0.4s all;
    opacity: 0.3;
    filter: alpha(opacity=100);
}

div.tempdivimgleft:hover div.tempimgtexthover {
    transition: 0.4s all;
    opacity: 1;
    filter: alpha(opacity=100);
}
div.tempdivimgleft:hover div.tempimgtexthoverTrash {
    transition: 0.4s all;
    opacity: 1;
    filter: alpha(opacity=100);
}
div.tempdivimgleft:hover img.tempimgleft {
    transition: 0.4s all;
    opacity: 0.3;
    filter: alpha(opacity=100);
}



.usercountdivleft{
    margin-left:4.5%;
    display:block;
    width:44%;
    border:2.5px solid '.$c2.';
    background-color:'.$c8.';
    border-radius: 10px;
    transition: 0.7s all;
    /*margin-right:30px;*/
    font-family: "Arial Black", Gadget, sans-serif;
    font-variant: small-caps;
    color:  '.$c2.';
    float:left;
}
.usercountdivleft:hover{
    border:2.5px solid '.$c2.';
    background-color:'.$c2.';
    color: '.$c8.';
    cursor:pointer;
}
.usercountdivleft h1{
    display:inline-block;
    height:30px;
    font-size:30px;
    margin-top:15px;
    margin-bottom:30px;
    margin-left:18px;
    margin-right:18px;
}
.usercountdivleft h2{
    display:inline-block;
    height:20px;
    font-size:20px;
    margin-top:20px;
    margin-bottom:9px;
    margin-left:18px;
    margin-right:18px;
}
.usercountdivright{
    margin-right:4.5%;
    display:block;
    width:44%;
    border:2.5px solid '.$c2.';
    background-color:'.$c8.';
    border-radius: 10px;
    transition: 0.7s all;
    /*margin-right:30px;*/
    font-family: "Arial Black", Gadget, sans-serif;
    font-variant: small-caps;
    color: '.$c2.';
    float:right;
}
.usercountdivright:hover{
    border:2.5px solid '.$c2.';
    background-color:'.$c2.';
    color: '.$c8.';
    cursor:pointer;
}
.usercountdivright h1{
    display:inline-block;
    height:30px;
    font-size:30px;
    margin-top:15px;
    margin-bottom:30px;
    margin-left:18px;
    margin-right:18px;
}
.usercountdivright h2{
    display:inline-block;
    height:20px;
    font-size:20px;
    margin-top:20px;
    margin-bottom:9px;
    margin-left:18px;
    margin-right:18px;
}



@import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
.rwd-table {
  margin: 1em 0;
  width: 94%;
  margin-left:3%;
  min-width: 300px;
  font-family: Montserrat, sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  color: '.$c10.';
  font-weight: bold;
  letter-spacing: 0.7px;
  border-radius: 0.4em;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: 0.5em;
}
.rwd-table td:last-child {
  padding-bottom: 0.5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
  .rwd-table td:before {
    display: none;
  }
.rwd-table th,
.rwd-table td {
  text-align: left;
}
  .rwd-table th,
  .rwd-table td {
    display: table-cell;
    padding: 0.25em 0.5em;
  }
  .rwd-table th:first-child,
  .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child,
  .rwd-table td:last-child {
    padding-right: 0;
  }

.rwd-table {
  background: '.$c7.';//#34495e
  color: #fff;
  border-radius: 0.4em;
  overflow: hidden;
}
.rwd-table th,
.rwd-table td {
  margin: 0.5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th,
  .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th,
.rwd-table td:before {
  color: '.$c2.';#dd5
}
#c2color {
    color: '.$c2.';
}




</style>
');
}
function beginHeadLoad(){
    $cico = getConfigValue("server_icon");
    $cname = getConfigValue("server_name");
    echo('
    <title>'.($cname == false ? "WWW" : $cname).'</title>
    <link rel="icon" href="'.($cico == false ? "https://www.w3schools.com/favicon.ico" : $cico).'">
    <meta name="viewport" content="width=device-width, initial-scale=0.7,user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    ');
}

function popup($text, $color="#5ccd7c", $logoclass = NULL, $closeredirecturl = NULL, $width = "400px", $showcopyfunc = false){
    $onclickeventfunction = "hidepopup1()";
    if($closeredirecturl !== NULL)
    $onclickeventfunction = "redirecturl('".$closeredirecturl."')";
    echo('
    <!---https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <style>
    body :not(.popup1) :not(#popup1ar){
        filter: sepia(10%) blur(2px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:15px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: '.$width.';
        border-bottom:solid 2px '.$color.';
        border-left:solid 2px '.$color.';
        border-right:solid 2px '.$color.';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$color.';
        color:'.$color.';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      //background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      }
      .popup_close > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: default;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        //background-color:'.$GLOBALS["c7"].';
        border: 0px solid #4285F4;
        color:#4285F4;
        border-width: 2px 2px 6px 2px;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static
        }
        .popup_logo:hover{
        background-color:#4285F4;
        color:#28425f;
        border: 0px solid #4285F4;
        border-width: 2px 2px 6px 2px;
        }
  
    </style>


    <div class="popup1" style="text-align:center;" id="popup1">
        
    <div onclick="'.$onclickeventfunction.'" class="popup_close" id="popup1ar" style="
    text-align:center;
    height:40px;
    width:50px;
    display:flex;
    float:right;
    padding:0;">
        <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
    </div>

    ');
    if($logoclass !== NULL){
        echo('
        <div class="popup_logo" id="popup1ar" style="
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:left;
        padding:0;">
            <i class="'.$logoclass.'" id="popup1ar" style="margin:auto;"></i>
        </div>
        ');
    }
    echo('

    <div id="popup1ar" style="
    width:100%;
    display:flex;
    padding-top:0px;
    text-align:center;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    flex-direction: column;
    word-wrap: break-word;
    display: inline-block;
    ">
    ');
    
    if(!(substr($text, 0, 1) === "<")){
        echo('<h2 id="popup1ar">'.$text.' </h2>');
    }else
        echo($text);

    if($showcopyfunc) echo('
    <center id="popup1ar"><div class="popup_logo" id="popup1ar" onclick="jsCopyUrlFuncion()"  style="
    text-align:center;
    height:40px;
    width:50px;
    display:flex;
    padding:0;">
        <i class="fa fa-copy" onclick="jsCopyUrlFuncion(this)" id="popup1ar" id="ccbtn" style="margin:auto;"></i>
    </div></center>');
    echo('

    <input type="text" value="'.htmlentities($text).'" style="display:none;"  id="copytextxx">
    </div>

    </div>
    
    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function jsCopyUrlFuncion(element) {
        document.getElementById("copytextxx").style.display = "block";
        var copyText = document.getElementById("copytextxx");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        document.getElementById("copytextxx").style.display = "none";

        element.className = "fa fa-check";

            setTimeout(function() {
                element.className = "fa fa-copy";
            }, 1900);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}

function loadFooter(){
    $cname = getConfigValue("server_name");
    $officialsiteowner=($cname == false ? "WWW" : $cname);
    $cips = getclientip_class();
    echo('
    <style>
    .footer {
        border-top:1px solid #112D4E;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #3F72AF;
        color: white;
        text-align: center;
        font-family: "Georgia", serif;
        transition: 0.45s all;
        text-shadow: none;
        cursor:default;
        line-height: 1.4;
        visibility:hidden;//hidde footer (or visible)
    }
    
    .footer:hover{
        color:'.$GLOBALS["c2"].';
        background-color: #112D4E;
        filter: none;
    }
    
    .footer label, .footer a{
        text-decoration:none;
        color: white;
        transition: 0.5s all;
    }
    
    
    @media screen and (max-width : 600px){
        
        .footer{
            font-size:12px;
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
         -khtml-user-select: none; /* Konqueror HTML */
           -moz-user-select: none; /* Old versions of Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
                user-select: none; /* Non-prefixed version, currently
                                      supported by Chrome, Edge, Opera and Firefox */
        }
    }@media screen and (min-width: 600px){
        .footer{
            font-size:15px
        }
        .footer label{
            filter: blur(3px)
    }
    }
    .footer label:hover,.footer a:hover{
        color:'.$GLOBALS["c2"].';
        filter: none;
        cursor:pointer;
    }
        </style>
    
    
    
    <div class="footer">
    <p>
  
  
      <div id="footeroriginalcontent">
          
          IP address:
          <input type="text" style="display: none; " value="'.$cips.'" id="ipvalueinput">
          <label onclick="jsCopyIpFuncion()">
              <input type="text" style="display: none; " value="'.$cips.'" id="ipcpy">
              '.$cips.'
          </label><i onclick="jsCopyIpFuncion()" class="fa fa-copy" style="margin-left:1px;font-size:12px;cursor:pointer;"></i>
  
      <br>
      <div style="margin-top:5px;height:0;"></div>
          Token:
          <input type="text" style="display: none; " value="'.$_COOKIE["logintoken"].'" id="tokenvalueinput">
          <label onclick="jsCopyTokenFuncion()">
              <input type="text" style="display: none; " value="'.$_COOKIE["logintoken"].'" id="tokencpy">
              '.$_COOKIE["logintoken"].'
          </label><i onclick="jsCopyTokenFuncion()" class="fa fa-copy" style="margin-left:1px;font-size:12px;cursor:pointer;"></i>
  
      </div>
      
  
  
      <div style="display: none;" id="tokenvalueinputcopy">
      <i class="fa fa-check" style="height:15px;width:15px;margin-right:7px;"></i>Logintoken copied!
      <br><i class="fa fa-copyright" style="height:15px;width:15px;margin-right:7px;margin-top:7px;"></i>Copyright '.date("Y").' '.$officialsiteowner.'
      </div>
  
      <div style="display: none;" id="ipvalueinputcopy">
      <i class="fa fa-check" style="height:15px;width:15px;margin-right:7px;"></i>IP address copied!
      <br><i class="fa fa-copyright" style="height:15px;width:15px;margin-right:7px;margin-top:7px;"></i>Copyright '.date("Y").' '.$officialsiteowner.'
      </div>
  
      </p>
  </div>
  
<script>
        function jsCopyIpFuncion() {
            var copyText = document.getElementById("ipvalueinput");
            document.getElementById("ipvalueinput").style = "display: unset;";
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            document.getElementById("ipvalueinput").style = "display: none;";
            //alert("Link Kopiert!");
            document.getElementById("ipvalueinputcopy").style = "display: unset;";
            document.getElementById("footeroriginalcontent").style = "display: none;";
            
            setTimeout(function() {
                document.getElementById("ipvalueinputcopy").style = "display: none;";
                document.getElementById("footeroriginalcontent").style = "display: unset;";
            }, 2200);
        }
        function jsCopyTokenFuncion() {
            var copyText = document.getElementById("tokenvalueinput");
            document.getElementById("tokenvalueinput").style = "display: unset;";
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            document.getElementById("tokenvalueinput").style = "display: none;";
            //alert("Link Kopiert!");
            document.getElementById("tokenvalueinputcopy").style = "display: unset;";
            document.getElementById("footeroriginalcontent").style = "display: none;";
            
            setTimeout(function() {
                document.getElementById("tokenvalueinputcopy").style = "display: none;";
                document.getElementById("footeroriginalcontent").style = "display: unset;";
            }, 2200);
        }
</script>');
}

function loadDashboardNavBar($selected_btn = 1, $stepback = 0){
    if(!isset($_COOKIE["logintoken"]) || !isset($_COOKIE["username"]) || !iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"])){
        //header("Location: ../?loggout=true");
        echo('<meta http-equiv="refresh" content="0; url=../?loggout=true"/>');
        exit;
    }
    $userismobile = ismobile_class(true);
    defstyles();
    
    $sb = "";
    for ($x = 0; $x < $stepback; $x++) {
        $sb .= "../";
    }
    $nav = '
    <div class="navidiv">
        
    <a href="'.$sb.'"><div class="navibuttondivtitle" id="'.($selected_btn == 1 ? "navibuttondivtitleselected" : "").'"><label class="navibuttonlabeldivtitle">
            <i class="fa fa-dashboard" style="'. (!$userismobile ? "margin-right:3px;" : "height:25px;width:23px;").'"> 
            '. (!$userismobile ? "Dashboard" : "").'
        </i></label></div></a>    
        
        '. (ifuserisadmin_class($_COOKIE["username"]) ? (
            '<a href="'.$sb.'management/"><div class="navibuttondivtitle" id="'.($selected_btn == 2 ? "navibuttondivtitleselected" : "").'"><label class="navibuttonlabeldivtitle">
            <i class="fa fa-database" style="'. (!$userismobile ? "margin-right:3px;" : "height:25px;width:23px;").'"> 
            '. (!$userismobile ? "Management" : "").'
        </i></label></div></a>    
        ' ) : "") .'

        <a href="'.$sb.'module/"><div class="navibuttondivtitle" id="'.($selected_btn == 4 ? "navibuttondivtitleselected" : "").'"><label class="navibuttonlabeldivtitle">
            <i class="fa fa-modx" style="'. (!$userismobile ? "margin-right:3px;" : "height:25px;width:19px;margin-left:4px;").'"> 
            '. (!$userismobile ? "Modules" : "").'
        </i></label></div></a>

        <a href="'.$sb.'security/"><div class="navibuttondivtitle" id="'.($selected_btn == 3 ? "navibuttondivtitleselected" : "").'"><label class="navibuttonlabeldivtitle">
            <i class="fa fa-shield" style="'. (!$userismobile ? "margin-right:3px;" : "height:25px;width:19px;margin-left:4px;").'"> 
            '. (!$userismobile ? "Security" : "").'
        </i></label></div></a>
        
        <a href="'.$sb.'../?loggout=true"><div class="navibuttondivsignout"><label class="navibuttonlabeldivsignout">
            <i class="fa fa-sign-out" style="'. (!$userismobile ? "margin-right:6px;" : "height:25px;width:20.5px;margin-left:2.5px;").'"> 
            '. (!$userismobile ? "Logout" : "").'
        </i></label></div></a>    

        
        '.
            (getConfigValue("server_global_allow_theme_changing") == "1" ? ((!isset($_COOKIE["theme"]) || isset($_COOKIE["theme"]) && $_COOKIE["theme"] == "0") ? (
                '
                <a href="?theme=1"><div class="navibuttondivchangetheme"><label class="navibuttonlabeldivchangetheme">
                    <i class="fa fa-moon-o" style="'. (!$userismobile ? "margin-right:6px;height:25px;width:12px;padding-left:1.5px;padding-right:1.5px;" : "height:25px;width:17px;padding-left:1.5px;padding-right:1.5px;").'">
                </i></label></div></a> 
                '
            ) : (
                '
                <a href="?theme=0"><div class="navibuttondivchangetheme"><label class="navibuttonlabeldivchangetheme">
                    <i class="fa fa-lightbulb-o" style="'. (!$userismobile ? 'margin-right:6px;height:25px;width:12px;padding-left:1.5px;padding-right:1.5px;' : 'height:25px;width:17px;padding-left:1.5px;padding-right:1.5px;').'">
                    </i>
                </label></div></a> 
                '
                )) : "").'
    
    </div>
    <div style="display:flex;width:100%;height:55px;"></div>
    ';
   return $nav;
}

function getcountrycodes_class(){
    return json_decode('{
        "AF": "Afghanistan",
        "AX": "Aland Islands",
        "AL": "Albania",
        "DZ": "Algeria",
        "AS": "American Samoa",
        "AD": "Andorra",
        "AO": "Angola",
        "AI": "Anguilla",
        "AQ": "Antarctica",
        "AG": "Antigua And Barbuda",
        "AR": "Argentina",
        "AM": "Armenia",
        "AW": "Aruba",
        "AU": "Australia",
        "AT": "Austria",
        "AZ": "Azerbaijan",
        "BS": "Bahamas",
        "BH": "Bahrain",
        "BD": "Bangladesh",
        "BB": "Barbados",
        "BY": "Belarus",
        "BE": "Belgium",
        "BZ": "Belize",
        "BJ": "Benin",
        "BM": "Bermuda",
        "BT": "Bhutan",
        "BO": "Bolivia",
        "BA": "Bosnia And Herzegovina",
        "BW": "Botswana",
        "BV": "Bouvet Island",
        "BR": "Brazil",
        "IO": "British Indian Ocean Territory",
        "BN": "Brunei Darussalam",
        "BG": "Bulgaria",
        "BF": "Burkina Faso",
        "BI": "Burundi",
        "KH": "Cambodia",
        "CM": "Cameroon",
        "CA": "Canada",
        "CV": "Cape Verde",
        "KY": "Cayman Islands",
        "CF": "Central African Republic",
        "TD": "Chad",
        "CL": "Chile",
        "CN": "China",
        "CX": "Christmas Island",
        "CC": "Cocos (Keeling) Islands",
        "CO": "Colombia",
        "KM": "Comoros",
        "CG": "Congo",
        "CD": "Congo, Democratic Republic",
        "CK": "Cook Islands",
        "CR": "Costa Rica",
        "CI": "Cote D\"Ivoire",
        "HR": "Croatia",
        "CU": "Cuba",
        "CY": "Cyprus",
        "CZ": "Czech Republic",
        "DK": "Denmark",
        "DJ": "Djibouti",
        "DM": "Dominica",
        "DO": "Dominican Republic",
        "EC": "Ecuador",
        "EG": "Egypt",
        "SV": "El Salvador",
        "GQ": "Equatorial Guinea",
        "ER": "Eritrea",
        "EE": "Estonia",
        "ET": "Ethiopia",
        "FK": "Falkland Islands (Malvinas)",
        "FO": "Faroe Islands",
        "FJ": "Fiji",
        "FI": "Finland",
        "FR": "France",
        "GF": "French Guiana",
        "PF": "French Polynesia",
        "TF": "French Southern Territories",
        "GA": "Gabon",
        "GM": "Gambia",
        "GE": "Georgia",
        "DE": "Germany",
        "GH": "Ghana",
        "GI": "Gibraltar",
        "GR": "Greece",
        "GL": "Greenland",
        "GD": "Grenada",
        "GP": "Guadeloupe",
        "GU": "Guam",
        "GT": "Guatemala",
        "GG": "Guernsey",
        "GN": "Guinea",
        "GW": "Guinea-Bissau",
        "GY": "Guyana",
        "HT": "Haiti",
        "HM": "Heard Island & Mcdonald Islands",
        "VA": "Holy See (Vatican City State)",
        "HN": "Honduras",
        "HK": "Hong Kong",
        "HU": "Hungary",
        "IS": "Iceland",
        "IN": "India",
        "ID": "Indonesia",
        "IR": "Iran, Islamic Republic Of",
        "IQ": "Iraq",
        "IE": "Ireland",
        "IM": "Isle Of Man",
        "IL": "Israel",
        "IT": "Italy",
        "JM": "Jamaica",
        "JP": "Japan",
        "JE": "Jersey",
        "JO": "Jordan",
        "KZ": "Kazakhstan",
        "KE": "Kenya",
        "KI": "Kiribati",
        "KR": "Korea",
        "KP": "North Korea",
        "KW": "Kuwait",
        "KG": "Kyrgyzstan",
        "LA": "Lao People\"s Democratic Republic",
        "LV": "Latvia",
        "LB": "Lebanon",
        "LS": "Lesotho",
        "LR": "Liberia",
        "LY": "Libyan Arab Jamahiriya",
        "LI": "Liechtenstein",
        "LT": "Lithuania",
        "LU": "Luxembourg",
        "MO": "Macao",
        "MK": "Macedonia",
        "MG": "Madagascar",
        "MW": "Malawi",
        "MY": "Malaysia",
        "MV": "Maldives",
        "ML": "Mali",
        "MT": "Malta",
        "MH": "Marshall Islands",
        "MQ": "Martinique",
        "MR": "Mauritania",
        "MU": "Mauritius",
        "YT": "Mayotte",
        "MX": "Mexico",
        "FM": "Micronesia, Federated States Of",
        "MD": "Moldova",
        "MC": "Monaco",
        "MN": "Mongolia",
        "ME": "Montenegro",
        "MS": "Montserrat",
        "MA": "Morocco",
        "MZ": "Mozambique",
        "MM": "Myanmar",
        "NA": "Namibia",
        "NR": "Nauru",
        "NP": "Nepal",
        "NL": "Netherlands",
        "AN": "Netherlands Antilles",
        "NC": "New Caledonia",
        "NZ": "New Zealand",
        "NI": "Nicaragua",
        "NE": "Niger",
        "NG": "Nigeria",
        "NU": "Niue",
        "NF": "Norfolk Island",
        "MP": "Northern Mariana Islands",
        "NO": "Norway",
        "OM": "Oman",
        "PK": "Pakistan",
        "PW": "Palau",
        "PS": "Palestinian Territory, Occupied",
        "PA": "Panama",
        "PG": "Papua New Guinea",
        "PY": "Paraguay",
        "PE": "Peru",
        "PH": "Philippines",
        "PN": "Pitcairn",
        "PL": "Poland",
        "PT": "Portugal",
        "PR": "Puerto Rico",
        "QA": "Qatar",
        "RE": "Reunion",
        "RO": "Romania",
        "RU": "Russian Federation",
        "RW": "Rwanda",
        "BL": "Saint Barthelemy",
        "SH": "Saint Helena",
        "KN": "Saint Kitts And Nevis",
        "LC": "Saint Lucia",
        "MF": "Saint Martin",
        "PM": "Saint Pierre And Miquelon",
        "VC": "Saint Vincent And Grenadines",
        "WS": "Samoa",
        "SM": "San Marino",
        "ST": "Sao Tome And Principe",
        "SA": "Saudi Arabia",
        "SN": "Senegal",
        "RS": "Serbia",
        "SC": "Seychelles",
        "SL": "Sierra Leone",
        "SG": "Singapore",
        "SK": "Slovakia",
        "SI": "Slovenia",
        "SB": "Solomon Islands",
        "SO": "Somalia",
        "ZA": "South Africa",
        "GS": "South Georgia And Sandwich Isl.",
        "ES": "Spain",
        "LK": "Sri Lanka",
        "SD": "Sudan",
        "SR": "Suriname",
        "SJ": "Svalbard And Jan Mayen",
        "SZ": "Swaziland",
        "SE": "Sweden",
        "CH": "Switzerland",
        "SY": "Syrian Arab Republic",
        "TW": "Taiwan",
        "TJ": "Tajikistan",
        "TZ": "Tanzania",
        "TH": "Thailand",
        "TL": "Timor-Leste",
        "TG": "Togo",
        "TK": "Tokelau",
        "TO": "Tonga",
        "TT": "Trinidad And Tobago",
        "TN": "Tunisia",
        "TR": "Turkey",
        "TM": "Turkmenistan",
        "TC": "Turks And Caicos Islands",
        "TV": "Tuvalu",
        "UG": "Uganda",
        "UA": "Ukraine",
        "AE": "United Arab Emirates",
        "GB": "United Kingdom",
        "US": "United States",
        "UM": "United States Outlying Islands",
        "UY": "Uruguay",
        "UZ": "Uzbekistan",
        "VU": "Vanuatu",
        "VE": "Venezuela",
        "VN": "Vietnam",
        "VG": "Virgin Islands, British",
        "VI": "Virgin Islands, U.S.",
        "WF": "Wallis And Futuna",
        "EH": "Western Sahara",
        "YE": "Yemen",
        "ZM": "Zambia",
        "ZW": "Zimbabwe"
      }');
    //return json_decode(file_get_contents("https://techgrief.github.io/sqlware/public/countrycodes.json"));
}
function userhasblockedthiscountry($usernn, $currentcountrycode){
    //echo("S->".$usernn."->".$currentcountrycode);
    /*$cip = getclientip_class();*/
    /*$ccc = ip_info($cip, "Country Code");*/
    /*$ccpath = __DIR__."\countrycodes.json";*/
    /*$array = json_decode(file_get_contents($ccpath)); */
    if($currentcountrycode == "KP")
    return true;
    if($currentcountrycode == "CN")
    return true;

    $cfound = false;
    $cccblockedbyuser = explode(",", getblockedcountrycode_class($usernn));
    /*foreach($array as $key => $value) {*/
        foreach($cccblockedbyuser as $zitm) {
            if($currentcountrycode == $zitm)
            $cfound = true;
            if($cfound) break;
        }
        /*if($cfound) break;*/
    /*}*/
    return $cfound;
}
function getblockedcountrycode_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern)){
        $stmt = $mysql->prepare('SELECT blockedcountrys FROM `user` WHERE username = :un');
        $stmt->bindParam(":un", $usern);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            $bcl = $row["blockedcountrys"];
            return $bcl;
        }else{
            return "KP";
        }
    }else{
        return "KP";
    }
}
function blockloginforcountry_class($usern, $countrycode){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern) && !userhasblockedthiscountry($usern, $countrycode) && glogch()){
        $stmt2 = $mysql->prepare('SELECT blockedcountrys FROM `user` WHERE username = :un');
        $stmt2->bindParam(":un", $usern);
        $stmt2->execute();
        $count2 = $stmt2->rowCount();
        $sw = "";
        if ($count2 !== 0) {
            $row2 = $stmt2->fetch();
            if($row2["blockedcountrys"] != "") $sw = ",";

            $stmt = $mysql->prepare('UPDATE `user` SET `blockedcountrys` = :newbc WHERE `username` = :unn');
            $sew = $row2["blockedcountrys"].$sw . $countrycode;
            $stmt->bindParam(":newbc", $sew);
            $stmt->bindParam(":unn", $usern);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0) {
                return true;
            }
            return false;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function unblockloginforcountry_class($usern, $countrycode){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern) && glogch()){
        $stmt2 = $mysql->prepare('SELECT blockedcountrys FROM `user` WHERE username = :un');
        $stmt2->bindParam(":un", $usern);
        $stmt2->execute();
        $count2 = $stmt2->rowCount();
        if ($count2 !== 0) {
            $row2 = $stmt2->fetch();
            $art = explode(",", getblockedcountrycode_class($usern));
            $rt = "xx1xx";
            if(in_array($countrycode, $art)){

                /*if(in_array($countrycode.",", $art))
                    $rt = $countrycode.",";
                else if(in_array(",".$countrycode, $art))
                    $rt = ",".$countrycode;
                else*/
                    $rt = $countrycode;

                $ns = str_replace($rt, "", $row2["blockedcountrys"]);
                $ns = str_replace(",,", ",", $ns);
                if(substr($ns, 0, 1) === ","){
                    $ns = substr($ns, 1);
                }
                
                if(substr($ns, -1) === ","){
                    $ns = substr_replace($ns ,"",-1);
                }
                
                $stmt = $mysql->prepare('UPDATE `user` SET `blockedcountrys` = :newbc WHERE `username` = :unn');
                $stmt->bindParam(":newbc", $ns);
                $stmt->bindParam(":unn", $usern);
                $stmt->execute();
                $count = $stmt->rowCount();
                //echo("UPDATE `user` SET `blockedcountrys` =  $ns WHERE `username` = $usern");
                if ($count == 0) {
                    return false;
                }
                else return true;
            }else
            return false;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function createconfigdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("config")){
        $stmt = $mysql->prepare('CREATE TABLE `config`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `name` TINYTEXT NULL DEFAULT NULL,
            `value` TEXT NULL DEFAULT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createclientsdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("clients")){
        $stmt = $mysql->prepare('CREATE TABLE `clients`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NULL DEFAULT NULL,
            `name` TINYTEXT NOT NULL DEFAULT \'Client\',
            `token` TINYTEXT NULL DEFAULT NULL,
            `creationdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `lastshare` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `totalshares` INT NULL DEFAULT NULL,
            `details` TEXT NULL DEFAULT NULL,
            `sharesettings` JSON NULL DEFAULT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createauthconfigdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("authconfig")){
        $stmt = $mysql->prepare('CREATE TABLE `authconfig`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NOT NULL,
            `googleauth` BOOLEAN NULL DEFAULT NULL,
            `googleseed` VARCHAR(32) NOT NULL,
            `mailauth` BOOLEAN NULL DEFAULT NULL,
            `mailaddress` VARCHAR(255) NOT NULL,
            `mailcode` VARCHAR(6) NOT NULL,
            `mailtime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `webauth` BOOLEAN NULL DEFAULT NULL,
            `webkey` VARCHAR(6) NOT NULL DEFAULT \'123456\',
            `webtime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `backupauth` BOOLEAN NULL DEFAULT NULL,
            `backupcode` VARCHAR(64) NOT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createpresenterboardmoduledb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("presenterboardmodule")){
        $stmt = $mysql->prepare('CREATE TABLE `presenterboardmodule`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NOT NULL,
            `name` TINYTEXT NULL DEFAULT "P1",
            `imgurl` TEXT NULL DEFAULT "https://source.unsplash.com/random/16:9",
            `delay` INT NULL DEFAULT 5000,
            `forcereload` BOOLEAN NULL DEFAULT NULL,
            `fit` BOOLEAN NULL DEFAULT 1,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createpresentertemplatemoduledb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("presentertemplatemodule")){
        $stmt = $mysql->prepare('CREATE TABLE `presentertemplatemodule`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NOT NULL,
            `templatename` TINYTEXT NULL DEFAULT "TMP xxx",
            `imgurllist` TEXT NOT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createurlshortenerdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("urlshortener")){
        $stmt = $mysql->prepare('CREATE TABLE `urlshortener`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NOT NULL,
            `views` BIGINT NULL DEFAULT 0,
            `url` TEXT NULL DEFAULT "https://google.com/",
            `alias` TEXT NOT NULL,
            `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createurlshortener_apidb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("urlshortener_api")){
        $stmt = $mysql->prepare('CREATE TABLE `urlshortener_api`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `user` TINYTEXT NULL DEFAULT "none",
            `views` BIGINT NULL DEFAULT 0,
            `max_views` BIGINT NULL DEFAULT -1,
            `url` TINYTEXT NULL DEFAULT "https://google.com/",
            `alias` TINYTEXT NOT NULL,
            `not_mail` TINYTEXT NULL DEFAULT NULL,
            `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `save_ip` BOOLEAN NULL DEFAULT NULL,
            `woopra_project_name` TINYTEXT NOT NULL,
            `ips` JSON NULL DEFAULT "[]",
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createuserpwresettokensdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("userpwresettokens")){
        $stmt = $mysql->prepare('CREATE TABLE `userpwresettokens`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NULL DEFAULT NULL,
            `token` TINYTEXT NULL DEFAULT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createuserdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("user")){
        $stmt = $mysql->prepare('CREATE TABLE `user`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `username` TINYTEXT NOT NULL,
            `mail` TINYTEXT NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `creationdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `lastseen` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `admin` BOOLEAN NULL DEFAULT NULL,
            `banned` BOOLEAN NULL DEFAULT NULL,
            `blockedcountrys` TEXT NOT NULL,
            `uploadservice` TINYTEXT NULL DEFAULT :ups,
            `pspdfkitkey` TINYTEXT NULL DEFAULT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB');

        $stmt->bindParam(":ups", get_supported_clouds()[0]);
        $stmt->execute();
        return true;
    }
    return false;
}
/*function createpaycryptoapisdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("paycryptoapis")){
        $stmt = $mysql->prepare('CREATE TABLE `paycryptoapis`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NOT NULL,
            `label` TINYTEXT NOT NULL DEFAULT \'MyApi\',
            `apikey` TINYTEXT NULL DEFAULT \'error.Contact.Support.Please\',
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}
function createpaycryptotransactionsdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("paycryptotransactions")){
        $stmt = $mysql->prepare('CREATE TABLE `paycryptotransactions`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NULL DEFAULT NULL,
            `fullcoinname` TINYTEXT NULL DEFAULT \'Ravencoin\',
            `coinnameabbr` TINYTEXT NOT NULL DEFAULT \'rvn\',
            `coinaddress` TINYTEXT NOT NULL DEFAULT \'RHqDRsgwKFRduSgeFY9pGByb6VbRZGeBUh\',
            `coinsourceaddress` TINYTEXT NOT NULL DEFAULT NULL,
            `coinmemo` TINYTEXT NULL DEFAULT NULL,
            `coinnetwork` TINYTEXT NULL DEFAULT "Ravencoin",
            `txid` TINYTEXT NULL DEFAULT NULL,
            `creationtime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `closedate` TIMESTAMP NULL DEFAULT NULL,
            `price` TINYTEXT NOT NULL DEFAULT \'1\',
            `infinitydonation` BOOLEAN NULL DEFAULT NULL,
            `label` TINYTEXT NOT NULL DEFAULT \'Invoice xxx\',
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB;');
        $stmt->execute();
        return true;
    }
    return false;
}*/
if(isset($_GET["ipinfo"])){
    echo "<center><label style='font-size:16px;font-weight:bold;font-family: Georgia, serif;line-height:23px;'>";
    echo "++++++++++++++++++IP-Info-Test-++++++++++++++++++<br>";
    foreach (ip_info("127.0.0.1", "ping", true) as $key => $value) {
        echo "<label style='color:green'>$key</label> -> <label style='color:indianred'>$value</label><br>";
    }
    for ($i=1; $i < 6; $i++) { 
        echo "<br>";
        foreach (ip_info("127.0.0.1", "ping", true, $i) as $key => $value) {
            echo "<label style='color:green'>$key</label> -> <label style='color:indianred'>$value</label><br>";
        }
    }
    echo "++++++++++++++++++IP-Info-Test-++++++++++++++++++</label></center><br>";
}

function ip_info($ip = "127.0.0.1", $purpose = "location", $returnarray = false, $newmeth = null) {
    $purpose=strtolower($purpose);
    $start=hrtime(true);

    if($ip == "localhost") $ip="127.0.0.1";
    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) )
    {
        $ip = preg_replace('/\s+/', '',file_get_contents("http://icanhazip.com/"));
    }

    if(isset($GLOBALS["globalarray-$ip"]) && $newmeth == null){
        $output = $purpose;
        if($purpose == "countrycode") 
            $output = $GLOBALS["globalarray-$ip"]["countrycode"];
        else if($purpose == "country")
            $output = $GLOBALS["globalarray-$ip"]["country"];
        else if($purpose == "timezone")
            $output = $GLOBALS["globaglobalarray-$iplarray"]["timezone"];
        else if($purpose == "isp")
            $output = $GLOBALS["globalarray-$ip"]["isp"];
        
        if(!$returnarray) return $output;
        else return $GLOBALS["globalarray-$ip"];

        exit;
    }else{
        $method = 5;
        if($newmeth !== null)$method = $newmeth;
        /*
        ip-api.com (1)
        iplocate.io (2)
        weatherapi.com (3) [Api Key requiered - 1mio/month]
        rapidapi.com/ipregistry3-ipregistry/api/ip-geolocation-and-threat-detection (4) [Api Key requiered - 1,5k/day]
        ipinfo.io (5) [Api Key requiered - 50k/month]
        */

        //test speed with = curl -o i.php -s -w "%{time_total}\n" http://192.168.0.30/panel/index.php

        /*if($purpose == "ping"){ //simple ping test -> Call "?ipping" anywhere: Example: localhost/panel?ipping
            echo "ip-api.com -> ".exec("ping -n 1 ip-api.com 2>&1", $ping_time)."<br>";
            echo "iplocate.io -> ".exec("ping -n 1 iplocate.io 2>&1", $ping_time)."<br>";
            echo "api.weatherapi.com -> ".exec("ping -n 1 api.weatherapi.com 2>&1", $ping_time)."<br>";
            echo "ip-geolocation-and-threat-detection.p.rapidapi.com (api.ipregistry.co) -> UNKNOWN ? <br>";
            echo "ipinfo.io -> ".exec("ping -n 1 ipinfo.io 2>&1", $ping_time)."<br>";

            echo "<br>Test Now: Method $method, ip $ip:<br>";
        }*/

        $globalarray = array();
        $globalarray["method"] = $method;
        if($method == 1){
            $dw = file_get_contents("http://ip-api.com/php/" . $ip);
            $downjson = unserialize($dw);
            $output = "";

            $globalarray["countrycode"] = (isset($downjson["countryCode"]) ? $downjson["countryCode"] : "LC");
            $globalarray["country"] = (isset($downjson["country"]) ? $downjson["country"] : "localhost");
            $globalarray["timezone"] = (isset($downjson["timezone"]) ? $downjson["timezone"] : "Unknown/Local");
            $globalarray["isp"] = (isset($downjson["isp"]) ? $downjson["isp"] : "Unknown");


        }else if($method == 3){
            $weatherapi_key = "71bd2b80c0244e0898b41618221907"; //Please, get your own key @ https://www.weatherapi.com/
            $dw = file_get_contents("https://api.weatherapi.com/v1/ip.json?key=$weatherapi_key&q=$ip", false, stream_context_create(array('http' => array('ignore_errors' => true), )));
            $downjson = json_decode($dw);
            $output = "";
            $globalarray["countrycode"] = (isset($downjson->country_code) ? $downjson->country_code : "LC");
            $globalarray["country"] = (isset($downjson->country_name) ? $downjson->country_name : "localhost");
            $globalarray["timezone"] = (isset($downjson->tz_id) ? $downjson->tz_id : "Unknown/Local");
            $globalarray["isp"] = "Unknown";


        }else if($method == 4){
            $ipgeolocdet_key = "854b1c8902msh440617a373ff2fap13e8ffjsnf4a8442b9c53"; //Please, get your own key @ https://rapidapi.com/ipregistry3-ipregistry/api/ip-geolocation-and-threat-detection/
            $output = "";

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://ip-geolocation-and-threat-detection.p.rapidapi.com/$ip",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: ip-geolocation-and-threat-detection.p.rapidapi.com",
                    "X-RapidAPI-Key: $ipgeolocdet_key"
                ],
            ]);
            $downjson = json_decode(curl_exec($curl));
            curl_close($curl);
            
            $globalarray["countrycode"] = (isset($downjson->{'location'}->{'country'}->code) ? $downjson->{'location'}->{'country'}->code : "LC");
            $globalarray["country"] = (isset($downjson->{'location'}->{'country'}->name) ? $downjson->{'location'}->{'country'}->name : "localhost");
            $globalarray["timezone"] = (isset($downjson->{'time_zone'}->id) ? $downjson->{'time_zone'}->id : "Unknown/Local");
            $globalarray["isp"] = (isset($downjson->{'connection'}->organization) ? $downjson->{'connection'}->organization : "Unknown");


        }else if($method == 5){
            $ipinfo_key = "578f1135cf09fc"; //Please, get your own key @ https://ipinfo.io/account/token
            $dw = file_get_contents("https://ipinfo.io/$ip?token=$ipinfo_key", false, stream_context_create(array('http' => array('ignore_errors' => true), )));
            $downjson = json_decode($dw);
            $output = "";
            $globalarray["countrycode"] = (isset($downjson->country) ? $downjson->country : "LC");
            if(isset($downjson->country)) $cc = $downjson->country; else $cc = "LC";
            $globalarray["country"] = (isset(getcountrycodes_class()->$cc) ? getcountrycodes_class()->$cc : "localhost");
            $globalarray["timezone"] = (isset($downjson->timezone) ? $downjson->timezone : "Unknown/Local");
            $globalarray["isp"] = (isset($downjson->org) ? $downjson->org : "Unknown/Local");



        }else {
            $dw = file_get_contents("https://www.iplocate.io/api/lookup/$ip");
            $downjson = json_decode($dw);
            $output = "";
            
            $globalarray["countrycode"] = (isset($downjson->country_code) ? $downjson->country_code : "LC");
            $globalarray["country"] = (isset($downjson->country) ? $downjson->country : "localhost");
            $globalarray["timezone"] = (isset($downjson->time_zone) ? $downjson->time_zone : "Unknown/Local");
            $globalarray["isp"] = (isset($downjson->org) ? $downjson->org : "Unknown");
        }
        $end=hrtime(true);
        $eta=$end-$start;
        $globalarray["latency"] = $eta/1e+6; //nanoseconds to milliseconds
        $globalarray["ip"] = $ip;
        
        $GLOBALS["globalarray-$ip"] = $globalarray;

        if($purpose == "countrycode") 
            $output = $globalarray["countrycode"];
        else if($purpose == "country")
            $output = $globalarray["country"];
        else if($purpose == "timezone")
            $output = $globalarray["timezone"];
        else if($purpose == "isp")
            $output = $globalarray["isp"];
            
        if(!$returnarray) return $output;
        else return $globalarray;
    }

    

    return null;
}
function createlogintokensdb_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(!tableexists_class("logintokens")){
        $stmt = $mysql->prepare('CREATE TABLE `logintokens`(
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `userid` BIGINT NOT NULL,
            `token` TINYTEXT NULL DEFAULT NULL,
            `ip` TINYTEXT NOT NULL DEFAULT "1.0.0.1",
            PRIMARY KEY(`id`)
        ) ENGINE = INNODB');
        $stmt->execute();
        return true;
    }
    return false;
}
function tableexists_class($tablename){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    if(isset($tablename)){
        require("mysql.php");   
        $stmt = $mysql->prepare('SHOW TABLES LIKE :tname');
        $stmt->bindParam(":tname", $tablename);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }
    return false;
}
$bgimagetmp="";

function loadwindowwidthandheighttocookie($forcereload = false){
    if(!isset($_COOKIE["window_width"]) || !isset($_COOKIE["window_height"]) || !isset($_COOKIE["signinup_bgimgurl"]) || $forcereload){
        echo "<script type=\"text/javascript\">
        document.cookie = 'window_width='+window.innerWidth+'; max-age=3600;path=/';
        document.cookie = 'window_height='+window.innerHeight+'; max-age=3600;path=/';
        document.cookie = 'signinup_bgimgurl=https://source.unsplash.com/random/'+(window.innerWidth/4) + 'x' + (window.innerHeight/4)+'?Forest; max-age=3600;path=/';
     </script>";

     if(!isset($_COOKIE["username"]) || !isset($_COOKIE["logintoken"]))
     echo('<meta http-equiv="refresh" content="0.1;url=." />');
     else
     echo('<meta http-equiv="refresh" content="0.1;url=." />');
    //setcookie("bgimageurl",$bgimagetmp,time()+(3600*1));
    }/*else
    $bgimagetmp = 'https://source.unsplash.com/random/'.($_COOKIE["window_width"]/4).'x'.($_COOKIE["window_height"]/4)."?Forest";*/
}
function loadwindowwidthandheighttocookienologin($forcereload = false){
    if(!isset($_COOKIE["window_width"]) || !isset($_COOKIE["window_height"]) || !isset($_COOKIE["signinup_bgimgurl"]) || $forcereload){
        echo "<script type=\"text/javascript\">
        document.cookie = 'window_width='+window.innerWidth+'; max-age=3600;path=/';
        document.cookie = 'window_height='+window.innerHeight+'; max-age=3600;path=/';
        document.cookie = 'signinup_bgimgurl=https://source.unsplash.com/random/'+(window.innerWidth/4) + 'x' + (window.innerHeight/4)+'?Forest; max-age=3600;path=/';
     </script>";

     echo('<meta http-equiv="refresh" content="0.1;url=." />');
    //setcookie("bgimageurl",$bgimagetmp,time()+(3600*1));
    }/*else
    $bgimagetmp = 'https://source.unsplash.com/random/'.($_COOKIE["window_width"]/4).'x'.($_COOKIE["window_height"]/4)."?Forest";*/
}
function getclientip_class() {
    if(isset($GLOBALS["cip"])){
        return $GLOBALS["cip"];
    }
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'false';
        if($ipaddress=="::1") $ipaddress="localhost";
    $GLOBALS["cip"] = $ipaddress;
    return $ipaddress;
}

function iftokenanduserandiptrue_class($token, $usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    if(!isset($GLOBALS["iftokenanduserandiptrue"])){
        $cips = getclientip_class();
        if(getlogintoken_class($usern) == $token && tokencontainsip($usern,$token, $cips)){
            require("mysql.php");
            $stmt = $mysql->prepare('UPDATE `user` SET `lastseen` = CURRENT_TIMESTAMP WHERE `username` = :uuid');
            $stmt->bindParam(":uuid", $usern);
            $stmt->execute();
            if(userhasblockedthiscountry($usern, ip_info($cips, "countrycode")))
            $GLOBALS["iftokenanduserandiptrue"] = false;
            else
            $GLOBALS["iftokenanduserandiptrue"] = true;
        }
        else $GLOBALS["iftokenanduserandiptrue"] = false;
    }
    return $GLOBALS["iftokenanduserandiptrue"];

}

function changeuserpw($usern, $oldpw,$newpw){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern) && isset($oldpw) && isset($newpw) && userlogin_class($usern, $oldpw)){
        $phash = password_hash($newpw, PASSWORD_BCRYPT);
        $stmt = $mysql->prepare('UPDATE `user` SET `password`=:npw WHERE username = :unm');
        $stmt->bindParam(":npw", $phash);
        $stmt->bindParam(":unm", $usern);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            if(userlogin_class($usern, $newpw)) return true;
            else return false;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function ifServiceForUserEnabled($username = null){
    if(isset($username) && $username !== null && ifuserisadmin_class($usename)) return true;
    else if (getConfigValue("server_service_enabled") == "1") return true;
    else return false;
}
function getConfigValue($namz){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($namz) && tableexists_class("config")){
        $stmt = $mysql->prepare('SELECT * FROM `config` WHERE name = :namu');
        $stmt->bindParam(":namu", $namz);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["value"];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function updateConfigValue($namz, $value){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($namz) && isset($value)){
        $uid = getuserid_class($namz);
        $stmt = $mysql->prepare('UPDATE `config` SET `value` = :valu WHERE `name` = :namu');
        $stmt->bindParam(":valu", $value);
        $stmt->bindParam(":namu", $namz);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function insertConfigValue($namz, $value){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($namz) && isset($value)){
        $stmtx = $mysql->prepare('SELECT * FROM `config` WHERE name = :namu');
        $stmtx->bindParam(":namu", $namz);
        $stmtx->execute();
        $countx = $stmtx->rowCount();
        if ($countx == 0) {
            $uid = getuserid_class($namz);
            $stmt = $mysql->prepare('INSERT INTO `config` (`id`, `name`, `value`) VALUES (NULL, :namu, :valu)');
            $stmt->bindParam(":namu", $namz);
            $stmt->bindParam(":valu", $value);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0) {
                return true;
            }else{
                return false;
            }
        }else return false;
    }else{
        return false;
    }
}
function popup_box_select_api_url_shortener(){
    $method = getConfigValue("api_url_shortener");
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> API for URL Shortener
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get">
            
                <!--<input type="hidden" name="mail_config_method" value="method">-->
                
                <select required name="api_url_shortener" id="popup1argoogle" class="famethoddesc">
                '.($method == "1" 
                ? '<option value="1">Enabled</option><option value="0">Disable</option>' 
                : '><option value="0">Disabled</option><option value="1">Enable</option>').'
                </select>

                <!--
                <input required name="mail_config_method" id="popup1argoogle" class="famethoddesc" type="number" spellcheck="false" autofocus="autofocus">
                -->
                
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            <b><u><h2>Guide</h2></u></b>

            <h3 style="margin-top:-15px;">
            1. <a href="../../../api_url_shortener?mysql_cfg=auto" target="_blank" style="color:'.$GLOBALS["c2"].'">Open quick Setup (click here)</a><br>The Setup will try to sync your database config with each other and configure a few other variables for you</a>
            
            <br><br>2. Look in the folder <i>api_url_shortener</i>. <br>In there are all the files you need for the API.<br><br><u>More information and Configuration can be found in the index file!</u><br><br>

            </h3>


        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function popup_box_input($configname, $title, $icon, $default = null, $onlynum = 0){
    $textx = getConfigValue($configname);
    if($default !== null) $textx = $default;
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> '.$title.'
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get">
            
            <i class="fa fa-'.$icon.'" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                
                <input value="'.$textx.'" required name="'.$configname.'" id="popup1argoogle" class="famethoddesc" type="'.($onlynum ==  1 ? "number" : "text").'" spellcheck="false" autofocus="autofocus">
                
                
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function popup_box_input_import2c($tempid){
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> Import List
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get">
            
            <i class="fa fa-code" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                
                <input value="'.$tempid.'" required name="importlist" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus" style="display:none">
                <input value="" required name="importlistdata" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                
                
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function popup_box_input_2values($templateid, $pos){
    if(glogch())
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> Image or Video URL
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get">
            
            <i class="fa fa-link" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                
                <input value="" required name="addtemplateimg" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                <input value="'.$templateid.'" name="addtemplateid" type="hidden">
                <input value="'.$pos.'" name="insert_position" type="hidden">
                
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function popup_box_input_2values_big($templateid, $pos){
    if(glogch())
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> Custom TEXT
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get" id="usrform" style="display: block;">
                
                <!--<input value="" required name="addtemplateimg" id="popup1argoogle" class="famethoddesc" type="textarea" spellcheck="false" autofocus="autofocus">-->
                <input value="'.$templateid.'" name="addtemplateid" type="hidden">

                <textarea required placeholder="Your Text" style="display: block;height: 250px;max-height: 250px;min-height: 250px;min-width:100%;white-space: normal; text-align: justify; -moz-text-align-last: center; /* Firefox 12+ */ text-align-last: center;" form="usrform" spellcheck="false" autofocus="autofocus" name="addtemplatetext" id="popup1argoogle" class="famethoddesc"></textarea>

                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
                <input value="'.$pos.'" name="insert_position" type="hidden">
                
                <!--<input style="display: block;margin-top:10px;" placeholder="Insert Position" name="insert_position" id="popup1argoogle" class="famethoddesc" type="number" spellcheck="false" autofocus="autofocus">
                -->
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function popup_box_input_change_theme(){
    //$textx = getConfigValue($configname);
    echo('
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle) :not(.famethoddesc){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:1px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      //background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:left;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
      font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        //background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            display:flex;
            color: '.$GLOBALS["c2"].';
            //background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:28px;
            outline:none;
            border:2px solid transparent;
            width:100%;
            border-radius:8px;
            font-weight:bold;
            caret-color: '.$GLOBALS["c2"].';
            color: '.$GLOBALS["c2"].';
            height:46px;
            padding-left:5px;
            margin-top:4px;
            display:block;
            margin-right:3px;
            margin-left:2px;
        }
        .famethoddesc:hover{
            border:2px solid transparent;
        }
        
    </style>

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> Change Global Theme
        </p>

        <div class="popup_close" id="popup1ar" onclick="redirecturl(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>


    <form class="famethod" action="index.php" method="get">
            
	<table style="width:380px;" class="font1" id="popup1argoogle">

            <tr id="popup1argoogle">
            <td id="popup1argoogle" style="padding-left:4px;font-size:24px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;color:grey;color:'.getConfigValue("theme_default_c2").';text-shadow: 2px 2px 4px '.getConfigValue("theme_default_c7").';">C2 (Accent color)</td>
            </tr>
            <tr id="popup1argoogle">
                <td id="popup1argoogle">
                    <input value="'.getConfigValue("theme_default_c2").'" required name="set_default_global_theme_c2" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                </td>
            </tr>
            
            <tr id="popup1argoogle">
            <td id="popup1argoogle" style="padding-left:4px;font-size:24px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;color:grey;color:'.getConfigValue("theme_default_c6").';text-shadow: 2px 2px 4px '.getConfigValue("theme_default_c2").';">C6 (Nav Background)</td>
            </tr>
            <tr id="popup1argoogle">
                <td id="popup1argoogle">
                    <input value="'.getConfigValue("theme_default_c6").'" required name="set_default_global_theme_c6" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                </td>
            </tr>
            
            <tr id="popup1argoogle">
            <td id="popup1argoogle" style="padding-left:4px;font-size:24px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;color:grey;color:'.getConfigValue("theme_default_c7").';text-shadow: 2px 2px 4px '.getConfigValue("theme_default_c2").';">C7 (Nav-Btn Background)</td>
            </tr>
            <tr id="popup1argoogle">
                <td id="popup1argoogle">
                    <input value="'.getConfigValue("theme_default_c7").'" required name="set_default_global_theme_c7" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                </td>
            </tr>
            
            <tr id="popup1argoogle">
            <td id="popup1argoogle" style="padding-left:4px;font-size:24px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;color:grey;color:'.getConfigValue("theme_default_c10").';text-shadow: 2px 2px 4px '.getConfigValue("theme_default_c2").';">C10 (Background)</td>
            </tr>
            <tr id="popup1argoogle">
                <td id="popup1argoogle">
                    <input value="'.getConfigValue("theme_default_c10").'" required name="set_default_global_theme_c10" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                </td>
            </tr>

<!--
            <div style="width:100%;">
            <label id="popup1argoogle" style="margin-left:0;font-size:24px;border:2px solid transparent;padding-top:5px;width:50px;border-radius:8px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;">C2</label>
            <input value="'."indianred".'" required name="c2" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
            </div>
                
            

            <div style="width:100%;">
            <label id="popup1argoogle" style="margin-left:0;font-size:24px;border:2px solid transparent;padding-top:5px;width:50px;border-radius:8px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;">C2</label> 
            <input value="'."indianred".'" required name="c2" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
            </div>
-->

    </table>

            <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;"> 
            </form>

        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function tokencontainsip($usern, $token,$ip){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($token)){
        $uid = getuserid_class($usern);
        $stmt = $mysql->prepare('SELECT * FROM `logintokens` WHERE token = :tkn AND ip = :uip AND userid = :uuid');
        $stmt->bindParam(":tkn", $token);
        $stmt->bindParam(":uip", $ip);
        $stmt->bindParam(":uuid", $uid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function deleteusertoken_class($usern, $tokens){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($tokens) && isset($usern) && glogch()){
        $uid = getuserid_class($usern);
        $stmt = $mysql->prepare('DELETE FROM `logintokens` WHERE token = :tkn AND userid = :uuid');
        $stmt->bindParam(":tkn", $tokens);
        $stmt->bindParam(":uuid", $uid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function deleteallusertoken_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern) && glogch() && $usern == $_COOKIE["username"]){
        $uid = getuserid_class($usern);
        $stmt = $mysql->prepare('DELETE FROM `logintokens` WHERE userid = :uuid');
        $stmt->bindParam(":uuid", $uid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function getalllogintokenips_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern) && glogch() && $usern == $_COOKIE["username"]){
        $uid = getuserid_class($usern);
        $stmt = $mysql->prepare('SELECT ip,token FROM `logintokens` WHERE userid = :uuid');
        $stmt->bindParam(":uuid", $uid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return $stmt;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


function ifnulluser_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `user`');
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 0) {
            return true;
        }else{
            return false;
        }
}

function getlogintokenip_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern)){
        $uid = getuserid_class($usern);
        $stmt = $mysql->prepare('SELECT * FROM `logintokens` WHERE userid = :userid');
        $stmt->bindParam(":userid", $uid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["ip"];
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}
function getlogintoken_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern)){
        $uid = getuserid_class($usern);
        $stmtx = $mysql->prepare('SELECT * FROM `logintokens` WHERE userid = :userid AND ip = :uip');
        $stmtx->bindParam(":userid", $uid);
        $gip = getclientip_class();
        if($gip == "false") $gip = "1.0.0.1";
        $stmtx->bindParam(":uip", $gip);
        //echo("ip[".$gip."]");
        $stmtx->execute();
        $count = $stmtx->rowCount();
        if ($count !== 0) {
            $row = $stmtx->fetch();
            return $row["token"];
        }else{
            return "none";
        }
    }else{
        return "error";
    }
}

function userlogin_class($usern, $pw){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern) && isset($pw)){
        $stmt = $mysql->prepare('SELECT * FROM `user` WHERE username = :un');
        $stmt->bindParam(":un", $usern);
        $stmt->execute();
        $count = $stmt->rowCount();
        $cip = getclientip_class();
        if(userhasblockedthiscountry($usern, ip_info($cip, "countrycode")))
        return false;
        else if ($count == 1) {
            $row = $stmt->fetch();
            if(password_verify($pw, $row["password"])){
                $lgntoken = getlogintoken_class($usern);
                if($lgntoken == "none"){
                    $stmt3 = $mysql->prepare('INSERT INTO `logintokens` (`id`, `userid`, `token`, `ip`) VALUES (NULL, :unid, :token, :ip)');
                    $uuid = getuserid_class($usern);
                    $stmt3->bindParam(":unid", $uuid);
                    $tkn = generateRandomString();
                    $stmt3->bindParam(":token", $tkn);
                    if($cip == "false") $cip = "1.0.0.1";
                    $stmt3->bindParam(":ip", $cip);
                    $stmt3->execute();
                    $count3 = $stmt3->rowCount();
                    if($count3 !== 0)
                        return true;
                    else
                        return false;
                }else if ($lgntoken !== "error")
                return true;
                else
                return false;
            }else
            return false;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function getmailfromuserid($usrid){
        //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
        require("mysql.php");
        if(isset($usrid)){
            $stmtx = $mysql->prepare('SELECT * FROM `user` WHERE id = :usrid');
            $stmtx->bindParam(":usrid", $usrid);
            $stmtx->execute();
            $count = $stmtx->rowCount();
            if ($count !== 0) {
                $row = $stmtx->fetch();
                return $row["mail"];
            }else{
                return false;
            }
        }else{
            return false;
        }
}
function getusernameformmail($mailzs){
        //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
        require("mysql.php");
        if(isset($mailzs)){
            $stmtx = $mysql->prepare('SELECT * FROM `user` WHERE mail = :umail');
            $stmtx->bindParam(":umail", $mailzs);
            $stmtx->execute();
            $count = $stmtx->rowCount();
            if ($count !== 0) {
                $row = $stmtx->fetch();
                return $row["username"];
            }else{
                return false;
            }
        }else{
            return false;
        }
}
function resetpwwithtoken($rtoken){
    $chost = getConfigValue("server_host");
    $officialsite=($chost == false ? "my.domain" : $chost);
    $cname = getConfigValue("server_name");
    $officialsitename=($cname == false ? "WWW" : $cname);
    $officialsiteowner="TechGrief";
    require("mysql.php");
    /*require("mysql.php");
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';*/
        if(isset($rtoken)){
            $stmtx = $mysql->prepare('SELECT * FROM `userpwresettokens` WHERE token = :rtkn');
            $stmtx->bindParam(":rtkn", $rtoken);
            $stmtx->execute();
            $count = $stmtx->rowCount();
            $stmtx2 = $mysql->prepare('DELETE FROM `userpwresettokens` WHERE token = :rtkn');
            $stmtx2->bindParam(":rtkn", $rtoken);
            $stmtx2->execute();
            if ($count !== 0) {
                $row = $stmtx->fetch();
                $mailz = getmailfromuserid($row["userid"]);

                $unname = getusernameformmail($mailz);
                $cipa = getclientip_class();

                $resettoken = generateRandomString(16);
                /*$mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                $mail->SMTPDebug  = 0;  
                $mail->SMTPAuth   = TRUE;
                $mail->SMTPSecure = "ssl";
                $mail->Port       = 465;
                $mail->Host       = "smtp.gmail.com";
                $mail->Username   = 'techgriefweb@gmail.com';
                $mail->Password   = '#Lichtfelde2020';
                $mail->IsHTML(true);
                $mail->AddAddress($mailz, $unname);
                $mail->SetFrom("techgriefweb@gmail.com", $officialsitename);
                $mail->AddReplyTo("techgriefweb@gmail.com", $officialsitename);
                $mail->AddCC($mailz, $unname);
                $mail->Subject = "Your password has been reset! - ".$officialsitename;*/
                $content = "
                <div style=\"color:LightSalmon; padding:45px;\">
                <h1 style=\"color:indianred;font-weight: bold;\">YOUR PASSWORD HAS BEEN RESET!</h1>
                <h3 style=\"color:LightSalmon\"><u>Username:</u> ".$unname."</h3>
                <h3 style=\"color:LightSalmon\"><u>IP:</u> ".$cipa."</h3>
                <h3 style=\"color:LightSalmon\"><u>Country:</u> ".ip_info($cipa, "Country")."</h3>
                <p style=\"opacity:0.05;font-size:10px;\">Copyright by ".$officialsiteowner." © from 2021-".date("Y")."
                <h3 style=\"color:LightSalmon;\"><u>New Password:</u> ".$resettoken."</h3>

                <a href=\"".$officialsite."/sqlware/panel/?u=".$unname."\">
                    <h3 style=\"color:Turquoise\">Login now</h3>
                </a>

                </div>
                ";
                //$mail->MsgHTML($content); 
                send_mail($mailz, "Your password has been reset!", $content);
                $phash = password_hash($resettoken, PASSWORD_BCRYPT);
                $usrnm = $unname;
                $stmt2 = $mysql->prepare('UPDATE `user` SET `password`=:npw WHERE username = :unm');
                $stmt2->bindParam(":npw", $phash);
                $stmt2->bindParam(":unm", $usrnm);
                $stmt2->execute();
                $count2 = $stmt2->rowCount();
                if ($count2 !== 0) {
                    if(userlogin_class($usrnm, $resettoken)) return true;
                    else return false;
                }else{
                    return false;
                }

                
            }else{
                return false;
            }
        }else{
            return false;
        }
}
function resetuserpw_class($mailz){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    $chost = getConfigValue("server_host");
     $officialsite=($chost == false ? "my.domain" : $chost);
    $cname = getConfigValue("server_name");
     $officialsitename=($cname == false ? "WWW" : $cname);
     $officialsiteowner="TechGrief";
    require("mysql.php");
    /*require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';*/
    if(isset($mailz)){
        $stmt = $mysql->prepare('SELECT * FROM `user` WHERE mail = :un');
        $stmt->bindParam(":un", $mailz);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {

            $amaiun = getusernameformmail($mailz);

            $resettoken = generateRandomString();
            $cipa=getclientip_class();
            /*$mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "ssl";
            $mail->Port       = 465;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = 'techgriefweb@gmail.com';
            $mail->Password   = '#Lichtfelde2020';
            $mail->IsHTML(true);
            $mail->AddAddress($mailz, $amaiun);
            $mail->SetFrom("techgriefweb@gmail.com", $officialsitename);
            $mail->AddReplyTo("techgriefweb@gmail.com", $officialsitename);
            $mail->AddCC($mailz, $amaiun);
            $mail->Subject = "Password reset request received - ".$officialsitename;

            $content = "
            <h1>Password reset request received</h1>
            <h3>Username: ".$amaiun."</h3>
            <h3>IP: ".$cipa."</h3>
            <h3>Country: ".ip_info($cipa, "Country")."</h3>
            <br><br>
            <h3><h3>
            <a href=\"http://".$_SERVER['SERVER_NAME']."/panel/resetpassword/?token=$resettoken\"><h4>http://".$_SERVER['SERVER_NAME']."/panel/resetpassword/?token=$resettoken</h4></a>
            ";*/

            $content = "
                <div style=\"color:LightSalmon; padding:45px;\">
                <h1 style=\"color:indianred;font-weight: bold;\">NEW PASSWORD RESET REQUEST RECEIVED!</h1>
                <h3 style=\"color:LightSalmon\"><u>Username:</u> ".$amaiun."</h3>
                <h3 style=\"color:LightSalmon\"><u>IP:</u> ".$cipa."</h3>
                <h3 style=\"color:LightSalmon\"><u>Country:</u> ".ip_info($cipa, "Country")."</h3>
                <p style=\"opacity:0.05;font-size:10px;\">Copyright by ".$officialsiteowner." © from 2021-".date("Y")."

                <h3 style=\"color:LightSalmon;\">If you forgot your password, use this:</h3>

                <a href=\"".(isset($_SERVER["HTTPS"]) ? 'https' : 'http')."://".$_SERVER['SERVER_NAME']."/panel/resetpassword/?token=$resettoken\">
                    <h3 style=\"color:Turquoise\">Reset Password now</h3>
                </a>
                <p style=\"margin-top:17px;color:indianred;\">If you prefer that the password should not be reseted, just ignore this mail.</p>
                </div>
                ";


            //$mail->MsgHTML($content); 
            send_mail($mailz, "Password reset request received!", $content);


                $uuid = getuserid_class($amaiun);

                $stmtx2 = $mysql->prepare('DELETE FROM `userpwresettokens` WHERE userid = :usid');
                $stmtx2->bindParam(":usid", $uuid);
                $stmtx2->execute();
                //echo("UUID=".$uuid."(".getusernameformmail($mailz).")".$mailz);
                $stmt2 = $mysql->prepare('INSERT INTO `userpwresettokens`(`id`,`userid`, `token`) VALUES (NULL,:userid,:pwtoken)');
                $stmt2->bindParam(":pwtoken", $resettoken);
                $stmt2->bindParam(":userid", $uuid);
                $stmt2->execute();
                $count2 = $stmt2->rowCount();
                
                if ($count2 !== 0) {
                    return 1;
                }else{
                    return 0;
                }


            /*$row = $stmt->fetch();
            if(password_verify($pw, $row["password"])){
                if(getlogintoken_class($usern) == "none"){
                    $stmt3 = $mysql->prepare('INSERT INTO `logintokens` (`id`, `userid`, `token`, `ip`) VALUES (NULL, :unid, :token, :ip)');
                    $uuid = getuserid_class($usern);
                    $stmt3->bindParam(":unid", $uuid);
                    $tkn = generateRandomString();
                    $stmt3->bindParam(":token", $tkn);
                    $cip = getclientip_class();
                    if($cip == "false") $cip = "1.0.0.1";
                    $stmt3->bindParam(":ip", $cip);
                    $stmt3->execute();
                    $count3 = $stmt3->rowCount();
                    if($count3 !== 0)
                        return true;
                    else
                        return false;
                }else if (getlogintoken_class($usern) !== "error")
                return true;
                else
                return false;
            }else
            return false;*/
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function usersignup_class($usern, $pw, $mailst){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    if(!signupenabled_class()){
        return false;
        exit();
    }
    require("mysql.php");
    if(isset($usern) && isset($pw) && isset($mailst)){
        $mails =strtolower($mailst);
        $stmt2 = $mysql->prepare('SELECT * FROM `user` WHERE username = :un OR mail = :ml');
        $stmt2->bindParam(":un", $usern);
        $stmt2->bindParam(":ml", $mails);
        $stmt2->execute();
        $count2 = $stmt2->rowCount();
        if ($count2 == 0) {
            $stmt = $mysql->prepare('INSERT INTO user (id, mail, username, password, admin,blockedcountrys) VALUES (null, :mails, :user, :pw, :ad, "KP")');
            $stmt->bindParam(":user", $usern);
            $ad = 0;
            if(ifnulluser_class()) $ad = 1;
            $phash = password_hash($pw, PASSWORD_BCRYPT);
            $stmt->bindParam(":pw", $phash);
            $stmt->bindParam(":mails", $mails);
            $stmt->bindParam(":ad", $ad);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0) {
                $row = $stmt->fetch();
                $stmt3 = $mysql->prepare('INSERT INTO `logintokens` (`id`, `userid`, `token`, `ip`) VALUES (NULL, :unid, :token, :ip)');
                $uuid = getuserid_class($usern);
                $stmt3->bindParam(":unid", $uuid);
                $tkn = generateRandomString();
                $stmt3->bindParam(":token", $tkn);
                $cip = getclientip_class();
                if($cip == "false") $cip = "1.0.0.1";
                $stmt3->bindParam(":ip", $cip);
                $stmt3->execute();
                $count3 = $stmt3->rowCount();
                if($count3 !== 0){
                    $row6 = $stmt->fetch();
                    $stmt6 = $mysql->prepare('INSERT INTO `authconfig`(
                        `id`,
                        `userid`,
                        `googleauth`,
                        `googleseed`,
                        `mailauth`,
                        `mailaddress`,
                        `mailcode`,
                        `mailtime`,
                        `webauth`,
                        `webkey`,
                        `webtime`,
                        `backupauth`,
                        `backupcode`
                    )
                    VALUES(
                        NULL,
                        :unid,
                        NULL,
                        :gseed,
                        NULL,
                        :amail,
                        \'123456\',
                        CURRENT_TIMESTAMP,
                        NULL,
                        \'123456\',
                        CURRENT_TIMESTAMP,
                        NULL,
                        :backcode
                    )');

                    require_once 'GoogleAuthenticator.php';
                    $gas = new PHPGangsta_GoogleAuthenticator();
                    $sseed = $gas->createSecret();

                    $randombackupcode = generateRandomString();
                    $stmt6->bindParam(":unid", $uuid);
                    $stmt6->bindParam(":gseed", $sseed);
                    $stmt6->bindParam(":amail", $mails);
                    $stmt6->bindParam(":backcode", $randombackupcode);
                    $stmt6->execute();



                    
                    $stmtq = $mysql->prepare('INSERT INTO `presenterboardmodule` (`id`, `userid`, `name`, `imgurl`, `delay`, `forcereload`, `fit`) 
                    VALUES (NULL, :usrid, "Presenter", "https://unsplash.com/photos/fvMeP4ml4bU/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8MXx8cGF0dGVybiUyMGVycm9yJTIwc2NyZWVufGVufDB8MHx8fDE2NTcxMzE3NTk&force=true", "500", "0", "1");');
                    $stmtq->bindParam(":usrid", $uuid);
                    $stmtq->execute();
                    $countq = $stmtq->rowCount();
                    
                    if ($countq !== 0) {
                        return true;
                    }else{
                        return false;
                    }
                }
                else
                    return false;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }else{
        return false;
    }
    exit();
}

function getuserid_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern)){
        $stmt = $mysql->prepare('SELECT id FROM `user` WHERE username = :un');
        $stmt->bindParam(":un", $usern);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["id"];
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}

function getusername_class($id){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($id)){
        $stmt = $mysql->prepare('SELECT username FROM `user` WHERE id = :un');
        $stmt->bindParam(":un", $id);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["username"];
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}

function signupenabled_class(){
    return getConfigValue("server_service_enabled");
    //return true;
}

function ifuserisadmin_class($usern){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($usern)){
        $stmt = $mysql->prepare('SELECT * FROM `user` WHERE username = :un');
        $stmt->bindParam(":un", $usern);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            if($row["admin"]){
                return true;
            }else
            return false;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function countuser_class(){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
        $stmt = $mysql->prepare('SELECT COUNT(*) FROM `user`');
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["COUNT(*)"] + 0;
        }else{
            return 0;
        }
    }

    function countlogintokens_class(){
        //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
        require("mysql.php");
            $stmt = $mysql->prepare('SELECT COUNT(*) FROM `logintokens`');
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0) {
                $row = $stmt->fetch();
                return $row["COUNT(*)"] + 0;
            }else{
                return 0;
            }
        }

        function countuserlogintokens_class($usern){
            //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
            require("mysql.php");
            if(isset($usern)){
                $usid = getuserid_class($usern);
                $stmt = $mysql->prepare('SELECT COUNT(*) FROM `logintokens` WHERE userid = :unid');
                $stmt->bindParam(":unid", $usid);
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count !== 0) {
                    $row = $stmt->fetch();
                    return $row["COUNT(*)"] + 0;
                }else{
                    return 0;
                }
            }else return 0;
        }
        function countuserclients_class($usern){
            //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
            require("mysql.php");
            if(isset($usern)){
                $usid = getuserid_class($usern);
                $stmt = $mysql->prepare('SELECT COUNT(*) FROM `clients` WHERE userid = :unid');
                $stmt->bindParam(":unid", $usid);
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count !== 0) {
                    $row = $stmt->fetch();
                    return $row["COUNT(*)"] + 0;
                }else{
                    return 0;
                }
            }else return 0;
        }
        
function verifygoogle2fa_class($username, $code){
    $usrid = getuserid_class($username);
    if($usrid !== 0){

        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $idus = $usrid;
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();

            require_once 'GoogleAuthenticator.php';
            $ga = new PHPGangsta_GoogleAuthenticator();
            if($ga->verifyCode($row["googleseed"], $code, 3)) return true; else return false;
        }else{
            return false;
        }
    }
}

function updategoogle2fastatus_class($username, $loginkey, $value = NULL){
    if(iftokenanduserandiptrue_class($loginkey, $username) && glogch()){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `authconfig` SET googleauth = :newval WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->bindParam(":newval", $value);//1=Use Google 2fa , 0=Disable
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}

function ifgoogle2faenabled_class($username){
    require("mysql.php");
    $idus = getuserid_class($username);
    if($idus !== 0){
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["googleauth"];
        }
    }
    return false;
}

function getgoogle2faseed_class($username, $loginkey){
    if(iftokenanduserandiptrue_class($loginkey, $username) && $username == $_COOKIE["username"] && glogch()){
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["googleseed"];
        }else{
            return false;
        }
    }else return false;
}

function getgoogle2faqr_class($username, $loginkey){
    if(iftokenanduserandiptrue_class($loginkey, $username) && $username == $_COOKIE["username"] && glogch()){
        require_once 'GoogleAuthenticator.php';
        $scew = getgoogle2faseed_class($username, $loginkey);
        $ga = new PHPGangsta_GoogleAuthenticator();
        return $ga->getQRCodeGoogleUrl('TechGrief Security', $scew);
    }else return false;
}




















//mail 2fa
function verifymail2fa_class($username, $code){
    $unip = getuserid_class($username);
    if($unip !== 0){
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $idus = $unip;
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            if($row["mailcode"] == $code){
                $d1 = new DateTime($row["mailtime"]);
                $d2 = new DateTime(getcurrenttimestamp_class()); 
                $interval = $d1->diff($d2);
                if($interval->i < 10)
                return true;
            }
        } 
    }
    return false;
}


function sendmail2fa_class($username){

    if(getuserid_class($username) !== 0){
        $chost = getConfigValue("server_host");
         $officialsite=($chost == false ? "my.domain" : $chost);
        $cname = getConfigValue("server_name");
         $officialsitename=($cname == false ? "WWW" : $cname);
         $officialsiteowner="TechGrief";
        require("mysql.php");
        /*require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';*/
        $mailz = getmail2faseed_class($username);
        $unm = getusernameformmail($mailz);
        
        $resettoken = generateRandomString(6);
        /*$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = 'techgriefweb@gmail.com';
        $mail->Password   = '#Lichtfelde2020';
        $mail->IsHTML(true);
        $mail->AddAddress($mailz, $unm);
        $mail->SetFrom("techgriefweb@gmail.com", $officialsitename);
        $mail->AddReplyTo("techgriefweb@gmail.com", $officialsitename);
        $mail->AddCC($mailz, $unm);
        $mail->Subject = "Mail 2-Step Verification request received - ".$officialsitename;*/


        $cipa = getclientip_class();
        $content = "
            <div style=\"color:LightSalmon; padding:45px;\">
            <h1 style=\"color:indianred;font-weight: bold;\">NEW 2-STEP VERIFICATION REQUEST RECEIVED!</h1>
            <h3 style=\"color:LightSalmon\"><u>Username:</u> ".$unm."</h3>
            <h3 style=\"color:LightSalmon\"><u>IP:</u> ".$cipa."</h3>
            <h3 style=\"color:LightSalmon\"><u>Country:</u> ".ip_info($cipa, "Country")."</h3>
            <p style=\"opacity:0.05;\">Copyright by ".$officialsiteowner." © from 2021-".date("Y")."

            <h3 style=\"color:LightSalmon;\">Your Key:</h3>

            
                <h2 style=\"color:Turquoise\">".$resettoken."</h2>

                <p style=\"margin-top:15px;color:indianred;\">Valid for 10 Minutes.</p>
            
            </div>
            ";
        //$mail->MsgHTML($content); 


        send_mail($mailz, "Mail 2-Step Verification request received", $content);


            $stmt = $mysql->prepare('UPDATE `authconfig` SET mailcode = :mailcode , mailtime = CURRENT_TIMESTAMP WHERE userid = :unid');
            $idus = getuserid_class($username);
            $stmt->bindParam(":unid", $idus);
            $stmt->bindParam(":mailcode", $resettoken);//1=Use Google 2fa , 0=Disable
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0)
                return true;
            else return false;
        
    }
    return false;
}

function updatemail2famail_class($username, $loginkey, $newmail = NULL, $onoroff = NULL){
    if(iftokenanduserandiptrue_class($loginkey, $username) && glogch() && $_COOKIE["username"] == $username){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `authconfig` SET mailaddress = :newmail , mailauth = :newval WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->bindParam(":newval", $onoroff);
        if($newmail == NULL) $newmail = getmail2faseed_class($username);
        $stmt->bindParam(":newmail", $newmail);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}

function updatemail2fastatus_class($username, $loginkey, $value = NULL){
    if(iftokenanduserandiptrue_class($loginkey, $username) && glogch() && $_COOKIE["username"] == $username){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `authconfig` SET mailauth = :newval WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->bindParam(":newval", $value);//1=Use MAIL2fa 2fa , 0=Disable
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}

function ifmail2faenabled_class($username){
    require("mysql.php");
    $idus = getuserid_class($username);
    if($idus !== 0){
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["mailauth"];
        }
    }
    return false;
}

function getmail2faseed_class($username){
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["mailaddress"];
        }else{
            return false;
        }
}
















//WEB 2fa
function verifyweb2fa_class($username, $code){
    $uuid=getuserid_class($username);
    if($uuid !== 0){
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $uuid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            if($row["webkey"] == $code){
                $d1 = new DateTime($row["webtime"]);
                $d2 = new DateTime(getcurrenttimestamp_class());
                $interval = $d1->diff($d2);
                if($interval->i < 10)
                return true;
            }
        } 
    }
    return false;
}

function getnewweb2fa_class($username){
    $uuid=getuserid_class($username);
    if($uuid !== 0){
        require("mysql.php");
        $resettoken = generateRandomString(6);
        $stmt = $mysql->prepare('UPDATE `authconfig` SET webkey = :webkey , webtime = CURRENT_TIMESTAMP WHERE userid = :unid');
        $stmt->bindParam(":unid", $uuid);
        $stmt->bindParam(":webkey", $resettoken);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) return $resettoken;
    }
    return false;
}

function updateweb2fastatus_class($username, $loginkey, $value = NULL){
    if(iftokenanduserandiptrue_class($loginkey, $username) && glogch() && $_COOKIE["username"] == $username){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `authconfig` SET webauth = :newval WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->bindParam(":newval", $value);//1=Use MAIL2fa 2fa , 0=Disable
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}

function ifweb2faenabled_class($username){
    require("mysql.php");
    $idus = getuserid_class($username);
    if($idus !== 0){
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["webauth"];
        }
    }
    return false;
}







//If ANY 2FA Enabled
function ifany2faenabled_class($username){
    $uuid=getuserid_class($username);
    if($uuid !== 0){
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $uuid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            if($row["googleauth"] || $row["mailauth"] || $row["webauth"] || $row["backupauth"]){
                return true;
            }
        } 
    }
    return false;
}








//BACKUP 2fa
function verifybackup2fa_class($username, $code){
    $uuid=getuserid_class($username);
    if($uuid !== 0){
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $uuid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            if($row["backupcode"] == $code){
                return true;
            }
        } 
    }
    return false;
}
function getbackup2fa_class($username, $loginkey){
    if(iftokenanduserandiptrue_class($loginkey, $username)){
        $uuid=getuserid_class($username);
        if($uuid !== 0){
            require("mysql.php");
            $stmt = $mysql->prepare('SELECT backupcode FROM `authconfig` WHERE userid = :unid');
            $stmt->bindParam(":unid", $uuid);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count == 1) {
                $row = $stmt->fetch();
                return $row["backupcode"];
            } 
        }
    }
    return false;
}
function getnewbackup2fa_class($username){
    $uuid=getuserid_class($username);
    if($uuid !== 0){
        require("mysql.php");
        $resettoken = generateRandomString(64);
        $stmt = $mysql->prepare('UPDATE `authconfig` SET backupcode = :backupcode WHERE userid = :unid');
        $stmt->bindParam(":unid", $uuid);
        $stmt->bindParam(":backupcode", $resettoken);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) return $resettoken;
    }
    return false;
}

function updatebackup2fastatus_class($username, $loginkey, $value = NULL){
    if(iftokenanduserandiptrue_class($loginkey, $username) && glogch() && $_COOKIE["username"] == $username){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `authconfig` SET backupauth = :newval WHERE userid = :unid');
        $idus = getuserid_class($username);
        $stmt->bindParam(":unid", $idus);
        $stmt->bindParam(":newval", $value);//1=Use MAIL2fa 2fa , 0=Disable
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}

function ifbackup2faenabled_class($username){
    require("mysql.php");
    $idus = getuserid_class($username);
    if($idus !== 0){
        $stmt = $mysql->prepare('SELECT * FROM `authconfig` WHERE userid = :unid');
        $stmt->bindParam(":unid", $idus);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return $row["backupauth"];
        }
    }
    return false;
}










function getcurrenttimestamp_class(){
    require("mysql.php");
        $stmt = $mysql->prepare('SELECT CURRENT_TIMESTAMP');
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["CURRENT_TIMESTAMP"];
        }
    return false;
}


function ismobile_class($usejscookie = false) {
    if(!$usejscookie)
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    else if ($usejscookie){
        if(isset($_COOKIE["window_width"]) && $_COOKIE["window_width"] <= 700)
        return true;
        else return false;
    }
    else return false;
    exit();
}





    








/*
function login_class($authid){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    
    if(isset($authid)){
        $stmt = $mysql->prepare('SELECT name FROM `clients` WHERE authid = :authid');
        $stmt->bindParam(":authid", $authid);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if ($count !== 0) {
            //$row = $stmt->fetch();
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function getnextcmd_class($authid){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    
    if(isset($authid)){
        $stmt = $mysql->prepare('SELECT nextcmd FROM `clients` WHERE authid = :authid');
        $stmt->bindParam(":authid", $authid);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["nextcmd"];
        }else{
            return null;
        }
    }else{
        return null;
    }
}

function register_class($pcname, $ram, $cpu, $ownerid){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    $authid = generateRandomString();
        $stmt = $mysql->prepare('INSERT INTO `clients` (`name`, `authid`, `ram`, `cpu`) VALUES (:pcname, :authid, :ram, :cpu);');
        $stmt->bindParam(":pcname", $pcname);
        $stmt->bindParam(":authid", $authid);
        $stmt->bindParam(":ram", $ram);
        $stmt->bindParam(":cpu", $cpu);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if ($count !== 0) {
            return $authid;
        }else{
            return false;
        }
}

function addshare_class($authid){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    
    if(isset($authid)){
        $stmt1 = $mysql->prepare('SELECT totalshare FROM `clients` WHERE authid = :authid');
        $stmt1->bindParam(":authid", $authid);
        $stmt1->execute();
        $count1 = $stmt1->rowCount();
        
        if ($count1 !== 0) {
            $row = $stmt1->fetch();

            $newShares = $row["totalshare"] + 1;
            $stmt = $mysql->prepare('UPDATE `clients` SET totalshare = :newshares WHERE authid = :authid');
            $stmt->bindParam(":authid", $authid);
            $stmt->bindParam(":newshares", $newShares);
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if ($count !== 0) {
                return true;
            }else{
                return false;
            }
            
        }else{
            return false;
        }
        
    }else{
        return false;
    }
}
*/
function generateRandomString($len = 64) {
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    $characters = '0123456789abcdefghij0123456789klmnopq0123456789rstuvwxyzAB0123456789CDEFGHIJKLMNOPQR0123456789STUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $len; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function popup2falogin($k1, $v1, $k2, $v2){
    echo('
    <!---https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle) :not(#popup1armail) :not(#popup1arweb) :not(#popup1arbackup){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:15px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      ////background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:right;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        ////background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            cursor:pointer;
            display:flex;
            color: '.$GLOBALS["c2"].';
            ////background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:20px;
            border:2px solid transparent;
            height:50px;
            width:100%;
            border-radius:8px;
            line-height:1.3;
            cursor:pointer;
            font-weight:bold;
        }
        
        .famethodoff{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid indianred;
            padding:6px;
            border-radius:8px;
            cursor:pointer;
            display:flex;
            color: indianred;
            letter-spacing:1.3px;
        }
        .famethodoff:hover{
            background-color:indianred;
            color: #28425f;
            color: '.$GLOBALS["c7"].';
        }
    </style>


    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
            2-Step Verification
        </p>

        <div class="popup_close" id="popup1ar" onclick="redirecturl(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <!--<div class="popup_logo" id="popup1ar" onclick="submit2faform()">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>-->
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <div class="');if(ifgoogle2faenabled_class($v1))echo("famethod");else echo("famethodoff"); echo('" id="popup1argoogle" ');
            if(ifgoogle2faenabled_class($v1))
            echo('onclick="post(\'index.php\',{\''.$k1.'\':\''.$v1.'\',\''.$k2.'\':\''.$v2.'\',\'authmtd\':\'google\',\'submit\':\'true\'});"
            ');
            echo('> 
            <i class="fa fa-google" id="popup1argoogle" style="
                    margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;">
                </i>
                <label id="popup1argoogle" class="famethoddesc" style="" >
                    Enter the 6-digit code<br>from Google Authenticator
                </label>
            </div>

            <div class="');if(ifmail2faenabled_class($v1))echo("famethod");else echo("famethodoff"); echo('" id="popup1armail" ');
            if(ifmail2faenabled_class($v1))
            echo('onclick="post(\'index.php\',{\''.$k1.'\':\''.$v1.'\',\''.$k2.'\':\''.$v2.'\',\'authmtd\':\'mail\',\'submit\':\'true\'});"
            ');
            echo('> 
            <i class="fa fa-envelope" id="popup1armail" style="
                    margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;">
                </i>
                <label id="popup1armail" class="famethoddesc" style="line-height:2.5;">
                Use your Verification email
                </label>
            </div>
            
            <div class="');if(ifweb2faenabled_class($v1))echo("famethod");else echo("famethodoff"); echo('" id="popup1arweb" ');
            if(ifweb2faenabled_class($v1))
            echo('onclick="post(\'index.php\',{\''.$k1.'\':\''.$v1.'\',\''.$k2.'\':\''.$v2.'\',\'authmtd\':\'web\',\'submit\':\'true\'});"
            ');
            echo('> 
            <i class="fa fa-globe" id="popup1arweb" style="
                    margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;">
                </i>
                <label id="popup1arweb" class="famethoddesc" style="" >
                    Enter the 6-digit code<br>from WEB Authenticator
                </label>
            </div>
            
            <div class="');if(ifbackup2faenabled_class($v1))echo("famethod");else echo("famethodoff"); echo('" id="popup1arbackup" ');
            if(ifbackup2faenabled_class($v1))
            echo('onclick="post(\'index.php\',{\''.$k1.'\':\''.$v1.'\',\''.$k2.'\':\''.$v2.'\',\'authmtd\':\'backup\',\'submit\':\'true\'});"
            ');
            echo('> 
            <i class="fa fa-cloud" id="popup1arbackup" style="
                    margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;">
                </i>
                <label id="popup1arbackup" class="famethoddesc" style="line-height:2.5;" >
                    Enter the 64-digit Backup code
                </label>
            </div>


            
        </div>





    </div>


    <script>
    // Post to the provided URL with the specified parameters.
    function post(path, parameters) {


        console.log("-------------Form-Submit-------------");
        $.each(parameters, function(key, value) {
            console.log("["+key+"]->["+value+"]");
        });
        console.log("--------------Try-Submit--------------");

        var formxxx = $(\'<form></form>\');

        formxxx.attr("method", "post");
        formxxx.attr("action", path);
        formxxx.attr("id", "mytinput");
        formxxx.attr("style", "display:none;");

        $.each(parameters, function(key, value) {
            var field = $(\'<input></input>\');
    
            field.attr("type", "hidden");
            field.attr("name", key);
            field.attr("value", value);
    
            formxxx.append(field);
        });

        var fieldsx = $(\'<input></input>\');
        fieldsx.attr("type", "submit");
        fieldsx.attr("id", "submitmytinput");
        fieldsx.attr("name", "submit");
        fieldsx.attr("value", "submit");
        formxxx.append(fieldsx);


        // The form needs to be a part of the document in
        // order for us to be able to submit it.
        $(document.body).append(formxxx);
        formxxx.submit();


        //var scriptzx = document.createElement("script");
        //scriptzx.innerHTML = \'function kwenmfp() {\nalert("X");\ndocument.getElementById("submitmytinput").click();\n}\';
        //document.body.appendChild(scriptzx);
        //kwenmfp();
        document.getElementById("submitmytinput").click();
        console.log("-------------Submit-END--------------");
    }
    function subgoogle() {
        var form1 = document.getElementById("popup1argoogle");
        form1.form.submit();
    }
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}

function popupgoogle2fa($un, $pn){
    echo('
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:15px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      ////background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:left;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        ////background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            display:flex;
            color: '.$GLOBALS["c2"].';
            //background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:35px;
            outline:none;
            border:2px solid transparent;
            width:100%;
            border-radius:8px;
            font-weight:bold;
            caret-color: '.$GLOBALS["c2"].';
            color: '.$GLOBALS["c2"].';
            height:50px;
            margin-top:4px;
            display:block;
            margin-right:3px;
            margin-left:2px;
        }
        .famethoddesc:hover{
            border:2px solid transparent;
        }
        
    </style>


    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <i class="fa fa-google" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i> Verification
        </p>

        <div class="popup_close" id="popup1ar" onclick="redirecturl(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="post">
            
            <i class="fa fa-key" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                <input type="hidden" name="u2" value="'.$un.'">
                <input type="hidden" name="p2" value="'.$pn.'">
                <input required name="google2faverifycode" id="popup1argoogle" class="famethoddesc" type="number" spellcheck="false" autofocus="autofocus">
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}

function popupmail2fa($un, $pn){
    sendmail2fa_class($un);
    echo('
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:15px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      //background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:left;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        //background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            display:flex;
            color: '.$GLOBALS["c2"].';
            //background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:35px;
            outline:none;
            border:2px solid transparent;
            width:100%;
            border-radius:8px;
            font-weight:bold;
            caret-color: '.$GLOBALS["c2"].';
            color: '.$GLOBALS["c2"].';
            height:50px;
            margin-top:4px;
            display:block;
            margin-right:3px;
            margin-left:2px;
        }
        .famethoddesc:hover{
            border:2px solid transparent;
        }
        
    </style>


    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <i class="fa fa-envelope" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i> Verification
        </p>

        <div class="popup_close" id="popup1ar" onclick="redirecturl(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="post">
            
            <i class="fa fa-key" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                <input type="hidden" name="u2" value="'.$un.'">
                <input type="hidden" name="p2" value="'.$pn.'">
                <input required name="mail2faverifycode" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>
    
    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}



function popupweb2fa($un, $pn){
    echo('
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:15px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      //background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:left;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        //background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            display:flex;
            color: '.$GLOBALS["c2"].';
            //background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:35px;
            outline:none;
            border:2px solid transparent;
            width:100%;
            border-radius:8px;
            font-weight:bold;
            caret-color: '.$GLOBALS["c2"].';
            color: '.$GLOBALS["c2"].';
            height:50px;
            margin-top:4px;
            display:block;
            margin-right:3px;
            margin-left:2px;
        }
        .famethoddesc:hover{
            border:2px solid transparent;
        }
        
    </style>


    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <i class="fa fa-globe" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i> Verification
        </p>

        <div class="popup_close" id="popup1ar" onclick="redirecturl(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="post">
            
            <i class="fa fa-key" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                <input type="hidden" name="u2" value="'.$un.'">
                <input type="hidden" name="p2" value="'.$pn.'">
                <input required name="web2faverifycode" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>
    
    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}



function popupbackup2fa($un, $pn){
    echo('
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:15px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      //background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:left;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
        font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        //background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            display:flex;
            color: '.$GLOBALS["c2"].';
            //background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:35px;
            outline:none;
            border:2px solid transparent;
            width:100%;
            border-radius:8px;
            font-weight:bold;
            caret-color: '.$GLOBALS["c2"].';
            color: '.$GLOBALS["c2"].';
            height:50px;
            margin-top:4px;
            display:block;
            margin-right:3px;
            margin-left:2px;
        }
        .famethoddesc:hover{
            border:2px solid transparent;
        }
        
    </style>


    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <i class="fa fa-cloud" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i> Verification
        </p>

        <div class="popup_close" id="popup1ar" onclick="redirecturl(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="post">
            
            <i class="fa fa-key" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                <input type="hidden" name="u2" value="'.$un.'">
                <input type="hidden" name="p2" value="'.$pn.'">
                <input required name="backup2faverifycode" id="popup1argoogle" class="famethoddesc" type="text" spellcheck="false" autofocus="autofocus">
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>
    
    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}

if(isset($_GET["popupallowedonsystem"])){
    ifurlpopupallowed();
}
function ifurlpopupallowed(){
    echo('<script type="text/javascript" language="Javascript">
    var newWin = window.open("?testpopup=c");             

    if(!newWin || newWin.closed || typeof newWin.closed=="undefined") 
    { 
        window.location.href = "?popupallowedonsystem_disabled=a";
    } </script>');
}
if(isset($_GET["popupallowedonsystem_disabled"])){
    popup("Please allow pop-ups!", "indianred", NULL, "?");
}
if(isset($_GET["testpopup"])){
    echo "<script>window.close();</script>";
}


function mask($str, $first, $last) {
    $len = strlen($str);
    $toShow = $first + $last;
    return substr($str, 0, $len <= $toShow ? 0 : $first).str_repeat("*", $len - ($len <= $toShow ? 0 : $toShow)).substr($str, $len - $last, $len <= $toShow ? 0 : $last);
}
function mask_email($email) {
    $mail_parts = explode("@", $email);
    $domain_parts = explode('.', $mail_parts[1]);

    $mail_parts[0] = mask($mail_parts[0], 1, 1); // show first 2 letters and last 1 letter
    $domain_parts[0] = mask($domain_parts[0], 1, 0); // same here
    $domain_parts[1] = mask($domain_parts[1], 1, 0); // same here
    $mail_parts[1] = implode('.', $domain_parts);

    return implode("@", $mail_parts);
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_GET["setm"])){
    send_mail($_GET["setm"], "TEST", "Hi");
}
function send_mail($tomail = null, $subject = null, $content = null, $host = null, $method = null){
    //x= send_mail("client@mai.le", "Mail Subject", "Mail Content", "noreply@smtp.mail", "Host address");
    $metconf = getConfigValue("mail_method");
    if($metconf !== false && !isset($method)){
        $method = $metconf;
    }else if(!isset($method))  $method = "tsmtp";

    $hostconf = getConfigValue("server_host");
    if($hostconf !== false && !isset($host)){
        $host = $hostconf;
    }else if(!isset($host)) $host = "unknown.not.trusted";

    //echo('<script type="text/javascript">window.open(\'http://example.com/?method='.$method.'\');</script>');
    //if($host == null && strpos($_SERVER['HTTP_HOST'], 'techgrief')) $host = $_SERVER['HTTP_HOST'];

    if($subject !== null && $content !== null && $host !== null && $tomail !== null){

        /*
        $method = "osmtp";
        gmail = Use your Gmail (Enable access through less secure apps: https://myaccount.google.com/u/1/lesssecureapps) //No more support from Google!
        osmtp = Own SMTP Server (https://www.awardspace.com/kb/php-mail-function/)
            -> If getConfigValue("mail_osmtp_module") is 'phpmailer', it will use phpmailer to send mail
            -> If not, mail() will be used
        tsmtp = Test SMTP Server (Use only for testing/experimenting), you can set your own address. Official: https://techgrief.de/php/class.php
        */

        if($method == "osmtp"){
            $mail_osmtp = getConfigValue("mail_osmtp_address");
            if(!(strpos($mail_osmtp, "@") !== false)) $mail_osmtp = "noreply@my.domain";
            $awardspaceEmail = $mail_osmtp;
            $body = $content;

            if(getConfigValue("mail_osmtp_module") == "1"){ //Download from: https://github.com/PHPMailer/PHPMailer
                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/SMTP.php';
                
                $mail = new PHPMailer();
                $mail->isSMTP(); 
                $mail->SMTPDebug = SMTP::DEBUG_OFF;//Or DEBUG_SERVER 
                $mail->Host = getConfigValue("mail_osmtp_phpmailer_host");
                $mail->Port = getConfigValue("mail_osmtp_phpmailer_port");
                $mail->SMTPAuth = getConfigValue("mail_osmtp_phpmailer_smtp_auth");
                $mail->Username = getConfigValue("mail_osmtp_phpmailer_smtp_username");
                $mail->Password = getConfigValue("mail_osmtp_phpmailer_smtp_password");
                $mail->setFrom($mail_osmtp, $host);
                $mail->addAddress($tomail);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                //$mail->AltBody = 'Error, please use another E-Mail Client';
                if ($mail->send()) {
                    return true;
                } else {
                    echo('<script>console.log("Error, cannot send Mail. Info:\n\r'.$mail->ErrorInfo.'");</script>');
                    return false;
                }
            }else if(getConfigValue("mail_osmtp_module") == "2"){ //Download from: https://github.com/PHPMailer/PHPMailer
                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/SMTP.php';
                
                $mail = new PHPMailer();
                $mail->isSendmail();
                $mail->SMTPDebug = SMTP::DEBUG_OFF;//Or DEBUG_SERVER 
                $mail->setFrom($mail_osmtp, $host);
                $mail->addAddress($tomail);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $body;
                //$mail->AltBody = 'Error, please use another E-Mail Client';
                if ($mail->send()) {
                    return true;
                } else {
                    echo('<script>console.log("Error, cannot send Mail. Info:\n\r'.$mail->ErrorInfo.'");</script>');
                    return false;
                }
            }else{
                $from = 'Content-type: text/html; charset=UTF-8' . "\r\n"."From: ".$host." <".$awardspaceEmail.">";
                if(mail($tomail,$subject,$body,$from)){
                    return true;
                } else {
                    return false;
                }
            }
			

        }else if($method == "tsmtp"){
            //ifurlpopupallowed();
            $strcontent = str_replace(array("\n", "\r"), '', $content);
            $urlss="https://techgrief.de/php/class.php?now-sendmail=onlyfortesting&tomail=".$tomail."&subject=".$subject."&content=".htmlentities($strcontent)."&host=".$host."&sendmethod=osmtp";
            
            echo('
            <iframe src="" name="page" style="visibility:hidden;width:0px;"></iframe>
            <a href="'.$urlss.'" target="page" id="send-mail" style="text-decoration: none;visibility:hidden;width:0px;">Send Mail...</a>

            <script type="text/javascript" language="Javascript">
              function openInIframe() {
                document.getElementById(\'send-mail\').click();
              }
              openInIframe(); 
            </script>');
            return true;
        }else popup("Cannot send mail! Please contact Server Admin!");
        return false;
    }

}

if(isset($_GET["now-sendmail"]) && $_GET["now-sendmail"] == "onlyfortesting" && isset($_GET["tomail"]) && isset($_GET["subject"]) && isset($_GET["content"]) && isset($_GET["host"]) && isset($_GET["sendmethod"])){
    
    //$enableExampleMailService = true;//Disable (false) for better Security

    if(getConfigValue("mail_enable_extern_tsmtp") == "1") $enableExampleMailService = true; else $enableExampleMailService = false;

    if($enableExampleMailService){
        $nottrust="<p style=\"background-color:lightcoral;color:white;padding:10px;font-size:23px;opacity:0.75;border:2px solid indianred;padding-top:12px;padding-bottom:12px;\">Do not trust this email! The sender indicated that it belongs to \"".$_GET["host"]."\" but this could not be confirmed.</p>";
        if(strpos($_GET["content"], "Do not trust this email!") == false){
            $cnt = $nottrust.$_GET["content"];
        }else{
            $cnt = $_GET["content"];
        }
        if(send_mail($_GET["tomail"], $_GET["subject"], $cnt, $_GET["host"], $_GET["sendmethod"])){
            echo("Mail send!");
            echo "<a href=\"javascript:history.go(-1)\"><- GO BACK</a>";
            echo "<script>window.close();</script>";
        }
        else echo("Mail cannot send! Error Method x".$_GET["sendmethod"]);
    }
    
}
if(isset($_GET["now-sendmail"]) && $_GET["now-sendmail"] == "testnow"){//Send example mail https://techgrief.de/php/class.php?now-sendmail=testnow
    echo('

    <form action="class.php">
        <input type="hidden" name="now-sendmail" value="onlyfortesting">
        tomail: <input type="text" name="tomail">
        subject: <input type="text" name="subject">
        content: <input type="text" name="content">
        host: <input type="text" name="host">
            <select name="sendmethod">
                <option value="tsmtp">(tsmtp) TechGrief\'s Test SMTP Server</option>
                <option value="osmtp">(osmtp) Own SMTP Server</option>
            </select>
        <input type="submit" value="Submit">
    </form>

    ');
}



/*

        00          00000   0000000
       0  0         0    0     0
      0    0        0    0     0
     00000000       00000      0
    0        0      0          0
   0          0     0       0000000

*/
/*
function json_print($json) { return '<pre>' . json_encode(json_decode($json), JSON_PRETTY_PRINT) . '</pre>'; }

function cryptoapicorrect($api){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($api)){
        $stmt = $mysql->prepare('SELECT * FROM `paycryptoapis` WHERE apikey = :uapi');
        $stmt->bindParam(":uapi", $api);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function cryptoapigetuserid($api){
    require("mysql.php");
    if(isset($api)){
        $stmt = $mysql->prepare('SELECT * FROM `paycryptoapis` WHERE apikey = :uapi');
        $stmt->bindParam(":uapi", $api);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            $bcl = $row["userid"];
            return $bcl;
        }else{
            return "ERROR#2";
        }
    }else{
        return "ERROR#1";
    }
}
function cryptoapigetlabel($api){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($api)){
        $stmt = $mysql->prepare('SELECT * FROM `paycryptoapis` WHERE apikey = :uapi');
        $stmt->bindParam(":uapi", $api);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            $bcl = $row["label"];
            return $bcl;
        }else{
            return "ERROR#2";
        }
    }else{
        return "ERROR#1";
    }
}
function cryptoapigetusername($api){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($api)){
        $stmt = $mysql->prepare('SELECT * FROM `paycryptoapis` WHERE apikey = :uapi');
        $stmt->bindParam(":uapi", $api);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            $bcl = getusername_class($row["userid"]);
            return $bcl;
        }else{
            return "ERROR#2";
        }
    }else{
        return "ERROR#1";
    }
}

function ifcoinsupported($coin = "rvn"){
    if($coin == "rvn"){
        return true;
    }else return false;
}
function getcoinfullname($coin = "rvn"){
    if(ifcoinsupported($coin)){
        if($coin == "rvn"){
            return "Ravencoin";
        }
    }else return "Not Supported";
}
function getcoinnetwork($coin = "rvn"){
    if(ifcoinsupported($coin)){
        if($coin == "rvn"){
            return "Ravencoin";
        }
    }else return "Not Supported";
}
function getcoinconfirmations($invoiceid){
    $reqs = cryptogetinvoicerows($invoiceid);
    if(isset($reqs["txid"])){
        if($reqs["coinnameabbr"] == "rvn"){
            $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$reqs["txid"]);
            $confirmationsq = json_decode($abs)->{'confirmations'};

            if(!isset($reqs["closedate"])){
                require("mysql.php");
                $stmt = $mysql->prepare('UPDATE `paycryptotransactions` SET `closedate` = CURRENT_TIMESTAMP WHERE `id` = :invoiceid');
                $stmt->bindParam(":invoiceid", $invoiceid);
                $stmt->execute();
            }

            return $confirmationsq;
        }
    }else return "0";
}
function getcointxidaddress($invoiceid){    
    $reqs = cryptogetinvoicerows($invoiceid);
    if(isset($reqs["txid"])){
        if($reqs["coinnameabbr"] == "rvn"){
            $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$reqs["txid"]);
            //$confirmationsq = ;-
            //print_r($confirmationsq);
            //echo("<hr>");
            //print_r($confirmationsq["0"]->scriptPubKey->addresses["0"]);
            return json_decode($abs)->{'vout'}["1"]->scriptPubKey->addresses["0"];
        }
    }else return "0";
}
function getcointxidvalue($invoiceid, $txid){    
    $reqs = cryptogetinvoicerows($invoiceid);
        if($reqs["coinnameabbr"] == "rvn"){
            $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$txid);
            //$confirmationsq = ;-
            //print_r($confirmationsq);
            //echo("<hr>");
            //print_r($confirmationsq["0"]->scriptPubKey->addresses["0"]);
            echo "<br>-->https://openchains.info/api/v1/raven/getrawtransaction?txid=".$txid."<--<br>";
            return json_decode($abs)->{'vout'}["0"]->value;
        }
}


function verifycryptotxid_low($invoiceid, $txid, $force = false){//Verify: Price & correct Address
    $reqs = cryptogetinvoicerows($invoiceid);
    if(!isset($reqs["txid"]) && isset($txid) || $force){
        if(!isset($txid) && isset($reqs["txid"])) $txid == $reqs["txid"]; else if(!isset($txid) && !isset($reqs["txid"])) return false;

        if($reqs["coinnameabbr"] == "rvn"){
            $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$txid);
            $txidvalue = json_decode($abs)->{'vout'}["1"]->value;
            $txidaddress = json_decode($abs)->{'vout'}["1"]->scriptPubKey->addresses["0"];
            if($reqs["coinaddress"] == $txidaddress)
                if($txidvalue >= $reqs["price"]) return true; 
                else return false;
            else return false;
        }
    }else if(isset($reqs["txid"])) return true; else return false;
}

function verifycryptotxid_basic($invoiceid, $txid, $force = false){//Verify: Price & correct Address & Unix time
    $reqs = cryptogetinvoicerows($invoiceid);
    if(!isset($reqs["txid"]) && isset($txid) || $force){
        if(!isset($txid) && isset($reqs["txid"])) $txid == $reqs["txid"]; else if(!isset($txid) && !isset($reqs["txid"])) return false;
        
        if($reqs["coinnameabbr"] == "rvn"){
            $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$txid);
            
            $txidvalue = json_decode($abs)->{'vout'}["1"]->value;
            $txidaddress = json_decode($abs)->{'vout'}["1"]->scriptPubKey->addresses["0"];
            $txidtime = json_decode($abs)->time;
            $invoicetime = strtotime($reqs["creationtime"]);
            if($reqs["coinaddress"] == $txidaddress && $invoicetime < $txidtime)
                if($txidvalue >= $reqs["price"]) return true; 
                else return false;
            else return false;
        }
    }else if(isset($reqs["txid"])) return true; else return false;
}

function verifycryptotxid_advanced($invoiceid, $txid, $force = false){//Verify: Price & correct Address & Unix time & Is  aNew Address in DB
    $reqs = cryptogetinvoicerows($invoiceid);
    if(!isset($reqs["txid"]) && isset($txid) || $force){
        if(!isset($txid) && isset($reqs["txid"])) $txid == $reqs["txid"]; else if(!isset($txid) && !isset($reqs["txid"])) return false;
        
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `paycryptotransactions` WHERE txid = :txid');
        $stmt->bindParam(":txid", $txid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count !== 0 && isset($reqs["txid"]) && $txid == $reqs["txid"]) $count = 0;
        if ($count == 0) {
            if($reqs["coinnameabbr"] == "rvn"){
                $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$txid);
                //print_r($abs);
                $txidvalue = json_decode($abs)->{'vout'}["1"]->value;
                $txidaddress = json_decode($abs)->{'vout'}["1"]->scriptPubKey->addresses["0"];
                $txidtime = json_decode($abs)->time;
                $invoicetime = strtotime($reqs["creationtime"]);
                if($reqs["coinaddress"] == $txidaddress && $invoicetime < $txidtime)
                    if($txidvalue >= $reqs["price"]) return true; 
                    else return false;
                else return false;
            }
        }else{
            return false;
        }

    }else if(isset($reqs["txid"])) return true; else return false;
}

function verifycryptotxid_top($invoiceid, $txid, $sourcewallet, $force = false){//Verify: Price & correct Address & Unix time & Is  aNew Address in DB
    $reqs = cryptogetinvoicerows($invoiceid);
    if(!isset($reqs["txid"]) && isset($txid) || $force){
        if(!isset($txid) && isset($reqs["txid"])) $txid == $reqs["txid"]; else if(!isset($txid) && !isset($reqs["txid"])) return false;
        
        require("mysql.php");
        $stmt = $mysql->prepare('SELECT * FROM `paycryptotransactions` WHERE txid = :txid');
        $stmt->bindParam(":txid", $txid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count !== 0 && isset($reqs["txid"]) && $txid == $reqs["txid"]) $count = 0;
        $priceinrange = $reqs["price"] * 1.1;
        $txidprice = getcointxidvalue($invoiceid,$txid);
        if ($count == 0 && ( ($txidprice <= $txidprice) && ($txidprice <= $priceinrange))) {
            if($reqs["coinnameabbr"] == "rvn"){
                $abs = file_get_contents("https://openchains.info/api/v1/raven/getrawtransaction?txid=".$txid);
                
                $txidvalue = json_decode($abs)->{'vout'}["1"]->value;
                $txidaddress = json_decode($abs)->{'vout'}["1"]->scriptPubKey->addresses["0"];
                $txidtime = json_decode($abs)->time;
                $invoicetime = strtotime($reqs["creationtime"]);
                $sourcewallet_txid = json_decode($abs)->{'vin'}["0"]->addresses["0"];
                if($reqs["coinaddress"] == $txidaddress && $invoicetime < $txidtime && $sourcewallet_txid == $sourcewallet)
                    if($txidvalue >= $reqs["price"]) return true; 
                    else return false;
                else return false;
            }
        }else{
            return false;
        }

    }else if(isset($reqs["txid"])) return true; else return false;
}



    /*
    *********paycryptotransactions*********
    KsahoXFaJvHB8cCYrZUqLoqoMSCm1ibMggrTzFWW3Ao https://www.blockonomics.co/blockonomics#/settings
    id
    userid
    fullcoinname
    coinnameabbr
    coinaddress
    coinmemo
    creationtime
    closedate
    coinnetwork
    price
    infinitydonation
    label
    *//*
function cryptocreateinvoice($userid, $fullcoinname, $coinnameabbr, $coinaddress, $coinmemo, $coinnetwork, $price, $infinitydonation, $label){
    require("mysql.php");

    $stmt = $mysql->prepare(
        'INSERT INTO `paycryptotransactions` (`userid`, `fullcoinname`, `coinnameabbr`, `coinaddress`, `coinmemo`, `coinnetwork`, `price`, `infinitydonation`, `label`) 
        VALUES (:userid, :fullcoinname, :coinnameabbr, :coinaddress, :coinmemo, :coinnetwork, :price, :infinitydonation, :label);'
    );
    $stmt->bindParam(":userid", $userid);
    $stmt->bindParam(":fullcoinname", $fullcoinname);
    $stmt->bindParam(":coinnameabbr", $coinnameabbr);
    $stmt->bindParam(":coinaddress", $coinaddress);
    $stmt->bindParam(":coinmemo", $coinmemo);
    $stmt->bindParam(":coinnetwork", $coinnetwork);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":infinitydonation", $infinitydonation);
    $stmt->bindParam(":label", $label);
    $stmt->execute();
    $count = $stmt->rowCount();
        
    if ($count !== 0) {
        return $mysql->lastInsertId();
        exit();
    }
    return false;
    exit();
}
function cryptogetinvoicerows($invoiceid){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($invoiceid)){
        $stmt = $mysql->prepare('SELECT * FROM `paycryptotransactions` WHERE id = :invoiceid');
        $stmt->bindParam(":invoiceid", $invoiceid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function paycryptogetinvoice($invoiceid, $coinsourceaddress, $txid, $coinmemo = NULL){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($invoiceid) && cryptogetinvoicerows($invoiceid) !== false && cryptogetinvoicerows($invoiceid)["txid"] == NULL){
        if(verifycryptotxid_top($invoiceid, $txid, $coinsourceaddress, true)){

            $stmt = $mysql->prepare('UPDATE `paycryptotransactions` SET 
            `coinsourceaddress` = :coinsourceaddress, 
            `coinmemo` = :coinmemo, 
            `txid` = :txid, 
            `closedate` = CURRENT_TIMESTAMP 
            WHERE `id` = :invoiceid');
            
            $stmt->bindParam(":invoiceid", $invoiceid);
            $stmt->bindParam(":coinsourceaddress", $coinsourceaddress);
            $stmt->bindParam(":coinmemo", $coinmemo);
            $stmt->bindParam(":txid", $txid);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0) {
                return true;
            }else{
                return false;
            }
        }else return false;
    }else{
        return false;
    }
}

*/
function defaultpopupstyles(){
    return '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---<link rel="stylesheet" href="https://techgrief.github.io/sqlware/public/qoview_menubar.css">--->
    '.defstyles().'
    <script language="JavaScript" type="text/javascript" src="https://techgrief.github.io/sqlware/public/jquery-3.6.0.min.js"></script>
    <style>
    body :not(.popup1) :not(#popup1ar) :not(#popup1argoogle) :not(#popup1armail) :not(#popup1arweb) :not(#popup1arbackup){
        filter: sepia(20%) blur(3px);
    }
    .popup1{
        display:block;
        filter: none;
        background-color:'.$GLOBALS["c10"].';
        padding-top:12px; padding-bottom:1px; padding-left:15px; padding-right:15px;
        text-align:center;
        position:fixed;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        min-width: 400px;
        border-bottom:solid 2px '.$GLOBALS["c2"].';
        border-left:solid 2px '.$GLOBALS["c2"].';
        border-right:solid 2px '.$GLOBALS["c2"].';
        border-radius: 0px 0px 10px 10px;
        box-shadow: 0 0 4000em '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        z-index:999;
        line-height: 1.8;
        text-align:center;top:0px;z-index: 1;
      }

      .popup_close {
        transition: 0.3s all;
        backface-visibility: hidden;
      position: relative;
      cursor: pointer;
      display: inline-block;
      white-space: nowrap;
      border-radius: 4px;
      padding: 10px 20px 10px 20px;
      font-size: initial;
      font-family: Arial;
      font-weight: bold;
      font-style: normal;
      //background-color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      color:indianred;
      border-width: 2px 2px 6px 2px;
      text-align:center;
      height:40px;
      width:50px;
      display:flex;
      float:left;
      padding:0;
      cursor: pointer;
      }
      .popup_close > i {
      font-size: 1em;
      border-radius: 0px;
      border: 0px solid transparent;
      border-width: 0px 0px 0px 0px;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px 0px 0px;
      position: static;
      }
      .popup_close:hover{
      background-color:indianred;
      color:'.$GLOBALS["c7"].';
      border: 0px solid indianred;
      border-width: 2px 2px 6px 2px;
      }

      .popup_logo {
          transition: 0.3s all;
          backface-visibility: hidden;
        position: relative;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        border-radius: 4px;
        padding: 10px 20px 10px 20px;
        font-size: initial;
        font-family: Arial;
        font-weight: bold;
        font-style: normal;
        //background-color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        color:'.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        text-align:center;
        height:40px;
        width:50px;
        display:flex;
        float:right;
        padding:0;
        pointer:cursor;
        }
        .popup_logo > i {
          font-size: 1.3em;
        border-radius: 0px;
        border: 0px solid transparent;
        border-width: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        margin: 0px 0px 0px 0px;
        position: static;
        }
        .popup_logo:hover{
        background-color:'.$GLOBALS["c2"].';
        color:'.$GLOBALS["c7"].';
        border: 0px solid '.$GLOBALS["c2"].';
        border-width: 2px 2px 6px 2px;
        cursor: pointer;
        }
  

        .famethod{
            transition: 0.3s all;
            margin-top:10px;
            margin-left:0;
            border:2px solid '.$GLOBALS["c2"].';
            padding:6px;
            border-radius:8px;
            display:flex;
            color: '.$GLOBALS["c2"].';
            //background-color:'.$GLOBALS["c7"].';
            letter-spacing:1.3px;
        }
        .famethod:hover{
            background-color:'.$GLOBALS["c2"].';
            color: '.$GLOBALS["c7"].';
        }
        .famethoddesc{
            font-size:28px;
            outline:none;
            border:2px solid transparent;
            width:100%;
            border-radius:8px;
            font-weight:bold;
            caret-color: '.$GLOBALS["c2"].';
            color: '.$GLOBALS["c2"].';
            height:50px;
            margin-top:4px;
            display:block;
            margin-right:3px;
            margin-left:2px;
        }
        .famethoddesc:hover{
            border:2px solid transparent;
        }
        
    </style>';
}
if(isset($_GET["present"])){
    $cfg = getpresenterboardmoduleCONFIG($_GET["present"]);
    loadSyncDataToFullBody("?getcurrentimgpbm=".$cfg["id"],$cfg["fit"],$cfg["delay"],$cfg["forcereload"]);
}
else if(isset($_GET["getcurrentimgpbm"])){
    echo getpresenterboardmoduleCONFIG($_GET["getcurrentimgpbm"])["imgurl"];
    exit(); 
}
function popup_box_select_imgforcereload($v = "0"){
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> Image Forcereload
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get">
            
            <i class="fa fa-dashboard" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                <!--<input type="hidden" name="mail_config_method" value="method">-->
                
                <select required name="imgforcereload" id="popup1argoogle" class="famethoddesc">
                '.($v == "1" 
                ? '<option value="1">Enable</option><option value="0">Disable</option>' 
                : '><option value="0">Disable</option><option value="1">Enable</option>').'
                </select>

                <!--
                <input required name="mail_config_method" id="popup1argoogle" class="famethoddesc" type="number" spellcheck="false" autofocus="autofocus">
                -->
                
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function popup_box_select_cloud(){
    $fvar = "";
    foreach (get_supported_clouds() as $element) {
        $fvar = $fvar . '<option value="'.$element.'">'.$element.'</option>';
    }
    echo('
    '.defaultpopupstyles().'

    <div class="popup1" style="text-align:center;" id="popup1">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        <!--<i class="fa fa-popup_box_select_mailmethod" id="popup1argoogle" style="
        margin-left:0;font-size:25px;margin-right:2px;">
    </i>--> Cloud Service
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup1(\'./\');">
            <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i>
        </div>

        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit2facode\').click();">
            <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i>
        </div>
        
        <div id="popup1ar" style="
        width:100%;
        padding-bottom:5px;
        ">
        <br><br>

            <form class="famethod" action="index.php" method="get">
            
            <i class="fa fa-cloud" id="popup1argoogle" style="margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                <!--<input type="hidden" name="mail_config_method" value="method">-->
                
                <select required name="changecloud" id="popup1argoogle" class="famethoddesc">
                '.$fvar.'
                </select>

                <!--
                <input required name="mail_config_method" id="popup1argoogle" class="famethoddesc" type="number" spellcheck="false" autofocus="autofocus">
                -->
                
                <input id="submit2facode" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    function hidepopup1() {
        var popup1 = document.getElementById("popup1");
        
        popup1.style.display = "none";
        
        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}
function updatefirstpresenterboardmoduleurl($tmpid, $newurl){
    if(isset($tmpid) && isset($newurl) && glogch()){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `presenterboardmodule` SET imgurl = :newval WHERE id = :tmpid AND userid = :usridz' );
        $stmt->bindParam(":tmpid", $tmpid);
        $stmt->bindParam(":newval", $newurl);
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt->bindParam(":usridz", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}
function updatefirstpresenterboardmoduledelay($tmpid, $newvar){
    if(isset($tmpid) && isset($newvar) && glogch()){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `presenterboardmodule` SET delay = :newval WHERE id = :tmpid AND userid = :usridz');
        $stmt->bindParam(":tmpid", $tmpid);
        $stmt->bindParam(":newval", $newvar);
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt->bindParam(":usridz", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}

function updatefirstpresenterboardmoduleforcereload($tmpid, $newvar){
    if(isset($tmpid) && isset($newvar) && glogch()){
        require("mysql.php");
        $stmt = $mysql->prepare('UPDATE `presenterboardmodule` SET forcereload = :newval WHERE id = :tmpid AND userid = :usridz');
        $stmt->bindParam(":tmpid", $tmpid);
        $stmt->bindParam(":newval", $newvar);
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt->bindParam(":usridz", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}
function getfirstpresenterboardmoduleCONFIGbyUserID($useridx){
    require("mysql.php");
    if(isset($useridx)){
        $stmt = $mysql->prepare('SELECT * FROM `presenterboardmodule` WHERE userid = :uidn');
        $stmt->bindParam(":uidn", $useridx);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row;
        }else{
            return null;
        }
    }else{
        return null;
    }
}
function getpresenterboardmoduleCONFIG($presenterid = 1){
    require("mysql.php");
    if(isset($presenterid)){
        $stmt = $mysql->prepare('SELECT * FROM `presenterboardmodule` WHERE id = :idn');
        $stmt->bindParam(":idn", $presenterid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row;
        }else{
            return null;
        }
    }else{
        return null;
    }
}
function loadSyncDataToFullBody($reloadurl, $fit = true, $delay = 6500, $forcereload = false){
    //$mode = "auto";
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Expires: -1");

    echo('
    <head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    
    <script>
    console.log("reloadurl:'.$reloadurl.'");
    console.log("fit:'.$fit.'");
    console.log("delay:'.$delay.'");
    console.log("forcereload:'.$forcereload.'");
    </script>
    </head>

    <style>
    body {
        '.
        (
        $fit == true ? 
        "background-repeat: no-repeat;
        //background-size: 100%;
        background-size: 100% 100%;
        background-position: center;
        background-size: contain; display: inline-table;
        //height:100%;
        "
            : ""
        ).'
        
    }
    #errortext{
        height: 100%;
        width: 100%;
        text-align: center;
        position:absolute;
        top:0px;
        right:0px;
        bottom:0px;
        left:0px;
        display: flex;
        justify-content: center;
    }
    body {
        -ms-overflow-style: none; /* for Internet Explorer, Edge */
        scrollbar-width: none; /* for Firefox */
        overflow-y: scroll; 
    }
    
    body::-webkit-scrollbar {
        display: none; /* for Chrome, Safari, and Opera */
    }
    </style>
    <script  type="text/javascript" src="'.(isset($_SERVER["HTTPS"]) ? 'https' : 'http').'://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div id="errortext"></div>


    <script>
    $(document).ready(function() {
        auto_refresh();
    });

    var i = 0;
    var forcereload = "'.$forcereload.'";
    var defaulturl = "'.$reloadurl.'";
    var lastreloadurl = "";
    var nowurl = "firstload_time";
    

    function auto_refresh(){
        $.ajax({
            url: defaulturl,
            method: "GET",
            success: (res) => {
              this.nowurl = res;
            },
            error: function() {
              //console.log("Error on connection ["+defaulturl+"]");
              this.nowurl = "";
            }
          });

        i++;
        
        if(isImage(nowurl.replace(/(\r\n|\n|\r)/gm, "")) && isValidHttpUrl(nowurl)){
            if(lastreloadurl !== nowurl){
                document.getElementById("errortext").innerHTML = "";
                //$(\'body\').css(\'background-image\', \'url("\'+nowurl.replace(/(\r\n|\n|\r)/gm, "")+\'")\'); 
                $(\'body\').css(\'background-image\', \'\'); 
                $(\'body\').css(\'background-image\', \'url("\'+nowurl.replace(/(\r\n|\n|\r)/gm, "")+\'")\'); 
                //console.log("New: " + i);
                lastreloadurl = nowurl;
            }else if(forcereload == true){
                document.getElementById("errortext").innerHTML = "";
                $(\'body\').css(\'background-image\', \'\'); 
                $(\'body\').css(\'background-image\', \'url("\'+nowurl.replace(/(\r\n|\n|\r)/gm, "")+\'?\'+i+\'")\'); 
                //console.log("Forced: " + i);
                lastreloadurl = nowurl;
            }else {
                //console.log("Lock: " + i);
            }
        }else if(isVideo(nowurl.replace(/(\r\n|\n|\r)/gm, "")) && isValidHttpUrl(nowurl)){
                console.log("LOAD->"+nowurl+"<-");
                if(lastreloadurl !== nowurl){
                if(forcereload == true){
                $(\'body\').css(\'background-image\', \'\'); 
                $(\'body\').css(\'background-image\', \'url("")\'); 
                    document.getElementById("errortext").innerHTML = "<video onload=\'this.play()\' id=\'vidx\' src=\'"+nowurl.replace(/(\r\n|\n|\r)/gm, "")+"\' autoplay loop height=\'100%\' width=\'100%\'>Wrong format</video>";
                    lastreloadurl = nowurl;
                }else {
                $(\'body\').css(\'background-image\', \'\'); 
                $(\'body\').css(\'background-image\', \'url("")\'); 
                    document.getElementById("errortext").innerHTML = "<video onload=\'this.play()\' id=\'vidx\' src=\'"+nowurl.replace(/(\r\n|\n|\r)/gm, "")+"\' autoplay loop height=\'100%\' width=\'100%\' playsinline>Wrong format</video>";
                    lastreloadurl = nowurl;
                }
                document.getElementById(\'vidx\').play();
                setTimeout(function(){
                    document.getElementById(\'vidx\').play();
                },1000)
                setTimeout(function(){
                    document.getElementById(\'vidx\').play();
                },2000)
                setTimeout(function(){
                    document.getElementById(\'vidx\').play();
                },3000)
                setTimeout(function(){
                    document.getElementById(\'vidx\').play();
                },4000)
                setTimeout(function(){
                    document.getElementById(\'vidx\').play();
                },5000)
                setTimeout(function(){
                    document.body.addEventListener("touchstart", function () {
                        var allVideos = document.querySelectorAll(\'vidx\');
                        for (var i = 0; i < allVideos.length; i++) {
                            allVideos[i].play();
                        }
                    },{ once: true });
                },1000)
            }
        }else if (!isValidHttpUrl(nowurl)){
            if(lastreloadurl !== nowurl){
                $(\'body\').css(\'background-image\', \'url("")\'); 
                document.getElementById("errortext").innerHTML = "<div style=\'word-wrap: break-word;height: 100%; width: 100%;background: black; color:white; display: flex; flex-direction: column; justify-content: center; text-align: center;font-size:calc((40vw - 4.5rem) / 7);font-weight:bold;font-family: \"Ubuntu\", sans-serif;line-height:calc((57vw - 4.5rem) / 7);\'>"+nowurl+"</div>";
                lastreloadurl = nowurl;
            }else if(forcereload == true){
                $(\'body\').css(\'background-image\', \'url("")\'); 
                document.getElementById("errortext").innerHTML = "<div style=\'word-wrap: break-word;height: 100%; width: 100%;background: black; color:white; display: flex; flex-direction: column; justify-content: center; text-align: center;font-size:calc((40vw - 4.5rem) / 7);font-weight:bold;font-family: \"Ubuntu\", sans-serif;line-height:calc((57vw - 4.5rem) / 7);\'>"+nowurl+"</div>";
                lastreloadurl = nowurl;
            }else {
                
            }
            
        }else{
            $(\'body\').css(\'background-image\', \'url("")\'); 
            document.getElementById("errortext").innerHTML = "<h1 style=\'color:indianred;position: absolute;top: 50%;\'>Wrong format</h1>";
        }
        if(nowurl == "firstload_time"){
            $(\'body\').css(\'background-image\', \'url("")\'); 
            document.getElementById("errortext").innerHTML = "<div style=\'word-wrap: break-word;height: 100%; width: 100%;background: black; color:indianred; display: flex; flex-direction: column; justify-content: center; text-align: center;font-size:calc((40vw - 4.5rem) / 7);font-weight:bold;font-family: \"Ubuntu\", sans-serif;line-height:calc((57vw - 4.5rem) / 7);\'>Loading...</div>";
        }
        if(i > 50000){location.reload(true);}
    }

    var refreshId = setInterval(auto_refresh, '.$delay.');
    
    function isVideo(url) {
        return false;
        var rsv = (url.match(/^http[^\?]*.(mp4|webm|ogg)(\?(.*))?$/gmi) != null);
        return rsv;
    }
    function isImage(url) {
        var rs = (url.match(/^http[^\?]*.(jpg|jpeg|gif|png|tiff|bmp)(\?(.*))?$/gmi) != null);
        if(url.includes("unsplash.com")) {
            return true;
        }
        return rs;
    }
    function isValidHttpUrl(string) {
        let url;
        
        try {
          url = new URL(string);
        } catch (_) {
          return false;  
        }
      
        return url.protocol === "http:" || url.protocol === "https:";
      }

    </script>
        

    ');
}


if(isset($_GET["test_autojs"])){
    echo('

    <style>
    body {
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center;
    }
    #diz
    {
        height:200px;
        width:200px;
        display:none;
    }
    </style>
    <script  type="text/javascript" src="'.(isset($_SERVER["HTTPS"]) ? 'https' : 'http').'://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>

    $(document).ready(function() {
        auto_refresh();
    });
    
    function auto_refresh(){
        var randomnumber = Math.floor(Math.random() * 10);
        //$(\'#show\').text(\'I am getting refreshed every 3 seconds..! Random Number ==> \'+ randomnumber);
        //$(\'#show\').load(\'class.php?t=\'+ randomnumber);
        //$(\'body\').css(\'background\', \'transparent\');
        //$(\'body\').css(\'background-image\', \'url("https://source.unsplash.com/random/")\');
        //$(\'diz\').css("content:","url(\'https://source.unsplash.com/random/\')");
        
        Working:
        //$(\'#diz\').prop(\'src\', "https://source.unsplash.com/random/"+ randomnumber);
        //$(\'#diz\').attr(\'src\',"https://source.unsplash.com/random/"+ randomnumber);
        //$(\'body\').css(\'background-image\', \'url("https://source.unsplash.com/random/720x480?\'+randomnumber+\'")\');
        $(\'body\').css(\'background-image\', \'url("https://cloud.techgrief.de/index.php/apps/files_sharing/publicpreview/kBrfRZRGzMr3B8X?file=/Hantavirus_00001/Hantavirus_00003.jpg&fileId=684&x=1920&y=1080&a=true")\');
        console.log("NEW");
    }
    var refreshId = setInterval(auto_refresh, 6000);

    </script>
        
    <img id="diz" />

    ');

}
if(isset($_GET["t"])) echo generateRandomString($_GET["t"]);

if(isset($_GET["sc"])) {
    foreach (get_supported_clouds() as $element) {
        echo $element."<br>";
    }
}
function get_supported_clouds(){
    return array(
        "transfer.sh"/*,
        "upload.vaa.red",
        "freeimage.host",
    "anonfiles.com"*/);
}

function updateselectedcloud($username, $newvar){
    if(isset($username) && isset($newvar) && glogch() && $username == $_COOKIE["username"]){
        require("mysql.php");
        $usid = getuserid_class($username);
        $stmt = $mysql->prepare('UPDATE `user` SET uploadservice = :newval WHERE id = :tmpid');
        $stmt->bindParam(":tmpid", $usid);
        $stmt->bindParam(":newval", $newvar);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
    }
    return false;
}
function getselectedcloud($username){
    require("mysql.php");
    if(isset($username)){
        $usid = getuserid_class($username);
        $stmt = $mysql->prepare('SELECT uploadservice FROM `user` WHERE id = :idn');
        $stmt->bindParam(":idn", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["uploadservice"];
        }else{
            return null;
        }
    }else{
        return null;
    }
}
function createnewtemplate($username, $templatename){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    if(isset($username) && isset($templatename) && glogch() && $username == $_COOKIE["username"]){
        require("mysql.php");
        $usid = getuserid_class($username);
        if($usid !== 0){
            $stmt = $mysql->prepare('INSERT INTO `presentertemplatemodule`(`id`, `userid`, `templatename`, `imgurllist`)
             VALUES (NULL, :usrid, :templatename, "a:0:{}");');
            $stmt->bindParam(":usrid", $usid);
            $stmt->bindParam(":templatename", $templatename);
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if ($count !== 0) {
                return true;
            }else{
                return false;
            }
        }
    }
    return false;
}


function gettemplates($username){
    require("mysql.php");
    if(isset($username)){
        $usid = getuserid_class($username);
        $stmt = $mysql->prepare('SELECT * FROM `presentertemplatemodule` WHERE userid = :idn');
        $stmt->bindParam(":idn", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            //$row = $stmt->fetch();
            return $stmt;
        }else{
            return null;
        }
    }else{
        return null;
    }
}
function gettemplateexistUrlList($tempid){
    require("mysql.php");
    if(isset($tempid)){
        $stmt = $mysql->prepare('SELECT imgurllist FROM `presentertemplatemodule` WHERE id = :tempid');
        $stmt->bindParam(":tempid", $tempid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["imgurllist"];
        }else{
            return null;
        }
    }else{
        return null;
    }
}
function addtemplateimg($templateid, $imgurl, $pos = 0){
    if(!is_numeric($pos) || is_numeric($pos) && $pos < 0) $pos = 0;
    if(isset($templateid) && isset($imgurl) && glogch()){
        //$imgurl = str_replace('/get/', "/", $imgurl);
        $imgurl = trim(preg_replace('/\s+/', ' ', $imgurl));
        require("mysql.php");
        $dax = gettemplateexistUrlList($templateid);

        if($dax !== false){
            $daxarr = unserialize($dax);

            if($pos !== 0 && $pos !== "0" && $pos <= count($daxarr)){
                $narr = array();
                for ($i=1; $i <= (count($daxarr)) ; $i++) { 
                    if($i == $pos){
                        array_push($narr, $imgurl);
                    }
                    if(isset($daxarr[$i-1]))
                    array_push($narr, $daxarr[$i-1]);
                }
                $daxarr = $narr;
            }
            else array_push($daxarr, $imgurl);

            //print_r($daxarr);
            $sde = serialize($daxarr);
            $stmt = $mysql->prepare('UPDATE `presentertemplatemodule` SET imgurllist = :imgurl WHERE id = :tmpid');
            $stmt->bindParam(":tmpid", $templateid);
            $stmt->bindParam(":imgurl", $sde);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0)
                return true;
            else return false;
            
        }else return false;
    }
    return false;
}
function addtemplateimglist($templateid, $imglist){
    if(isset($templateid) && isset($imglist) && glogch()){
        require("mysql.php");
        $daxarr = @unserialize("");
        if($daxarr !== false){
            $stmt = $mysql->prepare('UPDATE `presentertemplatemodule` SET imgurllist = :imgurl WHERE id = :tmpid');
            $stmt->bindParam(":tmpid", $templateid);
            $stmt->bindParam(":imgurl", $imglist);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0)
                return true;
            else return false;
            
        }else return false;
    }
    return false;
}
function glogch(){
    if(isset($GLOBALS["glogch"])) return $GLOBALS["glogch"];
    else{
        $GLOBALS["glogch"] = (isset($_COOKIE["logintoken"]) && isset($_COOKIE["username"]) && iftokenanduserandiptrue_class($_COOKIE["logintoken"], $_COOKIE["username"]));
        return $GLOBALS["glogch"];
    }
}
function deletetemplate($tempid){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($tempid) && glogch()){
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt = $mysql->prepare('DELETE FROM `presentertemplatemodule` WHERE id = :tempid AND userid = :usx');
        $stmt->bindParam(":tempid", $tempid);
        $stmt->bindParam(":usx", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function removetemplateimg($templateid, $imgid){
    if(isset($templateid) && isset($imgid) && glogch()){
        require("mysql.php");
        $usid = getuserid_class($_COOKIE["username"]);
        $dax = gettemplateexistUrlList($templateid);

        if($dax !== false){
            $daxarr = unserialize($dax);
            
            if(is_array($daxarr) && count($daxarr) >= $imgid && ($imgid-1) >= 0){
                /*echo("delete=".$imgid);
                echo "<br>---------------------------------------<br>";
                print_r($daxarr);
                echo "<br>---------------------------------------<br>Deleting:".$daxarr[$imgid-1]."<br>";
                unset($daxarr[$imgid-1]);
                print_r($daxarr);*/
                $arrz = array();
                foreach ($daxarr as $value) {
                    $arrz[] = $value;
                }
                unset($arrz[$imgid-1]);
 
                $sde = serialize($arrz);
                $stmt = $mysql->prepare('UPDATE `presentertemplatemodule` SET imgurllist = :imgurl WHERE id = :tmpid AND userid = :usrix');
                $stmt->bindParam(":tmpid", $templateid);
                $stmt->bindParam(":imgurl", $sde);
                $stmt->bindParam(":usrix", $usid);
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count !== 0)
                    return true;
                else return false;
            }else return false;
            
        }else return false;
    }
    return false;
}

if(isset($_FILES["file"]) && isset($_GET["gofileupload"])){
    $resultz = upload_extern_gofile($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_gofile($file){//ANONYMOUS, NO ACCOUN NEEDED!
    //curl -F "file=@0XnBWW4 - Imgur.png" https://store1.gofile.io/uploadFile
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://store1.gofile.io/uploadFile');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => $cFile]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        $downloadpage = json_decode($result)->{'data'}->downloadPage;
    $final = "https://store1.gofile.io/download/".json_decode($result)->{'data'}->fileId."/".json_decode($result)->{'data'}->fileName;
    return $final;}
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["anonfilesupload"])){
    $resultz = upload_extern_anonfiles($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_anonfiles($file){//ANONFILES.com, NO ACCOUN NEEDED!
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];
    

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.anonfiles.com/upload');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => $cFile]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        $jdresdec = json_decode($result);
        $downloadpage = $jdresdec->{'data'}->{"file"}->{"url"}->full;
        $downloadfileid = $jdresdec->{'data'}->{"file"}->{"metadata"}->id;
        $html = file_get_contents($downloadpage);

        $doc = new DOMDocument();
        @$doc->loadHTML($html);

        $tags = $doc->getElementById('download-url');
        
        return $tags->getAttribute("href");
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["vaaredupload"])){
    $resultz = upload_extern_vaared($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_vaared($file){//upload.vaa.red, NO ACCOUN NEEDED! // Only IMAGES
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://upload.vaa.red/uploader.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['upfile' => $cFile]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        return json_decode($result)->url;
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["transfershupload"])){
    $resultz = upload_extern_transfersh($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_transfersh($file){//transfer.sh, NO ACCOUN NEEDED!
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://transfer.sh');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['upfile' => $cFile]);

    $headers = array();
    $headers[] = 'Max-Days: 3650';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        return str_replace("https://transfer.sh/", "https://transfer.sh/get/", $result);
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["0x0upload"])){
    $resultz = upload_extern_0x0($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_0x0($file){//0x0.st, NO ACCOUN NEEDED! 30 day save
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://0x0.st');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => $cFile]);

    $headers = array();
    $headers[] = 'Max-Days: 3650';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        return $result;
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["oshiupload"])){
    $resultz = upload_extern_oshi($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_oshi($file){//oshi.at, NO ACCOUN NEEDED! 90 day save
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://oshi.at');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['f' => $cFile, 'expire' => "129600"]);


    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        return explode("DL: ", $result)[1];
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["freeimageupload"])){
    $resultz = upload_extern_freeimage($_FILES["file"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_freeimage($file){//freeimage.host, NO ACCOUN NEEDED!
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://freeimage.host/api/1/upload?key=6d207e02198a847aa98d0a2a901485a5&action=upload&format=json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['source' => $cFile]);


    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }else{
        curl_close($ch);
        return json_decode($result)->{'image'}->url;
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["imgurupload"])){
    $resultz = upload_extern_imgur($_FILES["file"], $_GET["imgurupload"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_imgur($file, $clientid){//imgur.com, Needed: ClientID, get it @= https://api.imgur.com/oauth2/addclient
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $cFile]);

    $headers = array();
    $headers[] = 'Authorization: Client-ID '.$clientid.'';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }
    else{
        curl_close($ch);
        return json_decode($result)->{'data'}->link;
    }
    curl_close($ch);

}

if(isset($_FILES["file"]) && isset($_GET["imagekitupload"])){
    $resultz = upload_extern_imagekit($_FILES["file"], $_GET["imagekitupload"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_imagekit($file, $privatekey){//Imagekit.io, Needed: Private Key, get it @= https://imagekit.io/dashboard/developer/api-keys
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://upload.imagekit.io/api/v1/files/upload');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $post = array(
        'file' => $cFile,
        'fileName' => $filename
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    
    $headers = array();
    $headers[] = 'Authorization: Basic ' . str_replace("private_", "", $privatekey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }
    else{
        curl_close($ch);
        return json_decode($result)->url;
    }
    curl_close($ch);

}


if(isset($_FILES["file"]) && isset($_GET["imgbbupload"])){
    $resultz = upload_extern_imgbb($_FILES["file"], $_GET["imgbbupload"]);
    if($resultz !== false){
        print_r($resultz);
    }else echo "error";
}
function upload_extern_imgbb($file, $apikey){//imgbb.com, Needed: API Key, get it @= https://api.imgbb.com/
    //curl -F "file=@valorant.png" https://api.anonfiles.com/upload
    //https://gofile.io/api

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    $cFile = new CURLFile($filedata, $filetype, $filename);

    // Generated @ codebeautify.org
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key='.$apikey);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $cFile]);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }
    else{
        curl_close($ch);
        return json_decode($result)->{"data"}->url;
    }
    curl_close($ch);

}


function converter_pptx_to_pdf_pspdfkit($file, $apikey){
    //Key @ https://dashboard.pspdfkit.com/api/

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];
    
    $cFile = new CURLFile($filedata, $filetype, $filename);
    
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.pspdfkit.com/build');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $cFile]);
    $post = array(
        'instructions' => '{
            "parts": [
                {
                "file": "document"
                }
            ]
            }
            ',
        'document' => $cFile
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    
    $headers = array();
    $headers[] = 'Authorization: Bearer ' . str_replace("private_", "", $apikey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    //file_put_contents("test.pdf", $result);
    curl_close($ch);
    return $result;
}


function converter_pdf_to_image_pspdfkit($file, $apikey, $format = "png"){//returns ZIP file
    //Key @ https://dashboard.pspdfkit.com/api/

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];
    
    $cFile = new CURLFile($filedata, $filetype, $filename);
    
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.pspdfkit.com/build');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $cFile]);
    $post = array(
        'instructions' => '{
            "parts": [
              {
                "file": "document"
              }
            ],
            "output": {
              "type": "image",
              "format": "'.$format.'",
              "pages": {"start": 0, "end": -1},
              "dpi": 500
            }
          }
            ',
        'document' => $cFile
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    
    $headers = array();
    $headers[] = 'Authorization: Bearer ' . str_replace("private_", "", $apikey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    //file_put_contents("test.pdf", $result);
    curl_close($ch);
    return $result;
}

function converter_pptx_to_image_zip_pspdfkit($file, $apikey, $format = "png"){//returns ZIP file
    //Key @ https://dashboard.pspdfkit.com/api/

    $filename = $file['name'];
    $filedata = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];
    
    $cFile = new CURLFile($filedata, $filetype, $filename);
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.pspdfkit.com/build');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $cFile]);
    $post = array(
        'instructions' => '{
            "parts": [
              {
                "file": "document"
              }
            ],
            "output": {
              "type": "image",
              "format": "'.$format.'",
              "pages": {"start": 0, "end": -1},
              "dpi": 500
            }
          }
            ',
        'document' => $cFile
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    
    $headers = array();
    $headers[] = 'Authorization: Bearer ' . str_replace("private_", "", $apikey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    //file_put_contents("test.pdf", $result);
    curl_close($ch);
    return $result;
}

function updatepspdfkitkey($newkey){
    if(isset($newkey) && isset($_COOKIE["username"]) && glogch()){
        require("mysql.php");
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt = $mysql->prepare('UPDATE `user` SET pspdfkitkey = :pspdfkitkeyz WHERE id = :uids');
        $stmt->bindParam(":pspdfkitkeyz", $newkey);
        $stmt->bindParam(":uids", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0)
            return true;
        else return false;
    }
    return false;
}

function getpspdfkitkey(){
    if(glogch()){
        require("mysql.php");
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt = $mysql->prepare('SELECT pspdfkitkey FROM `user` WHERE id = :uids');
        $stmt->bindParam(":uids", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row["pspdfkitkey"];
        }else{
            return null;
        }
    }else{
        return null;
    }
}

function convert_and_upload_pdf_file_to_transfersh($apikey, $file){
    $resultfile = converter_pptx_to_pdf_pspdfkit($file, $apikey);
    $temp = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"].".pdf";
    file_put_contents($temp, $resultfile);
    
    $file = [
        'name' => $file["name"].".pdf",
        'type' => 'application/pdf',
        'tmp_name' => $temp,
        'error' => 0,
        'size' => filesize($temp),
    ];

    $rres = upload_extern_transfersh($file);
    unlink($temp);
    return $rres;
}


function convert_and_upload_images_from_pptx_file_to_transfersh_2conv_pp_pdf_png($apikey, $file){//Convert from PPTX -> PDF -> PNG/ZIP (cost 2 cred.)
    $resultfile = converter_pptx_to_pdf_pspdfkit($file, $apikey);
    $temp = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"].".pdf";
    file_put_contents($temp, $resultfile);
    
    $filexxx = [
        'name' => $file["name"].".pdf",
        'type' => 'application/pdf',
        'tmp_name' => $temp,
        'error' => 0,
        'size' => filesize($temp),
    ];


    $resultfilexxx = converter_pdf_to_image_pspdfkit($filexxx, $apikey);
    $tempxxx = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"].".zip";
    file_put_contents($tempxxx, $resultfilexxx);
    
    $filezzz = [
        'name' => $file["name"].".zip",
        'type' => 'application/zip',
        'tmp_name' => $tempxxx,
        'error' => 0,
        'size' => filesize($tempxxx),
    ];



    // assuming file.zip is in the same directory as the executing script.
    // get the absolute path to $file
    $path = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"]."_folder";
    mkdir($path);
    $zip = new ZipArchive;
    $res = $zip->open($tempxxx);
    $zip->extractTo($path);
    $zip->close();

    $uploadedfilesarray = array();

    $files = glob($path.'/*', GLOB_BRACE);
    foreach($files as $file) {
        $filezzzxtmp = [
            'name' => "img.png",
            'type' => 'image/png',
            'tmp_name' => $file,
            'error' => 0,
            'size' => filesize($file),
        ];    
        $uploadedfilesarray[] = upload_extern_transfersh($filezzzxtmp);
    }

    return $uploadedfilesarray;

    //$rres = upload_extern_transfersh($file);
    //unlink($temp);
    //return $rres;
}


function convert_and_upload_images_from_pptx_file_to_transfersh($apikey, $file){//Convert from PPTX -> PNG/ZIP (cost 1 cred.)
    $resultfilexxx = converter_pptx_to_image_zip_pspdfkit($file, $apikey);
    $tempxxx = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"].".zip";
    file_put_contents($tempxxx, $resultfilexxx);
    
    $filezzz = [
        'name' => $file["name"].".zip",
        'type' => 'application/zip',
        'tmp_name' => $tempxxx,
        'error' => 0,
        'size' => filesize($tempxxx),
    ];



    // assuming file.zip is in the same directory as the executing script.
    // get the absolute path to $file
    $path = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"]."_folder";
    mkdir($path);
    $zip = new ZipArchive;
    $res = $zip->open($tempxxx);
    $zip->extractTo($path);
    $zip->close();

    $uploadedfilesarray = array();

    $files = glob($path.'/*', GLOB_BRACE);
    foreach($files as $file) {
        $filezzzxtmp = [
            'name' => "img.png",
            'type' => 'image/png',
            'tmp_name' => $file,
            'error' => 0,
            'size' => filesize($file),
        ];    
        $uploadedfilesarray[] = upload_extern_transfersh($filezzzxtmp);
    }

    return $uploadedfilesarray;

    //$rres = upload_extern_transfersh($file);
    //unlink($temp);
    //return $rres;
}


function convert_and_upload_images_from_pdf_file_to_transfersh($apikey, $file){
    $resultfilexxx = converter_pdf_to_image_pspdfkit($file, $apikey);
    $tempxxx = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"].".zip";
    file_put_contents($tempxxx, $resultfilexxx);
    
    $filezzz = [
        'name' => $file["name"].".zip",
        'type' => 'application/zip',
        'tmp_name' => $tempxxx,
        'error' => 0,
        'size' => filesize($tempxxx),
    ];



    // assuming file.zip is in the same directory as the executing script.
    // get the absolute path to $file
    $path = tempnam(sys_get_temp_dir(), 'TMP_')."_".$file["name"]."_folder";
    mkdir($path);
    $zip = new ZipArchive;
    $res = $zip->open($tempxxx);
    $zip->extractTo($path);
    $zip->close();

    $uploadedfilesarray = array();

    $files = glob($path.'/*', GLOB_BRACE);
    foreach($files as $file) {
        $filezzzxtmp = [
            'name' => "img.png",
            'type' => 'image/png',
            'tmp_name' => $file,
            'error' => 0,
            'size' => filesize($file),
        ];    
        $uploadedfilesarray[] = upload_extern_transfersh($filezzzxtmp);
    }

    return $uploadedfilesarray;

    //$rres = upload_extern_transfersh($file);
    //unlink($temp);
    //return $rres;
}

function getBibles(){//https://scripture.api.bible/livedocs#/Verses/getVerses
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.scripture.api.bible/v1/bibles',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'api-key: 985deed05b429a00f1ec20027954fe70'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    

    $bibles = array (
      );
    //echo $response;
    foreach (json_decode($response)->{'data'} as $key){
        array_push($bibles,array($key->language->name,$key->abbreviation,$key->id));
    }

    return $bibles;
}
function getBibleBooks($id){//https://scripture.api.bible/livedocs#/Verses/getVerses
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.scripture.api.bible/v1/bibles/'.$id.'/books',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'api-key: 985deed05b429a00f1ec20027954fe70'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    

    $bibles = array (
      );
    //echo $response;
    foreach (json_decode($response)->{'data'} as $key){
        array_push($bibles,array($key->name,$key->nameLong,$key->id));
    }

    return $bibles;
}

function getBibleBookChapters($id, $bookid){//https://scripture.api.bible/livedocs#/Verses/getVerses
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.scripture.api.bible/v1/bibles/'.$id.'/books/'.$bookid.'/chapters',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'api-key: 985deed05b429a00f1ec20027954fe70'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    

    $bibles = array (
      );
    //echo $response;
    foreach (json_decode($response)->{'data'} as $key){
        array_push($bibles,array($key->number,$key->reference,$key->id));
    }

    return $bibles;
}
function getBibleBookChapterVerses($id, $chapterid){//https://scripture.api.bible/livedocs#/Verses/getVerses
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.scripture.api.bible/v1/bibles/'.$id.'/chapters/'.$chapterid.'/verses',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'api-key: 985deed05b429a00f1ec20027954fe70'
    ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
    

    $bibles = array (
      );
    //echo $response;
    foreach (json_decode($response)->{'data'} as $key){
        array_push($bibles,array(explode(":", $key->reference)[count(explode(":", $key->reference))-1],$key->reference,$key->id));
    }

    return $bibles;
}
function getBibleBookChapterVerse($id, $verseid){//https://scripture.api.bible/livedocs#/Verses/getVerses
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.scripture.api.bible/v1/bibles/'.$id.'/verses/'.$verseid.'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'api-key: 985deed05b429a00f1ec20027954fe70'
    ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
    

$ve = preg_replace('!\s+!', ' ',preg_replace('/\s+/', ' ', preg_replace('/\s{2,}/',' ',Strip_tags(json_decode($response)->{'data'}->content))));
$velenght = strlen(explode(".",json_decode($response)->{'data'}->id)[count(explode(".",json_decode($response)->{'data'}->id))-1]);

return array(
    substr($ve, $velenght)
    ,json_decode($response)->{'data'}->reference,json_decode($response)->{'data'}->id);
}

//url shortener
function geturlshortenerurl($alias, $countviews = true){
    require("mysql.php");
    if(isset($alias)){
        $stmt = $mysql->prepare('SELECT * FROM `urlshortener` WHERE alias = :alias');
        $stmt->bindParam(":alias", $alias);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            if($countviews){
                $newviews = $row["views"] + 1;
                $stmtx = $mysql->prepare('UPDATE `urlshortener` SET views = :viewsx WHERE alias = :alias');
                $stmtx->bindParam(":viewsx", $newviews);
                $stmtx->bindParam(":alias", $alias);
                $stmtx->execute();
                $countx = $stmtx->rowCount();

                if ($countx !== 0)
                    return $row["url"];
                else return false;
            }else return true;//If exists return true
            return false;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


function geturlshortenerarray($alias){
    require("mysql.php");
    $trasharray = array();
    $trasharray["id"] = 0;
    $trasharray["userid"] = 0;
    $trasharray["views"] = 0;
    $trasharray["url"] = 0;
    $trasharray["alias"] = 0;

    if(isset($alias)){
        $stmt = $mysql->prepare('SELECT * FROM `urlshortener` WHERE alias = :alias');
        $stmt->bindParam(":alias", $alias);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            $row = $stmt->fetch();
            return $row;
        }else{
            return $trasharray;
        }
    }else{
        return $trasharray;
    }
}
function createurlshortenerurl($url, $alias){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    
    if(glogch() && isset($url) && isset($alias) && !geturlshortenerurl($alias, false)){
        require("mysql.php");
        $usid = getuserid_class($_COOKIE["username"]);
        if($usid !== 0){
            $stmt = $mysql->prepare('INSERT INTO `urlshortener`(`id`, `userid`, `views`, `url`, `alias`)
             VALUES (NULL, :usrid, 0, :urli, :aliasi);');
            $stmt->bindParam(":usrid", $usid);
            $stmt->bindParam(":urli", $url);
            $stmt->bindParam(":aliasi", $alias);
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if ($count !== 0) {
                return true;
            }else{
                return false;
            }
        }
    }
    return false;
}

function getshorturls(){
    require("mysql.php");
    if(glogch()){
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt = $mysql->prepare('SELECT * FROM `urlshortener` WHERE userid = :idn ORDER BY time ASC;');
        $stmt->bindParam(":idn", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            //$row = $stmt->fetch();
            return $stmt;
        }else{
            return null;
        }
    }else{
        return null;
    }
}
function deleteshorturl($alias){
    //require($_SERVER["CONTEXT_DOCUMENT_ROOT"]."/sqlware.config");
    require("mysql.php");
    if(isset($alias) && glogch()){
        $usid = getuserid_class($_COOKIE["username"]);
        $stmt = $mysql->prepare('DELETE FROM `urlshortener` WHERE alias = :ali AND userid = :usx');
        $stmt->bindParam(":ali", $alias);
        $stmt->bindParam(":usx", $usid);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count !== 0) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function getfullshorturl($alias){
    return (strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https') . '://'.getConfigValue("server_host")."/".$alias;
    //return ((strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https') . '://' . $_SERVER['HTTP_HOST'])."?".$alias;
}
if(isset($_GET["urlshortnow"]) && true){

    require("mysql.php");

    $rndmstring = strtolower(generateRandomString(5));
    while(geturlshortenerurl($rndmstring, false)){
        $rndmstring = strtolower(generateRandomString(5));
    }

        $usid = getuserid_class("API");
        if($usid !== 0){
            $stmt = $mysql->prepare('INSERT INTO `urlshortener`(`id`, `userid`, `views`, `url`, `alias`)
             VALUES (NULL, :usrid, 0, :urli, :aliasi);');
            $stmt->bindParam(":usrid", $usid);
            $stmt->bindParam(":urli", $_GET["urlshortnow"]);
            $stmt->bindParam(":aliasi", $rndmstring);
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if ($count !== 0) {
                $finurl =getfullshorturl($rndmstring);
                echo $finurl;
            }else{
                echo ($_GET["urlshortnow"]);
            }
        }else echo $_GET["url"];
}else if(isset($_GET["urlshortnow"])) echo $_GET["urlshortnow"];
function ifurlredirects($url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $out = curl_exec($ch);

    $real_url = $url;//default.. (if no redirect)

    if (preg_match("/location: (.*)/i", $out, $redirect))
        $real_url = $redirect[1];

    if (strstr($real_url, "bit.ly"))//the redirect is another shortened url
        $real_url = unshorten_url($real_url);

    if($real_url == $url) return false; else return true;
}

if(isset($_GET["redirecturlshortner"])){
    $qs = $_GET["redirecturlshortner"];
    if(ctype_alnum($qs)){
        $geturl = geturlshortenerurl($qs);
        if($geturl !== false){
            header('Location: ' . $geturl, true, false ? 301 : 302);
        }
    }
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
    <iframe src="/errorpage.html"></iframe>';
    //header("Location: errorpage.html");
    die();
}

function imgcheck($url){
	error_reporting(0);
	$headers = get_headers($url, 1);
	//echo($url);
	if (strpos($headers['Content-Type'], 'image/') !== false) {
		return true;
	} else {
		return false;
	}
}

//Updates
$version = "1.6";
$versiontype = "Release";
$versioninfo = "{Management Popup Update}";

if(isset($_POST["updatevkyfile_updateselected"])){
    $bneriheygnbweohn = "../";
    echo '<pre><pre style="color:blue;"><u><b>Updating Files:</b></u><br>';
    foreach($_POST["updatevkyfile_updateselected"] as $update){
        echo $update."<br>";
    }
    echo '</pre><hr>';
    echo "<h2>Updating...</h2><hr>";

    foreach($_POST["updatevkyfile_updateselected"] as $update){
        echo ">tmp_upload/".$update."<br>";
        if(file_exists("tmp_upload/".$update)){
            
            $pathz = pathinfo($bneriheygnbweohn . $update);
            if (!file_exists($pathz['dirname'])) {
                mkdir($pathz['dirname'], 0777, true);
            }

            if(copy("tmp_upload/".$update, $bneriheygnbweohn . $update)){
                echo '<pre style="color:green;">Successful!</pre>';
            }else echo '<pre style="color:indianred;">Copy Error!</pre>';

        }else echo '<pre style="color:indianred;">File not found!</pre>';
        echo "<hr>";
    }
    echo '<pre style="color:green;"><h3>Done!</h3></pre><a href="../panel/?create_dbs=true">Close...</a>';
    echo '</pre>';
}
if(isset($_GET["action"]) && $_GET["action"] == "autoupdategithub"){
    
        echo '<pre>';
        echo "Download starting...<br>Url: https://github.com/TechGrief/sqlware/blob/main/update.vky?raw=true";
        $target_dir = "tmp_upload/";
        if(file_exists($target_dir)){
            array_map('unlink', glob("$target_dir/*.*"));
            rmdir_recursive($target_dir);
        }
        mkdir($target_dir, 0777, true);
        $target_ext = "vky";
        $target_file = $target_dir . "upload.".$target_ext;
        echo "<br><br>Saving to: " . $target_file . "<br><br>Downloading...<br>";

        if(file_put_contents($target_file,file_get_contents("https://github.com/TechGrief/sqlware/blob/main/update.vky?raw=true"))){
            echo "<pre style='color:green;'>File is valid, and was successfully uploaded.</pre><hr>";
            echo "Loading files...";

            
            $path = pathinfo(realpath($target_file), PATHINFO_DIRNAME);
            $zip = new ZipArchive;
            $res = $zip->open($target_file);
            if ($res === TRUE) {
                $zip->extractTo($path);
                $zip->close();
                echo "<br>$target_file extracted to $path";
                echo "<br>Deleting $target_file...";
                if(unlink($target_file)){
                    echo "<br>Deleted!<hr><pre style='color:blue;'>";

                    $nversion = "Unknown";
                    $nversiontype = "Unknown";
                    if(file_exists("tmp_upload/php/class.php")){
                        $lines = file("tmp_upload/php/class.php");
                        foreach ($lines as $lineNumber => $line) {
                            $line = str_replace(" ", "", $line);
                            if (strpos($line, '$version="') !== false && $nversion == "Unknown") {
                                $nversion = str_replace("\";", "", str_replace('$version="', "", $line));
                            }
                            if (strpos($line, '$versiontype="') !== false && $nversiontype == "Unknown") {
                                $nversiontype = str_replace("\";", "", str_replace('$versiontype="', "", $line));
                            }
                        }
                    }
                    echo('
                    <h2 style="color:cyanblue;margin-top:-20px;margin-bottom:0px;">Loading version data...</h2><h3 style="color:cyanblue;margin-top:7px;margin-bottom:-10px;">>Version: '.$nversion.'</h3>
                    <h3 style="color:cyanblue;margin-top:-14px;margin-bottom:-5px;">>Versiontype: '.$nversiontype.'<br></h3> ');

                    echo "<button onclick='select();' style='width:100px;float:left;'>Check all</button> <button onclick='deselect();' style='margin-left:8px;width:100px;float:left;'>Uncheck all</button>
                    <form action='class.php' method='post'><table>";
                    echo '
                    <tr>
                      <th style="text-align:left;"><u>File</u></th>
                      <th style="text-align:left;padding-left:25px;"><u>Update?</u></th>
                      <th style="text-align:left;padding-left:25px;"><u>Exists?</u></th>
                    </tr>
                    <head>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    </head>
                    ';

                    $fileList = glob("$path/*");
                    $bneriheygnbweohn = "../";
                    writedir($path, $path, $bneriheygnbweohn);
                    /*foreach($fileList as $filename){
                        if(is_dir($filename)){
                            writedir($filename, $path, $bneriheygnbweohn);
                        }
                    }*/


                    echo "
                    <script>
                    function deselect(){
                        $('input:checkbox').removeAttr('checked');
                    }
                    function select(){
                        $('input:checkbox').attr('checked','true');
                    }
                    </script>
                    </table><br><input type='submit' value='Update selected files'></form></pre>";
                }else{
                    echo "<br>Error! Fix manualy!";
                }
            } else {
                echo "<br>Doh! I couldn't open $target_file";
            }


        } else {
            echo "<pre style='color:indianred;'>Possible file upload attack! Upload ERROR!<br></pre>";
        }
        print "</pre>";

    
}
if(isset($_FILES["updatevkyfile_upload"])){
    if($_FILES["updatevkyfile_upload"]["type"] == "application/x-zip-compressed" 
        || $_FILES["updatevkyfile_upload"]["type"] == "application/octet-stream"){
        
        echo '<pre>';
        
        echo "Upload starting...";

        

        $target_dir = "tmp_upload/";
        if(file_exists($target_dir)){
            array_map('unlink', glob("$target_dir/*.*"));
            rmdir_recursive($target_dir);
        }
        mkdir($target_dir, 0777, true);
        $target_ext = explode(".", $_FILES["updatevkyfile_upload"]["name"])[count(explode(".", $_FILES["updatevkyfile_upload"]["name"]))-1];
        $target_file = $target_dir . "upload.".$target_ext;
        echo "<br><br>Saving to: " . $target_file . "<br><br>Uploading...<br>";

        if (move_uploaded_file($_FILES['updatevkyfile_upload']['tmp_name'], $target_file)) {
            echo "<pre style='color:green;'>File is valid, and was successfully uploaded.</pre><hr>";
            echo "Loading files...";

            
            $path = pathinfo(realpath($target_file), PATHINFO_DIRNAME);
            $zip = new ZipArchive;
            $res = $zip->open($target_file);
            if ($res === TRUE) {
                $zip->extractTo($path);
                $zip->close();
                echo "<br>$target_file extracted to $path";
                echo "<br>Deleting $target_file...";
                if(unlink($target_file)){
                    echo "<br>Deleted!<hr><pre style='color:blue;'>";

                    $nversion = "Unknown";
                    $nversiontype = "Unknown";
                    if(file_exists("tmp_upload/php/class.php")){
                        $lines = file("tmp_upload/php/class.php");
                        foreach ($lines as $lineNumber => $line) {
                            $line = str_replace(" ", "", $line);
                            if (strpos($line, '$version="') !== false && $nversion == "Unknown") {
                                $nversion = str_replace("\";", "", str_replace('$version="', "", $line));
                            }
                            if (strpos($line, '$versiontype="') !== false && $nversiontype == "Unknown") {
                                $nversiontype = str_replace("\";", "", str_replace('$versiontype="', "", $line));
                            }
                        }
                    }
                    echo('
                    <h2 style="color:cyanblue;margin-top:-20px;margin-bottom:0px;">Loading version data...</h2><h3 style="color:cyanblue;margin-top:7px;margin-bottom:-10px;">>Version: '.$nversion.'</h3>
                    <h3 style="color:cyanblue;margin-top:-14px;margin-bottom:-5px;">>Versiontype: '.$nversiontype.'<br></h3> ');

                    echo "<button onclick='select();' style='width:100px;float:left;'>Check all</button> <button onclick='deselect();' style='margin-left:8px;width:100px;float:left;'>Uncheck all</button>
                    <form action='class.php' method='post'><table>";
                    echo '
                    <tr>
                      <th style="text-align:left;"><u>File</u></th>
                      <th style="text-align:left;padding-left:25px;"><u>Update?</u></th>
                      <th style="text-align:left;padding-left:25px;"><u>Exists?</u></th>
                    </tr>
                    <head>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    </head>
                    ';

                    $fileList = glob("$path/*");
                    $bneriheygnbweohn = "../";
                    writedir($path, $path, $bneriheygnbweohn);
                    /*foreach($fileList as $filename){
                        if(is_dir($filename)){
                            writedir($filename, $path, $bneriheygnbweohn);
                        }
                    }*/


                    echo "
                    <script>
                    function deselect(){
                        $('input:checkbox').removeAttr('checked');
                    }
                    function select(){
                        $('input:checkbox').attr('checked','true');
                    }
                    </script>
                    </table><br><input type='submit' value='Update selected files'></form></pre>";
                }else{
                    echo "<br>Error! Fix manualy!";
                }
            } else {
                echo "<br>Doh! I couldn't open $target_file";
            }


        } else {
            echo "<pre style='color:indianred;'>Possible file upload attack! Upload ERROR!<br></pre>";
        }
        print "</pre>";

    }
}
function writedir($dir, $path, $bneriheygnbweohn){
    $fnn = "";
    foreach(scandir($dir) as $filenamex){
        $filename = $dir . "/" . $filenamex;
        $fnn = str_replace($path."/", "", $filename);
        if(!strpos($fnn,"tmp_upload") && !str_ends_with($fnn,".")){
            if(is_file($filename)){
                echo 
                '
                <tr>
                    <td>'.$fnn.'</td>
                    <td style="padding-left:25px;">
                    '.
                    (str_ends_with($fnn, "mysql.php") == false ?  
                    '<input style="height:10px; margin: 10px 10px 0 0; " type="checkbox" name="updatevkyfile_updateselected[]" checked value="'.str_replace($path."/", "", $filename).'">'
                    : 'x').'
                        
                    </td>
                    <td style="padding-left:25px;">'.(file_exists($bneriheygnbweohn . $fnn) ? "yes" : "").'</td>
                </tr>
                ';
            }
            else if(is_dir($filename)){
                writedir($filename, $path, $bneriheygnbweohn);
            }  
        } 
    }
}
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}
























/*function popup_box_select_generate($id, $title, $logo, $returnkeyname, $method = "get", $jsonvalues, $selected = null){
    $jsonvalues_decoded = json_decode($jsonvalues);
    echo('
    '.defaultpopupstyles().'
    <style>
    body :not(.popup1) :not(#popup1ar){
        filter: sepia(10%) blur(2px);
    }
    </style>
    <div class="popup1" id="'.$id.'">
        <p id="popup1ar" style="width:100%;position: fixed;left:0;top:0;font-weight:bold;font-size:25px;line-height:1.1;">
        '.$title.'
        </p>

        <div class="popup_close" id="popup1ar" onclick="hidepopup'.$id.'(\'./\');"> <i class="fa fa-close" id="popup1ar" style="margin:auto;"></i> </div>
        <div class="popup_logo" id="popup1ar" onclick="document.getElementById(\'submit'.$id.'\').click();"> <i class="fa fa-check" id="popup1ar" style="margin:auto;"></i></div>
        
        <div id="popup1ar" style="width:100%;padding-bottom:5px;">
        <br><br>

            <form class="famethod" action="'.explode("/",$_SERVER['SCRIPT_NAME'])[count(explode("/",$_SERVER['SCRIPT_NAME']))-1].'" method="'.$method.'">
            
            <i class="fa fa-'.$logo.'" style="filter:none;margin-left:0;font-size:48px;border:2px solid transparent;padding:2px;height:50px;width:50px;border-radius:8px;"></i>

                
                <select required name="'.$returnkeyname.'" style="filter:none;" class="famethoddesc">
    ');
    $foundkey=null;
    $foundvalue=null;
    foreach($jsonvalues_decoded as $key => $value){
        if($key == $selected || $value == $selected){
            $foundkey = $key;
            $foundvalue = $value;
            echo('<option value="'.$foundkey.'">'.$foundvalue.'</option>');
            break;
        }
    }
    foreach($jsonvalues_decoded as $key => $value){
        if($key !== $foundkey && $value !== $foundvalue){
            echo('<option value="'.$key.'">'.$value.'</option>');
        }
    }
    echo('
                </select>
                
                <input id="submit'.$id.'" name="submit" value="true" type="submit" style="display:none;">
                
            </form>
            
        </div>
    </div>

    <script>
    var '.$id.' = document.getElementById("'.$id.'");
    //'.$id.'.style.display = "none";
    function hidepopup'.$id.'() {
        '.$id.'.style.display = "none";
        document.body.style.filter = "none";

        let div = document.createElement(\'style\');
        div.innerHTML = "body :not(.popup1) :not(#popup1ar){ filter: none; }";
        document.body.append(div);
    }
    function redirecturl(urls) {
        window.location.href = urls;
    }
    </script>

    ');
}*/

function on_click($javascript_code){
    return ' onclick=\''.$javascript_code.'\' ';
}

/*
1. Create the Popup Box with popup_box_generate. Returns: name/selected id
2. Create Javascript code with popup_box_generate_show_script. Place it inside onclick=""

*/

function popup_box_generate_show_script($name){
    return 'document.getElementById("'.$name.'").style.display = "flex";document.body.style.overflow = "hidden";';
}
class Input
{
    public $id;
    public $type;
    public $title;
    public $placeholder;
    public $json_content_encoded;
    public $selected;
    public $required;
    public $spellcheck;
    public $autocomplete;
    public $additional;
    public $value;
    
    public function __construct(
                                    $id = "",
                                    $type = "text",
                                    $title = null,
                                    $placeholder = null,
                                    $json_content_encoded = '{"error":"Not defined!"}',
                                    $selected = null,
                                    $required = "true",
                                    $spellcheck = "false",
                                    $autocomplete = "off",
                                    $additional = null,
                                    $value = null,
                                ){
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->json_content_encoded = $json_content_encoded;
        $this->selected = $selected;
        $this->required = $required;
        $this->spellcheck = $spellcheck;
        $this->autocomplete = $autocomplete;
        $this->additional = $additional;
        $this->value = $value;
    }
}
class PopUp {
    // Properties
    public $id = null;
    public $title = "Title";
    public $description = null;
    public $method = "post";
    public $type = "input_1";
    public $submit_text = "Save";
    public $submit_name = "submit";
    public $submit_url = null;
    public $close_text = "Cancel";
    public $close_redirecturl = null;
    public $allowclose = true;
    public $img = null;
    private $code = "";

    public $inputs = array();
    public function addInput($input = null){
        if($input != null && isset($input->id))
        array_push($this->inputs, $input);
    }

    public function __construct(
                                $id = "auto",
                                $title = "Title",
                                $description = null,
                                $method = "post",
                                $type = "input_1",
                                $submit_text = "Save",
                                $submit_name = "submit",
                                $submit_url = null,
                                $allowclose = true,
                                $close_text = "Close",
                                $close_redirecturl = null,
                                $img = null,
                                $inputs = array()
                            ){
        if($this->id == null || $this->id == "auto") $this->id = generateRandomString(12); else $this->id = $id;
        if($this->submit_url == null) $this->submit_url = $_SERVER['PHP_SELF']; else $this->submit_url = $submit_url;
        $this->title = $title;
        $this->description = $description;
        $this->method = $method;
        $this->type = $type;
        $this->submit_text = $submit_text;
        $this->img = $img;
        $this->allowclose = $allowclose;
        $this->submit_name = $submit_name;
        $this->close_text = $close_text;
        $this->close_redirecturl = $close_redirecturl;
        foreach($inputs as $put){
            $this->addInput($put);
        }
    }
    
    function generateCode() {
        if($this->type != "alert" && count($this->inputs) == 0){return "Error: No jsonvalues detected!";}
        $this->code = "";

        $this->code .= '
        <style>
        '.popup_box_generate_styles().'
        </style>
        <form method="'.$this->method.'" action="'.$this->submit_url.'" id="'.$this->id.'_form">
        <div class="pp_popup" id="'.$this->id.'" style="display:none;">';
    
        if($this->img){ $this->code .= '<div style="padding: 10px 10px 10px;"><img class="pp_img" src="'.$this->img.'"/></div>'; }
    
        $this->code .= '
            <div class="pp_text_block">
                <div class="pp_title">
                '.$this->title.' 
                </div>
                '.(($this->description !== null) ? '<div class="pp_description">'.$this->description.'</div>' : "").'
            </div>';
            
        if($this->type == "input_1") {
            foreach ($this->inputs as $key => $value) {
    
                if($value->type == "text"){
                    $this->code .= '<label for="'.$value->id.'" class="pp_type_input_1_label">'.$value->title.(($value->required == "true") ? " *":"").'</label>';
                    $this->code .= '<input type="text" class="pp_type_input_text" id="'.$value->id.'" name="'.$value->id.'" value="'.$value->value.'" placeholder="'.$value->placeholder.'" required="'.$value->required.'" spellcheck="'.$value->spellcheck.'" autocomplete="'.$value->autocomplete.'" '.$value->additional.'/>';
                }else if($value->type == "email"){
                    $this->code .= '<label for="'.$value->id.'" class="pp_type_input_1_label">'.$value->title.(($value->required == "true") ? " *":"").'</label>';
                    $this->code .= '<input type="email" class="pp_type_input_email" id="'.$value->id.'" name="'.$value->id.'" value="'.$value->value.'" placeholder="'.$value->placeholder.'" required="'.$value->required.'" spellcheck="'.$value->spellcheck.'" autocomplete="'.$value->autocomplete.'" '.$value->additional.'/>';
                }else if($value->type == "password"){
                    $this->code .= '<label for="'.$value->id.'" class="pp_type_input_1_label">'.$value->title.(($value->required == "true") ? " *":"").'</label>';
                    $this->code .= '
                    <div style="display:block;width:390px;">
                    <input type="password" class="pp_type_input_password" id="'.$value->id.'" name="'.$value->id.'" value="'.$value->value.'" placeholder="'.$value->placeholder.'"  required="'.$value->required.'" spellcheck="'.$value->spellcheck.'" autocomplete="'.$value->autocomplete.'" '.$value->additional.'/>
                    <i class="fa fa-eye-slash pp_type_input_password_eye" 
                    onclick="
                        if(document.getElementById(\''.$value->id.'\').type == \'password\') { 
                            document.getElementById(\''.$value->id.'\').type = \'text\';
                            this.classList.remove(\'fa-eye-slash\');
                            this.classList.add(\'fa-eye\');
                        }else { 
                            document.getElementById(\''.$value->id.'\').type = \'password\';
                            this.classList.remove(\'fa-eye\');
                            this.classList.add(\'fa-eye-slash\');
                        }
                    "></i>
                    </div>';
                }else if($value->type == "dropdown"){
                    $this->code .= '<label for="'.$value->id.'" class="pp_type_input_1_label">'.$value->title.(($value->required == "true") ? " *":"").'</label>';
                    $this->code .= '<select name="'.$value->id.'" id="'.$value->id.'" form="'.$this->id.'_form" class="pp_type_input_dropdown" placeholder="'.$value->title.'"  required="'.$value->required.'" spellcheck="'.$value->spellcheck.'" autocomplete="'.$value->autocomplete.'" '.$value->additional.'>';
                    foreach (json_decode($value->json_content_encoded) as $key2 => $value2) {
                        $this->code .= '<option style="" value="'.$key2 .'" '.((isset($value->selected) && $value->selected == $key2) ? 'selected' : '').'>'.$value2 .'</option>';
                    }
                    $this->code .= '</select>';
                }else if($value->type == "select"){
                    $this->code .= '<label for="'.$value->id.'" class="pp_type_input_1_label">'.$value->title.(($value->required == "true") ? " *":"").'</label>';
                    $this->code .= '<input style="display:none;" type="text" value="'.$value->placeholder.'" name="'.$value->id.'" id="'.$value->id.'" form="'.$this->id.'_form" required="'.$value->required.'" spellcheck="'.$value->spellcheck.'" autocomplete="'.$value->autocomplete.'" '.$value->additional.'>';
                    $this->code .= '<script>const arr_'.$value->id.' = [];</script>';

                    foreach (json_decode($value->json_content_encoded) as $key2 => $value2) {
                        $this->code .= '<script>arr_'.$value->id.'.push(\'select_btn_'.$key2.'_'.$this->id.'_'.$value->id.'\');</script>
                        <div 
                        id="select_btn_'.$key2.'_'.$this->id.'_'.$value->id.'"
                        onclick="select_'.$value->id.'(\'select_btn_'.$key2.'_'.$this->id.'_'.$value->id.'\');" data-value="'.$key2 .'" 
                        class="'.((isset($value->selected) && $value->selected == $key2) ? 'pp_type_input_1_select_1' : 'pp_type_input_1_select_0').'"
                        >
                            
                            <label
                            style="margin: 0;position: absolute;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);cursor: pointer;">
                            '.$value2 .'
                            </label>

                        </div>';
                    }
                    $this->code .= '
                    <script>
                    for (let i = 0; i < arr_'.$value->id.'.length; i++) {
                        console.log("select_'.$value->id .' Buttons->"+ arr_'.$value->id.'[i]);
                    }
                        function select_'.$value->id.'(value){
                            document.getElementById("'.$value->id.'").value = document.getElementById(value).getAttribute("data-value");

                            for (let i = 0; i < arr_'.$value->id.'.length; i++) {
                                /*document.getElementById("'.$value->id.'").value = document.getElementById(arr_'.$value->id.'[i]).getAttribute("data-value");
                                alert(document.getElementById(arr_'.$value->id.'[i]).getAttribute("data-value"));*/

                                if(value == arr_'.$value->id.'[i]) {
                                    document.getElementById(arr_'.$value->id.'[i]).className = "pp_type_input_1_select_1";
                                }else {
                                    document.getElementById(arr_'.$value->id.'[i]).className = "pp_type_input_1_select_0";
                                }
                            }
                            //document.getElementById("'.$value->id.'").value = value;
                        }
                    </script>';
                }
                else if($value->type == "link"){
                    $this->code .= '<div style="width:390px;margin-top : 2px;margin-bottom : 3px;"><a class="pp_type_input_link" href="'.$value->placeholder.'">'.$value->title.'</a></div>';
                }else if($value->type == "hidden"){
                    $this->code .= '<input type="hidden" id="'.$value->id.'" name="'.$value->id.'" value="'.$value->value.'" '.$value->additional.'/>';
                }else{
                    $this->code .= '<label for="'.$value->id.'" class="pp_type_input_1_label">'.$value->title.'</label>';
                    $this->code .= '<input type="'.$value->type.'" class="pp_type_input_1" id="'.$value->id.'" name="'.$value->id.'" value="'.$value->value.'" placeholder="'.$value->placeholder.'" '.$value->additional.'/>';
                }
            }
        }
    
        $this->code .= '
            <div class="buttons">
                <div class="glow-on-hover button" onclick=\''.(($this->close_redirecturl == null) ? 'document.getElementById("'.$this->id.'").style.display = "none";document.body.style.overflow = "scroll";':'window.location.href="'.$this->close_redirecturl.'";').'\' style=\''.((!$this->allowclose)?'visibility: hidden;':'').'\'>'.$this->close_text.'</div>
                '.(($this->type != "alert" || true) ? 
                ('<div class="button button-primary" onClick="document.getElementById(\''.$this->id.'_submit\').click();">'.$this->submit_text.'</div>'):
                ('<div class="button button-primary" style="visibility:hidden;">'.$this->submit_text.'</div>')).'
            </div>
            <input type="submit" name="'.$this->submit_name.'" form="'.$this->id.'_form" value="Send" id="'.$this->id.'_submit" style="display:none;"/>
            <label style="font-size:12px;margin-top:-10px;margin-bottom:-8px;color: #c9cdd1;">©TechGrief</label>
            </div>
            </form>
        ';
        return true;
    }
    function getCode(){
        return $this->code;
    }
    function script_js(){
        return 'document.getElementById("'.$this->id.'").style.display = "flex";document.body.style.overflow = "hidden";';
    }
}

function popup_box_generate_styles(){
    if(isset($_GLOBALS["popup_box_generate_styles"])) return ""; else 
    $_GLOBALS["popup_box_generate_styles"] = true;
    return '@import url("https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap");
    .pp_popup {
        align-items: center;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 
            0 0.4px 3.6px rgba(0, 0, 0, 0.004),
            0 1px 8.5px rgba(0, 0, 0, 0.01), 0 1.9px 15.7px rgba(0, 0, 0, 0.019),
            0 3.4px 28.2px rgba(0, 0, 0, 0.03), 0 6.3px 54.4px rgba(0, 0, 0, 0.047),
            0 15px 137px rgba(0, 0, 0, 0.07);
        position:fixed;
        flex-direction: column;
        display:flex;
        width:430px;
        //min-width: ($_COOKIE["window_width"]*0.25)px;
        z-index:1;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 10px 10px 10px 10px;
        overflow: hidden;
        padding-top: 10px;
        font-family: "Source Sans Pro";
        user-select: none; /* supported by Chrome and Opera */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
    }
    .pp_img {
        //background-color: transparent;
        //margin: 16px 0;
        //box-sizing: border-box;
        //margin: 0 20px 20px;
        //padding: 20px;
        border: 1px solid transparent;
        border-radius: 20px;
        box-sizing: border-box;
        width: 100%;
        background:none;
    }
    .pp_text_block {
        box-sizing: border-box;
        padding: 0 20px 10px;
        width: 100%;
    }
    .pp_title {
        margin-top: 10px;
        align-items: center;
        display: flex;
        font-size: 28px;
        font-weight: bold;
        position: relative;
        cursor:default;
    }
    .pp_description {
        color: #64686b;
        text-align: justify;
        font-size: 18px;
    }
    .pp_type_input_1_label {
        width: 390px;
        float: left;
        font-size: 16px;
        color: #64686b;
        font-weight: bold;
    }
    .pp_type_input_1 {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 390px;
        border: 2px solid #64686b;
        radius: 10px;
        font-size: 20px;
        padding: 4px 5px 4px 5px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
    }
    .pp_type_input_text {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 390px;
        border: 2px solid #64686b;
        radius: 10px;
        font-size: 20px;
        padding: 4px 5px 4px 5px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
    }
    .pp_type_input_email {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 390px;
        border: 2px solid #64686b;
        radius: 10px;
        font-size: 20px;
        padding: 4px 5px 4px 5px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
    }
    .pp_type_input_password {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 345px;
        float:left;
        border: 2px solid #64686b;
        radius: 10px;
        font-size: 20px;
        padding: 4px 5px 4px 5px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
    }
    .pp_type_input_password_eye {
        color: #64686b;
        float:right;
        margin-top : 3px;
        border: 2px solid transparent;
        radius: 10px;
        padding: 4.5px 6.5px 3.5px 5px;
        vertical-align: middle;
        font-size:22px;
        cursor:pointer;
    }
    .pp_type_input_dropdown {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 390px;
        border: 2px solid #64686b;
        radius: 10px;
        font-size: 20px;
        padding: 5px 5px 5px 4px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
        cursor: pointer;
    }
    .pp_type_input_link {
        text-decoration: none;
        font-size: 15px;
        letter-spacing: 1px;
        opacity: 0.5;
        color: inherit;
        background: 
		linear-gradient(to right, transparent, transparent),
		linear-gradient(45deg, rgba(255, 0, 0, 1), rgba(255, 0, 180, 1), rgba(0, 100, 200, 1));
        background-size: 102% 1.5px, 0 1.5px;
        background-position: 100% 100%, 0 100%;
        background-repeat: no-repeat;
    }
    .pp_type_input_link:hover,
    .pp_type_input_link:focus {
        transition: all 0.5s ease-out;
        opacity: 0.9;
        background-size: 0 1.5px, 102% 1.5px;
    }
    .pp_type_input_1_select_0 {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 390px;
        height: 50px;
        border: 2px solid #64686b;
        font-size: 20px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
        cursor: pointer;
        position: relative;
        opacity: 0.45;
        transition: opacity 0.1s ease-in;
        -moz-transition: opacity 0.1s ease-in;
        -webkit-transition: opacity 0.1s ease-in;
        -o-transition: opacity 0.1s ease-in;
        
        transition: font-weight 0.08s ease-in;
        -moz-transition: font-weight 0.08s ease-in;
        -webkit-transition: font-weight 0.08s ease-in;
        -o-transition: font-weight 0.08s ease-in;
    }
    .pp_type_input_1_select_1 {
        color: #64686b;
        margin-top : 3px;
        margin-bottom : 5px;
        width: 390px;
        height: 50px;
        border: 2px solid #64686b;
        font-size: 20px;
        outline: none;
        border-radius: 8px;
        letter-spacing: 1px;
        cursor: pointer;
        position: relative;
        opacity: 1;
        transition: opacity 0.1s ease-in;
        -moz-transition: opacity 0.1s ease-in;
        -webkit-transition: opacity 0.1s ease-in;
        -o-transition: opacity 0.1s ease-in;
        font-weight: bold;
        
        transition: font-weight 0.08s ease-in;
        -moz-transition: font-weight 0.08s ease-in;
        -webkit-transition: font-weight 0.08s ease-in;
        -o-transition: font-weight 0.08s ease-in;
    }


    
    .buttons {
    display: flex;
    margin-top: 8px;
    width: 100%;
    }
    .button {
    align-items: center;
    background: #edf1f7;
    border-radius: 10px;
    cursor: pointer;
    display: flex;
    height: 50px;
    justify-content: center;
    margin: 0 5px 5px 20px;
    width: 100%;
    }

    .button:last-child {
        margin: 0 20px 15px 5px;
    }

    .button-primary {
        background-color: #0060f6;
        color: #fff;
        position: relative;
        z-index: 3;
    }
    .button-primary:before {
        content: "";
        background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
        position: absolute;
        top: -2px;
        left:-2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing 20s linear infinite;
        opacity: 0;
        transition: opacity .3s ease-in-out;
        border-radius: 10px;
    }
    .button-primary:hover:before {
        opacity: 1;
    }

    .button-primary:after {
        z-index: -1;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: #0060f6;
        /*left: 0;
        top: 0;*/
        border-radius: 10px;
    }

    .glow-on-hover {
        position: relative;
        z-index: 3;
    }

    .glow-on-hover:before {
        content: "";
        background: linear-gradient(indianred, indianred);
        position: absolute;
        top: -3px;
        left:-3px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing 20s linear infinite;
        opacity: 0;
        transition: opacity .3s ease-in-out;
        border-radius: 10px;
    }

    .glow-on-hover:hover:before {
        opacity: 1;
    }

    .glow-on-hover:after {
        z-index: -1;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: #edf1f7;
        /*left: 0;
        top: 0;*/
        border-radius: 10px;
    }

    @keyframes glowing {
        0% { background-position: 0 0; }
        50% { background-position: 400% 0; }
        100% { background-position: 0 0; }
    }';
}




?>